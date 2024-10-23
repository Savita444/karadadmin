<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
	
	<title>Update Admin Profile </title>
	<style>
            .form_box{width:500px; margin:0 auto; margin-top:10px; margin-bottom: 40px; text-align: left;}
            .fileinput{margin-left:0px;}
            .preview_box{clear: both; padding: 5px; margin-top: 10px; text-align:left;}
            .preview_box img{max-width: 150px; max-height: 150px;}
        </style> 
</head>
<body>
	<?php include('include/header.php');
include('include/sidebar.php'); ?>

	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12 d-flex">
							<div class="col-md-10">
							    <div class="title">
								<h4>Update Admin Profile </h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="#">Setting</a></li>
									<li class="breadcrumb-item active" aria-current="page">Update Admin Profile </li>
								</ol>
							</nav>
							</div>
							<div class="col-md-2 justify-content-end">
							<a class="btn btn-primary" href="dashboard.php" role="button">Back
							</a>
						</div>
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
							<!-- <h4 class="text-blue">Update Admin Profile</h4> -->
						</div>
						
					</div><br> 

					<?php 
                        $sel=mysqli_query($connect,"select * from admin where Email='".$_SESSION['admin_email']."' ") or die(mysqli_error($connect));
                        $fetch=mysqli_fetch_array($sel);
                    ?> 
					
					<form method="post" enctype="multipart/form-data">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="admin_name" placeholder="Name" required="" value="<?php echo $fetch['Name'];?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Email</label>
							<div class="col-sm-12 col-md-10">
								<input type="email" class="form-control" name="admin_email" placeholder="Email" required="" id="email" pattern="^(([-\w\d]+)(\.[-\w\d]+)*@([-\w\d]+)(\.[-\w\d]+)*(\.([a-zA-Z]{2,5}|[\d]{1,3})){1,2})$" value="<?php echo $fetch['Email'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Mobile</label>
							<div class="col-sm-12 col-md-10">
								<input type="text" class="form-control" placeholder="Mobile Number" name="admin_mobile" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10" minlength="10" pattern="[789]{1}[0-9]{9}" required="" value="<?php echo $fetch['Mobile'];?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Photo </label>
							<div class="col-sm-12 col-md-10">								
								<div class="preview_box">

                                    <?php
                                        if ($fetch['Photo']=="") 
                                        {
                                    ?>
                                            <img src="images/No-image-full.jpg" alt="John Doe" id="preview_img" height="100px" width="100px"/>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>                                        
                                            <img src="images/admin/<?php echo $fetch['Photo'];?>" alt="John Doe" id="preview_img" height="100px" width="100px" />
                                    <?php
                                        }
                                    ?>
                                    
                                </div>
                                <input type="file" name="photo" id="image" accept=".png, .jpg, .jpeg"  />								
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Address </label>
							<div class="col-sm-12 col-md-10">
								<textarea class="form-control"  name="admin_address" placeholder="Address " required=""><?php echo $fetch['Address'];?></textarea>
							</div>
						</div>
												
						<div class="form-group row">
<!-- 							<label class="col-sm-12 col-md-2 col-form-label">Submit</label>
 -->							<div class="col-sm-12 col-md-10">
							<center><input class="btn btn-success" value="Update" type="submit" name="update">
								<!-- <a href="javascript:history.back()"><input class="btn btn-danger" value="Back" type="button"></a></center> -->
							</div>
						</div>
					</form>

<?php

// error_reporting(0);
    
    if(isset($_POST['update']))
    {
     extract($_POST);
// $back="javascript:history.back()";

    $name=$_FILES['photo']['name'];
    $size=$_FILES['photo']['size'];
    $type=$_FILES['photo']['type'];
    $temp=$_FILES['photo']['tmp_name'];

        if($name)
            {
                 $desired_dir="images/admin/";  
                 unlink($desired_dir.$fetch['Photo']);             
                $admin_photo=uniqid().$name;
                $extension = strtolower(pathinfo($admin_photo,PATHINFO_EXTENSION));
                
                 move_uploaded_file($temp,"$desired_dir/".$admin_photo);
                // $a1 = $a;
                  $save = "$desired_dir/" . $admin_photo; //This is the new file you saving
                  $file = "$desired_dir/" . $admin_photo; //This is the original file

                  list($width, $height) = getimagesize($file) ;

                  $modwidth = 600;

                  // $diff = $width / $modwidth;

                  // $modheight = $height / $diff;
                  $modheight = 600;
                  $tn = imagecreatetruecolor($modwidth, $modheight) ;
                  if($extension=="jpg" || $extension=="jpeg" )
					{
					$size = $_FILES['file']['tmp_name'];
					$image = imagecreatefromjpeg($file);

					}
					else if($extension=="png")
					{
					$size = $_FILES['file']['tmp_name'];
					$image = imagecreatefrompng($file);

					}
                  // $image = imagecreatefromjpeg($file) ;
                  imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ;

                  imagejpeg($tn, $save, 100) ;

            }
        else
            {
                $admin_photo=$fetch['Photo'];
            }  

             $qw="update admin set
                Photo='".$admin_photo."', 
                Name='".$_POST['admin_name']."',
                Mobile='".$_POST['admin_mobile']."',
                Address='".$_POST['admin_address']."'
                where Email='".$_SESSION['admin_email']."'";
      
     $update=mysqli_query($connect,$qw) or die(mysqli_error($connect));
     
     if($update)
                              {
           echo '<script type="text/javascript">';
           echo " alert('Admin Profile Updated Successfully');";
           echo 'window.location.href = "profile.php";';
           echo '</script>';
      
                          }
                         else
                         {
           echo '<script type="text/javascript">';
           echo "alert('Admin Profile Not Update');";
           echo 'window.location.href = "profile.php";';
             echo '<script>';
                            //echo $cQry;
      
                         }
    }


?> 	
					

					 
	</div>
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
	<script type="text/javascript">
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
        </script>
	
</body>
</html>