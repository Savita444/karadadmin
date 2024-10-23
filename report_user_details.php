<?php include('include/header_session.php'); ?>
 <!DOCTYPE html>
<html>
<head>
    <title> User Details Report <?php echo date('d-m-Y'); ?> </title>
	<?php include('include/head.php'); ?>
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
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>User Details</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item" ria-current="page">User Details</li>
									<!-- <li class="breadcrumb-item active" aria-current="page">View Slider Images</li> -->
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
<?php 

if(isset($_POST['submit']))
	{
		extract($_POST);
          $fromDate = $_POST['fromDate'];
          $endDate = $_POST['endDate'];

           $query="select * from user where user_created_date between '$fromDate' and '$endDate' order by user_id desc";

        $row=mysqli_query($connect,$query) or die(mysqli_error($connect));

         if(!empty($fromDate) && !empty($endDate)){
             $query .= " and user_created_date 
                          between '".$fromDate."' and '".$endDate."' ";
          }
		
	}

	else
    {
    	 $query="select * from user where user_id";

    
    	   $row=mysqli_query($connect,$query)or die(mysqli_error($connect));

     }

 ?>

				<!-- Export Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<!-- <h5 class="text-blue">Data Table with Export Buttons</h5> -->
						</div>
					</div>
					
 <form method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-sm-6 col-md-6">
			<div class="form-group">
				<label>From Date<span class="text-danger">*</span> :</label>
				
				<input type="date" class="form-control" name='fromDate' value='<?php if(isset($_POST['fromDate'])) echo $_POST['fromDate']; ?>' required/>
			</div>
		</div>
		<div class="col-sm-6 col-md-6">
			<div class="form-group">
				<label>To Date<span class="text-danger">*</span> :</label>
	              	<input type="date" class="form-control" name='endDate' value='<?php if(isset($_POST['endDate'])) echo $_POST['endDate']; ?>' required/>
			</div>
		</div>		
	</div>
    <div class="form-group row">				            
        <div class="col-sm-12 col-md-12">			              	
      		<center>
      			<input class="btn btn-success" value="Submit" type="submit" name="submit">
        		<!--<input class="btn btn-danger" value="Reset" type="reset">-->
        	</center>
      	</div>
    </div>
 
 <div class="row">
						<!-- <table class="stripe hover multiple-select-row data-table-export nowrap"> -->
						<table class="stripe hover data-table-export nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Sr No</th>
									<!-- <th class="datatable-nosort">Action</th> -->
									<th>User Name</th>
									<th>User Email</th>
									<th>User Mobile</th>
									<th>User Created Date</th>
								</tr>
							</thead>
							<tbody>
								<?php 
                                    $count=0; 
                                    while($fetch=mysqli_fetch_array($row)) {

                                    extract($fetch);


                                ?>
							<tr>
									<td class="table-plus"><?php echo ++$count; ?></td>
									 <td><?php echo $fetch['user_name'];?></td> 
                                                <td><?php echo $fetch['user_email'];?></td>
                                                <td><?php echo $fetch['user_mobile'];?></td>   
                                               <!--  <td><?php //echo $fetch['user_created_date'];?></td> -->
                                             <td><?php echo $user_created_date = date('d F Y', strtotime($fetch['user_created_date']));?></td>
                                              

								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
</form>
				</div>
				
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
		            {
		                extend: 'pdfHtml5',
		                orientation: 'landscape',
		                pageSize: 'LEGAL'
		            },
		            {
		            	extend: 'csvHtml5'
		            },
		            {
		            	extend: 'copyHtml5'
		            },
		             {
		            	extend: 'print'
		            }
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