<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
	<title>Renewal Request</title>
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
								<h4>Renewal Request</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Renewal Request</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-3 col-sm-3 text-right">
							<!-- <a href="add_renewal_request.php"><button class="btn btn-primary">Add Renewal Request</button></a> -->
						</div>
					</div>
				</div>
				
				<!-- Export Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<!-- <h5 class="text-blue">Bank Employee</h5> -->
						</div>
					
					<?php 
					
  
  // $asd="select u.*,p.*, a.*, r.* from tbl_user_req u, tbl_premises p,tbl_architect a, tbl_reg r where u.id_reg='".$_SESSION['id']."' and u.id_pre=p.id_pre and u.id_arch=a.id_arch group by u.id_user";

// $asd="select e.*, cu.*, co.*, s.*, c.*, b.* from employee e, customer cu, country co, state s, city c, bank b where e.Employee_Id=e.Customer_Id and e.Country_Id=co.Country_Id and s.State_Id=s.State_Id and e.City_Id=c.City_Id and e.Bank_Id=b.Bank_Id order by e.Employee_Id ";

$asd="select * from renewal_request group by renewal_id order by renewal_id desc";
  $view=mysqli_query($connect,$asd) or die(mysqli_error($connect));
 
	 ?>
					<div class="row">
						<table class="stripe hover multiple-select-row data-table-export nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort" >Sr. No</th>
									<!-- <th>Action</th> -->
									<th>Status</th>
									<th>Owner<br>Name</th>
									<th>Mobile<br>Number</th>
									<th>Request<br>Send Date</th>
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
			                 		
			                 		<td><?php echo $request_status; ?></td>             			
			                 		<td><?php echo $fetch['owner_name']; ?></td>
			                 		<td><?php echo $fetch['mobile_number']; ?></td>
			                 		<td><?php echo $fetch['request_send_date']; ?></td>
			                    </tr>
							<?php 
							} ?>
							</tbody>
						</table>
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