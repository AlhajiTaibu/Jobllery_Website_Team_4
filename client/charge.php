<?php
require_once('../freelancer/includes/db.php');
require_once('stripe_config.php');

session_start();

$id = $_SESSION['user_id'];

if(isset($_GET['job_id'])){
    $job_id = $_GET['job_id'];
    //qery for bid amount

    $sub_query = mysqli_query($connection,"SELECT * FROM transaction");
    if($sub_query){
        $row1 =mysqli_fetch_array($sub_query);
        $job_post_id = $row1['job_post_id'];
        if($job_post_id === $job_id){
            $message = 'paid';
         echo '<script>window.location="payments.php?message='.$message.'"</script>';

        } else{
         
    $query = mysqli_query($connection,"SELECT * FROM job_post WHERE job_post_id = '$job_id'");
    if($query){
         $row = mysqli_fetch_array($query);
         $pay_amount = $row['offered_salary'];
         $tax=($pay_amount * 0.25);
         $pay_amount = $pay_amount + $tax;
         $stripe_pay_amount = $pay_amount*100;
    $save_transaction = mysqli_query($connection,"INSERT INTO transaction(job_post_id,client,amount)VALUES('$job_id','$id','$pay_amount')");
      if($save_transaction){
        
      }

    }else{
        //no query
    }

\Stripe\Stripe::setVerifySslCerts(false);
$token  = $_POST['stripeToken'];
$email  = $_POST['stripeEmail'];

$customer = \Stripe\Customer::create(array(
    'email' => $email,
    'source'  => $token
));

$charge = \Stripe\Charge::create(array(
    'customer' => $customer->id,
    'amount'   => $stripe_pay_amount,
    'currency' => 'usd'
));

$amount_charged = $charge->amount;
$amount_charged = $amount_charged/100;

$message = 'success';

echo '<script>window.location="payments.php?message='.$message.'"</script>';

    } 
}

}