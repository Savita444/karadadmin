<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>View Service</title>
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
								<h4>Service Details</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Service Details</li>
								</ol>
							</nav>
						</div>

						<div class="col-md-2 col-sm-2">
							<a  href="#" data-toggle="modal" data-target="#service_add" type="button"><button  class="btn btn-primary">Add Service</button></a>
						</div>
						
					</div>
				</div>


				<div class="modal fade bs-example-modal-lg" id="service_add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myLargeModalLabel">Add Service</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>

										<form method="post" id="add_me">
											<div class="modal-body">
												<div class="form-group row">
													<label class="col-sm-12 col-md-3 col-form-label">Business Type<span class="text-danger">*</span> : </label>
													<div class="col-sm-12 col-md-9">
														<select class="form-control custom-select" name="business" id="business" required="">
															<option value="">Select Business Type</option>
															<?php
																$cont=mysqli_query($connect,"select * from business_type") or die(mysqli_error($connect));
																while ($fetch_country=mysqli_fetch_array($cont)) {
															?>
															<option value="<?php echo $fetch_country['business_id']; ?>"><?php echo $fetch_country['business_name']; ?></option>
														<?php } ?>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-md-3 col-form-label">Service Name<span class="text-danger">*</span> : </label>
													<div class="col-sm-12 col-md-9">
														<input class="form-control" type="text" name="service[]" id="service" placeholder="Enter Service Name" required="" onkeyup="titleCase1()"  onchange="titleCase1()" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/(\..*)\./g, '$1');">
														<table  class="table table-hover small-text" id="tb">
											                  <tr class="tr-header">
											                  	<th><a href="javascript:void(0);" style="font-size:18px;" id="addMore" title="Add More Service"><span class="fa fa-plus text-success"></span></a></th>
											                    <th>Service Name</th>
											                  </tr>
											                  <tr>
											                    <td><a href='javascript:void(0);'  class='remove'><span class='fa fa-remove text-danger'></span></a></td>
											                    <td><input type="text" name="service[]" id="service" placeholder="Enter Service Name" class="form-control" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '').replace(/(\..*)\./g, '$1');" style="text-transform: capitalize;"></td>
											                    </tr>                    
					                  					</table>
													</div>
													
													<!-- <div class="col-sm-12 col-md-2"><button type="button" name="add" id="add_input"><img src="add-icon.png"></div> -->
												</div>
											</div>
											<div class="modal-footer">
												<input class="btn btn-success" value="Submit" id="submit" type="submit" name="submit">
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
                                         $service1=$_POST['service'];
                                        // $Service=$_POST['service'];
                                        // $coulmn=array();
                                         foreach ($service1 as $value){
								        $query1=mysqli_query($connect,"select * from service where service_name='".$value."'");
								        $total=mysqli_num_rows($query1);
								        if ($total==1) 
										{
											echo '<script type="text/javascript">'; 
											echo 'alert("Service Is Already Exist");';
											echo "window.location.href = 'service_view.php';";
											echo '</script>'; 
											
										}    
								        else
								        {


	                                        $query="INSERT INTO service(business_id,service_name) VALUES ('$business','".$value."')";
	                                        //echo $query."<br>";
	                                        $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
	                                         if($row)
							                    {
							                      $row=1;
							                    }
	                                        if ($row) 
	                                        {
	                                            echo "<script>";
	                                            echo "alert('Service Added Successfully');";
	                                            echo "window.location.href='service_view.php';";
	                                            echo "</script>";                 
	                                        }
	                                        else
	                                        {
	                                            echo "<script>";
	                                            echo "alert('Error');";
	                                            echo "window.location.href='service_view.php';";
	                                            echo "</script>";
	                                        }
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
									<th class="datatable-nosort">Action</th>
									<th>Business Type</th>
                                    <th>Service</th>
                                    <th>Date</th>
								</tr>
							</thead>
							<tbody>
								<?php 
                                    $count=0; 
                                    $query="select s.*, b.* from service s, business_type b where s.business_id=b.business_id  group by s.service_id  order by s.service_id desc ";
                                    $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
                                    while($fetch=mysqli_fetch_array($row)) {
                                    extract($fetch);

                                ?>
								<tr>
									<td class="table-plus"><?php echo ++$count; ?></td>
									<td><a href="#" data-toggle="modal" data-target="#service_update<?php echo $fetch['service_id'] ?>"  title="Edit Service"><i class="fa fa-pencil-square-o text-success" style="font-size: 20px" ></i> </a>

									<a href="service_delete.php?service_id=<?php echo $fetch['service_id'] ?>" onclick="return confirm('You are sure to delete the Service.')" title="Delete Service" ><i class="fa fa-trash text-danger" style="font-size: 20px; padding-left: 10px" ></i></a>
									</td>
									<td><?php echo $fetch['business_name'];?></td>
									<td><?php echo $fetch['service_name'];?></td>                     
									<td><?php echo $fetch['service_date'];?></td>

<div class="modal fade bs-example-modal-lg" id="service_update<?php echo $fetch['service_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myLargeModalLabel">Update Service</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>

<?php 

	$abc=mysqli_query($connect,"select * from service where service_id='".$fetch['service_id']."'") or die(mysqli_error($connect));
	$view=mysqli_fetch_array($abc);
?>
			<form method="post" action="service_update.php?service_id=<?php echo $fetch['service_id'] ?>">
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-sm-12 col-md-3 col-form-label">Service Name<span class="text-danger">*</span> : </label>
						<div class="col-sm-12 col-md-9">
							<select class="form-control custom-select" name="business1" id="business1" required="">
								<option value="">Select Business Type</option>
								<?php
									$cont=mysqli_query($connect,"select * from business_type") or die(mysqli_error($connect));
									while ($fetch_country=mysqli_fetch_array($cont)) {
								?>
								<option value="<?php echo $fetch_country['business_id']; ?>" <?php if($fetch_country['business_id']==$view['business_id']) {echo "selected";} ?>><?php echo $fetch_country['business_name']; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-12 col-md-3 col-form-label">Service Name<span class="text-danger">*</span> : </label>
						<div class="col-sm-12 col-md-9">
							<input class="form-control" type="text" name="service1" id="service1" placeholder="Enter Service Name" required="" value="<?php echo $view['service_name'] ?>" onkeyup="titleCase2()"  onchange="titleCase2()" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/(\..*)\./g, '$1');" style="text-transform: capitalize;">
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
		var str=document.getElementById("service").value;
   var splitStr = str.toLowerCase().split(' ');
   for (var i = 0; i < splitStr.length; i++) {
       // You do not need to check if i is larger than splitStr length, as your for does that for you
       // Assign it back to the array
       splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);     
   }
   // Directly return the joined string
   document.getElementById("service").value = splitStr.join(' '); 
}

</script>

<script type="text/javascript">
	function titleCase2() {
		var str=document.getElementById("service1").value;
   var splitStr = str.toLowerCase().split(' ');
   for (var i = 0; i < splitStr.length; i++) {
       // You do not need to check if i is larger than splitStr length, as your for does that for you
       // Assign it back to the array
       splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);     
   }
   // Directly return the joined string
   document.getElementById("service1").value = splitStr.join(' '); 
}
</script>

