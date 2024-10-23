
	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="dashboard.php">
			    <div class="row">
			        <!-- <div class="col-md-6"><img src="images/msbte.png"  class="img-responsive" style="height:70px;width:70px"></div> -->
			        <div class="col-md-12"><h2>Admin</h2></div>
			    </div>
				
			</a>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li>
						<a href="dashboard.php" class="dropdown-toggle no-arrow">
							<span class="fa fa-dashboard"></span><span class="mtext">Dashboard</span>
						</a>
					</li>

					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-table"></span><span class="mtext">Master Table</span>
						</a>
						<ul class="submenu">
							<li><a href="country_view.php">Country</a></li>
							<li><a href="state_view.php">State</a></li>
							<li><a href="district_view.php">District</a></li>
							<li><a href="taluka_view.php">Taluka</a></li>
							<li><a href="city_view.php">City/Village</a></li>
							<li><a href="area_view.php">Area</a></li>
							<li><a href="landmark_view.php">Landmark</a></li>
							<li><a href="product_type_view.php">Product Type</a></li>
							<li><a href="business_type_view.php">Business Type</a></li>
							<li><a href="business_category_view.php">Business Category</a></li>
							<li><a href="business_subcategory_view.php">Business Sub Category</a></li>
							<li><a href="business_subsubcategory_view.php">Business Sub Sub Category</a></li>
							<!-- <li><a href="number_of_request_view.php">Number of Request/Leads</a></li> -->
							<li><a href="validity_in_days_view.php">Validity in Days</a></li>
							<li><a href="day_master_view.php">Day Master</a></li>
							<li><a href="tax_type_view.php">Tax Type</a></li>
							<li><a href="tax_view.php">Tax</a></li>
						</ul>
					</li>
					<li>
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-user"></span><span class="mtext">Vendor(Registration)</span>
						</a>
						<ul class="submenu">
							<li><a href="vendor_view.php">Registered Vendor</a></li>
							<li><a href="approve_vendor.php">Approved Vendor</a></li>
							<li><a href="disapprove_vendor.php">Disapproved Vendor</a></li>
							<!-- <li><a href="free_vendor.php">Free Vendors</a></li>
							<li><a href="premium_vendor.php">Premium Vendors</a></li>
							<li><a href="plan_expired_vendor.php">Expired (Plan) Vendors</a></li>
							<li><a href="request_renewal_view.php">Renewal Request Vendor</a></li> -->
<!-- 							<li><a href="#">Subscription Renew Request</a></li>
 -->						</ul>
					</li>
					<li>
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-user"></span><span class="mtext">Vendor(Business)</span>
						</a>
						<ul class="submenu">
							<li><a href="business_information_view.php">Vendor Business</a></li>
							<li><a href="business_information_approve_view.php">Approved Vendor Business</a></li>
							<li><a href="business_information_disapprove_view.php">Disapproved Vendor Business</a></li>
							
						</ul>
					</li>


					<li>
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-money"></span><span class="mtext">Packages</span>
						</a>
						<ul class="submenu">
							<!-- <li><a href="service_package_view.php">Services Packages</a></li>
							<li><a href="appoinment_pakage_view.php">Appoinments Pakages</a></li> -->
							<li><a href="package_view.php"> Packages</a></li>
						</ul>
					</li>

<!--<li>-->
<!--	   <a href="javascript:;" class="dropdown-toggle">-->
<!--		  <span class="fa fa-user"></span><span class="mtext">User Request</span>-->
<!--	   </a>-->
<!--	  <ul class="submenu">-->

<?php 

	// $asd = "select bi.*, v.* from business_information bi, vendor v where bi.vendor_id=v.vendor_id group by bi.business_info_id asc";


	//$asd = "select * from vendor where vendor_id ";

  //$view=mysqli_query($connect,$asd) or die(mysqli_error($connect));
	 ?>
