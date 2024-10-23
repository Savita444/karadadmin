<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title> Vendor Details Report <?php echo date('d-m-Y'); ?> </title>
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
								<h4>Vendor Details</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item" ria-current="page">Vendor Details</li>
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

           $query="select * from vendor where vendor_status='Approved' and created_at  between '$fromDate' and '$endDate' order by vendor_id desc";

        $row=mysqli_query($connect,$query) or die(mysqli_error($connect));

         if(!empty($fromDate) && !empty($endDate)){
             $query .= " and created_at 
                          between '".$fromDate."' and '".$endDate."' ";
          }
		
	}

	else
    {
    	 $query="select v.*,b.*,c.* from vendor v, tbl_business_type b,tbl_business_category c where v.fld_business_id = b.fld_business_id  and c.fld_business_category_id = v.fld_business_category_id and   vendor_status='Approved' order by vendor_id desc";

    
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
									<th>Company Name</th>
									<th>Business Type</th>
									<th>Business Categry Type</th>
									<th>Owner Name</th>
									<th>Mobile Number</th>
									<th>Email</th>
									<th>Gender</th>
									<th>Profile Photo</th>
									<th>Shop Act Photo</th>
									<th>PAN Card Photo</th>
									<th>Aadhar Card Photo</th>
									<th>Created Date</th>
								<!-- 	<th>Updated Date</th> -->
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
									 <td><?php echo $fetch['company_name'];?></td> 
									 <td><?php echo $fetch['fld_business_name'] ?></td>
									 <td><?php echo $fetch['fld_business_category_name'];?></td>
                                                <td><?php echo $fetch['owner_name'];?></td>
                                                <td><?php echo $fetch['mobile'];?></td>   
                                                <td><?php echo $fetch['email'];?></td>
                                                 
                                                <td><?php echo $fetch['gender'] ?></td> 
                                <td >
												    <div class="hovimg">
												     <p class="d-flex">
													     <span class="pr-3"><a href="https://www.sitepoint.com/community/t/trying-to-show-image-in-popup-box-when-i-hover-over-a-button/232770?u=sama74">
													     <a href="../images/vendor/profile/<?php echo $fetch['fld_vendor_photo']; ?>" Download height="50" width="50"><button type="button" name="download" class="btn btn-primary btn-sm  mt-1 align-center"><i class="fa fa-download" aria-hidden="true"></i></button></a>                               	
													    </a>
													   </span>
													  <img src="../images/vendor/profile/<?php echo $fetch['fld_vendor_photo'];?>" alt="photo" style="width: 50px !important; height:50px !important;">
												    </p>
													<figure>
													  <img src="../images/vendor/profile/<?php echo $fetch['fld_vendor_photo'];?>"  alt="photo">
													</figure>
												  </div>
												</td>

                                                 <td >
												    <div class="hovimg">
												     <p class="d-flex">
													     <span class="pr-3"><a href="https://www.sitepoint.com/community/t/trying-to-show-image-in-popup-box-when-i-hover-over-a-button/232770?u=sama74">
													     <a href="../images/vendor/shopact/<?php echo $fetch['shop_act']; ?>" Download height="50" width="50"><button type="button" name="download" class="btn btn-primary btn-sm  mt-1 align-center"><i class="fa fa-download" aria-hidden="true"></i></button></a>                               	
													    </a>
													   </span>
													  <img src="../images/vendor/shopact/<?php echo $fetch['shop_act'];?>" alt="photo" style="width: 50px !important; height:50px !important;">
												    </p>
													<figure>
													  <img src="../images/vendor/shopact/<?php echo $fetch['shop_act'];?>"  alt="photo">
													</figure>
												  </div>
												</td>
                                             


                                                <td >
												    <div class="hovimg">
												     <p class="d-flex">
													     <span class="pr-3"><a href="https://www.sitepoint.com/community/t/trying-to-show-image-in-popup-box-when-i-hover-over-a-button/232770?u=sama74">
													     <a href="../images/vendor/pancard/<?php echo $fetch['pan_card']; ?>" Download height="50" width="50"><button type="button" name="download" class="btn btn-primary btn-sm  mt-1 align-center"><i class="fa fa-download" aria-hidden="true"></i></button></a>                               	
													    </a>
													   </span>
													  <img src="../images/vendor/pancard/<?php echo $fetch['pan_card'];?>" alt="photo" style="width: 50px !important; height:50px !important;">
												    </p>
													<figure>
													  <img src="../images/vendor/pancard/<?php echo $fetch['pan_card'];?>"  alt="photo">
													</figure>
												  </div>
												</td>


												 <td >
												    <div class="hovimg">
												     <p class="d-flex">
													     <span class="pr-3"><a href="https://www.sitepoint.com/community/t/trying-to-show-image-in-popup-box-when-i-hover-over-a-button/232770?u=sama74">
													     <a href="../images/vendor/aadharcard/<?php echo $fetch['aadhar_card']; ?>" Download height="50" width="50"><button type="button" name="download" class="btn btn-primary btn-sm  mt-1 align-center"><i class="fa fa-download" aria-hidden="true"></i></button></a>                               	
													    </a>
													   </span>
													  <img src="../images/vendor/aadharcard/<?php echo $fetch['aadhar_card'];?>" alt="photo" style="width: 50px !important; height:50px !important;">
												    </p>
													<figure>
													  <img src="../images/vendor/aadharcard/<?php echo $fetch['aadhar_card'];?>"  alt="photo">
													</figure>
												  </div>
												</td>

                                          <!--       
                                                <td><?php //echo $fetch['created_at'] ?></td> -->
                                                <td><?php echo $created_at = date('d F Y', strtotime($fetch['created_at']));?></td>
                                              

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