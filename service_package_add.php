<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Service Packeges</title>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>


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

	<?php include('include/head.php'); ?>
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
								<h4>Add Service Packeges</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<!-- <li class="breadcrumb-item"><a href="slider_advertise_view.php">Slider Advertise</a></li> -->
									<li class="breadcrumb-item active" aria-current="page">Add Service Packeges</li>
								</ol>
							</nav>
						</div>
            <div class="col-md-6 col-sm-12 text-right">
              <div class="dropdown">
                <a class="btn btn-primary" href="service_package_view.php" role="button">
                  View Service Packeges
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
							<label class="col-sm-12 col-md-3 col-form-label">Business Type <span class="text-danger">*</span> : </label>
                <div class="col-sm-12 col-md-9">
                  <?php  
                       $query="select business_name from business_type where business_id='2'";
                      $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
                      while($fetch=mysqli_fetch_array($row)) {
                      extract($fetch);
                       ?>
                  <input type="text" name="business_type" value="<?php echo $fetch['business_name'];?>" class="form-control" readonly>
                <?php } ?>
                </div>
						</div>
            <div id="ifYes11">
              <div class="form-group row">
                <label class="col-sm-12 col-md-3 col-form-label">Package Name <span class="text-danger">*</span> : </label>
                <div class="col-sm-12 col-md-9">
                  <input class="form-control" type="text" name="package1" id="package" placeholder="Package Name"  oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/(\..*)\./g, '$1');" required="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-12 col-md-3 col-form-label">Type( Free | Paid) <span class="text-danger">*</span> : </label>
                <div class="col-sm-12 col-md-9">
                  <select class="form-control custom-select" name="type1" id="ddlModels" onchange='jsFunction()'  required="">
                    <option value="">Select Type</option>
                    <option value="Free" id="free">Free</option>
                    <option value="Paid" id="paid">Paid</option>        
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-12 col-md-3 col-form-label">Validity<span class="text-danger">*</span> : </label>
                <div class="col-sm-12 col-md-9">
                  <input class="form-control" type="text" name="number_of_days1" id="number_of_days" placeholder="Number of Days"  oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="">
                </div>
              </div>
              <!-- <div class="form-group row">
                <label class="col-sm-12 col-md-3 col-form-label">Validity From<span class="text-danger">*</span> : </label>
                <div class="col-sm-12 col-md-3">
                  <input class="form-control" type="date" name="validity_from" id="validity_from" placeholder="Validity From" required="">
                </div>
                <label class="col-sm-12 col-md-3 col-form-label">Validity To<span class="text-danger">*</span> : </label>
                <div class="col-sm-12 col-md-3">
                  <input class="form-control" type="date" name="validity_to" id="validity_to" placeholder="Validity To" required="">
                </div>
              </div> -->
              <div class="form-group row">
                <label class="col-sm-12 col-md-3 col-form-label">Cost<span class="text-danger">*</span> : </label>
                <div class="col-sm-12 col-md-9">
                  <input class="form-control" type="text" name="cost1" id="txt1" placeholder="Cost" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-12 col-md-3 col-form-label">Multiple of Cost for Benefit<span class="text-danger">*</span> : </label>
                <div class="col-sm-12 col-md-9">
                  <input class="form-control" type="text" name="benefit1" onInput="calculate()" id="txt2" placeholder="Multiple of Cost for Benefit" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="">

                   <!-- <input class="form-control" type="text" name="benefit2" onInput="calculate()" id="txt22" placeholder="Multiple Cost for Benefit"  oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required=""> -->
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-12 col-md-3 col-form-label">Free Order Amount Per Day<span class="text-danger">*</span> : </label>
                <div class="col-sm-12 col-md-9">
                  <input class="form-control" type="text" name="order_per_day1"  id="txt3" placeholder="Free Order Per Day" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                </div>
              </div>
              
              <div class="form-group row">
                <label class="col-sm-12 col-md-3 col-form-label">Free Order Amount Per Month<span class="text-danger">*</span> : </label>
                <div class="col-sm-12 col-md-9">
                  <input class="form-control" type="text" name="amount_per_month1" id="txt5" placeholder="Free Order Amount Per Month"  oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-12 col-md-3 col-form-label">Percentage of Commission after free Order<span class="text-danger">*</span> : </label>
                <div class="col-sm-12 col-md-9">
                  <input class="form-control" type="text" name="commission1"  id="txt6" placeholder="Percentage of Commission after free Order" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="">
                </div>
              </div>
            </div>

						<div class="form-group row">
							<div class="col-md-5"></div>
							<div class="col-sm-6">
								<input type="submit" name="submit" class="btn btn-success" value="Submit">&nbsp;
								<input type="reset" name="reset" class="btn btn-danger" value="Reset">&nbsp;
                <a href="service_package_view.php" class="btn btn-warning">Back</a>
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
</body>
</html>


<?php


 if (isset($_POST['submit'])) 
        {
            
            extract($_POST);
                $query="INSERT INTO packages(business_type,package_name,Type_free_paid,number_of_days,cost,multiple_cost_of_benefit,free_order_per_day,free_order_amount_per_month,percentage_of_commission_after_free_order) VALUES ('$business_type','$package1','$type1','$number_of_days1','$cost1','$benefit1','$order_per_day1','$amount_per_month1','$commission1')";
                
             
                $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
                if ($row) 
                {
                    echo "<script>";
                    echo "alert('Services Package Added Successfully');";
                    echo "window.location.href='service_package_view.php';";
                    echo "</script>";                 
                }
                else
                {
                    echo "<script>";
                    echo "alert('Error');";
                    echo "window.location.href='service_package_view.php';";
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