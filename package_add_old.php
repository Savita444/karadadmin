<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Packege</title>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

	<?php include('include/head.php'); ?>

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
								<h4>Add package</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<!-- <li class="breadcrumb-item"><a href="slider_advertise_view.php">Slider Advertise</a></li> -->
									<li class="breadcrumb-item active" aria-current="page">Add package</li>
								</ol>
							</nav>
						</div>
            <div class="col-md-6 col-sm-12 text-right">
              <div class="dropdown">
                <a class="btn btn-primary" href="package_view.php" role="button">
                  View package
                </a>
              </div>
            </div>						
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<!-- <h4 class="text-blue">Add Slider Images</h4> -->
						</div>
					</div>
					<br>
					<form method="post" enctype="multipart/form-data">
            <div class="form-group row">
              <div class="col-md-6">
              <label class="col-form-label">Product Type <span class="text-danger">*</span> : </label>
                <select name="fld_product_type_id" class="form-control custom-select1" id="product_type" required="">
                  <option value="">Select Product Type</option> 
                  <?php
                    $prod=mysqli_query($connect,"select * from tbl_product_type where fld_product_type_delete='0' order by fld_product_type_id desc") or die(mysqli_error($connect));
                    while ($fetch_product_type1=mysqli_fetch_array($prod)) {
                  ?>
                  <option value="<?php echo $fetch_product_type1['fld_product_type_id']; ?>" ><?php echo $fetch_product_type1['fld_product_type_name']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-md-6">
              <label class="col-form-label">Package Name <span class="text-danger">*</span> : </label>
                  <input class="form-control" type="text" name="fld_package_name" id="package" placeholder="Enter Package Name"  oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/(\..*)\./g, '$1');" required="">
                </div>
            </div>
              <div class="form-group row">
                <div class="col-md-6">
              <label class="col-form-label">Business Type <span class="text-danger">*</span> : </label>
                <select name="fld_business_id" class="form-control custom-select2" id="business_type" required="">
                  <option value="">Select Business Type</option> 
                  <?php
                    $cont=mysqli_query($connect,"select * from tbl_business_type where fld_business_delete ='0' order by fld_business_id desc") or die(mysqli_error($connect));
                    while ($fetch_business_type1=mysqli_fetch_array($cont)) {
                  ?>
                  <option value="<?php echo $fetch_business_type1['fld_business_id']; ?>" ><?php echo $fetch_business_type1['fld_business_name']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-md-6">
              <label class="col-form-label">business Category <span class="text-danger">*</span> : </label>
                <select name="fld_business_category_id" class="form-control custom-select3" id="business_category">
                  <option value="">Select business Category</option>              
                </select>
              </div>
            </div>
           <div class="form-group row">
            <div class="col-md-6">
                <label class="col-form-label">Amount<span class="text-danger">*</span> : </label>
                  <input class="form-control" type="text" name="fld_package_amount" id="txt1"  placeholder="Cost" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="">
                </div>
                 <div class="col-md-6">
               <label class="col-form-label">Number of Request/Leads <span class="text-danger">*</span> : </label>
                <select name="fld_number_of_request_leads_id" class="form-control custom-select4" id="" required="">
                  <option value="">Select Number of Request/Leads</option> 
                  <?php
                    $request=mysqli_query($connect,"select * from tbl_number_of_request_leads where fld_number_of_request_leads_delete ='0' order by fld_number_of_request_leads_id desc") or die(mysqli_error($connect));
                    while ($fetch_request_type1=mysqli_fetch_array($request)) {
                  ?>
                  <option value="<?php echo $fetch_request_type1['fld_number_of_request_leads_id']; ?>" ><?php echo $fetch_request_type1['fld_number_of_request_leads_name']; ?></option>
                  <?php } ?>
                </select>
              </div>
              </div>
              
            <div class="form-group row">
              <div class="col-md-6">
              <label class="col-form-label">Validity in Days <span class="text-danger">*</span> : </label>

                 <input class="form-control" type="text" name="fld_validity_in_days_number" id="package" placeholder="Enter Validity in Days"  required="">
                <!-- <select name="fld_validity_in_days_id" class="form-control custom-select5" id="fld_validity_in_days_name" required="">
                  <option value="">Select Validity in Days</option> 
                  <?php
                    $validity//=mysqli_query($connect,"select * from tbl_validity_in_days where fld_validity_in_days_delete ='0' order by fld_validity_in_days_id desc") or die(mysqli_error($connect));
                    //while ($fetch_validity=mysqli_fetch_array($validity)) {
                  ?>
                  <option value="<?php //echo $fetch_validity['fld_validity_in_days_id']; ?>" ><?php //echo $fetch_validity['fld_validity_in_days_name']; ?></option>
                  <?php //} ?>
                </select> -->
              </div>
            </div>
              
						<div class="form-group row">
							<div class="col-md-5"></div>
							<div class="col-sm-6">
								<input type="submit" name="submit" class="btn btn-success" value="Submit">&nbsp;
								<input type="reset" name="reset" class="btn btn-danger" value="Reset">&nbsp;
                <a href="package_view.php" class="btn btn-warning">Back</a>
							</div>
						</div>
					</form>
			</div>
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); 
        // include('include/footer.php');
  ?>

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
</body>
</html>


