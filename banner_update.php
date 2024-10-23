<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Update Banner Photos</title>
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
                <h4>Banner Photos</h4>
              </div>
              <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Banner Photos</li>
                </ol>
              </nav>
            </div>
            <div class="col-md-3 col-sm-3">              
              <a href="javascript:history.back()" ><button  class="btn btn-primary">Back</button></a>
            </div>
          </div>
        </div>


        
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
			<div class="clearfix">
				<div class="pull-left">
				  <!-- <h4 class="text-blue">Add Product Bill_type</h4> -->
				</div>

			</div><br> 
<?php 
  $abc=mysqli_query($connect,"select * from tbl_banner_images where banner_images_id='".$_GET['banner_id']."'") or die(mysqli_error($connect));
  $view=mysqli_fetch_array($abc);
?> 
			         
            <form method="post" enctype="multipart/form-data">

 <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Image <span style="color: red;">*</span> : </label>
              <div class="col-sm-12 col-md-10">
                 <div class="preview_box">
                    <?php
                        if ($view['banner_photo']=="") 
                        {
                    ?>
                            <img src="../images/admin/banner/No-image-full.jpg" alt="" id="preview_img" height="100px" width="100px"/>
                    <?php
                        }
                        else
                        {
                    ?>                                        
                            <img src="../images/admin/banner/<?php echo $view['banner_photo'];?>" alt="" id="preview_img" height="100px" width="100px" />
                    <?php
                        }
                    ?>
                    <input type="file" name="banner_photo" id="image"  />
                </div>
               <!--  <input type="file" id="image" name="photo"  accept=" .jpg , .jpeg , .png , .gif" required="" /> -->
              </div>
            </div>

             
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        
            </form>
        </div>
           
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

    if(isset($_POST['update']))
    {
        extract($_POST);

          // upload Photo
                $name=$_FILES['banner_photo']['name']; 
                $type=$_FILES['banner_photo']['type']; 
                $size=$_FILES['banner_photo']['size'];  
                $temp=$_FILES['banner_photo']['tmp_name']; 

                if($name){
  
            $upload= "../images/admin/banner/";
            $imgExt=strtolower(pathinfo($name, PATHINFO_EXTENSION));
            $valid_ext= array('jpg','png','jpeg' );
            $photo= rand(1000,1000000).".".$imgExt;
            unlink($upload.$view['banner_photo']);
            move_uploaded_file($temp,$upload.$photo);
              }
              else
              {

                $photo=$view['banner_photo'];
              }

            echo  $update=mysqli_query($connect,"update tbl_banner_images set
                
                banner_photo ='".$photo."',
                banner_photo_delete ='0'
                where banner_images_id='".$_GET['banner_id']."'") or die(mysqli_error($connect));
               
            if($update)
            {
               echo '<script type="text/javascript">';
               echo " alert('Banner Image Update Successfully.');";
               echo 'window.location.href = "banner_view.php";';
               echo '</script>';
  
            }
           else
           {
               echo '<script type="text/javascript">';
               echo " alert('Banner Image Not Update.');";
               echo 'window.location.href = "banner_view.php";';
               echo '<script>';
            }
    }
 ?>