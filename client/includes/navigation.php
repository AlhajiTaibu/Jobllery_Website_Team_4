        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand fixed-top bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid">
                       <a href="index.php"> <div><img class="nav-img" src="assets/img/dogs/PNG%20jobllery%20logo.png"></div></a><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        
                       
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                           
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                            
                              
                        <?php
                        $user_id = $_SESSION['user_id'];
                        
                        $query="SELECT * FROM client WHERE user_id={$user_id}";
                        $select_profile=mysqli_query($connection,$query);
                        confirmQuery($select_profile);
                        $count=mysqli_num_rows($select_profile);
                        
                        if($count==1){
                          while($row=mysqli_fetch_assoc($select_profile)){
                            $image=$row['image'];
                        }  
                        }else{
                            $image="icon.png";
                        }
                     
                         ?>          
                            </li>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><img class="border rounded-circle img-profile" src="assets/img/dogs/<?php echo $image;?>"><span class="d-none d-lg-inline mr-2 text-gray-600 small"><?php echo $_SESSION['username'];?></span><i class="fa fa-caret-down droparrow"></i></a>
                                    <div
                                        class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="../profile_page/client_profile_page.php?p_id=<?php echo $_SESSION['user_id'];?>"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a>
                                           <a class="dropdown-item" role="presentation" href="../homepage/index.php"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Visit Main Page</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="../user_registration/logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a></div>
                    </li>
                    </li>
                    </ul>
            </div>
            </nav>