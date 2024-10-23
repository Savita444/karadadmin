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
								<h4>Schedule SMS</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<!-- <li class="breadcrumb-item"><a href="slider_advertise_view.php">Slider Advertise</a></li> -->
									<li class="breadcrumb-item active" aria-current="page">Send Schedule SMS</li>
								</ol>
							</nav>
						</div>
            <div class="col-md-6 col-sm-12 text-right">
             <!--  <div class="dropdown">
                <a class="btn btn-primary" href="sms_multiple_view.php" role="button">
                  View Schedule SMS
                </a>
              </div> -->
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
              <label class="col-sm-12 col-md-2 col-form-label">Mobile Number <span style="color: red;">*</span> : </label>
              <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" placeholder="Enter Mobile Number" name="mobile" required="" maxlength="10" minlength="10" pattern="[789]{1}[0-9]{9}" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
              </div>
            </div>
            <!-- <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Message Code <span class="text-danger">*</span> : </label>
              <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="Message_code" placeholder="Message Code" required="" value="GBSOLU" readonly=""  maxlength="6" minlength="6" onkeyup="myFunction()" id="Message_code" onchange="myFunction()">
                <p class="help-block" style="color: red">Note : Exactly 6 Characters can be enter.</p>
              </div>
            </div> -->
<!-- <script type="text/javascript">
    function myFunction() {
  var str = document.getElementById("Message_code").value;
  var res = str.toUpperCase();
  document.getElementById("Message_code").value = res;
}
</script> -->           

            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Message <span class="text-danger">*</span> : </label>
              <div class="col-sm-12 col-md-10">
                <!-- <textarea class="textarea_editor form-control border-radius-0"  name="Alert_message" placeholder="Enter Message " required=""></textarea> -->
                <textarea class="form-control"  name="Alert_message" placeholder="Enter Message " required="" maxlength="157"></textarea>
                <p class="help-block" style="color: red">Note : Please do not use apostrophe (') or single quote (' ') or double quote (" ") and also do not press Enter Key. Upto 157 Characters can be enter.</p>
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


