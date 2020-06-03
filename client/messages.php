<?php include "includes/header.php";?>
   <?php include "../freelancer/includes/db.php";?>
<?php include "../freelancer/includes/functions.php";?>
    <div id="wrapper">
        <nav class="navbar navbar-dark fixed-top align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" id="sidebar">
            <div class="container-fluid d-flex flex-column p-0">
                <div class="joblllery-logo"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="index.php"></a></div>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span><strong>Dashboard</strong></span></a><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><strong>Profile</strong></a><a class="nav-link"
                            href="submit_job.php"><i class="fas fa-toolbox"></i><span><strong>Submit Job</strong><br></span></a><a class="nav-link" href="shortlisted_candidates.php"><i class="fas fa-clipboard-list"></i><span><strong>Shortlisted Candidates</strong></span></a>
                        <a
                            class="nav-link" href="notification.php"><i class="fas fa-info"></i><span><strong>Notification</strong></span></a><a class="nav-link active" href="messages.php"><i class="fas fa-envelope-open"></i><span><strong>Messages</strong></span></a><a class="nav-link" href="my_jobs.php"><i class="fas fa-paper-plane"></i><span><strong>My Jobs</strong><br></span></a>
                            <a
                                class="nav-link" href="payments.php"><i class="fas fa-money-check-alt"></i><span><strong>Payments</strong><br></span></a>
                    </li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
<?php include "includes/navigation.php";?>
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
                                                        $query="SELECT * FROM users WHERE user_role='freelancer' ORDER BY username ASC";
                                                        $select_users=mysqli_query($connection,$query);
                                                        confirmQuery($select_users);

                                                        while($row=mysqli_fetch_assoc($select_users)){
                                                        $id =$row['id'];
                                                        $username=$row['username'];
                                                       
                                                            ?>
                                                               <td class="contact-list">
                                                                <div class="col contact_navigation">
                                                                    <ul class="nav">
                                                                        <li class="nav-item"><a class="nav-link active" href="messages.php?p_id=<?php echo $id;?>"><img class="border rounded-circle" src="assets/img/avatars/avatar5.jpeg"><div><h6 class="chat-text"><?php echo $username; ?></h6><h6 class="chat-text">Amalitech gGmbH</h6></div></a></li>

                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                         <?php     }
                                    
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                 <?php
                                    if(isset($_GET['p_id'])){
                                        $active_chat_user_id=$_GET['p_id'];
                                        
                                        $query="SELECT * FROM users WHERE id= $active_chat_user_id";
                                        $select_active_user=mysqli_query($connection,$query);
                                        confirmQuery($select_active_user);
                                        while($row=mysqli_fetch_assoc($select_active_user)){
                                            $active_id = $row['id'];
                                            $active_username= $row['username'];
                                        }
                                    }else{
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
                        if(isset($_POST['send'])){
                            if(isset($_GET['p_id'])){
                            $message = trim($_POST['message']);
                            $user_id =$_SESSION['user_id'];
                            
                            if(empty($message)){
                                
                            }else{
                            
                            $query="INSERT INTO chats(senderId,receiverId,message,timestamp) VALUES('$user_id', '$active_id','$message',now())";
                            $send_message=mysqli_query($connection,$query);
                            confirmQuery($send_message);   
                            
                            }
                                
                            }else{
                                
                            }
                            
                           
                            
                        }else{
                        
                        }            
                                    
                        ?> 
                                    <form class="chat-body" action="" method="post">
                                        <div class="table-responsive" id="message-table">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                <?php
                                                $user_id=$_SESSION['user_id'];
                                                $query="SELECT * FROM chats WHERE senderId= '$active_id' AND receiverId='$user_id' ORDER BY timestamp ASC "; 
                                                $retreive_message=mysqli_query($connection,$query);
                                                confirmQuery($retreive_message);

                                                while($row=mysqli_fetch_assoc($retreive_message)){
                                                $message=$row['message'];
                                                $time=$row['timestamp'];
                                                ?>
                                                        <td>
                                                            <div class="col">
                                                                <div class="form-row">
                                                                    <div class="col col-lg-2" id="chat-body-logo"><img class="rounded-circle" id="chat-body-image" src="assets/img/avatars/avatar5.jpeg"></div>
                                                                    <div class="col col-lg-10" id="chat-body-details">
                                                                        <h6><?php echo $time; ?></h6>
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
                                                    }?>
                                               <?php
                                                   $user_id=$_SESSION['user_id'];
                                                $query="SELECT * FROM chats WHERE senderId= '$user_id' AND receiverId='$active_id' ORDER BY timestamp ASC "; 
                                                $retreive_message=mysqli_query($connection,$query);
                                                confirmQuery($retreive_message);
                                                    
                                                    while($row=mysqli_fetch_assoc($retreive_message)){
                                                        $message=$row['message'];
                                                        $time=$row['timestamp'];
                                                     ?>  
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <div class="col">
                                                                <div class="form-row">
                                                                    <div class="col col-lg-10" id="chat-sender">
                                                                        <h6 class="text-right"><?php echo $time; ?></h6>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row" id="chat-sender-btn">
                                                                    <div class="col" id="chat-send"><button class="btn btn-secondary btn-sm text-left" id="chat-body-btn" type="button"><?php echo $message ; ?></button></div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                      <?php
                                                    }?>
<!--
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <div class="col">
                                                                <div class="form-row">
                                                                    <div class="col col-lg-10" id="chat-sender">
                                                                        <h6 class="text-right">12/03/2020, 08:01am</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row" id="chat-sender-btn">
                                                                    <div class="col" id="chat-send"><button class="btn btn-secondary btn-sm text-left" id="chat-body-btn" type="button">Hello, how may i help you</button></div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <div class="col">
                                                                <div class="form-row">
                                                                    <div class="col col-lg-10" id="chat-sender">
                                                                        <h6 class="text-right">12/03/2020, 08:01am</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row" id="chat-sender-btn">
                                                                    <div class="col" id="chat-send"><button class="btn btn-secondary btn-sm text-left" id="chat-body-btn" type="button">Hello, how may i help you</button></div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
-->
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-row">
                                            <div class="col" id="send-message">
                                                <div class="input-group">
                                                <input class="form-control form-control" type="text" id="send-textbox" placeholder="Write your message..." name="message">
                                                <span class="input-group-append">
                                                <button class="btn btn-success send-btn" type="submit" name="send"><i class="icon ion-android-send"></i></button></span></div>
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
    <?php include "includes/footer.php";?> 