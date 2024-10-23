<!-- <?php //include('include/header_session.php'); ?>
 --><!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
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
								<h4>View Free Vendor</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item" ria-current="page">Free Vendor</li>
									<!-- <li class="breadcrumb-item active" aria-current="page">View Slider Images</li> -->
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<!-- <div class="dropdown">
								<a class="btn btn-primary" href="vendor_add.php" role="button">
									Add Vendor
								</a>
							</div> -->
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
									<!-- <th>Action</th> -->
									<th>Status</th>
									<th>Company Name</th>
									<th>Owner Name</th>
									<th>Mobile Number</th>
									<th>Email</th>
									<th>DOB</th>
									<th>Gender</th>
									<th>Approved_Date</th>
									<th>End Date</th>
									<th>Created Date</th>
									
								</tr>
							</thead>
							<tbody>
								<?php 
                                            $count=0; 
                                            $query="select * from vendor where status='Approved' and fld_product_type_status='Free' order by vendor_id desc";
                                            $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
                                            
                                            while($fetch=mysqli_fetch_array($row)) {

                                            extract($fetch);
                                        
                                        ?> 
                                            <tr>
                                                <td><?php echo ++$count; ?></td>
                                                <!-- <td> -->
                                                	<!--  <a href="vendor_approve.php?vendor_id=<?php //echo $fetch['vendor_id'] ?>" title="Approve Vendor" ><i class="fa fa-thumbs-up text-success" style="font-size: 20px; padding-left: 10px" ></i></a> -->

                                                   <!-- <a href="vendor_disapprove.php?vendor_id=<?php //echo $fetch['vendor_id'] ?>" title="Disapprove Vendor" ><i class="fa fa-thumbs-down text-danger" style="font-size: 20px; padding-left: 10px" ></i></a>

                                                   <a href="vendor_update.php?vendor_id=<?php //echo $fetch['vendor_id'] ?>" title="Edit Vendor" ><i class="fa fa-pencil-square-o text-success" style="font-size: 20px; padding-left: 10px" ></i></a>

												   <a href="vendor_delete.php?vendor_id=<?php //echo $fetch['vendor_id'] ?>" onclick="return confirm('You are sure to delete the Vendor Details.')" title="Delete Vendor" ><i class="fa fa-trash text-danger" style="font-size: 20px; padding-left: 10px" ></i></a> -->
                                                <!-- </td>  -->
                                                <td><?php echo $fetch['status'] ?></td>
                                                <td><?php echo $fetch['company_name'];?></td> 
                                                <td><?php echo $fetch['owner_name'];?></td>
                                               <!--  <td><a href="images/feature_advertise/<?php //echo $fetch['image'];?>" target="_blank"><img src="images/feature_advertise/<?php //echo $fetch['image'];?>" height="75px" width="75px" ></a></td> -->
                                                <td><?php echo $fetch['mobile'];?></td>   
                                                <td><?php echo $fetch['email'];?></td>
                                                <td><?php echo $fetch['date_of_birth'] ?></td> 
                                                <!-- <td><?php //echo $fetch['password'] ?></td> -->
                                                <td><?php echo $fetch['gender'] ?></td> 
                                                <td><?php echo $fetch['approve_date']; ?></td> 
                                                <td><?php echo $fetch['end_date'] ?></td>
                                               
                                                <td><?php echo $fetch['created_at'] ?></td>
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