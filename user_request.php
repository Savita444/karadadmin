<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
	<title></title>
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
								<h4>User Request</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<!-- <li class="breadcrumb-item"><a href="#">User Request</a></li>
									<li class="breadcrumb-item"><a href="#">Vendor Business</a></li>
									<li class="breadcrumb-item"><a href="user_request.php">Business Name</a></li> -->
									<li class="breadcrumb-item active" aria-current="page">User Request</li>
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
					
					 // $asd="select * from tbl_user_issued_services where status='NotApproved'";


					 $asd="select us.*, u.*,bi.* from tbl_user_issued_services us, user u, business_information bi where bi.business_info_id ='".$_GET['b_id']."' and us.fld_service_issuedorreturned='2' and us.status='NotApproved' and us.user_id= u.user_id and us.business_info_id=bi.business_info_id order by us.fld_user_issued_servicesApp";

  $view=mysqli_query($connect,$asd) or die(mysqli_error($connect));
 
	 ?>
					<div class="row">
						<table class="stripe hover multiple-select-row data-table-export nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort" >Sr. No</th>
									<!-- <th>Action</th> -->
									<th>Status</th>
									<th>User Name</th>
									<th>User Mobile <br> Number</th>
									<th>Business<br>Name</th>
									<th>Booking Date</th>
									<th>Modified Date</th>
									
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
			                 		
                          <!-- <td>
	                       <a href="update_user_request_disapprove.php?a_id=<?php //echo $fetch['fld_user_issued_servicesApp'] ?>" class="text-danger" onclick="return confirm ('Are You Sure You Want to Disapprove this User...?');"  title="Disapprove user"><i class="icon-copy fa fa-times" aria-hidden="true" style="font-size: 20px;padding-left: 10px"></i></a>
	                       <a href="update_user_request_approve.php?a_id=<?php //echo $fetch['fld_user_issued_servicesApp'] ?>" class="text-success" onclick="return confirm ('Are You Sure You Want to Approve this User...?');"  title="Approve user"><i class="icon-copy fa fa-check" aria-hidden="true" style="font-size: 20px;padding-left: 10px"></i></a>
                         </td> -->
                         <td><?php echo $fetch['status'];?></td>
                         <td><?php echo $fetch['user_name']; ?></td> 
			             <td><?php echo $fetch['user_mobile']; ?></td>            			
			             <td><?php echo $fetch['business_info_name']; ?></td>
			             <td><?php echo $fetch['fld_service_requested_date']; ?></td>
			             <!-- <td><?php //echo $fld_book_issued_date ; ?></td> -->
			             <td><?php echo $fld_service_returned_date; ?></td>
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