<?php include('include/header_session.php'); ?>
<?php //include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
    <title> Payment Details <?php echo date('d-m-Y'); ?> </title>
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
						<div class="col-md-10 col-sm-10">
							<div class="title">
								<h4>Payment Details</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Payment Details</li>
								</ol>
							</nav>
						</div>

						<div class="col-md-2 col-sm-2" align="right">
							<!--<a href="user_add.php"><button class="btn btn-primary">Add User</button></a>-->
							<!-- <a href="javascript:history.back();"><button type="button" class="btn btn-primary" align="right">Back</button></a> -->
						</div>
						
					</div>
				</div>
				
				<!-- Export Datatable start -->
				<?php 
                    $count=0;

                   // $query="select v.*, p.*, up.*, bt.*, bi.*,pt.* from vendor v, tbl_packages p, tbl_business_type bt, tbl_payment up,business_information bi,tbl_product_type pt where bi.business_info_id='".$_GET['business_id']."' and  v.vendor_id=bi.vendor_id and pt.fld_product_type_id=p.fld_product_type_id and bt.fld_business_id=bi.fld_business_id  and bt.fld_business_id=p.fld_business_id  and p.fld_package_id=up.fld_package_id and bi.fld_business_id=bi.fld_business_id and up.business_info_id=bi.business_info_id and up.payment_status='complete' and up.fld_payment_delete='0' ";           

               
                  // $query="select p.*, bi.*, pc.*, bt.*, v.* from tbl_payment p, business_information bi, tbl_packages pc, tbl_business_type bt, vendor v where p.business_info_id=bi.business_info_id and p.fld_package_id=pc.fld_package_id and p.fld_business_id=bt.fld_business_id and v.vendor_id=p.vendor_id and p.fld_payment_delete='0' order by p.fld_payment_id desc ";

                   $query="select v.*, p.*, up.*, bt.*, bi.*,pt.* from vendor v, tbl_packages p, tbl_business_type bt, tbl_payment up,business_information bi,tbl_product_type pt where v.vendor_id=bi.vendor_id and pt.fld_product_type_id=p.fld_product_type_id and bt.fld_business_id=bi.fld_business_id  and bt.fld_business_id=p.fld_business_id  and p.fld_package_id=up.fld_package_id and bi.fld_business_id=bi.fld_business_id and up.business_info_id=bi.business_info_id and up.payment_status='complete' and up.fld_payment_delete='0' ";           


                    $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
                    $fetchname=mysqli_fetch_array($row);
                    
                ?>
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="row">
						<!-- <table class="stripe hover multiple-select-row data-table-export nowrap"> -->
						<table class="stripe hover data-table-export nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Sr No</th>
									<!-- <th>Product Type Name</th> -->
	                                <th>Business Type</th>
									<th>Business Name</th>
									<th>Package Name</th>
									<th>Validity Day</th>
									<th>Amount</th>
                                    <th>Payment Date</th>
                                    <th>Expire Date</th>
								</tr>
							</thead>
							<tbody>
								<?php
    								while($fetch=mysqli_fetch_array($row)) 
    								{
                                    extract($fetch);
                                    ?>
								<tr>
									<td class="table-plus"><?php echo ++$count; ?></td>
									<!-- <td><?php //echo $fetch['fld_product_type_name'];?></td> -->
									<td><?php echo $fetch['fld_business_name'];?></td>
									<td><?php echo $fetch['business_info_name'];?></td>
									<td><?php echo $fetch['fld_package_name'];?></td>
									<td><?php echo $fetch['fld_validity_in_days_number'];?> day</td>

									<td><?php echo $fetch['fld_package_amount'];?></td>
									<td><?php echo $fetch['start_date'];?></td>
									<td><?php echo $fetch['end_date'];?></td>
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
</body>
</html>