<!-- <script>
        $(document).ready(function() {
            var i = 1;
            $('#add_input').click(function() {
                i++;
                $('#dynamic').append('<div id="row' + i + '"><div class="form-group row"><div class="col-sm-12 col-md-3"></div><div class="col-sm-12 col-md-7"><input class="form-control" type="text" name="service[]" id="service" placeholder="Enter Service Name"></div><br><div class="col-sm-12 col-md-2"><button type="button" name="remove" id="' + i + '" class="btn_remove"><span class="fa fa-remove" aria-hidden="true"></span></button></div></div></div>');
            });
            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });
            $('#submit').click(function() {
                $.ajax({
                    url: "insert.php",
                    method: "POST",
                    data: $('#add_me').serialize(),
                    success: function(data) {
                        alert(data);
                        $('#add_me')[0].reset();
                    }
                });
            });
        });
    </script> -->
<script>
	$(function(){
    $('#addMore').on('click', function() {
              var data = $("#tb tr:eq(1)").clone(true).appendTo("#tb");
              data.find("input").val('');
     });
     $(document).on('click', '.remove', function() {
         var trIndex = $(this).closest("tr").index();
            if(trIndex>1) {
             $(this).closest("tr").remove();
           } else {
             alert("Sorry!! Can't remove first row!");
           }
      });
	});      
</script>
</body>
</html>