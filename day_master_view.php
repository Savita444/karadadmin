<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>View Day Master</title>
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
								<h4>Day Master Details</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="#">Master Table</a></li>
									<li class="breadcrumb-item active" aria-current="page">Day Master Details</li>
								</ol>
							</nav>
						</div>

						<!-- <div class="col-md-2 col-sm-2">
							<a  href="#" data-toggle="modal" data-target="#business_add" type="button"><button  class="btn btn-primary">Add Day Master</button></a>
						</div> -->
						
					</div>
				</div>


				<div class="modal fade bs-example-modal-lg" id="business_add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myLargeModalLabel">Add Day Master</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>

										<form method="post">
											<div class="modal-body">
												<div class="form-group row">
													<label class="col-sm-12 col-md-3 col-form-label">Day<span class="text-danger">*</span> : </label>
													<div class="col-sm-12 col-md-9">
														<input class="form-control" type="text" name="day" id="day" placeholder="Enter Day" required="" onkeyup="titleCase1()"  onchange="titleCase1()" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/(\..*)\./g, '$1');">
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<input class="btn btn-success" value="Submit" type="submit" name="submit">
												<input class="btn btn-danger" value="Reset" type="reset">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												
											</div>
										</form>
									</div>
								</div>
							</div>

		<?php
                                    
                if (isset($_POST['submit'])) 
                {
                    
                    extract($_POST);

                    $Day=$_POST['day'];
                    $coulmn=array();
			        $query1=mysqli_query($connect,"select * from day_master where day_master_name='".$_POST['day']."'");
			        $total=mysqli_num_rows($query1);
			        if ($total==1) 
					{
						echo '<script type="text/javascript">'; 
						echo 'alert("Day Is Already Exist");';
						echo "window.location.href = 'day_master_view.php';";
						echo '</script>'; 
						
					}    
			        else
			        {


                        $query="INSERT INTO day_master(day_master_name) VALUES ('$day')";
                        //echo $query."<br>";
                        $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
                        if ($row) 
                        {
                            echo "<script>";
                            echo "alert('Day Added Successfully');";
                            echo "window.location.href='day_master_view.php';";
                            echo "</script>";                 
                        }
                        else
                        {
                            echo "<script>";
                            echo "alert('Error');";
                            echo "window.location.href='day_master_view.php';";
                            echo "</script>";
                        }
                    }    
                }
            ?>							
				
				
				<!-- Export Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<!-- <h5 class="text-blue">View District</h5> -->
						</div>
					</div>
					<div class="row">
						<!-- <table class="stripe hover multiple-select-row data-table-export nowrap"> -->
						<table class="stripe hover data-table-export nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Sr No</th>
									<!-- <th class="datatable-nosort">Action</th> -->
                                    <th>Day</th>
                                    <th>Date</th>
								</tr>
							</thead>
							<tbody>
								<?php 
                                    $count=0; 
                                    $query="select * from day_master order by day_master_id desc ";
                                    $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
                                    while($fetch=mysqli_fetch_array($row)) {
                                    extract($fetch);

                                ?>
								<tr>
									<td class="table-plus"><?php echo ++$count; ?></td>
									<!-- <td><a href="#" data-toggle="modal" data-target="#business_type_update<?php //echo $fetch['business_id'] ?>"  title="Edit Business Type"><i class="fa fa-pencil-square-o text-success" style="font-size: 20px" ></i> </a>

									<a href="day_master_delete.php?day_master_id=<?php //echo $fetch['day_master_id'] ?>" onclick="return confirm('You are sure to delete the Day.')" title="Delete Business Type" ><i class="fa fa-trash text-danger" style="font-size: 20px; padding-left: 10px" ></i></a>
									</td> -->
									<td><?php echo $fetch['day_master_name'];?></td>                     
									<td><?php echo $fetch['day_master_date'];?></td>

<!-- <div class="modal fade bs-example-modal-lg" id="business_type_update<?php //echo $fetch['business_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myLargeModalLabel">Update Business Type</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div> -->

<?php 

	// $abc=mysqli_query($connect,"select * from business_type where business_id='".$fetch['business_id']."'") or die(mysqli_error($connect));
	// $view=mysqli_fetch_array($abc);
?>
			<!-- <form method="post" action="business_type_update.php?business_id=<?php //echo $fetch['business_id'] ?>">
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-sm-12 col-md-3 col-form-label">Business Type Name<span class="text-danger">*</span> : </label>
						<div class="col-sm-12 col-md-9">
							<input class="form-control" type="text" name="business1" id="business1" placeholder="Enter Business Type Name" required="" value="<?php //echo $view['business_name'] ?>" onkeyup="titleCase2()"  onchange="titleCase2()" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/(\..*)\./g, '$1');" style="text-transform: capitalize;">
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
</div>	 -->
						
		
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
		var str=document.getElementById("day").value;
   var splitStr = str.toLowerCase().split(' ');
   for (var i = 0; i < splitStr.length; i++) {
       // You do not need to check if i is larger than splitStr length, as your for does that for you
       // Assign it back to the array
       splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);     
   }
   // Directly return the joined string
   document.getElementById("day").value = splitStr.join(' '); 
}

</script>

<!-- <script type="text/javascript">
	function titleCase2() {
		var str=document.getElementById("business1").value;
   var splitStr = str.toLowerCase().split(' ');
   for (var i = 0; i < splitStr.length; i++) {
       // You do not need to check if i is larger than splitStr length, as your for does that for you
       // Assign it back to the array
       splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);     
   }
   // Directly return the joined string
   document.getElementById("business1").value = splitStr.join(' '); 
}

</script> -->
</body>
</html>