<?php
 //$count=1;
			                //while ($fetchvendor=mysqli_fetch_array($view))
			                //{
		                		//extract($fetchvendor);
			                     
			                ?>



      <!--          <li class="dropdown">-->
						<!--<a href="javascript:;" class="dropdown-toggle">-->
						<!--	<span class="fa fa-cog"></span><span class="mtext"><?php //echo $fetchvendor['owner_name'];?></span>-->
						<!--</a>-->
						<!--<ul class="submenu">-->
<?php

//$businessName = "select bi.*, v.* from business_information bi, vendor v where bi.vendor_id='".$fetchvendor['vendor_id']."' group by bi.business_info_id asc";

  //$businessNameView=mysqli_query($connect,$businessName) or die(mysqli_error($connect));
	 ?>
<?php
 //$count=1;
			                //while ($fetchbusinessName=mysqli_fetch_array($businessNameView))
			                //{
		                		//extract($fetchbusinessName);
			                     
			                ?> 

						<!--		 <li class="dropdown">-->
						<!--<a href="javascript:;" class="dropdown-toggle">-->
						<!--	<span class="fa fa-cog"></span><span class="mtext"><?php //echo $fetchbusinessName['business_info_name'];?></span>-->
						<!--</a>-->
						<!--<ul class="submenu">-->
							<?php
//$todays=date('Y-m-d');

//$view22=mysqli_query($connect,"select * from business_information where end_date>='".$todays."' and business_info_id='".$fetchbusinessName['business_info_id']."'") or die(mysqli_error($connect));
     //$lastdaterecord=mysqli_num_rows($view22);

  //    $numberofleads=mysqli_query($connect,"select * from tbl_validity_in_days where fld_validity_in_days_id") or die(mysqli_error($connect));
  //    $count_numberofdays=mysqli_fetch_array($numberofleads);
  //    $countnumberofleadsfinal=$count_numberofdays['fld_number_of_leads'];

  //     $asd="select us.*, u.*,bi.* from tbl_user_issued_services us, user u, business_information bi where bi.business_info_id ='".$fetchbusinessName['business_info_id']."' and us.fld_service_issuedorreturned='2' and us.status='NotApproved' and us.user_id= u.user_id and us.business_info_id=bi.business_info_id order by us.fld_user_issued_servicesApp";

  // $numberofrequest=mysqli_query($connect,$asd) or die(mysqli_error($connect));
  // $numberofrequestfinal=mysqli_num_rows($numberofrequest);
//if($lastdaterecord>0){
							?>

<!--							<li><a href="user_request.php?b_id=<?php //echo $fetchbusinessName['business_info_id'];?>">-->
<!--								User Request</a></li>-->
<!--							<li><a href="user_request_approve.php?b_id=<?php //echo $fetchbusinessName['business_info_id'];?>">Approve User Request </a></li>-->
<!--							<li><a href="user_request_disapprove.php?b_id=<?php //echo $fetchbusinessName['business_info_id'];?>">Disapprove User Request</a></li>-->
<!--							<li><a href="user_request_returned.php?b_id=<?php //echo $fetchbusinessName['business_info_id'];?>">User Request Completed</a></li>-->
<!--			<?php //}else{?>-->
<!--<li><a href="renwal_service.php?b_id=<?php //echo $fetchbusinessName['business_info_id'];?>">Renwal Service</a></li>-->
<!--			<?php //} ?>			-->
<!--						</ul>-->
<!--					</li>-->

<?php //}?> <!--  Business Name ---- -->

					<!--	</ul>-->
					<!--</li>-->
                  <?php //}?> <!--  Vendor Name ---- -->


