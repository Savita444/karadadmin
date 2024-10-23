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
                <!-- <a class="btn btn-primary" href="#" role="button">
                  View SMS
                </a> -->
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
	               <input type="radio" name="fld_ven_user" value="Vendor" required=""> Vendor
	               <input type="radio" name="fld_ven_user" value="User" required=""> User
              	</div>
            </div>
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Select Appointment or Service<span style="color: red;">*</span> : </label>
              	<div class="col-sm-12 col-md-10">
	               <input type="checkbox" name="fld_ven_user_check[]" value="Appointment"> Appointment
	               <input type="checkbox" name="fld_ven_user_check[]" value="Service"> Service
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
			<select class="form-control custom-select" name="district" id="district" >
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
			<select class="form-control custom-select" name="taluka" id="taluka" >
				<option value="">Select Taluka</option>				
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-3 col-form-label">City Name<span class="text-danger">*</span> : </label>
		<div class="col-sm-12 col-md-9">
			<select class="form-control custom-select" name="city" id="city" >
				<option value="">Select City</option>				
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-3 col-form-label">Area Name<span class="text-danger">*</span> : </label>
		<div class="col-sm-12 col-md-9">
			<select class="form-control custom-select" name="area" id="area" >
				<option value="">Select Area</option>				
			</select>
		</div>
	</div>
             
            <div class="form-group row">
		<label class="col-sm-12 col-md-1 col-form-label">Message<span class="text-danger">*</span> : </label>
		<div class="col-sm-12 col-md-11">
			<textarea class="textarea_editor form-control border-radius-0" id="desc" name="fld_message_description" placeholder="Enter Message " required=""></textarea>
              <p class="help-block" style="color: red">Note : Please do not use apostrophe (') or single quote (' ').</p>
		</div>
	</div>

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
          var t = $("#state option:selected").val();
          // alert(t);
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
              url: "taluka.php", 
              data: { district : t} 
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
<script type="text/javascript">
  $(document).ready(function(){
    $("select#area").change(function(){
          var l = $("#area option:selected").val();
          // alert(l);
          $.ajax({
              type: "POST",
              url: "landmark.php", 
              data: { area : l} 
          }).done(function(data){
              $("#landmark").html(data);
          });
      });
  });
</script>
<?php
  error_reporting(E_ALL & ~E_NOTICE);

 if(isset($_POST['submit']))
 {
 	extract($_POST); 	

 $chk=implode(',', $_POST['fld_ven_user_check']);

	$add="insert into tbl_message(fld_ven_user,fld_ven_user_check,fld_state_id,fld_district_id,fld_taluka_id,fld_city_id,fld_area_id,fld_message_description,fld_message_delete) values('$fld_ven_user','$chk','$state', '$district', '$taluka', '$city', '$area','$fld_message_description','0')";
	 $result=mysqli_query($connect, $add) or die(mysqli_error($connect));

	 //$query1="select mobile from vendor where vendor_status='Approved' group by vendor_id order by vendor_id desc";


  $query1="select v.*, b.*, s.*, d.*, u.* from vendor v, tbl_state s, business_information b, tbl_district d, user u where v.vendor_status='Approved' and b.vendor_id=v.vendor_id and s.fld_state_id=d.fld_state_id group by v.vendor_id order by v.vendor_id desc";

 $row=mysqli_query($connect, $query1) or die(mysqli_error($connect));

	 if ($result && $row) 
     {

    	 


             while($fetch=mysqli_fetch_array($row)) {

 //echo "hii";
            extract($fetch);
  //$mobile=$_POST['mobile'];

           	$msg=$_POST['fld_message_description'];
					        

					$mobile=$mobile;


					       $msg="Your OTP Verfication Code is '".$msg."'. Please do not share it with anyone. -5um@g0";
           $ch = "SUMAGO";
                		
          $apiurl = "http://sms.happysms.in/api/sendhttp.php?authkey=240394AvXoLMXQL9P5bb1b130&mobiles=$mobile&message=$msg&sender=$ch&route=4&country=91&DLT_TE_ID=1207162798995433854";
           $apiurl = str_replace(" ", '%20', $apiurl);
         //echo '>>'.$apiurl;
           //exit;
            $ch = curl_init($apiurl);
            $get_url = $apiurl;
            curl_setopt($ch, CURLOPT_POST,0);
            curl_setopt($ch, CURLOPT_URL, $get_url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
            curl_setopt($ch, CURLOPT_HEADER,0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            $return_val = curl_exec($ch);

        }


        echo "<script>";
        echo "alert('Message Sent');";
        echo "</script>";                 
    }
    else
    {
        echo "<script>";
        echo "alert('Error');";
        echo "</script>";
    }

	}
?>


