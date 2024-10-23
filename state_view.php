<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>View State</title>
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
						<div class="col-md-10 col-sm-10">
							<div class="title">
								<h4>State Details</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="#">Master Table</a></li>
									<li class="breadcrumb-item active" aria-current="page">State Details</li>
								</ol>
							</nav>
						</div>

						<div class="col-md-2 col-sm-2" align="right">
							<a  href="state_add.php" ><button  class="btn btn-primary">Add State</button></a>
						</div>
						
					</div>
				</div>

				
				<!-- Export Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<!-- <h5 class="text-blue">View State</h5> -->
						</div>
					</div>
					<div class="row">
						<!-- <table class="stripe hover multiple-select-row data-table-export nowrap"> -->
						<table class="stripe hover data-table-export nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Sr No</th>
									<th class="datatable-nosort">Action</th>
									<th>Country</th>
                                    <th>State</th>
                                    <th>Created Date</th>
                                    <th>Modified Date</th>
								</tr>
							</thead>
							<tbody>
								<?php 
                                    $count=0; 
                          $query="select c.*,s.* from tbl_country c, tbl_state s where  c.fld_country_id=s.fld_country_id and c.fld_country_delete='0' and s.fld_state_delete='0' group by s.fld_state_id order by s.fld_state_id desc ";

                                    $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
                                    
                                    while($fetch=mysqli_fetch_array($row)) {

                                    extract($fetch);

                                ?>
								<tr>
									<td class="table-plus"><?php echo ++$count; ?></td>
									<td><a href="#" data-toggle="modal" data-target="#state_update<?php echo $fetch['fld_state_id'] ?>"  title="Edit State"><i class="fa fa-pencil-square-o text-success" style="font-size: 20px" ></i> </a>

									<a href="state_delete.php?fld_state_id=<?php echo $fetch['fld_state_id'] ?>" onclick="return confirm('Do You Want To Delete State?')" title="Delete State" ><i class="fa fa-trash text-danger" style="font-size: 20px; padding-left: 10px" ></i></a>
									</td>
									<td><?php echo $fetch['fld_country_name'];?></td>
									<td><?php echo $fetch['fld_state_name'];?></td>                     
									<td><?php echo $fetch['fld_state_created_date'];?></td>
									<td><?php echo $fetch['fld_state_modified_date'];?></td>

<div class="modal fade bs-example-modal-lg" id="state_update<?php echo $fetch['fld_state_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myLargeModalLabel">Update State</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>

<?php 

	$abc=mysqli_query($connect,"select * from tbl_state where fld_state_id='".$fetch['fld_state_id']."'") or die(mysqli_error($connect));
	$view=mysqli_fetch_array($abc);
?>
										<form method="post" action="state_update.php?state_id=<?php echo $fetch['fld_state_id'] ?>">
											<div class="modal-body">

 <div class="form-group row">
	<label class="col-sm-12 col-md-3 col-form-label">Country <span class="text-danger">*</span> : </label>
	<div class="col-sm-12 col-md-9">
		<select class="form-control custom-select" name="country" id="country" required="">
			<option value="">Select Country</option>
			<?php
				$cont=mysqli_query($connect,"select * from tbl_country where fld_country_delete ='0' order by fld_country_id desc") or die(mysqli_error($connect));
				while ($fetch_country1=mysqli_fetch_array($cont)) {
			?>
			<option value="<?php echo $fetch_country1['fld_country_id']; ?>" <?php if($fetch_country1['fld_country_id']==$view['fld_country_id']) {echo "selected";} ?>><?php echo $fetch_country1['fld_country_name']; ?></option>
			<?php } ?>
		</select>
	</div>
</div>



												<div class="form-group row">
													<label class="col-sm-12 col-md-3 col-form-label">State Name<span class="text-danger">*</span> : </label>
													<div class="col-sm-12 col-md-9">
														<input class="form-control" type="text" name="state" id="state1" placeholder="Enter State Name" required="" value="<?php echo $view['fld_state_name'] ?>" onkeyup="titleCase2()" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/(\..*)\./g, '$1');" style="text-transform: capitalize;">
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

	<script type="text/javascript">
	function titleCase1() {
		var str=document.getElementById("state").value;
   var splitStr = str.toLowerCase().split(' ');
   for (var i = 0; i < splitStr.length; i++) {
       // You do not need to check if i is larger than splitStr length, as your for does that for you
       // Assign it back to the array
       splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);     
   }
   // Directly return the joined string
   document.getElementById("state").value = splitStr.join(' '); 
}

</script>

<script type="text/javascript">
	function titleCase2() {
		var str=document.getElementById("state1").value;
   var splitStr = str.toLowerCase().split(' ');
   for (var i = 0; i < splitStr.length; i++) {
       // You do not need to check if i is larger than splitStr length, as your for does that for you
       // Assign it back to the array
       splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);     
   }
   // Directly return the joined string
   document.getElementById("state1").value = splitStr.join(' '); 
}

</script>

</body>
</html>