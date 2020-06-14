
<?php  ob_start(); ?>
<?php session_start();?>
<?php include "../freelancer/includes/db.php";?>

<?php

if(isset($_GET['job_id'])){
  $job_id =$_GET['job_id'];

    $query = "SELECT * FROM jobs_applied WHERE id = '$job_id'";
    $applied_job=mysqli_query($connection,$query );
   
    while($row = mysqli_fetch_assoc($applied_job) ){ 
      $job_post_id = $row['job_post_id'];
      $client_id = $row['client_id'];
      $freelancer_id = $row['freelancer_id'];
      
    }
    
    $query = "SELECT * FROM client WHERE user_id = '$client_id' ";
    $select_client= mysqli_query ($connection,$query);
    
    while($row = mysqli_fetch_assoc($select_client)){
      $client_firstname = $row['firstname'];
      $client_lastname = $row['lastname'];
      $client_address = $row['address'];
    }
    
    $query = "SELECT * FROM profile WHERE user_id = '$freelancer_id' ";
    $select_freelancer=mysqli_query ($connection,$query);
    
    while($row = mysqli_fetch_assoc($select_freelancer)){
      $free_firstname = $row['first_name'];
      $free_lastname = $row['last_name'];
      $free_address = $row['address'];
    }

    $query = "SELECT * FROM job_post WHERE job_post_id = '$job_post_id' ";
        
    $select_job=mysqli_query ($connection,$query);
   
    while($row = mysqli_fetch_assoc($select_job)){
        
      $job_title = $row['job_title'];
      $price = $row['offered_salary'];
      $description = $row['job_description'];
    }

}


?>
<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <meta http-equiv="x-ua-compatible" content="ie=edge">
       <title>Jobllery | Invoice</title>
       <!-- Font Awesome -->
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
       <!-- Google Fonts Roboto -->
       <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
       <!-- Bootstrap core CSS -->
       <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
       <!-- Material Design Bootstrap -->
       <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
       <!-- Your custom styles (optional) -->
       <link rel="stylesheet" href="assets/css/invoice.css">
   
   
    </head>
   <body>
    <div id="invoice">

       
        <div class="toolbar hidden-print">
            <div class="text-right">
                <button id="printInvoice" style="background-color: #00d820;border-color:#00d820;color:#f5f5f5" class="btn"><i class="fa fa-print"></i> Print</button>
                <button style="background-color: #00d820;border-color:#00d820;color:#f5f5f5" class="btn"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
            </div>
            <hr>
        </div>
        
        <div class="invoice overflow-auto">
            <div style="min-width: 600px">
                
                <header> 
                    <div class="row">
                         <!-- Freelancer Detials -->
                        <div class="col company-details">
                            <h3 class="name">
                                 <?php echo $client_firstname." ".$client_lastname?>
                            </h3>
                            
                            <div class="email"><a href="#"><?php echo $client_address ?></a></div>
                        </div>
                    </div>
                </header>
                
                <!-- client Detials -->
                <main>
                    <div class="row contacts">
                        <div class="col invoice-to">
                            <div class="text-gray-light">INVOICE TO:</div>
                            <h2 class="to"><?php echo $free_firstname . " ".$free_lastname; ?></h2>
                            
                            <div class="email"><a href="#"><?php echo $free_address; ?></a></div>
                        </div>
                        <div class="col invoice-details">
                            <h1 class="invoice-id"><?php  $num = (int)uniqid(rand(2332,30000));   echo $num;?></h1>
                            <div class="date"><?php echo date('D-M-Y');?></div>
                        </div>
                    </div>

                    <!-- invioce content -->
                    <table style="margin-left: auto; margin-right: auto" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                               
                                <th class="text-left">Title</th>
                                <th class="text-left">Job Description</th>
                                <th class="text-right">Amount</th>
                                <th class="text-right">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                
                                <td class="text-left"><?php echo $job_title?></td>
                                <td class="text-left qty"><?php echo $description?></td>
                                <td class="qty">$<?php echo $price?></td>
                                <td class="total">$<?php echo $price?></td>
                            </tr>
                            
                           
                        </tbody>
                        
                        <!-- calculations -->
                        <tfoot>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="1">SUBTOTAL</td>
                                <td><?php echo "$".$price?></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="1">TAX 25%</td>
                                <td> <?php $tax=($price * 0.25);    echo "$".$tax; ?></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="1"><strong>GRAND TOTAL</strong></td>
                                <td> <?php echo "$".($price + $tax); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="thanks">Thank you!</div>
                    <div class="notices">
                        <div>NOTICE:</div>
                        <div class="notice">A finance charge of $50 will be deducted if you terminate a contract with a freelancer.</div>
                    </div>
                </main>
                <footer>
                    Jobllery invoice generator
                </footer>
            </div>
            <div></div>
        </div>
    </div>


       




       <!-- End your project here-->
       <!-- jQuery -->
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <!-- Bootstrap tooltips -->
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
       <!-- Bootstrap core JavaScript -->
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
       <!-- MDB core JavaScript -->
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/js/mdb.min.js"></script>
       <!-- Your custom scripts (optional) -->
       <script type="text/javascript" src="assets/js/invoice.js"> </script>
   </body>
</html>