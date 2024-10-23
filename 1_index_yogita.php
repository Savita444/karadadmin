<?php
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
	

	<title>Admin Login</title>
	
	<?php include('include/head.php'); ?>
	<?php include('include/config.php'); ?>
	<script>
	     history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
	 </script>
</head>
<body>

	<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20" >

		<div class="login-box bg-white box-shadow pd-30 border-radius-5">
			<img src="vendors/images/login-img.png" alt="login" class="login-img">
			<h2 class="text-center mb-30">Admin Login</h2>
			<?php 
				if(isset($_POST['login']))
				    {
				        extract($_POST);
				         
						    
					        $email=mysqli_real_escape_string($connect,$_POST['email']);
					        $password=mysqli_real_escape_string($connect,$_POST['password']);
					        $asd="select * from admin where Email='$email' and Password='$password'";
					        $log=mysqli_query($connect,$asd) or die (mysqli_error($connect));
					            
					        if(mysqli_num_rows($log)>0)
					        {
					            if($_SESSION['CODE']==$_POST['captcha'])
					        	{
    					            $fetch=mysqli_fetch_array($log);
    					            
    					            $_SESSION['email']=$fetch['Email'];
    					            $_SESSION['name']=$fetch['Name'];
    					            
    					            
    					            echo "<script>";
    					            //echo "alert('Login Successfull');";
    					            echo 'window.location.href="dashboard.php";';
    					            echo "</script>";
					        	}
					        }
				       
				       	else
					        {
					            echo "<script>";
					            echo "alert('Please Enter Correct Username Or Password ');";
					            echo "</script>";
					            
					        } 
					
				    }
			 ?>
			<form method="post">
				<div class="input-group custom input-group-lg">
					<input type="email" class="form-control" placeholder="Email" name="email" required="">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="input-group custom input-group-lg">
					<input type="password" class="form-control" placeholder="Password" name="password" required="">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="input-group custom input-group-lg">
					<div class="col-sm-6">
						 <input type="text" name="captcha" id="captcha" required="reCAPTCHA is not valid. Please try again!" placeholder="Captcha" class="form-control">
						<!-- <div class="input-group-append custom">
							<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
						</div> -->
					</div>
					<div class="col-sm-6">
                        <img src="captcha.php" id="capt">
                    </div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="input-group">
								<input class="btn btn-outline-primary btn-lg btn-block" type="submit" value="Sign In" name="login">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<?php include('include/script.php'); ?>
</body>
</html>
<?php

  //   if(isset($_POST['login']))
  //   {
  //       extract($_POST);
  // // if($_SESSION['CODE']==$_POST['CODE'])
		// // { 
	 //        $email=mysqli_real_escape_string($connect,$_POST['email']);
	 //        $password=mysqli_real_escape_string($connect,$_POST['password']);
	 //        // $CODE=mysqli_real_escape_string($connect,$_POST['CODE']);

	      
	          
		//         $log=mysqli_query($connect,'select * from admin where Email="$email" and Password="$password"') or die (mysqli_error($connect));
		            
		//         if(mysqli_num_rows($log)>0)
		//         {
					
		// 	            $fetch=mysqli_fetch_array($log);
		      
		// 	            $_SESSION['email']=$fetch['Email'];
		// 	            $_SESSION['name']=$fetch['Name'];
		// 	            // $_SESSION['CODE']=$_POST['CODE'];
			            
		// 	            echo "<script>";
		// 	            echo "alert('Login Successfull');";
		// 	            echo 'window.location.href="dashboard.php";';
		// 	            echo "</script>";
		//         }
	   		
	 //        else
	 //        {
	 //            echo "<script>";
	 //            echo "alert('Please Enter Correct Username Or Password');";
	 //            echo "</script>";
  //       	}
  //       // }
  //   }

?>