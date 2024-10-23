<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>View business Sub-subcategory</title>
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
						<div class="col-md-8 col-sm-8">
							<div class="title">
								<h4>Business Sub-subcategory Details</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="#">Master Table</a></li>
									<li class="breadcrumb-item active" aria-current="page">Business Sub-subcategory Details</li>
								</ol>
							</nav>
						</div>

						<div class="col-md-4 col-sm-4" align="right">
							<a href="business_subsubcategory_add.php"><button class="btn btn-primary">Add Business Sub-subcategory</button></a>
						</div>
						
					</div>
				</div>
				
				<!-- Export Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<!-- <h5 class="text-blue">View business Sub-subcategory</h5> -->
						</div>
					</div>
					<div class="row">
						<!-- <table class="stripe hover multiple-select-row data-table-export nowrap"> -->
						<table class="stripe hover data-table-export nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Sr No</th>
									<th class="datatable-nosort">Action</th>
                                    <th>Business <br>Type</th>
                                    <th>Business <br>Category</th>
                                    <th>Business <br>Subategory</th>
                                    <th>Business <br>Sub-subcategory</th>
                                    <th>Created <br>Date</th>
                                    <th>Modified <br>Date</th>
								</tr>
							</thead>
							<tbody>
								<?php 
                                    $count=0; 
                                    $query="select s.*,t.*,c.*,a.* from tbl_business_type s,tbl_business_category t, tbl_business_subcategory c,tbl_business_subsubcategory a where  s.fld_business_id=c.fld_business_id and s.fld_business_id=t.fld_business_id and s.fld_business_id=a.fld_business_id and  t.fld_business_id=c.fld_business_id and t.fld_business_id=a.fld_business_id and c.fld_business_id=a.fld_business_id and  t.fld_business_category_id=c.fld_business_category_id and t.fld_business_category_id=a.fld_business_category_id and c.fld_business_category_id=a.fld_business_category_id and c.fld_business_subcategory_id=a.fld_business_subcategory_id and s.fld_business_delete='0' and  t.fld_business_category_delete='0' and c.fld_business_subcategory_delete='0' and a.fld_business_subsubcategory_delete='0' group by a.fld_business_subsubcategory_id  order by a.fld_business_subsubcategory_id desc";
                                    $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
                                    $total=mysqli_num_rows($row);
                                    while($fetch=mysqli_fetch_array($row)) {

                                    extract($fetch);

                                ?>
								<tr>
									<td class="table-plus"><?php echo ++$count; ?></td>
									<td><a href="#" data-toggle="modal" data-target="#business_subsubcategory_update<?php echo $fetch['fld_business_subsubcategory_id'] ?>"  title="Edit business Sub-subcategory"><i class="fa fa-pencil-square-o text-success" style="font-size: 20px" ></i> </a>

									<a href="business_subsubcategory_delete.php?fld_business_subsubcategory_id=<?php echo $fetch['fld_business_subsubcategory_id'] ?>" onclick="return confirm('Do You Want To Delete Business Sub-subcategory?')" title="Delete business Sub-subcategory" ><i class="fa fa-trash text-danger" style="font-size: 20px; padding-left: 10px" ></i></a>
									</td>
									<td><?php echo $fetch['fld_business_name'];?></td>
									<td><?php echo $fetch['fld_business_category_name'];?></td>
									<td><?php echo $fetch['fld_business_subcategory_name'];?></td>
									<td><?php echo $fetch['fld_business_subsubcategory_name'];?></td>
									<td><?php echo $fetch['fld_business_subsubcategory_created_date'];?></td>
									<td><?php echo $fetch['fld_business_subsubcategory_modified_date'];?></td>

									<div class="modal fade bs-example-modal-lg" id="business_subsubcategory_update<?php echo $fetch['fld_business_subsubcategory_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg modal-dialog-centered">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title" id="myLargeModalLabel">Update business Sub-subcategory</h4>
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
												</div>

												<?php 

													$abc=mysqli_query($connect,"select * from tbl_business_subsubcategory where fld_business_subsubcategory_delete='0' and fld_business_subsubcategory_id='".$fetch['fld_business_subsubcategory_id']."'") or die(mysqli_error($connect));
													$view=mysqli_fetch_array($abc);
												?>
												<form method="post" action="business_subsubcategory_update.php?fld_business_subsubcategory_id=<?php echo $fetch['fld_business_subsubcategory_id'] ?>">
													<div class="modal-body">
														
														<div class="form-group row">
															<label class="col-sm-12 col-md-3 col-form-label">Business Type <span class="text-danger">*</span> : </label>
															<div class="col-sm-12 col-md-9">
																<select class="form-control custom-select" name="business_type" id="business_type<?php echo $count; ?>" required="" style="width: 100%">
																	<option value="">Select business Type</option>
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
											              <label class="col-sm-12 col-md-3 col-form-label">Business Category <span class="text-danger">*</span> : </label>
											              <div class="col-sm-12 col-md-9">
											                <select name="business_category" class="form-control custom-select" id="business_category<?php echo $count; ?>" required="" style="width: 100%">
											                  <option value="">Select Business Category</option>
											                  <?php
																$query11=mysqli_query($connect,"select * from tbl_business_category where fld_business_category_delete='0'  order by fld_business_category_id desc");
											                      while($row11=mysqli_fetch_assoc($query11)){
											                        extract($row11);

											                    ?>
											                  <option value="<?php echo $row11['fld_business_category_id'];?>" <?php if($row11['fld_business_category_id']==$view['fld_business_category_id']) {echo "selected";} ?>><?php echo $row11['fld_business_category_name'];?></option>
											                  <?php  }?>
											                </select>
											              </div>
											            </div>
											            <div class="form-group row">
											              <label class="col-sm-12 col-md-3 col-form-label">Business Subcategory <span class="text-danger">*</span> : </label>
											              <div class="col-sm-12 col-md-9">
											                <select name="business_subcategory" class="form-control custom-select" id="business_subcategory<?php echo $count; ?>" required="" style="width: 100%">
											                  <option value="">Select business Subcategory</option>
											                  <?php
																$query_business_subcategory=mysqli_query($connect,"select * from tbl_business_subcategory where fld_business_subcategory_delete='0' and fld_business_category_id='".$view['fld_business_category_id']."' order by fld_business_subcategory_id desc");
											                      while($row_business_subcategory=mysqli_fetch_assoc($query_business_subcategory)){
											                        extract($row_business_subcategory);

											                    ?>
											                  <option value="<?php echo $row_business_subcategory['fld_business_subcategory_id'];?>" <?php if($row_business_subcategory['fld_business_subcategory_id']==$view['fld_business_subcategory_id']) {echo "selected";} ?>><?php echo $row_business_subcategory['fld_business_subcategory_name'];?></option>
											                  <?php  }?>
											                </select>
											              </div>
											            </div>
														<div class="form-group row">
															<label class="col-sm-12 col-md-3 col-form-label">Business Sub-subcategory Name<span class="text-danger">*</span> : </label>
															<div class="col-sm-12 col-md-9">
																<input class="form-control" type="text" name="business_subsubcategory" id="business_subsubcategory1" placeholder="Enter Business Sub-subcategory Name" required="" value="<?php echo $view['fld_business_subsubcategory_name'] ?>" oninput="this.value = this.value.replace(/[^A-Za-z0-9-,&\s]/g, '').replace(/(\..*)\./g, '$1');" style="text-transform: capitalize;">
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
<?php  
	$count1=1; 
	while($count1<=$total)
	{
?>
<script type="text/javascript">
  $(document).ready(function(){
    $("select#business_type<?php echo $count1; ?>").change(function(){
          var t = $("#business_type<?php echo $count1; ?> option:selected").val();
          // alert(t);
          $.ajax({
              type: "POST",
              url: "business_category.php", 
              data: { business_type : t} 
          }).done(function(data){
              $("#business_category<?php echo $count1; ?>").html(data);
          });
      });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $("select#business_category<?php echo $count1; ?>").change(function(){
          var t = $("#business_category<?php echo $count1; ?> option:selected").val();
          // alert(t);
          $.ajax({
              type: "POST",
              url: "business_subcategory.php", 
              data: { business_category : t} 
          }).done(function(data){
              $("#business_subcategory<?php echo $count1; ?>").html(data);
          });
      });
  });
</script>
<?php $count1++; } ?>
</body>
</html>