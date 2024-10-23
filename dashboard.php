<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
    
	<?php include('include/head.php'); ?>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   
	<title>Dashboard</title>
	<style type="text/css">
	.right-bar {
	position: relative;
	overflow-y: auto;
    height: 615px;
	/*margin: 50px;
	width: 360px;*/
}
.right-bar ul {
	list-style: none;
	margin: 0;
	padding: 0;
}
.right-bar ul li {
  /* Sub Menu */
}
.right-bar ul li a {
	display: block;
	background: white;
	padding: 10px 10px;
	color: #333;
	text-decoration: none;
	-webkit-transition: 0.2s linear;
	-moz-transition: 0.2s linear;
	-ms-transition: 0.2s linear;
	-o-transition: 0.2s linear;
	transition: 0.2s linear;
}
.right-bar ul li a:hover {
	background:#def2ff;
	color: #0099ff;
}
.right-bar ul li a .fa {
	width: 25px;
	text-align: center;
	margin-right: 5px;
	float:right;
}
.right-bar ul ul {
	background-color:#ebebeb;
}
.right-bar ul li ul li a {
	background: #def2ff;
	border-left: 4px solid transparent;
	padding: 10px 10px;
}
.right-bar ul li ul li a:hover {
	background: #def2ff;
	border-left: 4px solid #0099ff;
}
</style>
</head>
<body>
	<?php include('include/header.php');
        include('include/sidebar.php'); ?>
    <?php include ('include/config.php');?>
	<?php error_reporting(0);?>
