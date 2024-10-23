<?php include('include/header_session.php'); ?>
 --><!DOCTYPE html>
<html>
<head>
  <title>View Vendor</title>
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
                                <h4>Update Vendor</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <!-- <li class="breadcrumb-item"><a href="slider_advertise_view.php">Slider Advertise</a></li> -->
                                    <li class="breadcrumb-item active" aria-current="page">Update Vendor</li>
                                </ol>
                            </nav>
                        </div>
            <div class="col-md-6 col-sm-12 text-right">
              <div class="dropdown">
                <a class="btn btn-primary" href="vendor_view.php" role="button">
                  View Vendor
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
<?php 
  $abc=mysqli_query($connect,"select * from vendor where vendor_id='".$_GET['vendor_id']."'") or die(mysqli_error($connect));
  $view=mysqli_fetch_array($abc);
  extract($view);
?> 
<form method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Company Name <span style="color: red;">*</span> : </label>
                <div class="col-sm-12 col-md-10">
                    <input type="text" class="form-control" value="<?php echo $view['company_name']?>" placeholder="Company Name" name="company_name" oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');" required="">
                </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Owner Name <span style="color: red;">*</span> : </label>
              <div class="col-sm-12 col-md-10">
               <input type="text" class="form-control" value="<?php echo $view['owner_name']?>" placeholder="Owner Name" name="owner_name" oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');" required="">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Mobile Number<span style="color: red;">*</span> : </label>
              <div class="col-sm-12 col-md-10">
              <input class="form-control" type="text" value="<?php echo $view['mobile']?>" placeholder="Mobile Number" name="mobile" required="" maxlength="10" minlength="10" pattern="[789]{1}[0-9]{9}" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
              </div>
            </div>

          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Email <span style="color: red;">*</span> : </label>
            <div class="col-sm-12 col-md-10">
             <input type="email" class="form-control" value="<?php echo $view['email']?>" placeholder="Email" name="email" required="" readonly>
            </div>
          </div>
           <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Date of Birth <span style="color: red;">*</span> : </label>
            <div class="col-sm-12 col-md-10">
              <input type="date" class="form-control" value="<?php echo $view['date_of_birth']?>" placeholder="YYYY-MM-DD" name="date_of_birth" required="">
            </div>
          </div>
           <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Password <span style="color: red;">*</span> : </label>
            <div class="col-sm-12 col-md-10">
              <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $view['password']?>" required="" readonly>
            </div>
          </div>
           <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Gender <span style="color: red;">*</span> : </label>
             <div class="col-sm-12 col-md-10">
                <input type="radio" name="gender" value="Male" <?php if($gender=="Male") {echo "checked";} ?>> Male
                <input type="radio" name="gender" value="Female" <?php if($gender=="Female") {echo "checked";} ?>> Female
              </div>
            </div>

             <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Profile Photo<span style="color: red;">*</span> : </label>
            <div class="col-sm-12 col-md-4">
                
                <div class="preview_box">

                                    <?php
                                        if ($view['fld_vendor_photo']=="") 
                                        {
                                    ?>
                                            <img src="../images/vendor/profile/" alt="No Image" id="preview_img" height="100px" width="100px"/>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>                                        
                                            <img src="../images/vendor/profile/<?php echo $view['fld_vendor_photo'];?>" alt="No Image" id="preview_img" height="100px" width="100px" />
                                    <?php
                                        }
                                    ?>
                                    
                                </div>
                                <input type="file" name="fld_vendor_photo" id="image" accept=".png, .jpg, .jpeg"  />  
            </div>

              <label class="col-sm-12 col-md-2 col-form-label">Shop Act Photo<span style="color: red;">*</span> : </label>
            <div class="col-sm-12 col-md-4">
                
                <div class="preview_box">

                                    <?php
                                        if ($view['shop_act']=="") 
                                        {
                                    ?>
                                            <img src="../images/vendor/shopact/" alt="No Image" id="preview_img1" height="100px" width="100px"/>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>                                        
                                            <img src="../images/vendor/shopact/<?php echo $view['shop_act'];?>" alt="No Image" id="preview_img1" height="100px" width="100px" />
                                    <?php
                                        }
                                    ?>
                                    
                                </div>
                                <input type="file" name="shop_act" id="image1" accept=".png, .jpg, .jpeg"  />  
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Pan Card Photo<span style="color: red;">*</span> : </label>
            <div class="col-sm-12 col-md-4">
                
                <div class="preview_box">

                                    <?php
                                        if ($view['pan_card']=="") 
                                        {
                                    ?>
                                            <img src="../images/vendor/pancard/" alt="No Image" id="preview_img2" height="100px" width="100px"/>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>                                        
                                            <img src="../images/vendor/pancard/<?php echo $view['pan_card'];?>" alt="No Image" id="preview_img2" height="100px" width="100px" />
                                    <?php
                                        }
                                    ?>
                                    
                                </div>
                                <input type="file" name="pan_card" id="image2" accept=".png, .jpg, .jpeg"  />  
            </div>

              <label class="col-sm-12 col-md-2 col-form-label">Aadhar Card Photo<span style="color: red;">*</span> : </label>
            <div class="col-sm-12 col-md-4">
                
                <div class="preview_box">

                                    <?php
                                        if ($view['aadhar_card']=="") 
                                        {
                                    ?>
                                            <img src="../images/vendor/aadharcard/" alt="No Image" id="preview_img3" height="100px" width="100px"/>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>                                        
                                            <img src="../images/vendor/aadharcard/<?php echo $view['aadhar_card'];?>" alt="No Image" id="preview_img3" height="100px" width="100px" />
                                    <?php
                                        }
                                    ?>
                                    
                                </div>
                                <input type="file" name="aadhar_card" id="image3" accept=".png, .jpg, .jpeg"  />  
            </div>
          </div>
            <!-- <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Approved Date <span class="text-danger">*</span> : </label>
              <div class="col-sm-12 col-md-4">
                <input type="date" class="form-control" placeholder="YYYY-MM-DD" value="<?php //echo $view['approve_date']?>" name="approve_date" required="">
              </div>
               <label class="col-sm-12 col-md-2 col-form-label">End Date<span class="text-danger">*</span> : </label>
              <div class="col-sm-12 col-md-4">
                <input type="date" class="form-control" value="<?php //echo date('Y-m-d',strtotime(date("Y-m-d", mktime()) . " + 10 day"));?>"   placeholder="YYYY-MM-DD" name="end_date" required="">
              </div>
            </div> -->
            <!-- <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">End Date<span class="text-danger">*</span> : </label>
              <div class="col-sm-12 col-md-5">
                <input type="date" class="form-control" placeholder="YYYY-MM-DD" name="end_date" required="">
              </div>
            </div> -->
                <!-- <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Slider Description : </label>
                    <div class="col-sm-12 col-md-10">
                        <textarea class="textarea_editor form-control border-radius-0" name="Slider_description" placeholder="Enter Slider Description"></textarea>
                    </div>
                </div> -->

                <div class="form-group row">
                    <div class="col-md-5"></div>
                    <div class="col-sm-6">
                        <input type="submit" name="update" class="btn btn-success" value="Update">&nbsp;
                        <!--<input type="reset" name="reset" class="btn btn-danger" value="Reset">&nbsp;-->
                       <!--  <a href="vendor_view.php" class="btn btn-warning">Back</a> -->
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

    if(isset($_POST['update']))
    {   
      extract($_POST);

      $name1=$_FILES['fld_vendor_photo']['name'];
  $type=$_FILES['fld_vendor_photo']['type'];
  $size=$_FILES['fld_vendor_photo']['size'];
  $temp=$_FILES['fld_vendor_photo']['tmp_name'];
  if($name1)
      {
        
       $upload_dir = '../images/vendor/profile/';
          $imgExt = strtolower(pathinfo($name1,PATHINFO_EXTENSION)); // get image extension
          $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf'); // valid extensions
          $userpic = rand(1000,1000000).".".$imgExt;
          unlink($upload_dir.$fetch['fld_vendor_photo']);
          move_uploaded_file($temp,$upload_dir.$userpic); 
      }
      else
      {
        $userpic=$fetch['fld_vendor_photo'];
      }

       $sname=$_FILES['shop_act']['name'];
  $stype=$_FILES['shop_act']['type'];
  $ssize=$_FILES['shop_act']['size'];
  $stemp=$_FILES['shop_act']['tmp_name'];
  if($sname)
  {
  
        $upload= "../images/vendor/shopact/";
        $imgExt=strtolower(pathinfo($sname, PATHINFO_EXTENSION));
        $valid_ext= array('jpg','png','jpeg' );
        $shop_act= rand(1000,1000000).".".$imgExt;
        move_uploaded_file($stemp,$upload.$shop_act);


        $save = "$upload/" . $shop_act; //This is the new file you saving
    $file = "$upload/" . $shop_act; //This is the original file

    list($width, $height) = getimagesize($file) ;

    $modwidth = 760;

    // $diff = $width / $modwidth;

    // $modheight = $height / $diff;
    $modheight = 503;
    $tn = imagecreatetruecolor($modwidth, $modheight) ;
    if($imgExt=="jpg" || $imgExt=="jpeg" )
    {
      $image = imagecreatefromjpeg($file);
    }
    else if($imgExt=="png")
    {
      $image = imagecreatefrompng($file);
    }
    // $image = imagecreatefromjpeg($file) ;
    imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ;

    imagejpeg($tn, $save, 100) ;
    }

  $pname=$_FILES['pan_card']['name'];
  $ptype=$_FILES['pan_card']['type'];
  $psize=$_FILES['pan_card']['size'];
  $ptemp=$_FILES['pan_card']['tmp_name'];
  if($pname)
  {
  
    $upload= "../images/vendor/pancard/";
    $imgExt=strtolower(pathinfo($pname, PATHINFO_EXTENSION));
    $valid_ext= array('jpg','png','jpeg' );
    $pan_card= rand(1000,1000000).".".$imgExt;
    move_uploaded_file($ptemp,$upload.$pan_card);

    $save = "$upload/" . $pan_card; //This is the new file you saving
    $file = "$upload/" . $pan_card; //This is the original file

    list($width, $height) = getimagesize($file) ;

    $modwidth = 760;

    // $diff = $width / $modwidth;

    // $modheight = $height / $diff;
    $modheight = 503;
    $tn = imagecreatetruecolor($modwidth, $modheight) ;
    if($imgExt=="jpg" || $imgExt=="jpeg" )
    {

      $image = imagecreatefromjpeg($file);

    }
    else if($imgExt=="png")
    {

      $image = imagecreatefrompng($file);

    }
    // $image = imagecreatefromjpeg($file) ;
    imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ;

    imagejpeg($tn, $save, 100) ;
    }

  $aname=$_FILES['aadhar_card']['name'];
  $atype=$_FILES['aadhar_card']['type'];
  $asize=$_FILES['aadhar_card']['size'];
  $atemp=$_FILES['aadhar_card']['tmp_name'];
  if($aname)
  {
  
    $upload= "../images/vendor/aadharcard/";
    $imgExt=strtolower(pathinfo($aname, PATHINFO_EXTENSION));
    $valid_ext= array('jpg','png','jpeg' );
    $aadhar_card= rand(1000,1000000).".".$imgExt;
    move_uploaded_file($atemp,$upload.$aadhar_card);

    $save = "$upload/" . $aadhar_card; //This is the new file you saving
    $file = "$upload/" . $aadhar_card; //This is the original file

    list($width, $height) = getimagesize($file) ;

    $modwidth = 760;

    // $diff = $width / $modwidth;

    // $modheight = $height / $diff;
    $modheight = 503;
    $tn = imagecreatetruecolor($modwidth, $modheight) ;
    if($imgExt=="jpg" || $imgExt=="jpeg" )
    {

      $image = imagecreatefromjpeg($file);

    }
    else if($imgExt=="png")
    {

      $image = imagecreatefrompng($file);

    }
    // $image = imagecreatefromjpeg($file) ;
    imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ;

    imagejpeg($tn, $save, 100) ;
    }



             $add="Update vendor set
            company_name='".$company_name."',
            owner_name='".$owner_name."',
            mobile='".$mobile."',
            email='".$email."',
            date_of_birth='".$date_of_birth."',
            password='".$password."',
            gender='".$gender."',
            fld_vendor_photo='".$userpic."',
            shop_act='".$shop_act."',
            pan_card='".$pan_card."',
            aadhar_card='".$aadhar_card."'
             where vendor_id='".$_GET['vendor_id']."'";

        $ans=mysqli_query($connect,$add) or die(mysqli_error($connect));
         // $back="javascript:history.back()";
        if ($ans) 
        {
         

          
            echo "<script>";
            echo "alert('Vendor Update Successfully');";
            echo "window.location.href='vendor_view.php';";
            echo "</script>";
        }
        else
        {
            echo "<script>";
            echo "alert('Error');";
            // echo "window.location.href='vendor_view.php';";
            echo "</script>";
        }
    }
   

