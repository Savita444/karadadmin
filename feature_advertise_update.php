<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Update Slider Advertise</title>

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
                    readImageData1(this);//Call image read and render function
                });
            });
             
            function readImageData1(imgData){
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
                <h4>Update Feature Advertise</h4>
              </div>
              <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <!-- <li class="breadcrumb-item"><a href="slider_advertise_view.php">Slider Advertise</a></li> -->
                  <li class="breadcrumb-item active" aria-current="page">Update Feature Advertise</li>
                </ol>
              </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
              <div class="dropdown">
                <a class="btn btn-primary" href="feature_advertise_view.php" role="button">
                  View Feature Advertise
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
  $abc=mysqli_query($connect,"select * from feature_image where feature_image_id='".$_GET['feature_image_id']."'") or die(mysqli_error($connect));
  $view=mysqli_fetch_array($abc);
  extract($view);
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
              <label class="col-sm-12 col-md-2 col-form-label">Feature Image<span style="color: red;">*</span> : </label>
              <div class="col-sm-12 col-md-10">
 <div class="preview_box">
                    <?php
                        if ($view['feature_image']=="") 
                        {
                    ?>
                            <img src="../images/admin/feature/No-image-full.jpg" alt="" id="preview_img" height="100px" width="100px"/>
                    <?php
                        }
                        else
                        {
                    ?>                                        
                            <img src="../images/admin/feature/<?php echo $view['feature_image'];?>" alt="" id="preview_img" height="100px" width="100px" />
                    <?php
                        }
                    ?>
                    <input type="file" name="feature_image" id="image"  />
                </div>              </div>
            </div>    
             <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Business Type<span style="color: red;">*</span> : </label>
              <div class="col-sm-12 col-md-10">
                    <select name="business_type" id="business_type" class="form-control" required="">
                              <option value="">Select Business Type</option>
                                <?php 
                                $cat=mysqli_query($connect,"select * from tbl_business_type where fld_business_delete ='0' order by fld_business_id desc") or die(mysqli_error($connect));  
                                  while ($fetch2=mysqli_fetch_array($cat)) {
                              ?>
                                    <option value="<?php echo $fetch2['fld_business_id']; ?>" <?php if($view['fld_business_id']==$fetch2['fld_business_id']){ echo "selected";} ?>>
                                      <?php echo $fetch2['fld_business_name'] ?>
                                     </option>

                              <?php      
                                  }
                                ?>
                            </select>              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Business Category <span style="color: red;">*</span> : </label>
              <div class="col-sm-12 col-md-10">
                     <select name="business_category" id="business_category" class="form-control" required="">
                              <option value="">Select Business Category</option>
                                <?php 
                                  $cat1=mysqli_query($connect,"select * tbl_business_category");

                                  $cat1=mysqli_query($connect,"select * from tbl_business_category where fld_business_category_delete='0' and fld_business_id='".$view['fld_business_id']."' order by fld_business_category_id desc");
                                  while ($fetch2=mysqli_fetch_array($cat1)) {
                              ?>
                                    <option value="<?php echo $fetch2['fld_business_category_id']; ?>" <?php if($view['fld_business_category_id']==$fetch2['fld_business_category_id']){ echo "selected";} ?>>
                                      <?php echo $fetch2['fld_business_category_name'] ?>
                                     </option>

                              <?php      
                                  }
                                ?>
                            </select>              </div>
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
              <label class="col-sm-12 col-md-2 col-form-label">State <span style="color: red;">*</span> : </label>
               <div class="col-sm-12 col-md-10">
                  <select class="form-control custom-select" name="state" id="state" required="">
                    <option value="">Select State</option>
                    <?php
                      $query_state=mysqli_query($connect,"select * from tbl_state") or die(mysqli_error($connect));
                      while ($fetch_state=mysqli_fetch_array($query_state)) {
                    ?>
                    <option value="<?php echo $fetch_state['fld_state_id']; ?>" <?php if($fetch_state['fld_state_id']==$view['fld_state_id']) {echo "selected";} ?>><?php echo $fetch_state['fld_state_name']; ?></option>
                  <?php } ?>
                  </select>
                </div>
              </div>
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">District <span style="color: red;">*</span> : </label>
               <div class="col-sm-12 col-md-10">
                  <select class="form-control custom-select" name="district" id="district" required="">
                    <option value="">Select District</option>
                    <?php
                      $query_district=mysqli_query($connect,"select * from tbl_district where fld_district_delete='0'and fld_state_id='".$view['fld_state_id']."' order by fld_district_id desc") or die(mysqli_error($connect));
                      while ($fetch_district=mysqli_fetch_array($query_district)) {
                         extract($fetch_district);
                    ?>
                    <option value="<?php echo $fetch_district['fld_district_id']; ?>" <?php if($fetch_district['fld_district_id']==$view['fld_district_id']) {echo "selected";} ?>><?php echo $fetch_district['fld_district_name']; ?></option>
                  <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Taluka <span style="color: red;">*</span> : </label>
               <div class="col-sm-12 col-md-10">
                  <select class="form-control custom-select" name="taluka" id="taluka" required="">
                    <option value="">Select Taluka</option>
                    <?php
                      $query_taluka=mysqli_query($connect,"select * from tbl_taluka where fld_taluka_delete='0'and fld_state_id='".$view['fld_state_id']."' order by fld_taluka_id desc") or die(mysqli_error($connect));
                      while ($fetch_taluka=mysqli_fetch_array($query_taluka)) {
                         extract($fetch_taluka);
                    ?>
                    <option value="<?php echo $fetch_taluka['fld_taluka_id']; ?>" <?php if($fetch_taluka['fld_taluka_id']==$view['fld_taluka_id']) {echo "selected";} ?>><?php echo $fetch_taluka['fld_taluka_name']; ?></option>
                  <?php } ?>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">City<span class="text-danger">*</span> : </label>
                <div class="col-sm-12 col-md-10">
                <select name="city" class="form-control custom-select" id="city" required="" style="width: 100%">
                                        <option value="">Select City</option>
                                        <?php
                                $query_city=mysqli_query($connect,"select * from tbl_city where fld_city_delete='0' and fld_district_id='".$view['fld_district_id']."' order by fld_city_id desc");
                                            while($row_city=mysqli_fetch_assoc($query_city)){
                                              extract($row_city);

                                          ?>
                                        <option value="<?php echo $row_city['fld_city_id'];?>" <?php if($row_city['fld_city_id']==$view['fld_city_id']) {echo "selected";} ?>><?php echo $row_city['fld_city_name'];?></option>
                                        <?php  }?>
                                      </select>
                </div>
              </div>
               <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Start Date<span style="color: red;">*</span> : </label>
              <div class="col-sm-12 col-md-4">
                <input class="form-control" type="date" value="<?php echo $view['fld_feature_start_date']?>" placeholder="Enter Title" name="fld_feature_start_date"  required="">
              </div>
                <label class="col-sm-12 col-md-2 col-form-label">End Date<span style="color: red;">*</span> : </label>
              <div class="col-sm-12 col-md-4">
                <input class="form-control" type="date" value="<?php echo $view['fld_feature_end_date']?>" placeholder="Enter Title" name="fld_feature_end_date" required="">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-5"></div>
              <div class="col-sm-6">
                <input type="submit" name="update" class="btn btn-success" value="Update">&nbsp;
                <!-- <input type="reset" name="reset" class="btn btn-danger" value="Reset">&nbsp; -->
                <a href="feature_advertise_view.php" class="btn btn-warning">Back</a>
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

 <script type="text/javascript">
  $(document).ready(function(){
    $("select#business_type").change(function(){
          var t = $("#business_type option:selected").val();
          // alert(t);
          $.ajax({
              type: "POST",
              url: "business_category.php", 
              data: { business_type : t} 
          }).done(function(data){
              $("#business_category").html(data);
          });
      });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("select#business_category").change(function(){
          var t = $("#business_category option:selected").val();
          // alert(t);
          $.ajax({
              type: "POST",
              url: "business_subcategory.php", 
              data: { business_category : t} 
          }).done(function(data){
              $("#business_subcategory").html(data);
          });
      });
  });
</script>
               

<script type="text/javascript">
  $(document).ready(function(){
    $("select#state").change(function(){
          var d = $("#state option:selected").val();
      
        // alert(d);
          $.ajax({
              type: "POST",
              url: "district.php", 
              data: { state : d  } 
          }).done(function(data){
              $("#district").html(data);
          });
      });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("select#district").change(function(){
          var t = $("#district option:selected").val();
          // alert(t);
          $.ajax({
              type: "POST",
              url: "taluka.php", 
              data: { district : t} 
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
<!-- <script type="text/javascript">
  $(document).ready(function(){
    $("select#district").change(function(){
          var t = $("#district option:selected").val();
          // alert(t);
          $.ajax({
              type: "POST",
              url: "district-city.php", 
              data: { district : t} 
          }).done(function(data){
              $("#city").html(data);
          });
      });
  });
</script> -->

<?php


//error_reporting(0);

    if(isset($_POST['update']))
    {
        extract($_POST);

           // upload Photo
                $name=$_FILES['feature_image']['name']; 
                $type=$_FILES['feature_image']['type']; 
                $size=$_FILES['feature_image']['size'];  
                $temp=$_FILES['feature_image']['tmp_name']; 

                if($name){
  
            $upload= "../images/admin/feature/";
            $imgExt=strtolower(pathinfo($name, PATHINFO_EXTENSION));
            $valid_ext= array('jpg','png','jpeg' );
            $feature_image= rand(1000,1000000).".".$imgExt;
            unlink($upload.$view['image']);
            move_uploaded_file($temp,$upload.$feature_image);
              }
              else
              {

                $feature_image=$view['feature_image'];
              }

              $update=mysqli_query($connect,"update feature_image set
                title ='".$title."',
                discription ='".$discription."',
                feature_image ='".$feature_image."',
                fld_business_id='".$business_type."',
                fld_business_category_id='".$business_category."',
                name ='".$fname."',
                mobile_number ='".$mobile."',
                fld_state_id ='".$state."',
                fld_district_id ='".$district."',
                fld_taluka_id ='".$taluka."',
                fld_city_id ='".$city."',
                fld_feature_start_date ='".$fld_feature_start_date."',
                fld_feature_end_date ='".$fld_feature_end_date."'
                where feature_image_id='".$_GET['feature_image_id']."'") or die(mysqli_error($connect));
               
             

            if($update)
            {
               echo '<script type="text/javascript">';
               echo " alert('Feature Advertise Image Update Successfully.');";
               echo 'window.location.href = "feature_advertise_view.php";';
               echo '</script>';
  
            }
           else
           {
               echo '<script type="text/javascript">';
               echo " alert('Feature Advertise Image Not Update.');";
               echo 'window.location.href = "feature_advertise_view.php";';
               echo '<script>';
            }
    }


?>               



