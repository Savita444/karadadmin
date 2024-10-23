<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>View Threading Advertise</title>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>


  <?php include('include/head.php'); ?>
   <style>
        .preview_box{clear: both; padding: 5px; margin-top: 10px; text-align: left;}
        .preview_box img{max-width: 150px; max-height: 150px;}
    </style>

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
                <h4>Add Threading Advertise</h4>
              </div>
              <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <!-- <li class="breadcrumb-item"><a href="slider_advertise_view.php">Slider Advertise</a></li> -->
                  <li class="breadcrumb-item active" aria-current="page">Add Threading Advertise</li>
                </ol>
              </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
              <div class="dropdown">
                <a class="btn btn-primary" href="threading_advertise_view.php" role="button">
                  View Threading Advertise
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
              <label class="col-sm-12 col-md-2 col-form-label">Title <span style="color: red;">*</span> : </label>
              <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" placeholder="Enter Title" name="title" required="" oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Description(Single line) <span style="color: red;">*</span> : </label>
              <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" placeholder="Enter Description" name="discription" required="" oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Image <span style="color: red;">*</span> : </label>
              <div class="col-sm-12 col-md-10">
                <!-- <input  name="files[]" type="file" multiple required="" accept=" .jpg , .jpeg , .png , .gif" id="fileupload"> -->
                <img id="preview_img" src="images/No-image-full.jpg" height="100" width="100"/>
                 <input type="file" id="image" name="photo"  accept=" .jpg , .jpeg , .png " required="" />
                <!-- <p class="help-block" style="color: red">Select multiple images. In width-1680 X height-700 Size.</p>
                <br> -->
                <div id="preview_img"></div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Name <span style="color: red;">*</span> : </label>
              <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" placeholder="Enter Name" name="fname" required="" oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');">
              </div>
            </div>
             <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Mobile Number <span style="color: red;">*</span> : </label>
              <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" placeholder="Enter Mobile Number" name="mobile" required="" maxlength="10" minlength="10" pattern="[789]{1}[0-9]{9}" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
              </div>
            </div>
             <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">District <span style="color: red;">*</span> : </label>
               <div class="col-sm-12 col-md-10">
                  <select class="form-control custom-select" name="district" id="district" required="">
                    <option value="">Select District</option>
                    <?php
                      $cont=mysqli_query($connect,"select * from tbl_district") or die(mysqli_error($connect));
                      while ($fetch_country=mysqli_fetch_array($cont)) {
                    ?>
                    <option value="<?php echo $fetch_country['fld_district_id']; ?>"><?php echo $fetch_country['fld_district_name']; ?></option>
                     <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Taluka Name<span class="text-danger">*</span> : </label>
                <div class="col-sm-12 col-md-10">
                  <select class="form-control custom-select" name="taluka" id="taluka" required="">
                    <option value="">Select Taluka</option>       
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">City Name<span class="text-danger">*</span> : </label>
                <div class="col-sm-12 col-md-10">
                  <select class="form-control custom-select" name="city" id="city" required="">
                    <option value="">Select City</option>        
                  </select>
                </div>
              </div>
            <!-- <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Slider Description : </label>
              <div class="col-sm-12 col-md-10">
                <textarea class="textarea_editor form-control border-radius-0" name="Slider_description" placeholder="Enter Slider Description"></textarea>
              </div>
            </div> -->

            <div class="form-group row">
              <div class="col-md-5"></div>
              <div class="col-sm-6">
                <input type="submit" name="submit" class="btn btn-success" value="Submit">&nbsp;
                <input type="reset" name="reset" class="btn btn-danger" value="Reset">&nbsp;
                <a href="threading_advertise_view.php" class="btn btn-warning">Back</a>
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


//error_reporting(0);

    if(isset($_POST['submit']))
    {
        extract($_POST);

           // upload Photo
                $name=$_FILES['photo']['name']; 
                $type=$_FILES['photo']['type']; 
                $size=$_FILES['photo']['size'];  
                $temp=$_FILES['photo']['tmp_name']; 

                if($name)
                {
                  $upload="images/threading_image/";
                  $imgExt=strtolower(pathinfo($name, PATHINFO_EXTENSION));
                  $validExt=array(".png, .jpg, .jpeg"); 
                  $photo=rand(100,10000).".".$imgExt;
                  move_uploaded_file($temp,$upload.$photo);
                }    


                $query="INSERT into threading_image(title,discription,image,name,mobile_number,fld_district_id,fld_taluka_id,fld_city_id) VALUES('$title','$discription','$photo','$fname','$mobile','$district','$taluka','$city'); ";
               
                 $add2=mysqli_query($connect,$query); 

            if($add2)
            {
               echo '<script type="text/javascript">';
               echo " alert('Threading Advertise Image Added Successfully.');";
               echo 'window.location.href = "threading_advertise_view.php";';
               echo '</script>';
  
            }
           else
           {
               echo '<script type="text/javascript">';
               echo " alert('Threading Advertise Image Not Added.');";
               echo 'window.location.href = "threading_advertise_view.php";';
               echo '<script>';
            }
    }


?>               




<script type="text/javascript">
  $(document).ready(function(){
    $("select#district").change(function(){
          var s = $("#district option:selected").val();
      
        // alert(s);
          $.ajax({
              type: "POST",
              url: "taluka.php", 
              data: { district : s  } 
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