<div class="main-container">
	    
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		  <div class="row">  
		  <div class="col-md-9">
			<div class="row clearfix progress-box">
				<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
					<a href="country_view.php"><div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-light-green text-white">
									<i class="fa fa-list"></i>
								</div>
							</div>
							<?php
                            $res_country=mysqli_query($connect,"select * from tbl_country where fld_country_delete='0' order by fld_country_id desc") or die (mysqli_error($connect));
                            $count_country=mysqli_num_rows($res_country);
                            ?>
							<div class="project-info-right">
								<span class="no text-light-green weight-500 font-24"><?php echo $count_country; ?></span>
								<p class="weight-400 font-18">Country</p>
							</div>
						</div>
					</div></a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
					<a href="state_view.php"><div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-blue text-white">
									<i class="fa fa-list"></i>
								</div>
							</div>
							<?php
                            $res_state=mysqli_query($connect,"select c.*, s.* from tbl_country c, tbl_state s where s.fld_country_id=c.fld_country_id and s.fld_state_delete='0' order by s.fld_state_id desc") or die (mysqli_error($connect));
                            $count_state=mysqli_num_rows($res_state);
                            ?>
							<div class="project-info-right">
								<span class="no text-blue weight-500 font-24"><?php echo $count_state; ?></span>
								<p class="weight-400 font-18">States</p>
							</div>
						</div>
					</div></a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
					<a href="district_view.php"><div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-light-orange text-white">
									<i class="fa fa-list"></i>
								</div>
							</div>
							<?php
                            $res_district=mysqli_query($connect,"select s.*,d.* from tbl_state s, tbl_district d where  d.fld_state_id=s.fld_state_id and s.fld_state_delete='0' and d.fld_district_delete='0' group by d.fld_district_id order by d.fld_district_id desc") or die (mysqli_error($connect));
                            $count_district=mysqli_num_rows($res_district);
                            ?>
							<div class="project-info-right">
								<span class="no text-light-orange weight-500 font-24"><?php echo $count_district; ?></span>
								<p class="weight-400 font-18">District</p>
							</div>
						</div>
					</div></a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
					<a href="taluka_view.php"><div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-light-purple text-white">
									<i class="fa fa-list"></i>
								</div>
							</div>
							<?php
                            // $res_taluka=mysqli_query($connect,"select s.*,d.*,t.* from tbl_state s,  tbl_district d,tbl_taluka t where d.fld_state_id=s.fld_state_id and t.fld_state_id=s.fld_state_id and  d.fld_state_id=t.fld_state_id  and s.fld_state_delete='0' and d.fld_district_delete='0' and t.fld_taluka_delete='0' group by t.fld_taluka_id  order by t.fld_taluka_id desc") or die (mysqli_error($connect));
                            $res_taluka=mysqli_query($connect,"select s.*,d.*,t.* from tbl_state s, tbl_district d,tbl_taluka t where t.fld_state_id=s.fld_state_id and t.fld_district_id=d.fld_district_id and t.fld_taluka_delete='0' and d.fld_district_delete='0' and s.fld_state_delete='0' ") or die (mysqli_error($connect));
                            $count_taluka=mysqli_num_rows($res_taluka);
                            ?>
							<div class="project-info-right">
								<span class="no text-light-purple weight-500 font-24"><?php echo $count_taluka; ?></span>
								<p class="weight-400 font-18">Taluka</p>
							</div>
						</div>
					</div></a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
					<a href="city_view.php"><div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-light-green text-white">
									<i class="fa fa-list"></i>
								</div>
							</div>
							<?php
                            $res_city=mysqli_query($connect,"select s.*,d.*,t.*,c.* from tbl_state s, tbl_district d,tbl_taluka t, tbl_city c where s.fld_state_id=d.fld_state_id and s.fld_state_id=c.fld_state_id and                                     s.fld_state_id=t.fld_state_id and                                     d.fld_state_id=t.fld_state_id and                                     d.fld_state_id=c.fld_state_id and                                     t.fld_state_id=c.fld_state_id and d.fld_district_id=t.fld_district_id and d.fld_district_id=c.fld_district_id and t.fld_district_id=c.fld_district_id and t.fld_taluka_id=c.fld_taluka_id and s.fld_state_delete='0' and d.fld_district_delete='0' and t.fld_taluka_delete='0' and c.fld_city_delete='0' group by c.fld_city_id  order by c.fld_city_id desc") or die (mysqli_error($connect));
                            $count_city=mysqli_num_rows($res_city);
                            ?>
							<div class="project-info-right">
								<span class="no text-light-green weight-500 font-24"><?php echo $count_city; ?></span>
								<p class="weight-400 font-18">City</p>
							</div>
						</div>
					</div></a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
					<a href="area_view.php"><div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-blue text-white">
									<i class="fa fa-list"></i>
								</div>
							</div>
							<?php
                            $res_area=mysqli_query($connect,"select s.*,d.*,t.*,c.*,a.* from tbl_state s, tbl_district d,tbl_taluka t, tbl_city c,tbl_area a where s.fld_state_id=d.fld_state_id and s.fld_state_id=c.fld_state_id and s.fld_state_id=t.fld_state_id and s.fld_state_id=a.fld_state_id and d.fld_state_id=t.fld_state_id and d.fld_state_id=c.fld_state_id and d.fld_state_id=a.fld_state_id and t.fld_state_id=c.fld_state_id and t.fld_state_id=a.fld_state_id and c.fld_state_id=a.fld_state_id and d.fld_district_id=t.fld_district_id and d.fld_district_id=c.fld_district_id and d.fld_district_id=a.fld_district_id and t.fld_district_id=c.fld_district_id and t.fld_district_id=a.fld_district_id and c.fld_district_id=a.fld_district_id and t.fld_taluka_id=c.fld_taluka_id and t.fld_taluka_id=a.fld_taluka_id and c.fld_taluka_id=a.fld_taluka_id and c.fld_city_id=a.fld_city_id and s.fld_state_delete='0' and d.fld_district_delete='0' and t.fld_taluka_delete='0' and c.fld_city_delete='0' and a.fld_area_delete='0' group by a.fld_area_id  order by a.fld_area_id desc") or die (mysqli_error($connect));
                            $count_area=mysqli_num_rows($res_area);
                            ?>
							<div class="project-info-right">
								<span class="no text-blue weight-500 font-24"><?php echo $count_area; ?></span>
								<p class="weight-400 font-18">Area</p>
							</div>
						</div>
					</div></a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
					<a href="landmark_view.php"><div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-light-orange text-white">
									<i class="fa fa-list"></i>
								</div>
							</div>
							<?php
                            $res_landmark=mysqli_query($connect,"select s.*,d.*,t.*,c.*,a.*, l.* from tbl_state s, tbl_district d,tbl_taluka t, tbl_city c,tbl_area a, tbl_landmark l where s.fld_state_id=d.fld_state_id and s.fld_state_id=c.fld_state_id and s.fld_state_id=t.fld_state_id and s.fld_state_id=a.fld_state_id and d.fld_state_id=t.fld_state_id and d.fld_state_id=c.fld_state_id and d.fld_state_id=a.fld_state_id and t.fld_state_id=c.fld_state_id and t.fld_state_id=a.fld_state_id and c.fld_state_id=a.fld_state_id and d.fld_district_id=t.fld_district_id and d.fld_district_id=c.fld_district_id and d.fld_district_id=a.fld_district_id and t.fld_district_id=c.fld_district_id and t.fld_district_id=a.fld_district_id and c.fld_district_id=a.fld_district_id and t.fld_taluka_id=c.fld_taluka_id and t.fld_taluka_id=a.fld_taluka_id and c.fld_taluka_id=a.fld_taluka_id and c.fld_city_id=a.fld_city_id and a.fld_area_id=l.fld_area_id and s.fld_state_delete='0' and d.fld_district_delete='0' and t.fld_taluka_delete='0' and c.fld_city_delete='0' and a.fld_area_delete='0' and l.fld_landmark_delete='0' group by l.fld_landmark_id order by l.fld_landmark_id desc") or die (mysqli_error($connect));
                            $count_landmark=mysqli_num_rows($res_landmark);
                            ?>
							<div class="project-info-right">
								<span class="no text-light-orange weight-500 font-24"><?php echo $count_landmark; ?></span>
								<p class="weight-400 font-18">Landmark</p>
							</div>
						</div>
					</div></a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
					<a href="product_type_view.php"><div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-light-purple text-white">
									<i class="fa fa-list"></i>
								</div>
							</div>
							<?php
                            $res_product_type=mysqli_query($connect,"select * from tbl_product_type where fld_product_type_delete='0' order by fld_product_type_id desc") or die (mysqli_error($connect));
                            $count_product_type=mysqli_num_rows($res_product_type);
                            ?>
							<div class="project-info-right">
								<span class="no text-light-purple weight-500 font-24"><?php echo $count_product_type; ?></span>
								<p class="weight-400 font-18">Product Type</p>
							</div>
						</div>
					</div></a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
					<a href="business_type_view.php"><div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-light-green text-white">
									<i class="fa fa-list"></i>
								</div>
							</div>
							<?php
                            $res_business_type=mysqli_query($connect,"select * from tbl_business_type where fld_business_delete='0' order by fld_business_id desc") or die (mysqli_error($connect));
                            $count_business_type=mysqli_num_rows($res_business_type);
                            ?>
							<div class="project-info-right">
								<span class="no text-light-green weight-500 font-24"><?php echo $count_business_type; ?></span>
								<p class="weight-400 font-18">Business Type</p>
							</div>
						</div>
					</div></a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
					<a href="business_category_view.php"><div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-blue text-white">
									<i class="fa fa-list"></i>
								</div>
							</div>
							<?php
                            $res_business_category=mysqli_query($connect,"select * from tbl_business_category where fld_business_category_delete='0' order by fld_business_category_id desc") or die (mysqli_error($connect));
                            $count_business_category=mysqli_num_rows($res_business_category);
                            ?>
							<div class="project-info-right">
								<span class="no text-blue weight-500 font-24"><?php echo $count_business_category; ?></span>
								<p class="weight-400 font-18">Business Category</p>
							</div>
						</div>
					</div></a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
					<a href="business_subcategory_view.php"><div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-light-orange text-white">
									<i class="fa fa-list"></i>
								</div>
							</div>
							<?php
                            $res_business_subcategory=mysqli_query($connect,"select s.*,t.*,c.* from tbl_business_type s,tbl_business_category t, tbl_business_subcategory c where  s.fld_business_id=c.fld_business_id and  s.fld_business_id=t.fld_business_id and  t.fld_business_id=c.fld_business_id  and t.fld_business_category_id=c.fld_business_category_id and s.fld_business_delete='0' and  t.fld_business_category_delete='0' and c.fld_business_subcategory_delete='0' group by c.fld_business_subcategory_id  order by c.fld_business_subcategory_id desc") or die (mysqli_error($connect));
                            $count_business_subcategory=mysqli_num_rows($res_business_subcategory);
                            ?>
							<div class="project-info-right">
								<span class="no text-light-orange weight-500 font-24"><?php echo $count_business_subcategory; ?></span>
								<p class="weight-400 font-18">Business Sub Category</p>
							</div>
						</div>
					</div></a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
					<a href="business_subsubcategory_view.php"><div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-light-purple text-white">
									<i class="fa fa-list"></i>
								</div>
							</div>
							<?php
                            $res_business_subsubcategory=mysqli_query($connect,"select s.*,t.*,c.*,a.* from tbl_business_type s,tbl_business_category t, tbl_business_subcategory c,tbl_business_subsubcategory a where  s.fld_business_id=c.fld_business_id and s.fld_business_id=t.fld_business_id and s.fld_business_id=a.fld_business_id and  t.fld_business_id=c.fld_business_id and t.fld_business_id=a.fld_business_id and c.fld_business_id=a.fld_business_id and  t.fld_business_category_id=c.fld_business_category_id and t.fld_business_category_id=a.fld_business_category_id and c.fld_business_category_id=a.fld_business_category_id and c.fld_business_subcategory_id=a.fld_business_subcategory_id and s.fld_business_delete='0' and  t.fld_business_category_delete='0' and c.fld_business_subcategory_delete='0' and a.fld_business_subsubcategory_delete='0' group by a.fld_business_subsubcategory_id  order by a.fld_business_subsubcategory_id desc") or die (mysqli_error($connect));
                            $count_business_subsubcategory=mysqli_num_rows($res_business_subsubcategory);
                            ?>
							<div class="project-info-right">
								<span class="no text-light-purple weight-500 font-24"><?php echo $count_business_subsubcategory; ?></span>
								<p class="weight-400 font-18">Business Sub Subcategory</p>
							</div>
						</div>
					</div></a>
				</div>
			</div>
		</div>
			<div class="col-md-3">
				<!-- -------------- -->
				<div>
                      <div class='right-bar box-shadow border-radius-5 bg-white animated bounceInDown'>
                           <h6 class="weight-400 font-18 text-light-green mtext pl-2 pb-0 pt-3">User Request</h6>
                      	 <ul>
                          
    <?php 

	// $asd = "select bi.*, v.* from business_information bi, vendor v where bi.vendor_id=v.vendor_id group by bi.business_info_id asc";


	$asd = "select * from vendor where vendor_id ";

  $view=mysqli_query($connect,$asd) or die(mysqli_error($connect));
	 ?>
