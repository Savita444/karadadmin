<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Featured Advertisement Report <?php echo date('d-m-Y'); ?> </title>
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
								<h4>Featured Advertise Details</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item" ria-current="page">Featured Advertise Details</li>
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

          $conditions=array();

           $query="select fi.*, bt.*, bc.*,s.*,d.*,c.*, us.* from feature_image fi, tbl_business_type bt,tbl_business_category bc, tbl_state s, tbl_district d,tbl_city c, tbl_user_issued_services us where  fi.fld_business_id=bt.fld_business_id and bc.fld_business_category_id =fi.fld_business_category_id and fi.fld_state_id=s.fld_state_id and fi.fld_district_id=d.fld_district_id and fi.fld_city_id=c.fld_city_id";

        $row=mysqli_query($connect,$query) or die(mysqli_error($connect));

        if((isset($_POST['state'])) && ($_POST['state']!="") )
		{
			$query .=" and fi.fld_state_id='".$_POST['state']."'";
		}

        if((isset($_POST['district'])) && ($_POST['district']!="") )
		{
			$query .=" and fi.fld_district_id='".$_POST['district']."'";
		}
        if((isset($_POST['city'])) && ($_POST['city']!="") )
		{
			$query .=" and fi.fld_city_id='".$_POST['city']."'";
		}
        if((isset($_POST['business_type'])) && ($_POST['business_type']!="") )
		{
			$query .=" and fi.fld_business_id='".$_POST['business_type']."'";
		}
		 

         

         if(!empty($fromDate) && !empty($endDate)){
             $query .= " and fi.feature_image_date
                          between '".$fromDate."' and '".$endDate."' ";
          }
          $query.='group by fi.feature_image_id order by fi.feature_image_id desc';
	// echo $query; exit();	
	}

	else
    {
    	 $query="select fi.*, bt.*, bc.*,s.*,d.*,c.*, us.* from feature_image fi, tbl_business_type bt,tbl_business_category bc, tbl_state s, tbl_district d,tbl_city c, tbl_user_issued_services us where  fi.fld_business_id=bt.fld_business_id and bc.fld_business_category_id =fi.fld_business_category_id and fi.fld_state_id=s.fld_state_id and fi.fld_district_id=d.fld_district_id and fi.fld_city_id=c.fld_city_id group by fi.feature_image_id ";
     }
     // echo $query; exit();
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

	<div class="col-sm-6 col-md-6">
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
		<div class="col-sm-6 col-md-6">
            <div class="form-group">
              <label >Select Business Category<span class="text-danger">*</span> :</label>
              <select name="business_category" class="form-control custom-select16" id="business_category">
                  <option value="">Select Business Category</option>                  
                </select>
                <div  class="text-danger"name="error2" id="error2"> </div>
            </div>
          </div>
		<!-- <div class="col-sm-4 col-md-4">
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
                  	    <option value="Rejected">Rejected</option>
                  	   
                  	<?php } ?>
                </select>
            </div>
        </div>-->
        <div class="col-sm-6 col-md-6">
			<div class="form-group">
				<label>From Date :</label>
				
				<input type="date" class="form-control" name='fromDate' value='<?php if(isset($_POST['fromDate'])) echo $_POST['fromDate']; ?>'>
			</div>
		</div> 
		<div class="col-sm-6 col-md-6">
			<div class="form-group">
				<label>To Date :</label>
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
 
 <div class="row">
						<!-- <table class="stripe hover multiple-select-row data-table-export nowrap"> -->
						<table class="stripe hover data-table-export nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Sr No</th>
									<th>Action</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Feature Image</th>
                  <th>Business Type Name</th>
                  <th>Business Category</th>
                  <th>Name</th>
                  <th>Mobile Number</th>
                  <th>State</th>
                  <th>District</th>
                  <th>City</th>
                  <th>Created Date</th>
                  									<!-- <th>Updated Date</th> -->
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
                  <td><a href="feature_advertise_update.php?feature_image_id=<?php echo $fetch['feature_image_id'] ?>" title="Edit Feature Advertise" ><i class="fa fa-pencil-square-o text-success" style="font-size: 20px; padding-left: 10px" ></i></a>

                           <a href="feature_advertise_delete.php?feature_image_id=<?php echo $fetch['feature_image_id'] ?>" onclick="return confirm('You are sure to delete the Feature Advertise.')" title="Delete Feature Advertise" ><i class="fa fa-trash text-danger" style="font-size: 20px; padding-left: 10px" ></i></a></td>
									 <td><?php echo $fetch['title'];?></td> 
                                                <td><?php echo $fetch['discription'];?></td>
                                                <!--  <td><?php echo $fetch['business_info_name'];?></td> -->
                                                
                                                <td >
												    <div class="hovimg">
												     <p class="d-flex">
													     <span class="pr-3"><a href="https://www.sitepoint.com/community/t/trying-to-show-image-in-popup-box-when-i-hover-over-a-button/232770?u=sama74">
													     <a href="../images/admin/feature/<?php echo $fetch['feature_image']; ?>" Download height="50" width="50"><button type="button" name="download" class="btn btn-primary btn-sm  mt-1 align-center"><i class="fa fa-download" aria-hidden="true"></i></button></a>                               	
													    </a>
													   </span>
													  <img src="../images/admin/feature/<?php echo $fetch['feature_image'];?>" alt="photo" style="width: 50px !important; height:50px !important;">
												    </p>
													<figure>
													  <img src="../images/admin/feature/<?php echo $fetch['feature_image'];?>"  alt="photo">
													</figure>
												  </div>
												</td>
                                                
                                                <td><?php echo $fetch['fld_business_name'];?></td>
                                                <td><?php echo $fetch['fld_business_category_name'] ?></td> 
                                                <td><?php echo $fetch['name'] ?></td> 
                                              <td><?php echo $fetch['mobile_number'];?></td>
                                                 <td><?php echo $fetch['fld_state_name'] ?></td> 
                                                <td><?php echo $fetch['fld_district_name'] ?></td>
                                                <td><?php echo $fetch['fld_city_name'] ?></td> 
                                                <td><?php echo $fetch['feature_image_date']; ?></td>
                                              

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