<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
	<title>Banner Photos</title>
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
								<h4>Banner Photos</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Banner Photos</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-3 col-sm-3 text-right">
							<a href="banner.php"><button class="btn btn-primary">Add Banner Photos</button></a>
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
                 $query="select * from tbl_banner_images where banner_photo_delete='0' order by banner_images_id desc ";

               $view=mysqli_query($connect,$query) or die(mysqli_error($connect));
 
	 ?>
					<div class="row">
						<table class="stripe hover multiple-select-row data-table-export nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort" >Sr. No</th>
									<th>Action</th>
									<th>Banner<br>Photo</th>
									<th>Banner Photo Created</th>
									<th>Banner Photo Updated</th>
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
			                 			

			                 			<a href="banner_update.php?banner_id=<?php echo $fetch['banner_images_id']; ?>" data-toggle="tooltip" title="update_data" ><i class="icon-copy fa fa-edit text-success" style="font-size: 20px;"></i></a>&nbsp;&nbsp;

			                 			<a href="banner_delete.php?banner_id=<?php echo $fetch['banner_images_id']; ?>" class="text-danger" onclick="return confirm ('Are You Sure You Wannt to Delete this record...?');"  title="Delete Banner Photo"><i class="fa fa-trash" aria-hidden="true" style="font-size: 20px"></i></a>
			                 		</td>
			                 		
			                 		
			                 		<td><img src="../images/admin/banner/<?php echo $fetch['banner_photo']; ?>" height="50" width="50"></td>
			                 		<td><?php echo $fetch['banner_photo_created_at']; ?></td>
			                 		<td><?php echo $fetch['banner_photo_updated_at']; ?></td>
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