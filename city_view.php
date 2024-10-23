<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>View City</title>
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
								<h4>City/Village Details</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="#">Master Table</a></li>
									<li class="breadcrumb-item active" aria-current="page">City/Village Details</li>
								</ol>
							</nav>
						</div>

						<div class="col-md-2 col-sm-2" align="right">
							<a href="city_add.php"><button class="btn btn-primary">Add City/Village</button></a>
						</div>
						
					</div>
				</div>
				
				<!-- Export Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<!-- <h5 class="text-blue">View City</h5> -->
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
                                    <th>District</th>
                                    <th>Taluka</th>
                                    <th>City</th>
                                    <th>Created Date</th>
                                    <th>Modified Date</th>
								</tr>
							</thead>
							<tbody>
								<?php 
                                    $count=0; 
                                    $query="select cr.*, s.*,d.*,t.*,c.* from tbl_country cr, tbl_state s, tbl_district d,tbl_taluka t, tbl_city c where cr.fld_country_id=s.fld_country_id and cr.fld_country_id=d.fld_country_id and cr.fld_country_id=t.fld_country_id and cr.fld_country_id=c.fld_country_id and s.fld_state_id=d.fld_state_id and s.fld_state_id=c.fld_state_id and                                     s.fld_state_id=t.fld_state_id and                                     d.fld_state_id=t.fld_state_id and                                     d.fld_state_id=c.fld_state_id and                                     t.fld_state_id=c.fld_state_id and d.fld_district_id=t.fld_district_id and d.fld_district_id=c.fld_district_id and t.fld_district_id=c.fld_district_id and t.fld_taluka_id=c.fld_taluka_id and cr.fld_country_delete='0' and s.fld_state_delete='0' and d.fld_district_delete='0' and t.fld_taluka_delete='0' and c.fld_city_delete='0' group by c.fld_city_id  order by c.fld_city_id desc ";
                                    $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
                                    $total=mysqli_num_rows($row);
                                    while($fetch=mysqli_fetch_array($row)) {

                                    extract($fetch);

                                ?>
								<tr>
									<td class="table-plus"><?php echo ++$count; ?></td>
									<td><a href="#" data-toggle="modal" data-target="#city_update<?php echo $fetch['fld_city_id'] ?>"  title="Edit City"><i class="fa fa-pencil-square-o text-success" style="font-size: 20px" ></i> </a>

									<a href="city_delete.php?fld_city_id=<?php echo $fetch['fld_city_id'] ?>" onclick="return confirm('Do You Want To Delete City?.')" title="Delete City" ><i class="fa fa-trash text-danger" style="font-size: 20px; padding-left: 10px" ></i></a>
									</td>
									<td><?php echo $fetch['fld_country_name'];?></td>
									<td><?php echo $fetch['fld_state_name'];?></td>
									<td><?php echo $fetch['fld_district_name'];?></td>
									<td><?php echo $fetch['fld_taluka_name'];?></td>
									<td><?php echo $fetch['fld_city_name'];?></td>
									<td><?php echo $fetch['fld_city_created_date'];?></td>
									<td><?php echo $fetch['fld_city_modified_date'];?></td>

<div class="modal fade bs-example-modal-lg" id="city_update<?php echo $fetch['fld_city_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myLargeModalLabel">Update City</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>

			<?php 

				$abc=mysqli_query($connect,"select * from tbl_city where fld_city_delete='0' and fld_city_id='".$fetch['fld_city_id']."'") or die(mysqli_error($connect));
				$view=mysqli_fetch_array($abc);
			?>
			<form method="post" action="city_update.php?fld_city_id=<?php echo $fetch['fld_city_id'] ?>">
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-sm-12 col-md-3 col-form-label">Country <span class="text-danger">*</span> : </label>
						<div class="col-sm-12 col-md-9">
							<select class="form-control custom-select" name="country" id="country<?php echo $count; ?>" required="" style="width: 100%">
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
						<label class="col-sm-12 col-md-3 col-form-label">State <span class="text-danger">*</span> : </label>
						<div class="col-sm-12 col-md-9">
							<select class="form-control custom-select" name="state" id="state<?php echo $count; ?>" required="" style="width: 100%">
								<option value="">Select State</option>
								<?php
									$cont11=mysqli_query($connect,"select * from tbl_state where fld_state_delete ='0' and fld_country_id='".$view['fld_country_id']."' order by fld_state_id desc") or die(mysqli_error($connect));
									while ($fetch_state11=mysqli_fetch_array($cont11)) {
								?>
								<option value="<?php echo $fetch_state11['fld_state_id']; ?>" <?php if($fetch_state11['fld_state_id']==$view['fld_state_id']) {echo "selected";} ?>><?php echo $fetch_state11['fld_state_name']; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
		              <label class="col-sm-12 col-md-3 col-form-label">District <span class="text-danger">*</span> : </label>
		              <div class="col-sm-12 col-md-9">
		                <select name="district" class="form-control custom-select" id="district<?php echo $count; ?>" required="" style="width: 100%">
		                  <option value="">Select District</option>
		                  <?php
		                      
		                      $query1=mysqli_query($connect,"select * from tbl_district where fld_district_delete='0' and fld_state_id='".$view['fld_state_id']."' order by fld_district_id desc");
		                      while($row1=mysqli_fetch_assoc($query1)){
		                        extract($row1);

		                    ?>
		                  <option value="<?php echo $row1['fld_district_id'];?>" <?php if($row1['fld_district_id']==$view['fld_district_id']) {echo "selected";} ?>><?php echo $row1['fld_district_name'];?></option>
		                  <?php  }?>
		                </select>
		              </div>
		            </div>
		            <div class="form-group row">
		              <label class="col-sm-12 col-md-3 col-form-label">Taluka <span class="text-danger">*</span> : </label>
		              <div class="col-sm-12 col-md-9">
		                <select name="taluka" class="form-control custom-select" id="taluka<?php echo $count; ?>" required="" style="width: 100%">
		                  <option value="">Select Taluka</option>
		                  <?php
							$query11=mysqli_query($connect,"select * from tbl_taluka where fld_taluka_delete='0' and fld_district_id='".$view['fld_district_id']."' order by fld_taluka_id desc");
		                      while($row11=mysqli_fetch_assoc($query11)){
		                        extract($row11);

		                    ?>
		                  <option value="<?php echo $row11['fld_taluka_id'];?>" <?php if($row11['fld_taluka_id']==$view['fld_taluka_id']) {echo "selected";} ?>><?php echo $row11['fld_taluka_name'];?></option>
		                  <?php  }?>
		                </select>
		              </div>
		            </div>
					<div class="form-group row">
						<label class="col-sm-12 col-md-3 col-form-label">City Name<span class="text-danger">*</span> : </label>
						<div class="col-sm-12 col-md-9">
							<input class="form-control" type="text" name="city" id="city1" placeholder="Enter City Name" required="" value="<?php echo $view['fld_city_name'] ?>" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '').replace(/(\..*)\./g, '$1');" style="text-transform: capitalize;">
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
    $("select#country<?php echo $count1; ?>").change(function(){
          var t = $("#country<?php echo $count1; ?> option:selected").val();
          // alert(t);
          $.ajax({
              type: "POST",
              url: "state.php", 
              data: { country : t} 
          }).done(function(data){
              $("#state<?php echo $count1; ?>").html(data);
          });
      });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("select#state<?php echo $count1; ?>").change(function(){
          var t = $("#state<?php echo $count1; ?> option:selected").val();
          // alert(t);
          $.ajax({
              type: "POST",
              url: "district.php", 
              data: { state : t} 
          }).done(function(data){
              $("#district<?php echo $count1; ?>").html(data);
          });
      });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("select#district<?php echo $count1; ?>").change(function(){
          var t = $("#district<?php echo $count1; ?> option:selected").val();
          // alert(t);
          $.ajax({
              type: "POST",
              url: "taluka.php", 
              data: { district : t} 
          }).done(function(data){
              $("#taluka<?php echo $count1; ?>").html(data);
          });
      });
  });
</script>
<?php $count1++; } ?>
</body>
</html>