<?php
 $count=1;
			                while ($fetchvendor=mysqli_fetch_array($view))
			                {
		                		extract($fetchvendor);
			                     
			                ?>



                <!--<li class="dropdown">-->
						<!-- <a href="javascript:;" class="dropdown-toggle">
							<span class="mtext"><?php //echo $fetchvendor['owner_name'];?></span>
						</a> -->
						 <li class='sub-menu'><a href='#settings'><?php echo $fetchvendor['owner_name'];?><div class='fa fa-angle-down right'></div></a>
						<!--<ul class="submenu">-->
<?php

$businessName = "select bi.*, v.* from business_information bi, vendor v where bi.vendor_id='".$fetchvendor['vendor_id']."' and bi.vendor_id=v.vendor_id order by bi.business_info_id asc";

  $businessNameView=mysqli_query($connect,$businessName) or die(mysqli_error($connect));
	 ?>
<?php
 $count=1;
			                while ($fetchbusinessName=mysqli_fetch_array($businessNameView))
			                {
		                		extract($fetchbusinessName);
			                     
			                ?> 

								 <ul><li class='sub-menu'>
								 	<a href='#settings'><?php echo $fetchbusinessName['business_info_name'];?><div class='fa fa-angle-down right'></div></a>
						
						<ul>
							<?php
$todays=date('Y-m-d');

$view22=mysqli_query($connect,"select * from business_information where end_date>='".$todays."' and business_info_id='".$fetchbusinessName['business_info_id']."'") or die(mysqli_error($connect));
     $lastdaterecord=mysqli_num_rows($view22);

  //    $numberofleads=mysqli_query($connect,"select * from tbl_validity_in_days where fld_validity_in_days_id") or die(mysqli_error($connect));
  //    $count_numberofdays=mysqli_fetch_array($numberofleads);
  //    $countnumberofleadsfinal=$count_numberofdays['fld_number_of_leads'];

  //     $asd="select us.*, u.*,bi.* from tbl_user_issued_services us, user u, business_information bi where bi.business_info_id ='".$fetchbusinessName['business_info_id']."' and us.fld_service_issuedorreturned='2' and us.status='NotApproved' and us.user_id= u.user_id and us.business_info_id=bi.business_info_id order by us.fld_user_issued_servicesApp";

  // $numberofrequest=mysqli_query($connect,$asd) or die(mysqli_error($connect));
  // $numberofrequestfinal=mysqli_num_rows($numberofrequest);
if($lastdaterecord>0){
							?>

							<li><a href="user_request.php?b_id=<?php echo $fetchbusinessName['business_info_id'];?>">
								User Request</a></li>
							<li><a href="user_request_approve.php?b_id=<?php echo $fetchbusinessName['business_info_id'];?>">Approve User Request </a></li>
							<li><a href="user_request_disapprove.php?b_id=<?php echo $fetchbusinessName['business_info_id'];?>">Disapprove User Request</a></li>
							<li><a href="user_request_returned.php?b_id=<?php echo $fetchbusinessName['business_info_id'];?>">User Request Completed</a></li>
							<?php }else{?>
				<li><a href="renwal_service.php?b_id=<?php echo $fetchbusinessName['business_info_id'];?>">Renwal Service</a></li>
							<?php } ?>			
										</ul>
									</li>
				</ul>
				<?php }?> <!--  Business Name ---- -->
				</li>
				 <?php }?> <!--  Vendor Name ---- -->
										</ul>	
				</div>

            </div>
	
	      </div>
	     </div> 
			<?php include('include/footer.php'); ?>
		</div>
	</div>

	
	<?php include('include/script.php'); ?>
	<script src="src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
	<script src="src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
	<script type="text/javascript">
		Highcharts.chart('areaspline-chart', {
			chart: {
				type: 'areaspline'
			},
			title: {
				text: ''
			},
			legend: {
				layout: 'vertical',
				align: 'left',
				verticalAlign: 'top',
				x: 70,
				y: 20,
				floating: true,
				borderWidth: 1,
				backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
			},
			xAxis: {
				categories: [
					'Monday',
					'Tuesday',
					'Wednesday',
					'Thursday',
					'Friday',
					'Saturday',
					'Sunday'
				],
				plotBands: [{
					from: 4.5,
					to: 6.5,
				}],
				gridLineDashStyle: 'longdash',
                gridLineWidth: 1,
                crosshair: true
			},
			yAxis: {
				title: {
					text: ''
				},
				gridLineDashStyle: 'longdash',
			},
			tooltip: {
				shared: true,
				valueSuffix: ' units'
			},
			credits: {
				enabled: false
			},
			plotOptions: {
				areaspline: {
					fillOpacity: 0.6
				}
			},
			series: [{
				name: 'John',
				data: [0, 5, 8, 6, 3, 10, 8],
				color: '#f5956c'
			}, {
				name: 'Jane',
				data: [0, 3, 6, 3, 7, 5, 9],
				color: '#f56767'
			}, {
				name: 'Johnny',
				data: [0, 2, 5, 3, 2, 4, 0],
				color: '#a683eb'
			}, {
				name: 'Daniel',
				data: [0, 4, 7, 3, 0, 7, 4],
				color: '#41ccba'
			}]
		});


		// Device Usage chart
		Highcharts.chart('device-usage', {
			chart: {
				type: 'pie'
			},
			title: {
				text: ''
			},
			subtitle: {
				text: ''
			},
			credits: {
				enabled: false
			},
			plotOptions: {
				series: {
					dataLabels: {
						enabled: false,
						format: '{point.name}: {point.y:.1f}%'
					}
				},
				pie: {
					innerSize: 127,
					depth: 45
				}
			},

			tooltip: {
				headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
				pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
			},
			series: [{
				name: 'Brands',
				colorByPoint: true,
				data: [{
					name: 'IE',
					y: 10,
					color: '#ecc72f'
				}, {
					name: 'Chrome',
					y: 40,
					color: '#46be8a'
				}, {
					name: 'Firefox',
					y: 30,
					color: '#f2a654'
				}, {
					name: 'Safari',
					y: 10,
					color: '#62a8ea'
				}, {
					name: 'Opera',
					y: 10,
					color: '#e14e50'
				}]
			}]
		});

		// gauge chart
		Highcharts.chart('ram', {

			chart: {
				type: 'gauge',
				plotBackgroundColor: null,
				plotBackgroundImage: null,
				plotBorderWidth: 0,
				plotShadow: false
			},
			title: {
				text: ''
			},
			credits: {
				enabled: false
			},
			pane: {
				startAngle: -150,
				endAngle: 150,
				background: [{
					borderWidth: 0,
					outerRadius: '109%'
				}, {
					borderWidth: 0,
					outerRadius: '107%'
				}, {
				}, {
					backgroundColor: '#fff',
					borderWidth: 0,
					outerRadius: '105%',
					innerRadius: '103%'
				}]
			},

			yAxis: {
				min: 0,
				max: 200,

				minorTickInterval: 'auto',
				minorTickWidth: 1,
				minorTickLength: 10,
				minorTickPosition: 'inside',
				minorTickColor: '#666',

				tickPixelInterval: 30,
				tickWidth: 2,
				tickPosition: 'inside',
				tickLength: 10,
				tickColor: '#666',
				labels: {
					step: 2,
					rotation: 'auto'
				},
				title: {
					text: 'RAM'
				},
				plotBands: [{
					from: 0,
					to: 120,
					color: '#55BF3B'
				}, {
					from: 120,
					to: 160,
					color: '#DDDF0D'
				}, {
					from: 160,
					to: 200,
					color: '#DF5353'
				}]
			},

			series: [{
				name: 'Speed',
				data: [80],
				tooltip: {
					valueSuffix: '%'
				}
			}]
		});
		Highcharts.chart('cpu', {

			chart: {
				type: 'gauge',
				plotBackgroundColor: null,
				plotBackgroundImage: null,
				plotBorderWidth: 0,
				plotShadow: false
			},
			title: {
				text: ''
			},
			credits: {
				enabled: false
			},
			pane: {
				startAngle: -150,
				endAngle: 150,
				background: [{
					borderWidth: 0,
					outerRadius: '109%'
				}, {
					borderWidth: 0,
					outerRadius: '107%'
				}, {
				}, {
					backgroundColor: '#fff',
					borderWidth: 0,
					outerRadius: '105%',
					innerRadius: '103%'
				}]
			},

			yAxis: {
				min: 0,
				max: 200,

				minorTickInterval: 'auto',
				minorTickWidth: 1,
				minorTickLength: 10,
				minorTickPosition: 'inside',
				minorTickColor: '#666',

				tickPixelInterval: 30,
				tickWidth: 2,
				tickPosition: 'inside',
				tickLength: 10,
				tickColor: '#666',
				labels: {
					step: 2,
					rotation: 'auto'
				},
				title: {
					text: 'CPU'
				},
				plotBands: [{
					from: 0,
					to: 120,
					color: '#55BF3B'
				}, {
					from: 120,
					to: 160,
					color: '#DDDF0D'
				}, {
					from: 160,
					to: 200,
					color: '#DF5353'
				}]
			},

			series: [{
				name: 'Speed',
				data: [120],
				tooltip: {
					valueSuffix: ' %'
				}
			}]
		});
	</script>
	<script type="text/javascript">
		$('.sub-menu ul').hide();
$(".sub-menu a").click(function () {
	$(this).parent(".sub-menu").children("ul").slideToggle("100");
	$(this).find(".right").toggleClass("fa-angle-up fa-angle-down");
});
	</script>
</body>
</html>