<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title> User Request Report <?php echo date('d-m-Y'); ?> </title>
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
								<h4>User Request Details</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item" ria-current="page">User Request Details</li>
									<!-- <li class="breadcrumb-item active" aria-current="page">View Slider Images</li> -->
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
<?php 
$cond='';
if(isset($_POST['submit']))
	{
		extract($_POST);
          $fromDate = $_POST['fromDate'];
          $endDate = $_POST['endDate'];

         $query="select us.*, u.*,bi.*, v.*, bt.*, bc.*, bsc.*,s.*,d.*,c.* from tbl_user_issued_services us, user u, business_information bi, vendor v, tbl_business_type bt,tbl_business_category bc, tbl_business_subcategory bsc, tbl_state s, tbl_district d,tbl_city c where bi.vendor_id=us.vendor_id and v.vendor_id=bi.vendor_id and v.vendor_id=us.vendor_id  and us.user_id= u.user_id and us.business_info_id=bi.business_info_id and bi.fld_business_id=bt.fld_business_id and bc.fld_business_category_id =bi.fld_business_category_id and bsc.fld_business_subcategory_id=bi.fld_business_subcategory_id and bi.fld_state_id=s.fld_state_id and bi.fld_district_id=d.fld_district_id and  bi.fld_city_id=c.fld_city_id";

            $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
            
        if((isset($_POST['state'])) && ($_POST['state']!="") )
		{
			$query .=" and bi.fld_state_id='".$_POST['state']."'";
      $cond .=" and bi.fld_state_id='".$_POST['state']."'";
		}

        if((isset($_POST['district'])) && ($_POST['district']!="") )
		{
			$query .=" and bi.fld_district_id='".$_POST['district']."'";
      $cond .=" and bi.fld_district_id='".$_POST['district']."'";
		}
        if((isset($_POST['city'])) && ($_POST['city']!="") )
		{
			$query .=" and bi.fld_city_id='".$_POST['city']."'";
      $cond .=" and bi.fld_city_id='".$_POST['city']."'";
		}
        if((isset($_POST['business_type'])) && ($_POST['business_type']!="") )
		{
			$query .=" and bi.fld_business_id='".$_POST['business_type']."'";
      $cond .=" and bi.fld_business_id='".$_POST['business_type']."'";
		}
		  if((isset($_POST['business_info'])) && ($_POST['business_info']!="") )
		{
			$query .=" and bi.business_info_id='".$_POST['business_info']."'";
      $cond .=" and bi.business_info_id='".$_POST['business_info']."'";
		}

          if((isset($_POST['status'])) && ($_POST['status']!="") )
		{
			$query .=" and us.fld_user_issued_servicesApp IN (SELECT fld_user_issued_servicesApp FROM tbl_user_issued_services where us.status='".$_POST['status']."')";
      $cond .=" and us.fld_user_issued_servicesApp IN (SELECT fld_user_issued_servicesApp FROM tbl_user_issued_services where us.status='".$_POST['status']."')";
		}

         if(!empty($fromDate) && !empty($endDate)){
             $query .= " and us.fld_service_requested_date
                          between '".$fromDate."' and '".$endDate."' ";
            $cond .= " and us.fld_service_requested_date
                          between '".$fromDate."' and '".$endDate."' ";
          }
     

		$query.=' group by us.fld_user_issued_servicesApp order by us.fld_user_issued_servicesApp desc';
    $cond.=' group by us.fld_user_issued_servicesApp order by us.fld_user_issued_servicesApp desc';
	// echo $query; exit();	
	}

	else
    {
    	 $query="select us.*, u.*,bi.*, v.*, bt.*, bc.*, bsc.*,s.*,d.*,c.* from tbl_user_issued_services us, user u, business_information bi, vendor v, tbl_business_type bt,tbl_business_category bc, tbl_business_subcategory bsc, tbl_state s, tbl_district d,tbl_city c where bi.vendor_id=us.vendor_id and v.vendor_id=bi.vendor_id and v.vendor_id=us.vendor_id  and us.user_id= u.user_id and us.business_info_id=bi.business_info_id and bi.fld_business_id=bt.fld_business_id and bc.fld_business_category_id =bi.fld_business_category_id and bsc.fld_business_subcategory_id=bi.fld_business_subcategory_id and bi.fld_state_id=s.fld_state_id and bi.fld_district_id=d.fld_district_id and  bi.fld_city_id=c.fld_city_id";
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
	<div class="row">
		<div class="col-sm-4 col-md-4">
			<div class="form-group">
				<label>State:</label>
              <select name="state" class="form-control custom-select2 " id="state" >
                  <option value="">Select State</option> 
                  <?php
                    $cont=mysqli_query($connect,"select * from tbl_state where fld_state_delete ='0' order by fld_state_id desc") or die(mysqli_error($connect));
                    while ($fetch_product_category1=mysqli_fetch_array($cont)) {

                      if(isset($_POST['submit']))
                      {
                    ?>
                        <option value="<?php echo $fetch_product_category1['fld_state_id']; ?>"  <?php if($fetch_product_category1['fld_state_id']==$_POST['state']) { echo "selected";} ?>><?php echo $fetch_product_category1['fld_state_name']; ?></option>
                    <?php
                      }
                      else
                      {
                  ?>
                      <option value="<?php echo $fetch_product_category1['fld_state_id']; ?>" ><?php echo $fetch_product_category1['fld_state_name']; ?></option>
                <?php } ?>
            
                 
                  
                  <?php } ?>
                </select>
			</div>
		</div>
		<div class="col-sm-4 col-md-4">
			<div class="form-group">
				<label>District :</label>
	              	<select name="district" class="form-control custom-select2" id="district" >
                  <option value="">Select District</option>
                  <?php
          $yetru="select * from tbl_district where fld_district_delete ='0' ";
          if(isset($_POST['submit']))
          {
            if(isset($_POST['district']) && ($_POST['district']!=""))
              {
                $yetru .=" and fld_state_id='".$_POST['state']."'";

              }           
          }
          $yetru .=" order by fld_district_id desc";
                    $cont=mysqli_query($connect,$yetru) or die(mysqli_error($connect));


                    while ($fetch_product_subcategory1=mysqli_fetch_array($cont)) {
                      if(isset($_POST['submit']))
                      {
                    ?>
                        <option value="<?php echo $fetch_product_subcategory1['fld_district_id']; ?>"  <?php if($fetch_product_subcategory1['fld_district_id']==$_POST['district']) { echo "selected";} ?>><?php echo $fetch_product_subcategory1['fld_district_name']; ?></option>
                    <?php
                      }
                      else
                      {
                  ?>
                       <option value="<?php echo $fetch_product_subcategory1['fld_district_id']; ?>" ><?php echo $fetch_product_subcategory1['fld_district_name']; ?></option>
                <?php } ?>
            ?>
                  
                  <?php } ?>                 
              </select>
			</div>
		</div>
		<div class="col-sm-4 col-md-4">
			<div class="form-group">
				<label>City:</label>
				<select name="city" class="form-control custom-select2" id="city" >
                  <option value="">Select City</option>
                  <?php
          $yetru="select * from tbl_city where fld_city_delete ='0' ";
          if(isset($_POST['submit']))
          {
            if(isset($_POST['city']) && ($_POST['city']!=""))
              {
                $yetru .=" and fld_district_id='".$_POST['district']."'";

              }           
          }
          $yetru .=" order by fld_city_id desc";
                    $cont=mysqli_query($connect,$yetru) or die(mysqli_error($connect));


                    while ($fetch_product_subcategory1=mysqli_fetch_array($cont)) {
                      if(isset($_POST['submit']))
                      {
                    ?>
                        <option value="<?php echo $fetch_product_subcategory1['fld_city_id']; ?>"  <?php if($fetch_product_subcategory1['fld_city_id']==$_POST['city']) { echo "selected";} ?>><?php echo $fetch_product_subcategory1['fld_city_name']; ?></option>
                    <?php
                      }
                      else
                      {
                  ?>
                       <option value="<?php echo $fetch_product_subcategory1['fld_city_id']; ?>" ><?php echo $fetch_product_subcategory1['fld_city_name']; ?></option>
                <?php } ?>
            ?>
                  
                  <?php } ?>                 
              </select>
			</div>
		</div>
	<!-- ------------------------------ -->

	<div class="col-sm-4 col-md-4">
			<div class="form-group">
				<label>Business Type :</label>
              <select name="business_type" class="form-control custom-select2 " id="business_type" >
                  <option value="">Business Type</option> 
                  <?php
                    $cont=mysqli_query($connect,"select * from tbl_business_type where fld_business_delete ='0' order by fld_business_name asc") or die(mysqli_error($connect));
                    while ($fetch_bsiness_type11=mysqli_fetch_array($cont)) {

                      if(isset($_POST['submit']))
                      {
                    ?>
                        <option value="<?php echo $fetch_bsiness_type11['fld_business_id']; ?>"  <?php if($fetch_bsiness_type11['fld_business_id']==$_POST['business_type']) { echo "selected";} ?>><?php echo $fetch_bsiness_type11['fld_business_name']; ?></option>
                    <?php
                      }
                      else
                      {
                  ?>
                      <option value="<?php echo $fetch_bsiness_type11['fld_business_id']; ?>" ><?php echo $fetch_bsiness_type11['fld_business_name']; ?></option>
                <?php } ?>
            
                 
                  
                  <?php } ?>
                </select>
			</div>
		</div>
		<div class="col-sm-4 col-md-4">
			<div class="form-group">
				<label>Business Name :</label>
	              	<select name="business_info" class="form-control custom-select2" id="business_info" >
                  <option value="">Select Business Name </option>
                  <?php
          $yetru="select * from business_information where fld_business_delete ='0' ";
          if(isset($_POST['submit']))
          {
            if(isset($_POST['business_info']) && ($_POST['business_info']!=""))
              {
                $yetru .=" and fld_business_id='".$_POST['business_type']."'";

              }           
          }
          $yetru .=" order by business_info_id desc";
                    $cont21=mysqli_query($connect,$yetru) or die(mysqli_error($connect));


                    while ($fetch_product11=mysqli_fetch_array($cont21)) {
                      if(isset($_POST['submit']))
                      {
                    ?>
                        <option value="<?php echo $fetch_product11['business_info_id']; ?>"  <?php if($fetch_product11['business_info_id']==$_POST['business_info']) { echo "selected";} ?>><?php echo $fetch_product11['business_info_name']; ?></option>
                    <?php
                      }
                      else
                      {
                  ?>
                       <option value="<?php echo $fetch_product11['business_info_id']; ?>" ><?php echo $fetch_product11['business_info_name']; ?></option>
                <?php } ?>
            ?>
                  
                  <?php } ?>                 
              </select>
			</div>
		</div>
		<div class="col-sm-4 col-md-4">
			<div class="form-group">
				<label>Business Status :</label>
				<select name="status" class="form-control custom-select2" id="boo_status" >
                  	<option value="">Select Business Status </option>                  	

                  	
                  <?php if(isset($_POST['submit'])){ ?>
                  		<option value="NotApproved" <?php if($_POST['status']=="NotApproved") { echo "selected"; } ?>>NotApproved</option>
                  			<option value="Approved" <?php if($_POST['status']=="Approved") { echo "selected"; } ?>>Approved</option>
                  	<option value="Completed" <?php if($_POST['status']=="Completed") { echo "selected"; } ?>>Completed</option>
                  	<option value="Rejected" <?php if($_POST['status']=="Rejected") { echo "selected"; } ?>>Rejected</option>


                  	<?php } else { ?>
                  		<option value="NotApproved">NotApproved</option>
                  		<option value="Approved">Approved</option>
                  	    <option value="Completed">Completed</option>
                  	    <option value="Completed">Rejected</option>
                  	   
                  	<?php } ?>
                </select>
            </div>
        </div>
		<div class="col-sm-6 col-md-6">
			<div class="form-group">
				<label>From Date<span class="text-danger">*</span> :</label>
				
				<input type="date" class="form-control" name='fromDate' value='<?php if(isset($_POST['fromDate'])) echo $_POST['fromDate']; ?>'>
			</div>
		</div>
		<div class="col-sm-6 col-md-6">
			<div class="form-group">
				<label>To Date<span class="text-danger">*</span> :</label>
	              	<input type="date" class="form-control" name='endDate' value='<?php if(isset($_POST['endDate'])) echo $_POST['endDate']; ?>'>
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
 
 <div class="row px-4">
    <table class="table table-bordered">
  <tbody>
    <tr>
       <td><?php 
              $q_notapprove = mysqli_query($connect,"select bi.*,us.* from tbl_user_issued_services us,business_information bi where bi.business_info_id=us.business_info_id and us.status='Approved' $cond");
               $r = mysqli_num_rows($q_notapprove);
               // echo  $r ;
               echo "<span style='color:#007bff;'>".'Approved:' . $r . "</span>";
               ?>
                 
               </td>

      <td>
        <?php   
      $q_approve = mysqli_query($connect,"select bi.*,us.* from tbl_user_issued_services us,business_information bi where bi.business_info_id=us.business_info_id and us.status='NotApproved' $cond");
               $r = mysqli_num_rows($q_approve);
               echo "<span style='color:#5caceb;'>".'NotApproved:' . $r . "</span>";
               ?></td> 
     <td>
        <?php 

                $q_disapprove = mysqli_query($connect,"select bi.*,us.* from tbl_user_issued_services us,business_information bi where bi.business_info_id=us.business_info_id and us.status='Disapproved' $cond");
               $r = mysqli_num_rows($q_disapprove);
                echo "<span style='color:#FFBF00;'>".'Disapproved:' . $r . "</span>";
        ?></td>
      <td>
        <?php
          $q_rejected = mysqli_query($connect,"select bi.*,us.* from tbl_user_issued_services us,business_information bi where bi.business_info_id=us.business_info_id and us.status='Rejected' $cond");
               $r = mysqli_num_rows($q_rejected);
               echo "<span style='color:red;'>".'Rejected:' . $r . "</span>";

         ?></td>
      <td>
        <?php 
          $q_completed= mysqli_query($connect,"select bi.*,us.* from tbl_user_issued_services us,business_information bi where bi.business_info_id=us.business_info_id and us.status='Completed' $cond");
           $r = mysqli_num_rows($q_completed);
           echo "<span style='color:#28a745;'>".'Completed:' . $r . "</span>";

        ?></td> 
    </tr>
   
  </tbody>
</table>

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
									<th>Business Photo</th> 
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
			             <td><img src="../images/vendor/Business_Photo/<?php echo $fetch['business_image']; ?>" height="50" width="50"></td> 
                                              
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
    $("select#state").change(function(){
          var t = $("#state option:selected").val();
           alert(t);
          $.ajax({
              type: "POST",
              url: "district.php", 
              data: { state : t} 
          }).done(function(data){
              $("#district").html(data);
          });
      });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $("select#district").change(function(){
          var t = $("#district option:selected").val();
          // alert(t);
          $.ajax({
              type: "POST",
              url: "city_district.php", 
              data: { district : t} 
          }).done(function(data){
              $("#city").html(data);
          });
      });
  });
</script>
<!-- <script type="text/javascript">
  $(document).ready(function(){
    $("select#business_type").change(function(){
          var b = $("#business_type option:selected").val();
          alert(b);
          $.ajax({
              type: "POST",
              url: "business_name.php", 
              data: { fld_business_name : b} 
          }).done(function(data){
              $("#fld_business_name").html(data);
          });
      });
  });
</script> -->


	<script type="text/javascript">

  $(document).ready(function(){
    $("select#business_type").change(function(){
          var bn = $("#business_type option:selected").val();
           alert(bn);
          $.ajax({
              type: "POST",
              url: "business_name.php", 
              data: { business_type : bn} 
          }).done(function(data){
              $("#business_info").html(data);
          });
      });
  });
</script>
	
</body>
</html>