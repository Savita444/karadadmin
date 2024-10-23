<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<?php include('include/head.php'); ?>
	<link rel="stylesheet" type="text/css" href="src/plugins/cropperjs/dist/cropper.css">
	<title>Business Information Details</title>
</head>
<body>
	<?php include('include/header.php'); ?>
	<?php include('include/sidebar.php'); ?>
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-10 col-sm-10">
							<div class="title">
								<h4>Business Information Details</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="#">Setting</a></li>
									<li class="breadcrumb-item active" aria-current="page">Business Information Details</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-2 col-sm-2 text-right" >
							<a href="javascript:history.back();"><button type="button" class="btn btn-primary" align="right">Back</button></a>
							<!-- <a href="Update_manager.php?Employee_Id=<?php //echo $_SESSION['Employee_Id']; ?>"><button type="button" class="btn btn-success" align="right">Edit</button></a> -->
						</div>
					</div>
				</div>


<?php
	$query="select b.*, d.*,t.*,c.*,a.*,bt.*,bc.*,bsc.* from business_information b, tbl_district d, tbl_taluka t,tbl_city c,tbl_area a,tbl_business_type bt,tbl_business_category bc, tbl_business_subcategory bsc where d.fld_district_id=t.fld_district_id and d.fld_district_id=c.fld_district_id  and d.fld_district_id=b.fld_district_id and t.fld_district_id=c.fld_district_id and t.fld_district_id=b.fld_district_id and c.fld_district_id=b.fld_district_id and t.fld_taluka_id=c.fld_taluka_id and t.fld_taluka_id=b.fld_taluka_id and c.fld_taluka_id=b.fld_taluka_id and c.fld_city_id=b.fld_city_id and a.fld_area_id=b.fld_area_id and b.fld_business_id=bt.fld_business_id and bc.fld_business_category_id=b.fld_business_category_id and bsc.fld_business_subcategory_id=b.fld_business_subcategory_id and b.business_info_id='".$_GET['business_info_id']."' ";
	 	$sel=mysqli_query($connect,$query) or die(mysqli_error($connect));
	 	$fetch=mysqli_fetch_array($sel);
	 	extract($fetch);

	
 ?>				
				
					<div class="col-xl-12 col-lg-8 col-md-8 col-sm-12 mb-30">
						<div class="bg-white border-radius-4 box-shadow height-100-p">
							<div class="profile-tab height-100-p">
								<div class="tab height-100-p">
									<ul class="nav nav-tabs customtab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#personal" role="tab">Business Information</a>
										</li>										
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#addressdetail" role="tab">Address Details</a>
										</li>
									
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#info" role="tab">Photos</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#product" role="tab">Product Details</a>
										</li>
									
									</ul>
				<div class="tab-content">
						<!-- Personal Details Tab start -->
						<div class="tab-pane fade show active" id="personal" role="tabpanel">
							<div class="profile-setting">
								<form>
									<ul class="profile-edit-list row">
										<li class="weight-500 col-md-1">
											
										</li>
										<li class="weight-500 col-md-10">
											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label >Business Name :</label>
												<span style="color: #78909c;"><?php echo $fetch['business_info_name'];?></span>
											</div>
											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label >Owner Name :</label>
												<span style="color: #78909c;"><?php echo $fetch['owner_name'];?></span>
											</div>
											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Business Type :</label>
												<span style="color: #78909c;"><?php echo $fetch['fld_business_name'];?></span>
											</div>
											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Business Category :</label>
												<span style="color: #78909c;"><?php echo $fetch['fld_business_category_name'];?></span>
											</div>
											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Business Subcategory :</label>
												<span style="color: #78909c;"><?php echo $fetch['fld_business_subcategory_name'];?></span>
											</div>
	                            <?php
	                              if($fetch['fld_business_subsubcategory_id'] == 0)
	                             {
		                        ?>

		                        <?php
	                             }
	                            else{
	                            	$querySub="select b.*, bssc.* from business_information b, tbl_business_subsubcategory bssc where bssc.fld_business_subsubcategory_id=b.fld_business_subsubcategory_id ";
	 	$selSub=mysqli_query($connect,$querySub) or die(mysqli_error($connect));
	 	$fetchSub=mysqli_fetch_array($selSub);
	 	extract($fetchSub);

		                          ?>
	                                           <div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Business Sub subcategory :</label>
												<span style="color: #78909c;"><?php echo $fetchSub['fld_business_subsubcategory_name'];?></span>
											    </div>
	                            <?php
                                   }
	                               ?>	
											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Business Description :</label>
												<span style="color: #78909c;"><?php echo $fetch['business_description'];?></span>
											</div>
											
											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Contact Person :</label>
												<span style="color: #78909c;"><?php echo $fetch['contact_person'];?></span>
											</div>
											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Designation :</label>
												<span style="color: #78909c;"><?php echo $fetch['designation'];?></span>
											</div>
											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Mobile :</label>
												<span style="color: #78909c;"><?php echo $fetch['mobile_no'];?></span>
											</div>
											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Telephone :</label>
												<span style="color: #78909c;"><?php echo $fetch['telephone_no'];?></span>
											</div>
											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Website :</label>
												<span style="color: #78909c;"><?php echo $fetch['business_website'];?></span>
											</div>
											
											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Business Email :</label>
												<span style="color: #78909c;"><?php echo $fetch['business_email'];?></span>
											</div>
											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Facebook Link :</label>
												<span style="color: #78909c;"><?php echo $fetch['facebook_link'];?></span>
											</div>

											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Twitter Link :</label>
												<span style="color: #78909c;"><?php echo $fetch['twitter_link'];?></span>
											</div>
											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Youtube Link :</label>
												<span style="color: #78909c;"><?php echo $fetch['youtube_link'];?></span>
											</div>			
											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Google Map Link :</label>
												<span style="color: #78909c;"><?php echo $fetch['google_map_link'];?></span>
											</div>
											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Working Days :</label>
												<span style="color: #78909c;"><?php echo $fetch['working_days'];?></span>
											</div>
											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Working Start Time :</label>
												<span style="color: #78909c;"><?php echo $fetch['start_working_time'];?></span>
											</div>
											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Working End Time :</label>
												<span style="color: #78909c;"><?php echo $fetch['end_working_time'];?></span>
											</div>
											
											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Payment Mode :</label>
												<span style="color: #78909c;"><?php echo $fetch['payment_mode'];?></span>
											</div>
											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Establishment Year :</label>
												<span style="color: #78909c;"><?php echo $fetch['establishment_year'];?></span>
											</div>
											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Service Chaeges :</label>
												<span style="color: #78909c;"><?php echo $fetch['service_charges'];?></span>
											</div>
											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Annual Turnover :</label>
												<span style="color: #78909c;"><?php echo $fetch['annual_turnover'];?></span>
											</div>
											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Number Of Employees :</label>
												<span style="color: #78909c;"><?php echo $fetch['number_of_employees'];?></span>
											</div>
											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Certification :</label>
												<span style="color: #78909c;"><?php echo $fetch['certification'];?></span>
											</div>
										</li>
									</ul>
								</form>
							</div>
						</div>
									<!-- Details Tab End -->
						<div class="tab-pane fade" id="addressdetail" role="tabpanel">
							<div class="profile-setting">
								<form>
									<ul class="profile-edit-list row">
										<li class="weight-500 col-md-1">
											
										</li>
										<li class="weight-500 col-md-10">
										<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Address :</label>
												<span style="color: #78909c;"><?php echo $fetch['address'];?></span>
											</div>
																						
											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>District :</label>
												<span style="color: #78909c;"><?php echo $fetch['fld_district_name'];?></span>
											</div>

											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Taluka :</label>	
												<span style="color: #78909c;"><?php echo $fetch['fld_taluka_name'];?></span>
											</div>
											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Village :</label>
												<span style="color: #78909c;"><?php echo $fetch['fld_city_name'];?></span>
											</div>
											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Area :</label>
												<span style="color: #78909c;"><?php echo $fetch['fld_area_name'];?></span>
											</div>
                                  <?php
	                              if($fetch['fld_landmark_id'] == 0)
	                             {
		                        ?>

		                        <?php
	                             }
	                            else{

                               $queryLandmark="select b.*, l.* from business_information b, tbl_landmark l where l.fld_landmark_id=b.fld_landmark_id ";
	 	$selland=mysqli_query($connect,$queryLandmark) or die(mysqli_error($connect));
	 	$fetchLandmark=mysqli_fetch_array($selland);
	 	extract($fetchLandmark);
                     
		                          ?>
	                                           <div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Landmark :</label>
												<span style="color: #78909c;"><?php echo $fetchLandmark['fld_landmark_name'];?></span>
											</div>
	                            <?php
                                   }
	                               ?>







											

											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Building Nmae :</label>
												<span style="color: #78909c;"><?php echo $fetch['building_name'];?></span>
											</div>
																						
											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<labelPincode>Pincode :</label>
												<span style="color: #78909c;"><?php echo $fetch['pincode'];?></span>
											</div>
										</li>
									</ul>
								</form>
							</div>
						</div>

						<div class="tab-pane fade" id="info" role="tabpanel">
							<div class="profile-setting">
								<form>
									<ul class="profile-edit-list row">
										<li class="weight-500 col-md-1">
											
										</li>
										<li class="weight-500 col-md-10">
											
											<div class="form-group">
												<i class="icon-copy fa fa-dot-circle-o text-primary" aria-hidden="true"></i>&nbsp;&nbsp;
												<label>Business Photos :</label>
												<span style="color: #78909c;">
												<?php
					$abc=mysqli_query($connect,"select * from business_photos where business_info_id='".$fetch['business_info_id']."'");
					 while($fetch_image=mysqli_fetch_array($abc))
					  { 
					?>
													<img src="../images/vendor/Business_Photo/<?php echo $fetch_image['business_photo']; ?>" height="100" width="100">
													
													
			 <a href="../images/vendor/Business_Photo/<?php echo $fetch_image['business_photo']; ?>" height="50" width="50" class="padding-top:20px" Download><button type="button" name="download" class="btn btn-primary btn-sm mt-1"><i class="fa fa-download" aria-hidden="true"></i></button></a>

													<?php } ?>

												</span>
											</div>
										</li>
									</ul>
								</form>
							</div>
						</div>



                        <div class="tab-pane fade" id="product" role="tabpanel">
							<div class="profile-setting">
                             <div class="form-group p-4">
											<label class="text-blue">Business Working Time : </label>
											<table class="table table-responsive table-bordered">
												<tr>
													<td>Sr no</td>
													<td>Open Time</td>
													<td>Close Time</td>
													<td>Created Business Working Time </td>
													<td>Modified Business Working Time</td>
												</tr>
												
												<?php
													$count=1;
													$querytime=mysqli_query($connect,"select * from tbl_business_working_time where business_info_id='".$fetch['business_info_id']."' and fld_business_time_delete ='0'");
													
													while($fetch_timevarient=mysqli_fetch_array($querytime)){
												?>
													<tr>
														<td><?php echo $count++; ?></td>
														<td><?php echo $fetch_timevarient['fld_working_open_time'] ?></td>
														<td><?php echo $fetch_timevarient['fld_working_close_time'] ?></td>
														
														<td><?php echo $date =$fetch_timevarient['fld_business_time_created_date'];?></td>
         												<td><?php echo $date =$fetch_timevarient['fld_business_time_modified_date'];
         													?></td>
         												
													</tr>
												<?php } ?>
											</table>
										</div>
                        





								<div class="form-group p-4">
											<label class="text-blue">Product Details : </label>
											<table class="table table-responsive table-bordered">
												<tr>
													<td>Sr no</td>
													<td>Product Details Name</td>
													<td>Product Details Size</td>
													<td>Product Details Rate</td>
													<td>Product Details Created Date</td>
													<td>Product Details Modified Date</td>
												</tr>
												
												<?php
													$count=1;
													$hgj=mysqli_query($connect,"select * from tbl_product_details where business_info_id='".$fetch['business_info_id']."' and fld_business_details_delete ='0'");
													
													while($fetch_varient=mysqli_fetch_array($hgj)){
												?>
													<tr>
														<td><?php echo $count++; ?></td>
														<td><?php echo $fetch_varient['fld_business_details_name'] ?></td>
														<td><?php echo $fetch_varient['fld_business_details_size'] ?></td>
														<td><?php echo $fetch_varient['fld_business_details_rate'] ?>
															
														</td>
														<td><?php echo $date =$fetch_varient['fld_business_details_created_date'];?></td>
         												<td><?php echo$date =$fetch_varient['fld_business_details_modified_date'];
         													?></td>
         												
													</tr>
												<?php } ?>
											</table>
										</div>
							</div>
						</div>


										<!-- <center><a href="javascript:history.back()"><button type="button" class="btn btn-danger">Back</button></a></center><br><br> -->
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include('include/script.php'); ?>
	<script src="src/plugins/cropperjs/dist/cropper.js"></script>
	<script>
		window.addEventListener('DOMContentLoaded', function () {
			var image = document.getElementById('image');
			var cropBoxData;
			var canvasData;
			var cropper;

			$('#modal').on('shown.bs.modal', function () {
				cropper = new Cropper(image, {
					autoCropArea: 0.5,
					dragMode: 'move',
					aspectRatio: 3 / 3,
					restore: false,
					guides: false,
					center: false,
					highlight: false,
					cropBoxMovable: false,
					cropBoxResizable: false,
					toggleDragModeOnDblclick: false,
					ready: function () {
						cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
					}
				});
			}).on('hidden.bs.modal', function () {
				cropBoxData = cropper.getCropBoxData();
				canvasData = cropper.getCanvasData();
				cropper.destroy();
			});
		});
	</script>
</body>
</html>