<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Banner</title>
  <?php include('include/head.php'); ?>
  <style>
    
        .preview_box{clear: both; padding: 5px; margin-top: 10px; text-align:left;}
        .preview_box img{max-width: 100px; max-height: 100px;}
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
            <div class="col-md-9 col-sm-9">
              <div class="title">
                <h4>Banner</h4>
              </div>
              <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Banner</li>
                </ol>
              </nav>
            </div>
            <div class="col-md-3 col-sm-3">              
              <a  href="banner_view.php" ><button  class="btn btn-primary">View Banner</button></a>
            </div>
          </div>
        </div>


        
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
			<div class="clearfix">
				<div class="pull-left">
				  <!-- <h4 class="text-blue">Add Product Bill_type</h4> -->
				</div>

			</div><br> 
           
      <form method="post" enctype="multipart/form-data">
        <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Banner Image<span style="color: red;">*</span> : </label>
              <div class="col-sm-12 col-md-10">
                <!-- <input  name="files[]" type="file" multiple required="" accept=" .jpg , .jpeg , .png , .gif" id="fileupload"> -->
                <img id="preview_img" src="../images/admin/banner/No-image-full.jpg" height="100" width="100"/>
                 <input type="file" id="image" name="banner_photo"  accept=" .jpg , .jpeg , .png " required="" />
                <!-- <p class="help-block" style="color: red">Select multiple images. In width-1680 X height-700 Size.</p>
                <br> -->
                <div id="preview_img"></div>
              </div>
            </div>
				<div class="row">									
                	<div class="col-md-12">
						<div class="form-group">
							<center>
							    <button class="btn btn-success" name="submit" type="submit" value="Submit">Submit</button>
							    <!--<button class="btn btn-danger" name="reset" type="reset" value="Reset">Reset</button>-->
							    <a href="banner_view.php"><button class="btn btn-warning" name="button" type="button" value="Back">Back</button></a>							    
						    </center>
						</div>
					</div>
				</div>
            </form>

           
        </div>
      <?php include('include/footer.php'); ?>
    </div>
  </div>
  <?php include('include/script.php'); ?>
  

</body>
</html>
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

<?php 
  if(isset($_POST['submit']))
    {
        extract($_POST);

           // upload Photo
                $name=$_FILES['banner_photo']['name']; 
                $type=$_FILES['banner_photo']['type']; 
                $size=$_FILES['banner_photo']['size'];  
                $temp=$_FILES['banner_photo']['tmp_name']; 

                if($name)
                {
                  $upload="../images/admin/banner/";
                  $imgExt=strtolower(pathinfo($name, PATHINFO_EXTENSION));
                  $validExt=array(".png, .jpg, .jpeg"); 
                  $banner_photo=rand(100,10000).".".$imgExt;
                  move_uploaded_file($temp,$upload.$banner_photo);
                }    

               echo $query="INSERT into tbl_banner_images(banner_photo, banner_photo_delete) VALUES('$banner_photo','0'); ";
               
                 $add2=mysqli_query($connect,$query); 

            if($add2)
            {
               echo '<script type="text/javascript">';
               echo " alert('Banner Image Added Successfully.');";
               echo 'window.location.href = "banner_view.php";';
               echo '</script>';
  
            }
           else
           {
               echo '<script type="text/javascript">';
               echo " alert('Banner Image Not Added.');";
               echo 'window.location.href = "banner_view.php";';
               echo '<script>';
            }
    }
?>