?>


<!-- Employee Photo Photo -->
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
        <!-- Shop Act Photo -->
  <script type="text/javascript">
            $(document).ready(function(){
                //Image file input change event
                $("#image1").change(function(){
                    readImageData1(this);//Call image read and render function
                });
            });
             
            function readImageData1(imgData){
                if (imgData.files && imgData.files[0]) {
                    var readerObj = new FileReader();
                    
                    readerObj.onload = function (element) {
                        $('#preview_img1').attr('src', element.target.result);
                    }
                    
                    readerObj.readAsDataURL(imgData.files[0]);
                }
            }
        </script> 

        <!-- PAN Card Photo -->
        <script type="text/javascript">
            $(document).ready(function(){
                //Image file input change event
                $("#image2").change(function(){
                    readImageData2(this);//Call image read and render function
                });
            });
             
            function readImageData2(imgData){
                if (imgData.files && imgData.files[0]) {
                    var readerObj = new FileReader();
                    
                    readerObj.onload = function (element) {
                        $('#preview_img2').attr('src', element.target.result);
                    }
                    
                    readerObj.readAsDataURL(imgData.files[0]);
                }
            }
        </script>



<!-- Aadhar Card Photo -->
        <script type="text/javascript">
            $(document).ready(function(){
                //Image file input change event
                $("#image3").change(function(){
                    readImageData3(this);//Call image read and render function
                });
            });
             
            function readImageData3(imgData){
                if (imgData.files && imgData.files[0]) {
                    var readerObj = new FileReader();
                    
                    readerObj.onload = function (element) {
                        $('#preview_img3').attr('src', element.target.result);
                    }
                    
                    readerObj.readAsDataURL(imgData.files[0]);
                }
            }
        </script>

       

