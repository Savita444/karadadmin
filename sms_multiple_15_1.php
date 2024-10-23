<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
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
								<h4>SMS</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<!-- <li class="breadcrumb-item"><a href="slider_advertise_view.php">Slider Advertise</a></li> -->
									<li class="breadcrumb-item active" aria-current="page">Send SMS</li>
								</ol>
							</nav>
						</div>
            <div class="col-md-6 col-sm-12 text-right">
              <div class="dropdown">
                <a class="btn btn-primary" href="#" role="button">
                  View SMS
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
				
<form method="post" enctype="multipart/form-data">
		 	<div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Select Vendor or User<span style="color: red;">*</span> : </label>
              	<div class="col-sm-12 col-md-10">
	               <input type="radio" name="ven_user" value="Vendor" required=""> Vendor
	               <input type="radio" name="ven_user" value="User" required=""> User
              	</div>
            </div>
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Select Appointment or Service<span style="color: red;">*</span> : </label>
              	<div class="col-sm-12 col-md-10">
	               <input type="checkbox" name="ven_user" value="Appointment"> Appointment
	               <input type="checkbox" name="ven_user" value="Service"> Service
              	</div>
            </div>
<div class="form-group row">
	<label class="col-sm-12 col-md-3 col-form-label">State<span class="text-danger">*</span> : </label>
	<div class="col-sm-12 col-md-9">
		<select class="form-control custom-select" name="state" id="state" required="">
			<option value="">Select State</option>	
			<?php
					$cont=mysqli_query($connect,"select * from tbl_state") or die(mysqli_error($connect));
					while ($fetch_country=mysqli_fetch_array($cont)) {
				?>
				<option value="<?php echo $fetch_country['fld_state_id']; ?>"><?php echo $fetch_country['fld_state_name']; ?></option>
			<?php } ?>			
		</select>
	</div>
</div>
    <div class="form-group row">
		<label class="col-sm-12 col-md-3 col-form-label">District <span class="text-danger">*</span> : </label>
		<div class="col-sm-12 col-md-9">
			<select class="form-control custom-select" name="district" id="district" required="">
				<option value="">Select District</option>
				<?php
					// $cont=mysqli_query($connect,"select * from district") or die(mysqli_error($connect));
					// while ($fetch_country=mysqli_fetch_array($cont)) {
				?>
				<!-- <option value="<?php //echo $fetch_country['district_id']; ?>"><?php //echo $fetch_country['district_name']; ?></option> -->
			<?php //} ?>
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-3 col-form-label">Taluka <span class="text-danger">*</span> : </label>
		<div class="col-sm-12 col-md-9">
			<select class="form-control custom-select" name="taluka" id="taluka" required="">
				<option value="">Select Taluka</option>				
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-3 col-form-label">City Name<span class="text-danger">*</span> : </label>
		<div class="col-sm-12 col-md-9">
			<select class="form-control custom-select" name="city" id="city" required="">
				<option value="">Select City</option>				
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-3 col-form-label">Area Name<span class="text-danger">*</span> : </label>
		<div class="col-sm-12 col-md-9">
			<select class="form-control custom-select" name="area" id="area" required="">
				<option value="">Select Area</option>				
			</select>
		</div>
	</div>
             <!-- <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Mobile Number <span style="color: red;">*</span> : </label>
              <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" placeholder="Enter Mobile Number" name="mobile" required="" maxlength="10" minlength="10" pattern="[789]{1}[0-9]{9}" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Message Code <span class="text-danger">*</span> : </label>
              <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="Message_code" placeholder="Message Code" required="" value="SBAAPP" readonly=""  maxlength="6" minlength="6" onkeyup="myFunction()" id="Message_code" onchange="myFunction()"> -->
                <!-- <p class="help-block" style="color: red">Note : Exactly 6 Characters can be enter.</p> -->
	             <!--  </div>
	            </div> -->
