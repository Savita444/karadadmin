<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Privacy and Policy</title>

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
								<h4>Add Privacy and Policy</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<!-- <li class="breadcrumb-item"><a href="slider_advertise_view.php">Slider Advertise</a></li> -->
									<li class="breadcrumb-item active" aria-current="page">Add Privacy and Policy</li>
								</ol>
							</nav>
						</div>
            <div class="col-md-6 col-sm-12 text-right">
              <div class="dropdown">
                <a class="btn btn-primary" href="privacy_policy_view.php" role="button">
                  View Privacy and Policy
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
              
                <label class="col-sm-12 col-md-4 col-form-label">Privacy and Policy Heading<span class="text-danger">*</span> : </label>
                <div class="col-sm-12 col-md-8">
                  <input class="form-control" type="text" name="privacy_policy_heading"  placeholder="Enter Privacy and Policy Heading" required="">
                </div>
               </div>
                
               <div class="form-group row">
              <label class="col-sm-12 col-md-4 col-form-label">Privacy and Policy Description<span class="text-danger">*</span> : </label>
              <div class="col-sm-12 col-md-8">
                <textarea name="privacy_policy_desc" class="form-control" placeholder="Enter Privacy and Policy Description" required="" style="height: 125px;"></textarea>
               </div>
              </div>              
						<div class="form-group row">
							<div class="col-md-5"></div>
							<div class="col-sm-6">
								<input type="submit" name="submit" class="btn btn-success" value="Submit">&nbsp;
								<input type="reset" name="reset" class="btn btn-danger" value="Reset">&nbsp;
                <a href="privacy_policy_view.php" class="btn btn-warning">Back</a>
							</div>
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
                $query="INSERT INTO privacy_policy(privacy_policy_heading,privacy_policy_desc,privacy_policy_delete) VALUES ('$privacy_policy_heading','$privacy_policy_desc','0')";
                
             
                $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
                if ($row) 
                {
                    echo "<script>";
                    echo "alert('Privcy and Policy Added Successfully');";
                    echo "window.location.href='privacy_policy_view.php';";
                    echo "</script>";                 
                }
                else
                {
                    echo "<script>";
                    echo "alert('Error');";
                    echo "window.location.href='privacy_policy_view.php';";
                    echo "</script>";
               }
            
      }


?>               




