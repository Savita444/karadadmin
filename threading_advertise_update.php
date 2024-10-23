<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>View Slider Advertise</title>

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
                <h4>Update Threading Advertise</h4>
              </div>
              <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <!-- <li class="breadcrumb-item"><a href="slider_advertise_view.php">Slider Advertise</a></li> -->
                  <li class="breadcrumb-item active" aria-current="page">Update Threading Advertise</li>
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
<?php 
  $abc=mysqli_query($connect,"select * from threading_image where threading_image_id='".$_GET['threading_image_id']."'") or die(mysqli_error($connect));
  $view=mysqli_fetch_array($abc);
?> 
          <form method="post" enctype="multipart/form-data">
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Title <span style="color: red;">*</span> : </label>
              <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" placeholder="Enter Title" name="title" required="" oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $view['title']?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Description(Single line) <span style="color: red;">*</span> : </label>
              <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" placeholder="Enter Description" name="discription" required="" oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $view['discription']?>">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Image <span style="color: red;">*</span> : </label>
              <div class="col-sm-12 col-md-10">
                 <div class="preview_box">
                    <?php
                        if ($view['image']=="") 
                        {
                    ?>
                            <img src="images/No-image-full.jpg" alt="" id="preview_img" height="100px" width="100px"/>
                    <?php
                        }
                        else
                        {
                    ?>                                        
                            <img src="images/threading_image/<?php echo $view['image'];?>" alt="" id="preview_img" height="100px" width="100px" />
                    <?php
                        }
                    ?>
                    <input type="file" name="photo" id="image"  />
                </div>
               <!--  <input type="file" id="image" name="photo"  accept=" .jpg , .jpeg , .png , .gif" required="" /> -->
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Name <span style="color: red;">*</span> : </label>
              <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" placeholder="Enter Name" name="fname" required="" oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $view['name']?>">
              </div>
            </div>
             <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Mobile Number <span style="color: red;">*</span> : </label>
              <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" placeholder="Enter Mobile Number" name="mobile" required="" maxlength="10" minlength="10" pattern="[789]{1}[0-9]{9}" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $view['mobile_number']?>">
              </div>
            </div>
             <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">District <span style="color: red;">*</span> : </label>
               <div class="col-sm-12 col-md-10">
                  <select class="form-control custom-select" name="district" id="district" required="">
                    <option value="">Select District</option>
                    <?php
                      $cont=mysqli_query($connect,"select * from tbl_district") or die(mysqli_error($connect));
                      while ($fetch_country1=mysqli_fetch_array($cont)) {
                    ?>
                    <option value="<?php echo $fetch_country1['fld_district_id']; ?>" <?php if($fetch_country1['fld_district_id']==$view['fld_district_id']) {echo "selected";} ?>><?php echo $fetch_country1['fld_district_name']; ?></option>
                  <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Taluka <span class="text-danger">*</span> : </label>
                <div class="col-sm-12 col-md-10">
                  <select name="taluka" class="form-control custom-select" id="taluka" required="" style="width: 100%">
                                        <option value="">Select Taluka</option>
                                        <?php
                                $query11=mysqli_query($connect,"select * from tbl_taluka where fld_taluka_delete='0' and fld_district_id='".$view['fld_district_id']."' order by fld_taluka_id desc");
                                            while($row11=mysqli_fetch_assoc($query11)){
                                              extract($row11);

                                          ?>
                                        <option value="<?php echo $row11['fld_taluka_id'];?>" <?php if($row11['fld_taluka_id']==$view['fld_taluka_id']) {echo "selected";} ?>><?php echo $row11['fld_taluka_name'];?></option>
                                        <?php  }?>
                                      </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">City<span class="text-danger">*</span> : </label>
                <div class="col-sm-12 col-md-10">
                  <select name="city" class="form-control custom-select" id="city" required="" style="width: 100%">
                                        <option value="">Select City</option>
                                        <?php
                                $query_city=mysqli_query($connect,"select * from tbl_city where fld_city_delete='0' and fld_taluka_id='".$view['fld_taluka_id']."' order by fld_city_id desc");
                                            while($row_city=mysqli_fetch_assoc($query_city)){
                                              extract($row_city);

                                          ?>
                                        <option value="<?php echo $row_city['fld_city_id'];?>" <?php if($row_city['fld_city_id']==$view['fld_city_id']) {echo "selected";} ?>><?php echo $row_city['fld_city_name'];?></option>
                                        <?php  }?>
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
                <input type="submit" name="update" class="btn btn-success" value="Update">&nbsp;
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

    if(isset($_POST['update']))
    {
        extract($_POST);

           // upload Photo
                $name=$_FILES['photo']['name']; 
                $type=$_FILES['photo']['type']; 
                $size=$_FILES['photo']['size'];  
                $temp=$_FILES['photo']['tmp_name']; 

                if($name){
  
            $upload= "images/threading_image/";
            $imgExt=strtolower(pathinfo($name, PATHINFO_EXTENSION));
            $valid_ext= array('jpg','png','jpeg' );
            $photo= rand(1000,1000000).".".$imgExt;
            unlink($upload.$view['image']);
            move_uploaded_file($temp,$upload.$photo);
              }
              else
              {

                $photo=$view['image'];
              }


              $update=mysqli_query($connect,"update threading_image set
                title ='".$title."',
                discription ='".$discription."',
                image ='".$photo."',
                name ='".$fname."',
                mobile_number ='".$mobile."',
                fld_district_id ='".$district."',
                fld_taluka_id ='".$taluka."',
                fld_city_id ='".$city."'
                where threading_image_id='".$_GET['threading_image_id']."'") or die(mysqli_error($connect));
               
             

            if($update)
            {
               echo '<script type="text/javascript">';
               echo " alert('Threading Advertise Image Update Successfully.');";
               echo 'window.location.href = "threading_advertise_view.php";';
               echo '</script>';
  
            }
           else
           {
               echo '<script type="text/javascript">';
               echo " alert('Threading Advertise Image Not Update.');";
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