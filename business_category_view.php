<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>View Business Category</title>
	<?php include('include/head.php'); ?>
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/responsive.dataTables.css">
</head>
<body>
	<?php include('include/header.php');
include('include/sidebar.php'); ?>

	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-9 col-sm-9">
							<div class="title">
								<h4>Business Category Details</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="#">Master Table</a></li>
									<li class="breadcrumb-item active" aria-current="page">Business Category Details</li>
								</ol>
							</nav>
						</div>

						<div class="col-md-3 col-sm-3" align="right">
							<a href="business_category_add.php"><button class="btn btn-primary">Add Business Category</button></a>
						</div>
						
					</div>
				</div>
				
				<!-- Export Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<!-- <h5 class="text-blue">View business Category</h5> -->
						</div>
					</div>
					<div class="row">
						<!-- <table class="stripe hover multiple-select-row data-table-export nowrap"> -->
						<table class="stripe hover data-table-export nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Sr No</th>
									<th class="datatable-nosort">Action</th>
                                    <th>Business Type</th>
                                    <th>Business Category</th>
                                    <th>Created Date</th>
                                    <th>Modified Date</th>
								</tr>
							</thead>
							<tbody>
								<?php 
                                    $count=0; 
                                    $query="select b.*,bc.* from tbl_business_type b,tbl_business_category bc where b.fld_business_id=bc.fld_business_id and    b.fld_business_delete='0' and  bc.fld_business_category_delete='0' group by bc.fld_business_category_id order by bc.fld_business_category_id desc ";
                                    // $query="select t.*,d.* from tbl_business_category t, tbl_business_for d where d.fld_business_for_id=t.fld_business_for_id and t.fld_business_category_delete='0' and d.fld_business_for_delete=0 group by t.fld_business_category_id order by t.fld_business_category_id desc ";
                                    $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
                                    $total=mysqli_num_rows($row);
                                    while($fetch=mysqli_fetch_array($row)) {

                                    extract($fetch);

                                ?>
								<tr>
									<td class="table-plus"><?php echo ++$count; ?></td>
									<td><a href="#" data-toggle="modal" data-target="#business_category_update<?php echo $fetch['fld_business_category_id'] ?>"  title="Edit business Category"><i class="fa fa-pencil-square-o text-success" style="font-size: 20px" ></i> </a>

									<a href="business_category_delete.php?fld_business_category_id=<?php echo $fetch['fld_business_category_id'] ?>" onclick="return confirm('Do You Want To Delete Business Category?.')" title="Delete business Category" ><i class="fa fa-trash text-danger" style="font-size: 20px; padding-left: 10px" ></i></a>
									</td>
									<td><?php echo $fetch['fld_business_name'];?></td>
									
									<td><?php echo $fetch['fld_business_category_name'];?></td>
									<td><?php echo $fetch['fld_business_category_created_date'];?></td>
									<td><?php echo $fetch['fld_business_category_modified_date'];?></td>

									<div class="modal fade bs-example-modal-lg" id="business_category_update<?php echo $fetch['fld_business_category_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg modal-dialog-centered">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title" id="myLargeModalLabel">Update Business Category</h4>
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
												</div>

												<?php 

													$abc=mysqli_query($connect,"select * from tbl_business_category where fld_business_category_delete='0' and fld_business_category_id='".$fetch['fld_business_category_id']."'") or die(mysqli_error($connect));
													$view=mysqli_fetch_array($abc);
												?>
												<form method="post" action="business_category_update.php?fld_business_category_id=<?php echo $fetch['fld_business_category_id'] ?>">
													<div class="modal-body">
														
														<div class="form-group row">
															<label class="col-sm-12 col-md-3 col-form-label">Business Type <span class="text-danger">*</span> : </label>
															<div class="col-sm-12 col-md-9">
																<select class="form-control custom-select" name="business_type" id="business_type<?php echo $count; ?>" required="" style="width: 100%">
																	<option value="">Select Business Type</option>
																	<?php
																		$cont=mysqli_query($connect,"select * from tbl_business_type where fld_business_delete ='0' order by fld_business_id desc") or die(mysqli_error($connect));
																		while ($fetch_business_type1=mysqli_fetch_array($cont)) {
																	?>
																	<option value="<?php echo $fetch_business_type1['fld_business_id']; ?>" <?php if($fetch_business_type1['fld_business_id']==$view['fld_business_id']) {echo "selected";} ?>><?php echo $fetch_business_type1['fld_business_name']; ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
														
														<div class="form-group row">
															<label class="col-sm-12 col-md-3 col-form-label">Business Category Name<span class="text-danger">*</span> : </label>
															<div class="col-sm-12 col-md-9">
																<input class="form-control" type="text" name="business_category" id="business_category1" placeholder="Enter Business Category Name" required="" value="<?php echo $view['fld_business_category_name'] ?>" oninput="this.value = this.value.replace(/[^A-Za-z0-9-,&\s]/g, '').replace(/(\..*)\./g, '$1');" style="text-transform: capitalize;">
															</div>
														</div>
													</div>
														
													<div class="modal-footer">
														<input class="btn btn-success" value="Update" type="submit" name="update">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														
													</div>
												</form>
											</div>
										</div>
									</div>
	
													
									
								</tr>
								<?php } ?>
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
<!-- -->
</body>
</html>