<!-- <script type="text/javascript">
    function myFunction() {
  var str = document.getElementById("Message_code").value;
  var res = str.toUpperCase();
  document.getElementById("Message_code").value = res;
}
</script> -->           

            <!-- <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Message <span class="text-danger">*</span> : </label>
              <div class="col-sm-12 col-md-10"> -->
                <!-- <textarea class="textarea_editor form-control border-radius-0"  name="Alert_message" placeholder="Enter Message " required=""></textarea> -->
               <!--  <textarea class="form-control"  name="Alert_message" placeholder="Enter Message " required="" maxlength="157"></textarea>
                <p class="help-block" style="color: red">Note : Please do not use apostrophe (') or single quote (' ') or double quote (" ") and also do not press Enter Key. Upto 157 Characters can be enter.</p>
              </div>
            </div> -->
           

						<div class="form-group row">
							<div class="col-md-5"></div>
							<div class="col-sm-12 col-md-10">
                <center>
                    <input class="btn btn-success" value="Send" type="submit" name="submit" onclick="return confirm('Are You Sure To Send Message')">
                </center>
								<!-- <input type="submit" name="submit" class="btn btn-success" value="Submit">&nbsp;
								<input type="reset" name="reset" class="btn btn-danger" value="Reset">&nbsp;
                <a href="slider_advertise_view.php" class="btn btn-warning">Back</a> -->
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
<script type="text/javascript">
  $(document).ready(function(){
    $("select#state").change(function(){
          var s = $("#state option:selected").val();
      
      	// alert(s);
          $.ajax({
              type: "POST",
              url: "district.php", 
              data: { state : s  } 
          }).done(function(data){
              $("#district").html(data);
          });
      });
  });
</script>
<script type="text/javascript">
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
          var t = $("#taluka option:selected").val();
          // alert(t);
          $.ajax({
              type: "POST",
              url: "city.php", 
              data: { taluka : t} 
          }).done(function(data){
              $("#city").html(data);
          });
      });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("select#city").change(function(){
          var t = $("#city option:selected").val();
          // alert(t);
          $.ajax({
              type: "POST",
              url: "area.php", 
              data: { city : t} 
          }).done(function(data){
              $("#area").html(data);
          });
      });
  });
</script>
<?php


 // if(isset($_POST['submit']))
 // {
 // 	extract($_POST);
// 	 $asas="insert into tbl_message(fld_message,fld_student_count,fld_message_code,fld_message_status) values('$Alert_message', '$student_count','$Message_code','All')";
// 	$asdf=mysqli_query($connect,$asas) or die(mysqli_query($connect));

// 	 if ($asdf) 
//      {

    // 	$query1="select mobile from vendor where status='Approved' group by vendor_id order by vendor_id desc";
    //        $row=mysqli_query($connect,$query1) or die(mysqli_error($connect));            
    //          while($fetch=mysqli_fetch_array($row)) {

    //         extract($fetch);

    //         	$msg=$_POST['Alert_message'];
					        

				// 	$mobile=$mobile;

				// 	$ch = $_POST['Message_code'];

			 //        $apiurl ="http://sms.happysms.in/api/sendhttp.php?authkey=242446A57b8VBMQpOd5bc06387&mobiles=$mobile&message=$msg&sender=$ch&route=4&country=91";

				// 	      $ch = curl_init($apiurl);

				// 	      if($method == "GET")
				// 	      {
				// 	        curl_setopt($ch, CURLOPT_POST,1);
				// 	        curl_setopt($ch, CURLOPT_POSTFIELDS,$apiurl);
				// 	      }
				// 	      else
				// 	      {
				// 	        $get_url = $apiurl;
				// 	        curl_setopt($ch, CURLOPT_POST,0);
				// 	        curl_setopt($ch, CURLOPT_URL, $get_url);
				// 	      }

				// 	      curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
				// 	      curl_setopt($ch, CURLOPT_HEADER,0);
				// 	      // DO NOT RETURN HTTP HEADERS
				// 	      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
				// 	      // RETURN THE CONTENTS OF THE CALL
				// 	      $return_val = curl_exec($ch);

				// 	      if($return_val=="")
				// 	      {
				// 	      echo "Process Failed";
				// 	      } 

    //     }


    //     echo "<script>";
    //     echo "alert('Message Sent');";
    //     echo "</script>";                 
    // }
    // else
    // {
    //     echo "<script>";
    //     echo "alert('Error');";
    //     echo "</script>";
    // }

//	}
?>


