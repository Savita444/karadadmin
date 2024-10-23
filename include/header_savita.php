
<?php include('include/config.php'); ?>
<?php include('include/header_session.php'); ?>


<style type="text/css">
	    #content-desktop {display: block;}

    @media screen and (max-width: 768px) {

    #content-desktop {display: none;}

    }
</style>
<!--class="pre-loader"-->
	<div ></div>
	<div class="header clearfix">
		<div class="header-right">
			<div class="brand-logo">
				<a href="dashboard.php">
					<!-- <img src="images/msbte.png"  class="img-responsive" style="height:70px;width:70px"> -->
				</a>
			</div>
			<div class="menu-icon">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
			
			<div class="user-info-dropdown">
								
						<div class="dropdown">
							
							<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
								<!-- <span class="user-icon"><i class="fa fa-user-o"></i></span> -->
								<?php 
		                                    
		                            $query=mysqli_query($connect,"select * from admin where Email='".$_SESSION['email']."'") or die(mysqli_error($connect));
		                            $fetch=mysqli_fetch_array($query);
		                            extract($fetch);
		                            
		                            if ($fetch['Photo']=="") 
		                            {
		                        ?>
		                                <img src="../images/admin/No-image-full.jpg" alt="No Image" style="border-radius: 100%;height: 40px;width: 40px" />
		                        <?php
		                            }
		                            else
		                            {
		                        ?>                                        
		                                <img src="../images/admin/<?php echo $fetch['Photo'];?>" alt="No Image" style="border-radius: 100%;height: 40px;width: 40px" />
		                        <?php
		                            }
		                        ?>
								<span class="user-name"><?php echo $fetch['Email']; ?></span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="profile.php"><i class="fa fa-user-o" aria-hidden="true"></i> Profile</a>
								<a class="dropdown-item" href="change_password.php"><i class="fa fa-key" aria-hidden="true"></i> Change Password</a>
								<a class="dropdown-item"  href="logout.php" ><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
							</div>
						</div>
					
				</div>
			<!-- <div class="user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
						<i class="fa fa-bell" aria-hidden="true"></i>
						<span class="badge notification-active"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<div class="notification-list mx-h-350 customscroll">
							<ul>
								<li>
									<a href="#">
										<img src="vendors/images/img.jpg" alt="">
										<h3 class="clearfix">No Image <span>3 mins ago</span></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="vendors/images/img.jpg" alt="">
										<h3 class="clearfix">No Image <span>3 mins ago</span></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="vendors/images/img.jpg" alt="">
										<h3 class="clearfix">No Image <span>3 mins ago</span></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="vendors/images/img.jpg" alt="">
										<h3 class="clearfix">No Image <span>3 mins ago</span></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="vendors/images/img.jpg" alt="">
										<h3 class="clearfix">No Image <span>3 mins ago</span></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="vendors/images/img.jpg" alt="">
										<h3 class="clearfix">No Image <span>3 mins ago</span></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="vendors/images/img.jpg" alt="">
										<h3 class="clearfix">No Image <span>3 mins ago</span></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div> -->
		</div>
	</div>