<?php include('include/header_session.php'); ?>
 <!DOCTYPE html>
<html>
<head>
  <title>View Vendor</title>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>


    <?php include('include/head.php'); ?>
</head>
<body>
    <?php include('include/header.php'); ?>
    <?php include('include/sidebar.php'); ?>
    <div class="main-container">
        <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
            <div class="">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Add Vendor</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <!-- <li class="breadcrumb-item"><a href="slider_advertise_view.php">Slider Advertise</a></li> -->
                                    <li class="breadcrumb-item active" aria-current="page">Add Vendor</li>
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
<form method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Company Name <span style="color: red;">*</span>  </label>
                <div class="col-sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="Company Name" name="company_name" oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');" required="">
                </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Owner Name <span style="color: red;">*</span> : </label>
              <div class="col-sm-12 col-md-10">
               <input type="text" class="form-control" placeholder="Owner Name" name="owner_name" oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');" required="">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Mobile Number<span style="color: red;">*</span> : </label>
              <div class="col-sm-12 col-md-10">
              <input class="form-control" type="text" placeholder="Mobile Number" name="mobile" required="" maxlength="10" minlength="10" pattern="[789]{1}[0-9]{9}" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
              </div>
            </div>

          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Email <span style="color: red;">*</span> : </label>
            <div class="col-sm-12 col-md-10">
             <input type="email" class="form-control" placeholder="Email" name="email" required="">
            </div>
          </div>
           <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Date of Birth <span style="color: red;">*</span> : </label>
            <div class="col-sm-12 col-md-10">
              <input type="date" class="form-control" placeholder="YYYY-MM-DD" name="date_of_birth" required="">
            </div>
          </div>
           <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Password <span style="color: red;">*</span> : </label>
            <div class="col-sm-12 col-md-10">
              <input type="password" class="form-control" placeholder="Enter Password" name="password" required="">
            </div>
          </div>
           <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Gender <span style="color: red;">*</span> : </label>
             <div class="col-sm-12 col-md-10">
                <input type="radio" name="gender" value="Male" required=""> Male
                <input type="radio" name="gender" value="Female" required=""> Female
              </div>
            </div>
            <div class="form-group row">
<!--                 <label class="col-sm-12 col-md-2 col-form-label">Package Type<span style="color: red;">*</span> : </label>
 -->                <div class="col-sm-12 col-md-10">
                   <input class="form-control" id="fld_product_type_status" name="fld_product_type_status" readonly="readonly"  type="hidden" value="<?php echo('free') ?>" /> 
                    
                </div>
            </div>

<div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Profile Photo<span style="color: red;">*</span> : </label>
                <div class="col-sm-12 col-md-4">
<!--                     <label>Photo<span class="text-danger">*</span> :</label>
 -->                  <div class="preview_box">
          
                    <img id="preview_img" src="../images/vendor/profile/No-image-full.jpg" height="100" width="100"/><br><br>
          
                    <input type="file" id="image" name="fld_vendor_photo"  accept=".png, .jpg, .jpeg" class="validate[required] text-input" required="" />
                    </div>
                    
                </div>
                 <label class="col-sm-12 col-md-2 col-form-label">Shop Act Photo<span style="color: red;">*</span> : </label>
                <div class="col-sm-12 col-md-4">
<!--                     <label>Photo<span class="text-danger">*</span> :</label>
 -->                  <div class="preview_box">
          
                    <img id="preview_img1" src="../images/vendor/shopact/No-image-full.jpg" height="100" width="100"/><br><br>
          
                    <input type="file" id="image1" name="shop_act"  accept=".png, .jpg, .jpeg" class="validate[required] text-input" required="" />
                    </div>
                    
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Pan Card Photo<span style="color: red;">*</span> : </label>
                <div class="col-sm-12 col-md-4">
<!--                     <label>Photo<span class="text-danger">*</span> :</label>
 -->                  <div class="preview_box">
          
                    <img id="preview_img2" src="../images/vendor/pancard/No-image-full.jpg" height="100" width="100"/><br><br>
          
                    <input type="file" id="image2" name="pan_card"  accept=".png, .jpg, .jpeg" class="validate[required] text-input" required="" />
                    </div>
                    
                </div>
                 <label class="col-sm-12 col-md-2 col-form-label">Aadhar Card Photo<span style="color: red;">*</span> : </label>
                <div class="col-sm-12 col-md-4">
<!--                     <label>Photo<span class="text-danger">*</span> :</label>
 -->                  <div class="preview_box">
          
                    <img id="preview_img3" src="../images/vendor/aadharcard/No-image-full.jpg" height="100" width="100"/><br><br>
          
                    <input type="file" id="image3" name="aadhar_card"  accept=".png, .jpg, .jpeg" class="validate[required] text-input" required="" />
                    </div>
                    
                </div>
            </div>
                <div class="form-group row">
                    <div class="col-md-5"></div>
                    <div class="col-sm-6">
                        <input type="submit" name="submit" class="btn btn-success" value="Submit">&nbsp;
                        <input type="reset" name="reset" class="btn btn-danger" value="Reset">&nbsp;
                        <a href="vendor_view.php" class="btn btn-warning">Back</a>
                    </div>
                </div>
                </div>
            </form>
    
            <?php include('include/footer.php'); ?>
        </div>
    </div>
    <?php include('include/script.php'); 
        // include('include/footer.php');
  ?>
</body>
</html>

<?php

    if(isset($_POST['submit']))
    {   
      extract($_POST);
        $sql="select email from vendor where email='".$_POST['email']."'";
        $sql_res = mysqli_query($connect,$sql);

        if (mysqli_num_rows($sql_res) != 0)
        {
            echo "<script>";
            echo "alert('Vendor Already Exist');";
            echo "</script>";
        }
        else
        {
   
       //Vendor Profile Photo
          $name=$_FILES['fld_vendor_photo']['name'];
          $type=$_FILES['fld_vendor_photo']['type'];
          $size=$_FILES['fld_vendor_photo']['size'];
          $temp=$_FILES['fld_vendor_photo']['tmp_name'];
          if($name){
  
            $upload= "../images/vendor/profile/";
            $imgExt=strtolower(pathinfo($name, PATHINFO_EXTENSION));
            $valid_ext= array('jpg','png','jpeg' );
            $fld_vendor_photo= rand(1000,1000000).".".$imgExt;
            move_uploaded_file($temp,$upload.$fld_vendor_photo);

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


        $add="insert into vendor(company_name,owner_name,mobile,email,date_of_birth,password,gender,fld_vendor_photo,shop_act,pan_card,aadhar_card) values('$company_name','$owner_name','$mobile','$email','$date_of_birth','$password','$gender','$fld_vendor_photo', '$shop_act', '$pan_card', '$aadhar_card')";
        $ans=mysqli_query($connect,$add) or die(mysqli_error($connect));
        if ($ans) 
        {
            echo "<script>";
            echo "alert('Vendor Added Successfully');";
            echo "window.location.href='vendor_view.php';";
            echo "</script>";
        }
        else
        {
            echo "<script>";
            echo "alert('Error');";
            echo "window.location.href='vendor_view.php';";
            echo "</script>";
        }
    }
    }

?>


<!-- Vendor Profile Photo -->
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

       