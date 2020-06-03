<?php include "includes/dashboard_header.php";?>
    <?php include "includes/db.php";?>
<?php include "includes/functions.php";?> 
    <div id="wrapper">
        <nav class="navbar navbar-dark fixed-top align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" id="sidebar">
            <div class="container-fluid d-flex flex-column p-0">
                <div class="joblllery-logo"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="index.php"></a></div>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span><strong>Dashboard</strong></span></a><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><strong>Profile</strong></a><a class="nav-link"
                            href="jobs_applied.php"><i class="fas fa-toolbox"></i><span><strong>Jobs Applied</strong></span></a><a class="nav-link" href="shortlisted_jobs.php"><i class="fas fa-clipboard-list"></i><span><strong>Shortlisted Jobs</strong></span></a>
                        <a
                            class="nav-link" href="notification.php"><i class="fas fa-info"></i><span><strong>Notification</strong></span></a><a class="nav-link active" href="messages.php"><i class="fas fa-envelope-open"></i><span><strong>Messages</strong></span></a><a class="nav-link" href="following_employers.php"><i class="fas fa-paper-plane"></i><span><strong>Following Employers</strong></span></a>
                            <a
                                class="nav-link" href="payments.php"><i class="fas fa-money-check-alt"></i><span><strong>Payments</strong><br></span></a>
                    </li>
                    
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
<?php include "includes/dashboard_navigation.php";?>
            <div class="container-fluid profile">
                <div class="profile-container">
                    <div class="header-div">
                        <h4 class="header"><strong>Messages</strong></h4>
                    </div>
                    <div class="container-fluid">
                        <div class="profile-container">
                            <div class="row chat-system">
                                <div class="col-xl-3 offset-xl-0 col-lg-4 col-xl-3" id="message-sidebar">
                                    <form>
                                        <div class="col-sm-12 col-md-12" id="message-search">
                                            <div id="search-box" class="input-group"><input class="form-control form-control" type="text" id="search-input" placeholder="Search contacts..."><span class="input-group-append"><button class="btn btn-outline-secondary" id="search-btn-btn" type="button"><i class="fa fa-search" id="search-icon"></i></button></span></div>
                                        </div>
                                    </form>
                                    
                                    <div class="row chat-btn">
                                        <div class="col">
                                            <div class="table-responsive" id="contact-list">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                        <?php
                                                        //prepare query to select client from users table and order alphabetically
                                                        $query="SELECT * FROM users WHERE user_role='client' ORDER BY username ASC";
                                                        
                                                        //assign variable with mysqli query result
                                                        $select_users=mysqli_query($connection,$query);
                                                        
                                                        confirmQuery($select_users); //Validation of mysqli query
                                                        
                                                        //Looping through result
                                                        while($row=mysqli_fetch_assoc($select_users)){  
                                                        
                                                        $id =$row['id'];    //assignment of variable
                                                        $username=$row['username'];
                                                        ?>
                                                            <td class="contact-list">
                                                                <div class="col contact_navigation">
                                                                    <ul class="nav">
                                                                        <li class="nav-item active"><a class="nav-link active" href="messages.php?p_id=<?php echo $id;?>"><img class="border rounded-circle" src="assets/img/avatars/avatar5.jpeg"><div><h6 class="chat-text"><?php echo $username; ?></h6><h6 class="chat-text">Amalitech gGmbH</h6></div></a>
                                                                        
                                                                        </li>
                                                                        
                                                                    </ul>
                                                                    
                                                                </div>
                                                                
                                                            </td>
                                                            
                                                        </tr>
                                                             <?php     }//end of while loop
                                    
                                                                ?>
                                                    </tbody>
                                                    
                                                </table>
                                                
                                            </div>
                                        </div>
                                    </div>
                                     

                               
                               <?php
                                    //if a user is selected from chat log grab its id and run the code block below
                                    if(isset($_GET['p_id'])){
                                        
                                        $active_chat_user_id=$_GET['p_id'];     //assign the got id to a variable
                                        
                                        //prepare a query to select the user that bears the set id
                                        $query="SELECT * FROM users WHERE id= $active_chat_user_id";
                                        
                                        //assign variable with mysqli query result
                                        $select_active_user=mysqli_query($connection,$query);
                                        
                                        
                                        confirmQuery($select_active_user);      //Validation of mysqli query
                                        
                                        //Looping through result
                                        while($row=mysqli_fetch_assoc($select_active_user)){
                                            
                                            $active_id = $row['id'];            //assignment of variable
                                            $active_username= $row['username'];
                                        }//end of while loop
                                    }else{// if the user id isn't set, assign the variables below to empty string
                                        $active_id="";
                                        $active_username="";
                                    }
                                    
                                    ?>
                                </div>
                                <div class="col-xl-1 col-lg-8 col-xl-9">
                                    <div class="chat-box">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td><img class="rounded-circle chat-img" src="assets/img/avatars/avatar5.jpeg"></td>
                                                        <td>&nbsp; &nbsp; &nbsp;</td>
                                                        <td class="chat-header">
                                                            <h6><?php echo $active_username; ?></h6>
                                                        </td>
                                                        <td class="chat-header">
                                                            <a href="messages.php?delete=<?php echo $active_id; ?>">
                                                                <h6 class="text-right delete-chat">Delete Chat&nbsp;</h6>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                    <?php
                        //When the send button is pressed run the code block below
                        if(isset($_POST['send'])){
                            if(isset($_GET['p_id'])){
                            $message = trim($_POST['message']);     //Remove whitespace from user input
                            $user_id =$_SESSION['user_id'];
                            
                            if(empty($message)){                    // checking for empty variables
                                
                            }else{
                            // prepare query to insert message into the chats table
                            $query="INSERT INTO chats(senderId,receiverId,message,timestamp) VALUES('$user_id', '$active_id','$message',now())";
                            
                            //assign variable with mysqli query result
                            $send_message=mysqli_query($connection,$query);
                            
                            confirmQuery($send_message);            //Validation of mysqli query
                            
                            }  
                            }else{
                                
                            }
                            
                           
                            
                        }else{
                        
                        }            
                                    
                        ?> 
                                    <form class="chat-body" action="" method="post">
                                        <div id="message-table" class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                   
                                                <?php
                                                
                                                $user_id=$_SESSION['user_id'];      //assignment of variable
                                                
                                                //prepare query to retreive message from chats table based on some conditions    
                                                $query="SELECT * FROM chats WHERE senderId= '$active_id' AND receiverId='$user_id' ORDER BY timestamp ASC "; 
                                                
                                                //assign variable with mysqli query result
                                                $retreive_message=mysqli_query($connection,$query);
                                                
                                                confirmQuery($retreive_message);      //Validation of mysqli query

                                                while($row=mysqli_fetch_assoc($retreive_message)){  //Looping through result
                                               
                                                $message=$row['message'];             //assignment of variable
                                                $time=$row['timestamp'];
                                                ?>  
                                                    <tr>
                                                    <td>
                                                            <div class="col">
                                                                <div class="form-row">
                                                                    <div class="col col-lg-2" id="chat-body-logo"><img class="rounded-circle" id="chat-body-image" src="assets/img/avatars/avatar5.jpeg"></div>
                                                                    <div class="col col-lg-10" id="chat-body-details">
                                                                        <h6> <?php echo $time; ?></h6>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col" id="chat-body-msg"><button class="btn btn-secondary btn-sm" id="chat-body-btn" type="button"><?php echo $message ; ?></button></div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    <?php
                                                    }//end of while loop
                                                    ?>
                                               <?php
                                                
                                                $user_id=$_SESSION['user_id'];           //assignment of variable
                                               
                                                //prepare query to retreive message from chats table based on some conditions
                                                $query="SELECT * FROM chats WHERE senderId= '$user_id' AND receiverId='$active_id' ORDER BY timestamp ASC "; 
                                                
                                                //assign variable with mysqli query result
                                                $retreive_message=mysqli_query($connection,$query);
                                                
                                                confirmQuery($retreive_message);         //Validation of mysqli query
                                                    
                                                    //Looping through result
                                                    while($row=mysqli_fetch_assoc($retreive_message)){ 
                                                       
                                                        $message=$row['message'];       //assignment of variable
                                                        $time=$row['timestamp'];
                                                     ?>  
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <div class="col">
                                                                <div class="form-row">
                                                                    <div class="col col-lg-10" id="chat-sender">
                                                        
                                                                        <h6 class="text-right"> <?php echo $time; ?></h6>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row" id="chat-sender-btn">
                                                                    <div class="col" id="chat-send"><button class="btn btn-secondary btn-sm text-left" id="chat-body-btn" type="button"><?php echo $message ; ?></button></div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    
                                                    <?php
                                                    }//end of while loop
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-row">
                                            <div class="col" id="send-message">
                                                <div class="input-group">
                                                <input class="form-control form-control" type="text" id="send-textbox" placeholder="Write your message..." name="message">
                                                <span class="input-group-append">
                                                <button class="btn btn-success send-btn" type="submit" name="send"><i class="icon ion-android-send"></i>
                                                </button>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     <?php include "includes/dashboard_footer.php";?>