<!--</ul>-->
<!--</li>-->














	<!-- <li>
	   <a href="javascript:;" class="dropdown-toggle">
		  <span class="fa fa-user"></span><span class="mtext">User Request</span>
	   </a>
	  <ul class="submenu">
	     <li>
			<a href="javascript:;" class="dropdown-toggle">
				<span class="fa fa-user"></span><span class="mtext">Vendor Nmae</span>
			</a>
		      <ul class="submenu">
	             <li>
					<a href="javascript:;" class="dropdown-toggle">
						<span class="fa fa-user"></span><span class="mtext">Business Name </span>
					</a>
					   <ul class="submenu">
						  <li><a href="business_information_view.php">user request</a></li>							
						</ul>
				  </li>
			  </ul>
		  </li>
	    </ul>
	</li> -->



					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-list-ul"></span><span class="mtext">Advertise</span>
						</a>
						<ul class="submenu">
							<li><a href="slider_advertise_view.php">Slider Advertise</a></li>
							<!--<li><a href="threading_advertise_view.php">Threading Advertise</a></li>-->
							<li><a href="feature_advertise_view.php">Feature Advertise</a></li>
							<!-- <li><a href="applied_services.php">Applied Services</a></li> -->
						</ul>
					</li>

					<!-- <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-list"></span><span class="mtext">All Details</span>
						</a>
						<ul class="submenu">
							<li><a href="customer_all.php">All Customer</a></li>
							<li><a href="transaction_view.php">Transaction</a></li>
							<li><a href="applied_details.php">Applied Services</a></li>
							<li><a href="transfer_account.php">Transfer Account</a></li>
							<li><a href="close_account.php">Close Account</a></li>
						</ul>
					</li> -->

					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-commenting-o"></span><span class="mtext">SMS Panel</span>
						</a>
						<ul class="submenu">
							<li><a href="sms_multiple.php">Multiple SMS</a></li>
							<!-- <li><a href="sms_schedule.php">Schedule SMS</a></li> -->
						</ul>
					</li>
					<li>
						<a href="banner_view.php" class="dropdown-toggle no-arrow">
							<span class="fa fa-list-ul"></span><span class="mtext">Banner Slider</span>
						</a>
					</li>
					<li>
						<a href="payment_details_vendor.php" class="dropdown-toggle no-arrow">
							<span class="fa fa-map-o"></span><span class="mtext">Payment Management</span>
						</a>
					</li>
					<li>
						<a href="about_us_view.php" class="dropdown-toggle no-arrow">
							<span class="fa fa-user"></span><span class="mtext">About Us</span>
						</a>
					</li>
					<li>
						<a href="term_condition_view.php" class="dropdown-toggle no-arrow">
							<span class="fa fa-list-ul"></span><span class="mtext">Term and Condition</span>
						</a>
					</li>
					<li>
						<a href="privacy_policy_view.php" class="dropdown-toggle no-arrow">
							<span class="fa fa-list-ul"></span><span class="mtext">Privacy Policy</span>
						</a>
					</li>
					
					<li>
						<a href="notification_view.php" class="dropdown-toggle no-arrow">
							<span class="fa fa-bell"></span><span class="mtext">notification</span>
						</a>
					</li>
						<li>
						<a href="user_contact.php" class="dropdown-toggle no-arrow">
							<span class="fa fa-user"></span><span class="mtext">User Contact</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-file"></span><span class="mtext">Report</span>
						</a>
						<ul class="submenu">
							<li><a href="report_vendor_details.php">Vendor Details</a></li>
							<li><a href="report_user_details.php">User Details</a></li>
							<li><a href="report_business_details.php">Business Details</a></li>
							<li><a href="report_package_details.php">Package Subscription</a></li>
							<li><a href="report_user_request_details.php">User Request</a></li>
							<!--<li><a href="report_leads_per_vendor.php">Leads per Vendor</a></li>-->
							<li><a href="report_advertisement.php">Featured Advertisement</a></li>
							<li><a href="report_reviews.php">Reviews Report</a></li>
							
						</ul>
					</li>
				
                    <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-cog"></span><span class="mtext">Setting</span>
						</a>
						<ul class="submenu">
							<li><a href="profile.php">Update Profile</a></li>
							<li><a href="change_password.php">Change Password</a></li>
							
						</ul>
					</li>
					<li>
						<a href="logout.php" class="dropdown-toggle no-arrow">
							<span class="fa fa-power-off"></span><span class="mtext">Logout</span>
						</a>
					</li>
					
				</ul>
			</div>
		</div>
	</div>