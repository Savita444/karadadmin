<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
	<title> Change Password</title>
</head>
<body>
	<?php include('include/header.php');
include('include/sidebar.php'); ?>

	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Change Password</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="#">Setting</a></li>
									<li class="breadcrumb-item active" aria-current="page">Change Password</li>
								</ol>
							</nav>
						</div>
						<!-- <div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									January 2018
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Export List</a>
									<a class="dropdown-item" href="#">Policies</a>
									<a class="dropdown-item" href="#">View Assets</a>
								</div>
							</div>
						</div> -->
					</div>
				</div>


				
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<!-- <h4 class="text-blue">Change Password</h4> -->
						</div>
						
					</div><br> 	
					<form method="post">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Old Password</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="password" name="pass" placeholder="Enter Old Password" required="">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">New Password</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="password" name="pass1" placeholder="Enter New Password" required="">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Confirm Password</label>
							<div class="col-sm-12 col-md-10">
							<input class="form-control" type="password" name="pass2" placeholder="Confirm New Password" required="">
							</div>
						</div>
						
						
						
						<div class="form-group row">
<!-- 							<label class="col-sm-12 col-md-2 col-form-label">Submit</label>
 -->							<div class="col-sm-12 col-md-10">
							<center><input class="btn btn-success" value="Change Password" type="submit" name="change">
								<input class="btn btn-danger" value="Reset" type="reset"></center>
							</div>
						</div>
					</form>

					<?php
          if(isset($_POST['change']))
          {
              
            $query='select * from admin where Email="'.$_SESSION['admin_email'].'" and Password="'.$_POST['pass'].'"';
               $res=mysqli_query($connect,$query) or die(mysqli_error($connect));
            if(mysqli_num_rows($res)>0)
            {
                if(strlen($_POST['pass1'])>=0)
                {
                    if($_POST['pass1']==$_POST['pass2'])
                    {
                    $query1='update admin set Password="'.$_POST['pass1'].'"
                    where Email="'.$_SESSION['admin_email'].'"';
                    $res1=mysqli_query($connect,$query1) or die(mysqli_error($connect));
                    //echo $query1;
                    if($res1)
                    {
                    echo"<script>";
                    echo"alert('Password Changed Successfully');";
                    echo"</script>";
                    }
                    else
                    {
                        echo "Error";
                    }
                    }
                    else
                    {
                        echo"<script>";
                        echo"alert('Please Enter Correct Password');";
                        echo"</script>";
                    }
                }
                else
                {
                    echo"<script>";
                    echo"alert('Password Length Must Be Greater Than or Equal To 6');";
                    echo"</script>";
                }
            }
            else
            {
                echo"<script>";
                    echo"alert('Old Password Is Wrong. Please Enter Valid Password');";
                    echo"</script>";
            }
          }
          ?> 
	</div>
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
</body>
</html>