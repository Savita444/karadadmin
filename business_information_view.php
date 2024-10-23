<?php include('include/header_session.php'); ?>
<?php //include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
	<title>Business Information</title>
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/responsive.dataTables.css">
	 
</head>
<body>
	<?php include('include/header.php'); ?>
	<?php include('include/sidebar.php'); ?>
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-9 col-sm-9">
							<div class="title">
								<h4>Vendor Business Information</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Vendor Business Information</li>
								</ol>
							</nav>
						</div>
						<!-- <div class="col-md-3 col-sm-3 text-right">
							<a href="business_information.php"><button class="btn btn-primary">Add Business Information</button></a>
						</div> -->
					</div>
				</div>
				
				<!-- Export Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<!-- <h5 class="text-blue">Bank Employee</h5> -->
						</div>
					
					<?php 
					// $asd = "select bi.*, bt.*, s.*, ss.* from sub_service ss,service s, business_type bt, business_information bi where bi.business_id=bt.business_id and s.service_id=bi.service_id and ss.sub_service_id=bi.sub_service_id group by bi.business_info_id order by bi.business_info_id desc";


$asd = "select v.*, bi.*, bt.*, bc.*, bsc.* from vendor v, business_information bi, tbl_business_type bt, tbl_business_subcategory bsc, tbl_business_category bc where bi.business_status ='NotApproved' and bi.fld_business_id=bt.fld_business_id and bc.fld_business_category_id =bi.fld_business_category_id and bsc.fld_business_subcategory_id=bi.fld_business_subcategory_id and bi.vendor_id=v.vendor_id order by bi.business_info_id desc";