<?php


 if (isset($_POST['submit'])) 
        {
            
            extract($_POST);
                $query="INSERT INTO tbl_packages(fld_product_type_id,fld_package_name,fld_business_id,fld_business_category_id,fld_package_amount,fld_number_of_request_leads_id,fld_validity_in_days_number,fld_package_delete) VALUES ('$fld_product_type_id','$fld_package_name','$fld_business_id','$fld_business_category_id','$fld_package_amount','$fld_number_of_request_leads_id','$fld_validity_in_days_number','0')";
                
             
                $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
                if ($row) 
                {
                    echo "<script>";
                    // echo "alert('Package Added Successfully');";
                    echo "window.location.href='package_view.php';";
                    echo "</script>";                 
                }
                else
                {
                    echo "<script>";
                    echo "alert('Error');";
                    echo "window.location.href='package_view.php';";
                    echo "</script>";
               }
            
      }


?>               




<!-- <script type="text/javascript">
  $(document).ready(function(){
    $("select#district").change(function(){
          var s = $("#district option:selected").val();
      
        // alert(s);
          $.ajax({
              type: "POST",
              url: "taluka.php", 
              data: { district : s  } 
          }).done(function(data){
              $("#taluka").html(data);
          });
      });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
  $("select#taluka").change(function(){
        var s = $("#taluka option:selected").val();
    
      // alert(s);
        $.ajax({
            type: "POST",
            url: "village.php", 
            data: { taluka : s  } 
        }).done(function(data){
            $("#village").html(data);
        });
    });
  });
</script> -->

<!--  <style>
        .preview_box{clear: both; padding: 5px; margin-top: 10px; text-align: left;}
        .preview_box img{max-width: 150px; max-height: 150px;}
    </style> -->

   <!--  <script type="text/javascript">
    $(document).ready(function(){
        //Image file input change event
        $("#image").change(function(){
            readImageData(this);//Call image read and render function
        });
    });
     
    function readImageData(imgData){
        if (imgData.files && imgData.files[0]) {
            var readerObj = new FileReader();
            
            readerObj.onload = function (element) {
                $('#preview_img').attr('src', element.target.result);
            }
            
            readerObj.readAsDataURL(imgData.files[0]);
        }
    }
</script>   -->

<script type="text/javascript">

    function calculate() {
    var myBox1 = document.getElementById('txt1').value; 
    var myBox2 = document.getElementById('txt2').value;
    var result = document.getElementById('txt3'); 
    var myResult = myBox1 * myBox2;
     document.getElementById('txt3').value = myResult;
      // document.getElementById('txt4').value = myResult;
    var monthresult = myResult * 30;
    document.getElementById('txt5').value = monthresult;


    // var myBox11 = document.getElementById('txt11').value; 
    // var myBox22 = document.getElementById('txt22').value;
    // var result1 = document.getElementById('txt33'); 
    // var myResult1 = myBox11 * myBox22;
    //  document.getElementById('txt33').value = myResult1;
    //   // document.getElementById('txt4').value = myResult;
    // var monthresult1 = myResult1 * 30;
    // document.getElementById('txt55').value = monthresult1;

    // // var percentage = monthresult *100 /100;
    // var myBox4 = document.getElementById('txt7').value; 
   
    // var appointments = myBox4 * 30;
    //  document.getElementById('txt8').value = appointments;

}

// function yesnoCheck() {
//     if (document.getElementById('yesCheck').checked) {
//         document.getElementById('ifYes11').style.display = 'block';
//     }
//     else document.getElementById('ifYes11').style.display = 'none';
//     {
//       if (document.getElementById('noCheck').checked) {
//         document.getElementById('ifYes').style.display = 'block';
//     }
//     else document.getElementById('ifYes').style.display = 'none';
//     }

// }
</script> 
<script type="text/javascript">
// function jsFunction(){
//    // set text box value here
//    var txt =  document.getElementById('txt2');
//    var txt1 =  document.getElementById('txt3');
//    txt.value = "0";
//    txt1.value = "0";
//    $("#txt2").prop('disabled',true);
//         event.preventDefault();
// }

 $(function jsFunction () {
 
        $("#ddlModels").change(function () {

          if ($(this).val() == 'Paid') {
                $("#txt2").removeAttr("disabled");
                $("#txt3").removeAttr("disabled");
                // $("#txt2").focus();
            } else {
                $("#txt2").attr("disabled", "disabled");
                $("#txt3").attr("disabled", "disabled");
            }
            // set text box value here
               var txt =  document.getElementById('txt2');
               var txt1 =  document.getElementById('txt3');
               txt.value = "0";
               txt1.value = "0";
        });
    });
</script>