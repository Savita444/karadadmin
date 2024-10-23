<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title> Vendor Leads Report <?php echo date('d-m-Y'); ?> </title>
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
								<h4>Leads Per Vendor </h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item" ria-current="page">Leads Per Vendor</li>
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
             $query="select us.*, u.*,bi.*, v.* from tbl_user_issued_services us, user u, business_information bi, vendor v where v.vendor_id=us.vendor_id and us.fld_service_issuedorreturned='1' and us.user_id= u.user_id and us.business_info_id=bi.business_info_id ";

            $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
            
        if((isset($_POST['fld_product_type_id'])) && ($_POST['fld_product_type_id']!="") )
		{
			$query .=" and bi.fld_product_type_id='".$_POST['fld_product_type_id']."'";
		}

        if((isset($_POST['package'])) && ($_POST['package']!="") )
		{
			$query .=" and bi.fld_package_id='".$_POST['package']."'";
		}
        if((isset($_POST['fld_business_id'])) && ($_POST['fld_business_id']!="") )
		{
			$query .=" and bi.fld_business_id='".$_POST['fld_business_id']."'";
		}
		if((isset($_POST['category'])) && ($_POST['category']!="") )
		{
			$query .=" and bi.fld_business_category_id='".$_POST['category']."'";
		}
		if((isset($_POST['business'])) && ($_POST['business']!="") )
		{
			$query .=" and bi.business_info_id='".$_POST['business']."'";
		}

  //         if((isset($_POST['status'])) && ($_POST['status']!="") )
		// {
		// 	$query .=" and us.fld_user_issued_servicesApp IN (SELECT fld_user_issued_servicesApp FROM tbl_user_issued_services where us.status='".$_POST['status']."')";
		// }

		$query.=' group by us.fld_user_issued_servicesApp order by us.fld_user_issued_servicesApp desc';
	// echo $query; exit();	
	}

	else
    {
    	 $query="select us.*, u.*,bi.*, v.* from tbl_user_issued_services us, user u, business_information bi, vendor v where v.vendor_id=us.vendor_id and us.fld_service_issuedorreturned='1' and us.user_id= u.user_id and us.business_info_id=bi.business_info_id order by us.fld_user_issued_servicesApp";
// echo $query; exit();
    	  

     }
      $row=mysqli_query($connect,$query)or die(mysqli_error($connect));

 ?>

				<!-- Export Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<!-- <h5 class="text-blue">Data Table with Export Buttons</h5> -->
						</div>
					</div>
					
 <form method="post" enctype="multipart/form-data">
 <div class="form-group row">
              <div class="col-md-6">
              <label class="col-form-label">Product Type : </label>
                 <select name="fld_product_type_id" class="form-control custom-select2 " id="product_type" >
                  <option value="">Select Product Type</option> 
                  <?php
                    $cont=mysqli_query($connect,"select * from tbl_product_type where fld_product_type_delete='0' order by fld_product_type_id desc") or die(mysqli_error($connect));
                    while ($fetch_business_type=mysqli_fetch_array($cont)) {

                    	if(isset($_POST['submit']))
                    	{
                    ?>
                    		<option value="<?php echo $fetch_business_type['fld_product_type_id']; ?>"  <?php if($fetch_business_type['fld_product_type_id']==$_POST['fld_product_type_id']) { echo "selected";} ?>><?php echo $fetch_business_type['fld_product_type_name']; ?></option>
                   	<?php
                    	}
                    	else
                    	{
	                ?>
	                		<option value="<?php echo $fetch_business_type['fld_product_type_id']; ?>" ><?php echo $fetch_business_type['fld_product_type_name']; ?></option>
	            	<?php } ?>
						
                 
                  
                  <?php } ?>
                </select>





              </div>
              <div class="col-md-6">
              <label>Package Name :</label>
	              	<select name="package" class="form-control custom-select2" id="package" >
                  <option value="">Select Package Name</option>
                  <?php
          $yetru="select * from tbl_packages where fld_package_delete ='0' ";
          if(isset($_POST['submit']))
          {
            if(isset($_POST['package']) && ($_POST['package']!=""))
              {
                $yetru .=" and fld_product_type_id='".$_POST['fld_product_type_id']."'";

              }           
          }
          $yetru .=" order by fld_package_id desc";
                    $cont=mysqli_query($connect,$yetru) or die(mysqli_error($connect));


                    while ($fetch_product_subcategory1=mysqli_fetch_array($cont)) {
                      if(isset($_POST['submit']))
                      {
                    ?>
                        <option value="<?php echo $fetch_product_subcategory1['fld_package_id']; ?>"  <?php if($fetch_product_subcategory1['fld_package_id']==$_POST['package']) { echo "selected";} ?>><?php echo $fetch_product_subcategory1['fld_package_name']; ?></option>
                    <?php
                      }
                      else
                      {
                  ?>
                       <option value="<?php echo $fetch_product_subcategory1['fld_package_id']; ?>" ><?php echo $fetch_product_subcategory1['fld_package_name']; ?></option>
                <?php } ?>
            ?>
                  
                  <?php } ?>                 
              </select>
                </div>
            </div>
              <div class="form-group row">
                <div class="col-md-6">
              <label class="col-form-label">Business Type : </label>
              <select name="fld_business_id" class="form-control custom-select2 " id="business_type" >
                  <option value="">Select Business Type</option> 
                  <?php
                    $cont=mysqli_query($connect,"select * from tbl_business_type where fld_business_delete ='0' order by fld_business_id desc") or die(mysqli_error($connect));
                    while ($fetch_business_type=mysqli_fetch_array($cont)) {

                    	if(isset($_POST['submit']))
                    	{
                    ?>
                    		<option value="<?php echo $fetch_business_type['fld_business_id']; ?>"  <?php if($fetch_business_type['fld_business_id']==$_POST['fld_business_id']) { echo "selected";} ?>><?php echo $fetch_business_type['fld_business_name']; ?></option>
                   	<?php
                    	}
                    	else
                    	{
	                ?>
	                		<option value="<?php echo $fetch_business_type['fld_business_id']; ?>" ><?php echo $fetch_business_type['fld_business_name']; ?></option>
	            	<?php } ?>
						
                 
                  
                  <?php } ?>
                </select>









              </div>
              <div class="col-md-6">
              <label class="col-form-label">Business Category: </label>
               <select name="fld_business_category_id" class="form-control custom-select2 " id="business_category" >
               <option value="">Select Business Category</option>
                  <?php
          $yetru="select * from tbl_business_category where  fld_business_category_delete ='0' ";
          if(isset($_POST['submit']))
          {
            if(isset($_POST['category']) && ($_POST['category']!=""))
              {
                $yetru .=" and fld_business_id='".$_POST['fld_business_id']."'";

              }           
          }
          $yetru .=" order by fld_business_category_id desc";
                    $cont=mysqli_query($connect,$yetru) or die(mysqli_error($connect));


                    while ($fetch_product_subcategory1=mysqli_fetch_array($cont)) {
                      if(isset($_POST['submit']))
                      {
                    ?>
                        <option value="<?php echo $fetch_product_subcategory1['fld_business_category_id']; ?>"  <?php if($fetch_product_subcategory1['fld_business_category_id']==$_POST['package']) { echo "selected";} ?>><?php echo $fetch_product_subcategory1['fld_business_category_name']; ?></option>
                    <?php
                      }
                      else
                      {
                  ?>
                       <option value="<?php echo $fetch_product_subcategory1['fld_business_category_id']; ?>" ><?php echo $fetch_product_subcategory1['fld_business_category_name']; ?></option>
                <?php } ?>
            ?>
                  
                  <?php } ?>    
          </select>
              </div>
            </div>
	<div class="row">
		<div class="col-sm-6 col-md-6">
			<div class="form-group">
				<label>Business Name List :</label>
             <select name="business_info_id" class="form-control custom-select2 " id="business" >
                  <option value="">Select Business Name</option>
                  <?php
          $yetru="select * from business_information where fld_business_delete ='0' ";
          if(isset($_POST['submit']))
          {
            if(isset($_POST['business']) && ($_POST['business']!=""))
              {
                $yetru .=" and fld_business_category_id='".$_POST['fld_business_category_id']."'";

              }           
          }
          $yetru .=" order by business_info_id desc";
                    $cont=mysqli_query($connect,$yetru) or die(mysqli_error($connect));


                    while ($fetch_product_subcategory1=mysqli_fetch_array($cont)) {
                      if(isset($_POST['submit']))
                      {
                    ?>
                        <option value="<?php echo $fetch_product_subcategory1['business_info_id']; ?>"  <?php if($fetch_product_subcategory1['business_info_id']==$_POST['package']) { echo "selected";} ?>><?php echo $fetch_product_subcategory1['business_info_name']; ?></option>
                    <?php
                      }
                      else
                      {
                  ?>
                       <option value="<?php echo $fetch_product_subcategory1['business_info_id']; ?>" ><?php echo $fetch_product_subcategory1['business_info_name']; ?></option>
                <?php } ?>
            ?>
                  
                  <?php } ?>    
          </select>

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
						<table class="stripe hover multiple-select-row data-table-export nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort" >Sr. No</th>
								
									<th>Status</th>
									<th>User Name</th>
									<th>User Mobile <br> Number</th>
									<th>Booking Slot</th>
									<th>Business<br>Name</th>
									<th>Booking Date</th>
								</tr>
							</thead>
							<tbody>
			                <?php
			                $count=1;
			                while ($fetch=mysqli_fetch_array($row))
			                {
		                		extract($fetch);
			                     
			                ?>
			                 	<tr>
			             <td><?php echo $count++;  ?></td>			                 		
			             <td><?php echo $fetch['status'];?></td> 
                         <td><?php echo $fetch['user_name']; ?></td> 
			             <td><?php echo $fetch['user_mobile']; ?></td>  
			             <td>     
                            <?php
                              if($fetch['fld_actual_booking_slot'] == NULL)
                               {
                            ?>
                               <?php echo"-"; ?>
                              <?php
                               }
                              else{
                               $queryLandmark="select * from tbl_user_issued_services  where fld_user_issued_servicesApp";
                               $selland=mysqli_query($connect,$queryLandmark) or die(mysqli_error($connect));
                               $fetchLandmark=mysqli_fetch_array($selland);
                                extract($fetchLandmark);
                              ?>
                              <?php echo $fetch['fld_actual_booking_slot'];?>
                               <?php
                                   }
                               ?>
          			    </td>
			             <td><?php echo $fetch['business_info_name']; ?></td>
			             <td><?php echo $fetch['fld_service_requested_date']; ?></td>
							<?php 
							} ?>
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
	<script type="text/javascript">

  $(document).ready(function(){
    $("select#product_type").change(function(){
          var t = $("#product_type option:selected").val();
           alert(t);
          $.ajax({
              type: "POST",
              url: "package.php", 
              data: { product_type : t} 
          }).done(function(data){
              $("#package").html(data);
          });
      });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("select#business_type").change(function(){
          var t = $("#business_type option:selected").val();
          // alert(t);
          $.ajax({
              type: "POST",
              url: "business_category.php", 
              data: { business_type : t} 
          }).done(function(data){
              $("#business_category").html(data);
          });
      });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $("select#business_category").change(function(){
          var t = $("#business_category option:selected").val();
          alert(t);
          $.ajax({
              type: "POST",
              url: "business.php", 
              data: { business_category : t} 
          }).done(function(data){
              $("#business").html(data);
          });
      });
  });
</script>
	
</body>
</html>