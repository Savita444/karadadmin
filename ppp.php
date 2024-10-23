<!DOCTYPE html>
<html>
<head>
	<title>View package</title>
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
								<h4>package Details</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="#">Master Table</a></li>
									<li class="breadcrumb-item active" aria-current="page">package Details</li>
								</ol>
							</nav>
						</div>

						<div class="col-md-2 col-sm-2" align="right">
							<a href="package_add.php"><button class="btn btn-primary">Add package</button></a>
						</div>
						
					</div>
				</div>
				
				<!-- Export Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<!-- <h5 class="text-blue">View package</h5> -->
						</div>
					</div>
					<div class="row">
						<!-- <table class="stripe hover multiple-select-row data-table-export nowrap"> -->
						<table class="stripe hover data-table-export nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Sr No</th>
									<th class="datatable-nosort">Action</th>
									<th>business</th>
                                    <th>business_category</th>
                                    <th>District</th>
                                    <th>Taluka</th>
                                    <th>City</th>
                                    <th>package</th>
                                    <th>Created Date</th>
                                    <th>Modified Date</th>
								</tr>
							</thead>
							<tbody>
								<?php 
                                    $count=0; 
                                     $query1="select pt.*,b.*,bc.*,n.*,v.*,p.* from tbl_product_type pt,tbl_business_type b, tbl_business_category bc, tbl_number_of_request_leads n, tbl_validity_in_days v, tbl_packages p where pt.`fld_product_type_id`=p.`fld_product_type_id` and b.`fld_business_id`=bc.`fld_business_id` and b.fld_business_id=p.fld_business_id and n.fld_number_of_request_leads_id=p.fld_number_of_request_leads_id and v.fld_validity_in_days_id=p.fld_validity_in_days_id and p.fld_package_delete='0' group by p.fld_package_id  order by p.fld_package_id desc";
                                    $row1=mysqli_query($connect,$query1) or die(mysqli_error($connect));

                                   // $total_record=mysqli_num_rows($row1);
                                                                        
                                    while($fetch=mysqli_fetch_array($row1)) {

                                    extract($fetch);

                                ?>
								<tr>
									<td class="table-plus"><?php echo ++$count; ?></td>
									<td>
										<!-- <a href="area_update.php" data-toggle="modal" data-target="#area_update<?php //echo $fetch['area_id'] ?>"  title="Edit Area"><i class="fa fa-pencil-square-o text-success" style="font-size: 20px" ></i> </a> -->

										<a href="package_update11.php?package_id=<?php echo $fetch['fld_package_id'] ?>" title="Edit Package" ><i class="fa fa-pencil-square-o text-success" style="font-size: 20px; padding-left: 10px" ></i></a>

										<a href="delete.php?package_id=<?php echo $fetch['package_id'] ?>" onclick="return confirm('You are sure to delete the Package.')" title="Delete Package" ><i class="fa fa-trash text-danger" style="font-size: 20px; padding-left: 10px" ></i></a>
									</td>
									<td><?php echo $fetch['fld_product_type_name'];?></td>
									<td><?php echo $fetch['fld_package_name'];?></td>
									<td><?php echo $fetch['fld_business_name'];?></td>
									
									<td><?php echo $fetch['fld_business_category_name'];?></td> 
									<td><?php echo $fetch['fld_package_amount'];?></td>
									<td><?php echo $fetch['fld_number_of_request_leads_name'];?></td>
									<td><?php echo $fetch['fld_validity_in_days_name'];?></td>
									
									<td><?php echo $fetch['fld_package_created_date'];?></td>
									<td><?php echo $fetch['fld_package_modified_date'];?></td>

									<div class="modal fade bs-example-modal-lg" id="package_update<?php echo $fetch['fld_package_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg modal-dialog-centered">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title" id="myLargeModalLabel">Update package</h4>
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
												</div>

												<?php 

													$abc=mysqli_query($connect,"select * from tbl_package where fld_package_delete='0' and fld_package_id='".$fetch['fld_package_id']."'") or die(mysqli_error($connect));
													$view=mysqli_fetch_array($abc);
												?>
												<form method="post" action="package_update.php?fld_package_id=<?php echo $fetch['fld_package_id'] ?>">
													<div class="modal-body">
													<div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Product Type<span class="text-danger">*</span> :</label>
              <select name="author_id" class="form-control custom-select2 " id="author" required="">
                  <option value="">Select Product Type</option> 
                  <?php
                    $cont=mysqli_query($connect,"select * from tbl_product_type where fld_product_type_delete='0' order by fld_product_type_id desc") or die(mysqli_error($connect));
                    while ($product_type1=mysqli_fetch_array($cont)) {
                  ?>
                  <option value="<?php echo $product_type1['fld_product_type_id']; ?>" <?php if($product_type1['fld_product_type_id']==$fetch['fld_product_type_id']) { echo "selected";} ?> ><?php echo $product_type1['fld_product_type_name']; ?></option>
                  <?php } ?>
                </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label >Book Name <span class="text-danger">*</span> :</label>
              <input type="text" class="form-control" placeholder="Enter Book's Name" name="fld_package_name" required="" oninput="this.value = this.value.replace(/[^0-9a-zA-Z,-&\s]/g, '').replace(/(\..*)\./g, '$1');" style="text-transform: capitalize;" value="<?php echo $fetch['fld_package_name']; ?>">
            </div>
          </div>
        </div>



														<div class="form-group row">
						<label class="col-sm-12 col-md-3 col-form-label">business <span class="text-danger">*</span> : </label>
						<div class="col-sm-12 col-md-9">
							<select class="form-control custom-select" name="business" id="business<?php echo $count; ?>" required="" style="width: 100%">
								<option value="">Select business</option>
								<?php
									$cont=mysqli_query($connect,"select * from tbl_business_type where fld_business_delete ='0' order by fld_business_id desc") or die(mysqli_error($connect));
									while ($fetch_business1=mysqli_fetch_array($cont)) {
								?>
								<option value="<?php echo $fetch_business1['fld_business_id']; ?>" <?php if($fetch_business1['fld_business_id']==$view['fld_business_id']) {echo "selected";} ?>><?php echo $fetch_business1['fld_business_name']; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-12 col-md-3 col-form-label">business_category <span class="text-danger">*</span> : </label>
						<div class="col-sm-12 col-md-9">
							<select class="form-control custom-select" name="business_category" id="business_category<?php echo $count; ?>" required="" style="width: 100%">
								<option value="">Select business_category</option>
								<?php
									$cont11=mysqli_query($connect,"select * from tbl_business_category where fld_business_category_delete ='0' and fld_business_id='".$view['fld_business_id']."' order by fld_business_category_id desc") or die(mysqli_error($connect));
									while ($fetch_business_category11=mysqli_fetch_array($cont11)) {
								?>
								<option value="<?php echo $fetch_business_category11['fld_business_category_id']; ?>" <?php if($fetch_business_category11['fld_business_category_id']==$view['fld_business_category_id']) {echo "selected";} ?>><?php echo $fetch_business_category11['fld_business_category_name']; ?></option>
								<?php } ?>
							</select>
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
<?php  
	$count1=1; 
	while($count1<=$total)
	{
?>
<script type="text/javascript">
  $(document).ready(function(){
    $("select#business<?php echo $count1; ?>").change(function(){
          var t = $("#business<?php echo $count1; ?> option:selected").val();
          alert(t);
          $.ajax({
              type: "POST",
              url: "business_category.php", 
              data: { business : t} 
          }).done(function(data){
              $("#business_category<?php echo $count1; ?>").html(data);
          });
      });
  });
</script>


<?php $count1++; } ?>
</body>
</html>