<?php include('include/header_session.php'); ?>
<?php include ('include/config.php'); ?>

<style type="text/css">
	    #content-desktop {display: block;}

    @media screen and (max-width: 768px) {

    #content-desktop {display: none;}

    }
</style>
	<div class="pre-loader"></div>
	<div class="header clearfix">
		<div class="header-right">
			<div class="brand-logo">
				<!-- <a href="dashboard.php">
					<img src="images/msbte.png"  class="img-responsive" style="height:70px;width:70px">
				</a> -->
			</div>
			<div class="menu-icon">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
			<div class="user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
						<i class="fa fa-bell" aria-hidden="true"></i>
						<?php 
                               $asd="select * from notification where user_type='Admin' and readnotification='0' order by notification_id desc limit 5";
                               $view=mysqli_query($connect,$asd) or die(mysqli_error($connect));
                            $total = mysqli_num_rows($view);
                            ?>
						<span class="text-danger">
						    <?php echo $total; ?>
						    </span>
					</a>
					  
					<div class="dropdown-menu dropdown-menu-right">
						<div class="notification-list mx-h-350 customscroll">
						    
			
							<ul>
							    <?php 
							     while ($fetch=mysqli_fetch_array($view))
                      {
                        extract($fetch);
                        
                         $tdate=date("Y-m-d");
                      date_default_timezone_set('Asia/Kolkata');
                      $ctime=date('h:i a');

                      ?>
								<li>
									<a href="#">
										<!--<img src="vendors/images/img.jpg" alt="">-->
									    <h3 class="clearfix"><span><?php echo $date = date('h:i:s a', time()); ?> </span></h3>
										<p><?php echo $fetch['note_text']; ?></p>
									</a>
								</li>
								<?php }?>
								
								<!--<li>-->
								<!--	<a href="#">-->
								<!--		<img src="vendors/images/img.jpg" alt="">-->
								<!--		<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>-->
								<!--		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>-->
								<!--	</a>-->
								<!--</li>-->
								<!--<li>-->
								<!--	<a href="#">-->
								<!--		<img src="vendors/images/img.jpg" alt="">-->
								<!--		<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>-->
								<!--		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>-->
								<!--	</a>-->
								<!--</li>-->
								<!--<li>-->
								<!--	<a href="#">-->
								<!--		<img src="vendors/images/img.jpg" alt="">-->
								<!--		<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>-->
								<!--		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>-->
								<!--	</a>-->
								<!--</li>-->
								<!--<li>-->
								<!--	<a href="#">-->
								<!--		<img src="vendors/images/img.jpg" alt="">-->
								<!--		<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>-->
								<!--		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>-->
								<!--	</a>-->
								<!--</li>-->
								<!--<li>-->
								<!--	<a href="#">-->
								<!--		<img src="vendors/images/img.jpg" alt="">-->
								<!--		<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>-->
								<!--		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>-->
								<!--	</a>-->
								<!--</li>-->
								<!--<li>-->
								<!--	<a href="#">-->
								<!--		<img src="vendors/images/img.jpg" alt="">-->
								<!--		<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>-->
								<!--		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>-->
								<!--	</a>-->
								<!--</li>-->
							</ul>
							<center>
							<a href="notification_view.php" class="text-primary">View More</a></center>
						</div>
					</div>
				</div>
			</div>
			<div class="user-info-dropdown">
				<div class="row">
					<div class="col-md-9 col-xs-6" id="content-desktop">
						<!--<img src="images/12.jpg" class="img-respnsive" style="width: 100%">-->
						 
					</div>
					<div class="col-md-3 pr-0 col-xs-6">
						
					
				
						<div class="dropdown">
							
							<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
								<!-- <span class="user-icon"><i class="fa fa-user-o"></i></span> -->
								<?php 

		                            $query=mysqli_query($connect,"select * from admin where Email='".$_SESSION['admin_email']."'") or die(mysqli_error($connect));
		                            $fetch=mysqli_fetch_array($query);
		                            extract($fetch);
		                            
		                            if ($fetch['Photo']=="") 
		                            {
		                        ?>
		                                <img src="images/no-image.jpg" alt="John Doe" style="border-radius: 100%;height: 40px;width: 40px" />
		                        <?php
		                            }
		                            else
		                            {
		                        ?>                                        
		                                <img src="images/admin/<?php echo $fetch['Photo'];?>" alt="John Doe" style="border-radius: 100%;height: 40px;width: 40px" />
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
					</div>
				</div>
			<!-- <div class="user-notification">-->
			<!--	<div class="dropdown">-->
			<!--		<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">-->
			<!--			<i class="fa fa-bell" aria-hidden="true"></i>-->
			<!--			<span class="badge notification-active"></span>-->
			<!--		</a>-->
			<!--		<div class="dropdown-menu dropdown-menu-right">-->
			<!--			<div class="notification-list mx-h-350 customscroll">-->
			<!--				<ul>-->
			<!--					<li>-->
			<!--						<a href="#">-->
			<!--							<img src="vendors/images/img.jpg" alt="">-->
			<!--							<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>-->
			<!--							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>-->
			<!--						</a>-->
			<!--					</li>-->
			<!--					<li>-->
			<!--						<a href="#">-->
			<!--							<img src="vendors/images/img.jpg" alt="">-->
			<!--							<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>-->
			<!--							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>-->
			<!--						</a>-->
			<!--					</li>-->
			<!--					<li>-->
			<!--						<a href="#">-->
			<!--							<img src="vendors/images/img.jpg" alt="">-->
			<!--							<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>-->
			<!--							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>-->
			<!--						</a>-->
			<!--					</li>-->
			<!--					<li>-->
			<!--						<a href="#">-->
			<!--							<img src="vendors/images/img.jpg" alt="">-->
			<!--							<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>-->
			<!--							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>-->
			<!--						</a>-->
			<!--					</li>-->
			<!--					<li>-->
			<!--						<a href="#">-->
			<!--							<img src="vendors/images/img.jpg" alt="">-->
			<!--							<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>-->
			<!--							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>-->
			<!--						</a>-->
			<!--					</li>-->
			<!--					<li>-->
			<!--						<a href="#">-->
			<!--							<img src="vendors/images/img.jpg" alt="">-->
			<!--							<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>-->
			<!--							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>-->
			<!--						</a>-->
			<!--					</li>-->
			<!--					<li>-->
			<!--						<a href="#">-->
			<!--							<img src="vendors/images/img.jpg" alt="">-->
			<!--							<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>-->
			<!--							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>-->
			<!--						</a>-->
			<!--					</li>-->
			<!--				</ul>-->
			<!--			</div>-->
			<!--		</div>-->
			<!--	</div>-->
			<!--</div>-->
			
			
		</div>
	</div>