//$asd="select b.*, d.*,t.*,v.*,a.*,l.*,bt.*,s.*,ss.*,sss.* from business_information b, district d, taluka t,village v,area a,landmark l,business_type bt,service s, sub_service ss, sub_sub_service sss where d.district_id=t.district_id and d.district_id=v.district_id  and d.district_id=b.district and t.district_id=v.district_id and t.district_id=b.district and v.district_id=b.district and t.taluka_id=v.taluka_id and t.taluka_id=b.taluka and v.taluka_id=b.taluka and v.village_id=b.village and a.area_id=b.area and l.landmark_id=b.landmark and b.business_type=bt.business_id and s.service_id=b.service_id and ss.sub_service_id=b.sub_service_id and sss.sub_sub_service_id=b.sub_sub_service_id order by b.business_info_id desc";
  $view=mysqli_query($connect,$asd) or die(mysqli_error($connect));
 
	 ?>
					<div class="row">
						<table class="stripe hover multiple-select-row data-table-export nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort" >Sr. No</th>
									<th>Action</th>
									<th>Status</th>
									<th>Business<br>Name</th>
									<th>Owner<br>Name</th>
									<th>Business<br>Type</th>
									<th>Business<br>Service</th>
									<th>Sub<br>Service</th>
									<!--<th>Sub Sub<br>Service</th>
									<th>Business<br>Description</th>
									<th>Address</th>
									<th>District</th>
									<th>Taluka</th>
									<th>Village</th>
									<th>Area</th>
									<th>Landmark</th>
									<th>Building<br>Name</th>
									<th>Pincode</th>
									<th>Contact<br>Person</th>
									<th>Designation</th>
									<th>Mobile<br>Number</th>
									<th>Telephone<br>Number</th>
									<th>Business<br>Website</th>
									<th>Business<br>Email</th>
									<th>Facebook<br>Link</th>
									<th>Twitter<br>Link</th>
									<th>Youtube<br>Link</th>
									<th>GoogleMap<br>Link</th>
									<th>Working<br>Days</th>
									<th>Working<br>Time</th>
									<th>Payment<br>Mode</th>
									<th>Establishment<br>Year</th>
									<th>Service<br>Charges</th>
									<th>Annual<br>Turnover</th>
									<th>Total<br>Employees</th>
									<th>Business<br>Association</th>
									<th>Certification</th>
									<th>Registration Date</th>
			                        <th>Modification Date</th> -->
								</tr>
							</thead>
							<tbody>
			                <?php
			                $count=1;
			                while ($fetch=mysqli_fetch_array($view))
			                {
		                		extract($fetch);
			                     
			                ?>
			                 	<tr>
			                 		<td><?php echo $count++;  ?></td>
			                 		<td>
			                 			 <a href="business_information_detail.php?business_info_id=<?php echo $fetch['business_info_id'];?>" class="fa fa-eye text-info" style="font-size: 20px"  aria-hidden="true" title="View Details"></a>&nbsp;&nbsp; 
			                 			<a href="delete_business_information.php?business_info_id=<?php echo $fetch['business_info_id']; ?>" class="text-danger" onclick="return confirm ('Are You Sure You Want to Delete this record...?');"  title="Delete Business Information"><i class="fa fa-trash" aria-hidden="true" style="font-size: 20px"></i></a>&nbsp;&nbsp; 


			                 			<a href="business_approve.php?business_id=<?php echo $fetch['business_info_id'] ?>" title="Approve Business" ><i class="fa fa-thumbs-up text-success" style="font-size: 20px; padding-left: 10px" ></i></a>

                                                   <a href="business_disapprove.php?business_id=<?php echo $fetch['business_info_id'] ?>" title="Disapprove Business" ><i class="fa fa-thumbs-down text-danger" style="font-size: 20px; padding-left: 10px" ></i></a>

			                 		</td>
			                 		<td><?php echo $business_status; ?></td>
			                 		<td><?php echo $fetch['business_info_name']; ?></td>            			
			                 		<td><?php echo $fetch['owner_name']; ?></td>
			                 		<td><?php echo $fetch['fld_business_name']; ?></td>
			                 		<td><?php echo $fld_business_category_name; ?></td>
			                 		<td><?php echo $fld_business_subcategory_name; ?></td>
			                 		<!-- <td><?php //echo $sub_sub_service_name; ?></td>
			                        <td><?php //echo $business_description; ?></td>
			                 		<td><?php //echo $address; ?></td>
			                 		<td><?php //echo $district; ?></td>
			                 		<td><?php //echo $taluka; ?></td>
			                 		<td><?php //echo $village; ?></td>
			                 		<td><?php //echo $area; ?></td>
			                 		<td><?php //echo $landmark; ?></td>
			                 		<td><?php //echo $building_name; ?></td>
			                 		<td><?php //echo $pincode; ?></td>
			                 		<td><?php //echo $contact_person; ?></td>
			                 		<td><?php //echo $designation; ?></td>
			                 		<td><?php //echo $mobile_no; ?></td>
			                 		<td><?php //echo $telephone_no; ?></td>
			                 		<td><?php //echo $business_website; ?></td>
			                        <td><?php //echo $business_email; ?></td>
			                        <td><?php //echo $facebook_link; ?></td>
			                        <td><?php //echo $twitter_link; ?></td>
			                        <td><?php //echo $youtube_link ?></td> 
									<td><?php //echo $google_map_link ?></td>
									<td><?php //echo $working_days ?></td> 
									<td><?php //echo $working_time ?></td>
									<td><?php //echo $payment_mode ?></td>
									<td><?php //echo $establishment_year ?></td>
									<td><?php //echo $service_charges ?></td> 
									<td><?php //echo $annual_turnover ?></td>
									<td><?php //echo $number_of_employees ?></td>
									<td><?php //echo $business_association ?></td><td><?php //echo $certification ?></td>
									<td><?php //echo $shop_act ?></td> 
									<td><?php //echo $pan_card ?></td> 
									<td><?php //echo $aadhar_card ?></td> 
									<td><?php //echo $business_photo ?></td> --> 
			                    </tr>
							<?php 
							} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
				<!-- Export Datatable End -->
			</div>
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
	<script src="src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script>
	<script src="src/plugins/datatables/media/js/dataTables.responsive.js"></script>
	<script src="src/plugins/datatables/media/js/responsive.bootstrap4.js"></script>
	<!-- buttons for Export datatable -->
	<script src="src/plugins/datatables/media/js/button/dataTables.buttons.js"></script>
	<script src="src/plugins/datatables/media/js/button/buttons.bootstrap4.js"></script>
	<script src="src/plugins/datatables/media/js/button/buttons.print.js"></script>
	<script src="src/plugins/datatables/media/js/button/buttons.html5.js"></script>
	<script src="src/plugins/datatables/media/js/button/buttons.flash.js"></script>
	<script src="src/plugins/datatables/media/js/button/pdfmake.min.js"></script>
	<script src="src/plugins/datatables/media/js/button/vfs_fonts.js"></script>
	<script>
		$('document').ready(function(){
			$('.data-table').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"language": {
					"info": "_START_-_END_ of _TOTAL_ entries",
					searchPlaceholder: "Search"
				},
			});
			$('.data-table-export').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"language": {
					"info": "_START_-_END_ of _TOTAL_ entries",
					searchPlaceholder: "Search"
				},
				dom: 'Bfrtip',
				buttons: [
				'copy', 'csv', 'pdf', 'print'
				]
			});
			var table = $('.select-row').DataTable();
			$('.select-row tbody').on('click', 'tr', function () {
				if ($(this).hasClass('selected')) {
					$(this).removeClass('selected');
				}
				else {
					table.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');
				}
			});
			var multipletable = $('.multiple-select-row').DataTable();
			$('.multiple-select-row tbody').on('click', 'tr', function () {
				$(this).toggleClass('selected');
			});
		});
	</script>
</body>
</html>