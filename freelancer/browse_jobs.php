<?php include "includes/dashboard_header.php";?>
   <?php include "includes/db.php";?>
<?php include "includes/functions.php";?>
    <div id="wrapper">
        <nav class="navbar navbar-dark fixed-top align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" id="sidebar">
            <div class="container-fluid d-flex flex-column p-0">
                <div class="joblllery-logo"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="index.php"></a></div>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span><strong>Dashboard</strong></span></a><a class="nav-link" href="../profile_page/freelancer_profile_page.php?p_id=<?php echo $_SESSION['user_id'];?>"><i class="fas fa-user"></i><strong>Profile</strong></a><a class="nav-link"
                            href="jobs_applied.php"><i class="fas fa-toolbox"></i><span><strong>Jobs Applied</strong></span></a><a class="nav-link" href="shortlisted_jobs.php"><i class="fas fa-clipboard-list"></i><span><strong>Awarded Jobs</strong></span></a>
                        <a
                            class="nav-link active" href="browse_jobs.php"><i class="fas fa-info"></i><span><strong>Browse Jobs</strong></span></a><a class="nav-link" href="messages.php"><i class="fas fa-envelope-open"></i><span><strong>Messages</strong></span></a><a class="nav-link" href="following_employers.php"><i class="fas fa-paper-plane"></i><span><strong>Following Employers</strong></span></a>
                            <a
                                class="nav-link" href="payments.php"><i class="fas fa-money-check-alt"></i><span><strong>Payments</strong><br></span></a>
                    </li>
                   
                </ul>
<!--                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>-->
            </div>
        </nav>
<?php include "includes/dashboard_navigation.php";?>
            <div class="container-fluid profile">
                <div class="profile-container">
                    <h4 class="header"><strong>Browse Jobs</strong></h4>
<!--
                    <form>
                        <div class="form-row" id="row-style">
                            <div class="col-12 offset-0 col-md-6 col-sm-9 col-xs-12 col-lg-4" id="forms">
                                <div class="input-group"><input class="form-control input-btn" type="text" placeholder="Search"><span class="input-group-append"><button class="btn btn-outline-success btn-sm" id="search-btn" type="button"><i class="fa fa-search search-icon"></i></button></span></div>
                            </div>
                            <div class="col-7 col-md-2 offset-1 offset-md-0 col-md-2 col-sm-4 col-xs-12 col-lg-4 sort-col" id="forms">
                                <div class="sort"><label class="text-nowrap" for="search">Sort by</label></div>
                            </div>
                            <div class="col-md-4 col-md-4 col-sm-8" id="forms">
                                <div><select class="form-control input-btn"><option value="undefined">Newest</option><option value="">Date</option><option value="">Ascending</option><option value="">Descending</option></select></div>
                            </div>
                        </div>
                    </form>
-->
                    <div class="container-fluid">
                        <div class="table-responsive table-borderless" id="table-background">
                            <table class="table">
<!--
                                <thead class="table table-bordered">
                                    <tr>
                                        <th>Title</th>
                                        <th>Alert Query</th>
                                        <th>Number of Jobs</th>
                                        <th>Times</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
-->
                                <tbody>
                            <?php
    
                                if(isset($_GET['page'])){
                                $page = $_GET['page'];
                                }else{
                                $page = "";
                                }
                                if($page==""||$page==1){
                                $page_no=0;
                                }else{
                                $page_no= ($page*5)-5;
                                }


                                $query= "SELECT * FROM job_post";
                                $count_query= mysqli_query($connection,$query);
                                $count_post=mysqli_num_rows($count_query);
                                $count_post=ceil($count_post/5);

    
                                      
                                $query="SELECT * FROM job_post ORDER BY createdAt DESC LIMIT $page_no,5";
                                $select_all_jobs=mysqli_query($connection,$query);
                                confirmQuery( $select_all_jobs);

                                while($row=mysqli_fetch_assoc($select_all_jobs)){
                                $job_post_id = $row['job_post_id'];
                                $client_id = $row['client_id'];
                                $category_id = $row['category_id'];
                                $job_title = $row['job_title'];
                                $contract_type = $row['contract_type'];
                                $job_description = $row['job_description'];
                                $application_deadline_date = $row['application_deadline_date'];
                                $required_skills =$row['required_skills'];
                                $min_salary = $row['min_salary'];
                                $max_salary = $row['max_salary'];
                                $salary_type = $row['salary_type'];
                                $tags = $row['tags'];
                                $offered_salary = $row['offered_salary'];
                                $job_duration = $row['job_duration'];
                                $experience = $row['experience'];
                                $image = $row['image'];
                                $location = $row['location'];
                                $createdAt = $row['createdAt'];


                                ?>	
                                    
                                     <tr class="table-row">
                                      
                                       <td><a href="../job_details/job_details.php?p_id=<?php echo $job_post_id; ?>&client_id=<?php echo $client_id; ?>">
                                        <?php
          
                                        if($image==""){

                                        echo "<img class='freelancer-logo' src='../client/assets/img/dogs/icon.png'>";

                                        }else{

                                        echo "<img class='freelancer-logo' src='../client/assets/img/dogs/{$image}'>";
                                        //echo "<img class='icon' src='../client/assets/img/dogs/'.$image.'>";

                                        }

                                        ?> 
<!--                                       <img class="icon" src="../client/assets/img/dogs/icon.png">  -->
                                       </a></td>
                                        <td><a href="../job_details/job_details.php?p_id=<?php echo $job_post_id; ?>&client_id=<?php echo $client_id; ?>">
                                            <div></div>
                                            <div class="row">
                                                <div class="col">
                                                   
                                                   
                                                    <h6><strong>Category: </strong> <?php  
                                                    $query="SELECT * FROM category WHERE id={$category_id}";
                                                    $select_category=mysqli_query($connection,$query);
                                                    confirmQuery($select_category);
                                                    while($row=mysqli_fetch_assoc( $select_category)){
                                                      $category_name = $row['category_name'];  
                                                    }
                                                    
                                                    echo $category_name ;
                                    
                                                        ?></h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h6><strong>Location: </strong><?php echo $location;?></h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h6><strong>Posted Date: </strong><?php echo $createdAt; ?></h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h6><strong>Salary: </strong>$<?php echo $offered_salary; ?></h6>
                                                </div>
                                            </div></a>
                                        </td>
<!--                                       <td> <a href="../job_details/job_details.php?p_id=<?php echo $job_post_id; ?>&client_id=<?php echo $client_id; ?>"><i class="icon ion-eye view"></i></a></td>-->
                                        <td class="table-data"> <a href="messages.php?p_id=<?php echo $client_id; ?>"><i class="material-icons chats">Chats</i></a></td>
                                        <td class="table-data"></td>
                                        <td class="table-data"></td>
                                        
                                  
                                    </tr>
                                    
                                    <?php  }
 
                                        ?>
                                </tbody>
                            </table>
<ul class="pager">
        <?php
            for($i=1; $i<=$count_post; $i++){
              
                  
                if($i==$page){
                //echo "<li><a href='workspace.php?page=$i'><span uk-pagination-previous></span></a></li>";
                echo "<span><a class='active_link' href='browse_jobs.php?page=$i'> $i </a></span>";
                
               }else{
                echo "<span><a href='browse_jobs.php?page=$i'>  $i</a></span>"; 
                //echo "<li><a href='workspace.php?page=$i'><span uk-pagination-next></span></a></li>";
               }
            }
            ?>
            
</ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include "includes/dashboard_footer.php";?>