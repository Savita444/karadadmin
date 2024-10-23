<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
	<title> Feature Advertise <?php echo date('d-m-Y'); ?> </title>
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
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>View Feature Advertise</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item" ria-current="page">Feature Advertise</li>
									<!-- <li class="breadcrumb-item active" aria-current="page">View Slider Images</li> -->
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary" href="feature_advertise_add.php" role="button">
									Add Feature Advertise
								</a>
							</div>
						</div>
					</div>
				</div>
				<!-- Export Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<!-- <h5 class="text-blue">Data Table with Export Buttons</h5> -->
						</div>
					</div>
					<div class="row">
					<table class="stripe hover data-table-export nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Sr No</th>
									<th>Action</th>
									<th>Title</th>
									<th>Description</th>
									<th>Feature Image</th>
									<th>Business Type Name</th>
									<th>Business Category</th>
									<th>Name</th>
									<th>Mobile Number</th>
									<th>State</th>
									<th>District</th>
									<th>Taluka</th>
									<th>City</th>
									<th>Start Date</th>
									<th>End Date </th>
									
								</tr>
							</thead>
							<tbody>
								<?php 
                                            $count=0; 
                                            $query="select f.*,bt.*, bc.*,st.*,d.*,t.*, c.* from feature_image f,tbl_business_type bt, tbl_business_category bc, tbl_state st, tbl_district d, tbl_taluka t, tbl_city c where f.fld_business_id=bt.fld_business_id and bc.fld_business_category_id =f.fld_business_category_id  and f.fld_state_id=st.fld_state_id and st.fld_state_id=d.fld_state_id and f.fld_district_id=d.fld_district_id and d.fld_district_id=t.fld_district_id and  d.fld_district_id=c.fld_district_id and f.fld_taluka_id=t.fld_taluka_id and t.fld_taluka_id=c.fld_taluka_id and f.fld_city_id=c.fld_city_id and f.fld_feature_image_delete='0' order by f.feature_image_id desc";

                                           
                                            $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
                                            
                                            while($fetch=mysqli_fetch_array($row)) {

                                            extract($fetch);
                                        
                                        ?> 
                                            <tr>
                                                <td><?php echo ++$count; ?></td>
                                                <td>
                                                   <a href="feature_advertise_update.php?feature_image_id=<?php echo $fetch['feature_image_id'] ?>" title="Edit Feature Advertise" ><i class="fa fa-pencil-square-o text-success" style="font-size: 20px; padding-left: 10px" ></i></a>

												   <a href="feature_advertise_delete.php?feature_image_id=<?php echo $fetch['feature_image_id'] ?>" onclick="return confirm('You are sure to delete the Feature Advertise.')" title="Delete Feature Advertise" ><i class="fa fa-trash text-danger" style="font-size: 20px; padding-left: 10px" ></i></a>
                                                </td> 
                                                <td><?php echo $fetch['title'];?></td> 
                                                <td><?php echo substr($fetch['discription'], 0, 10)?> ...</td>
                                                <td><img src="../images/admin/feature/<?php echo $fetch['feature_image'];?>" height="50px" width="50px" >
                                                </td>
                                                <td><?php echo $fetch['fld_business_name']; ?></td>
			                 					<td><?php echo $fld_business_category_name; ?></td>
                                                <td><?php echo $fetch['name'];?></td>   
                                                <td><?php echo $fetch['mobile_number'];?></td>
                                                 <td><?php echo $fetch['fld_state_name'] ?></td> 
                                                <td><?php echo $fetch['fld_district_name'] ?></td>
                                                <td><?php echo $fetch['fld_taluka_name'] ?></td>
                                                <td><?php echo $fetch['fld_city_name'] ?></td> 
                                                <td><?php echo $fetch['fld_feature_start_date']; ?></td>
												<td><?php echo $fetch['fld_feature_end_date']; ?></td> 
                                            </tr>
                                            <?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				
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
		            {
		                extend: 'pdfHtml5',
		                orientation: 'landscape',
		                pageSize: 'LEGAL'
		            },
		            {
		            	extend: 'csvHtml5'
		            },
		            {
		            	extend: 'copyHtml5'
		            },
		             {
		            	extend: 'print'
		            }
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