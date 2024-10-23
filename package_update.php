<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Update Package</title>
  <?php include('include/head.php'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="src/plugins/jquery-steps/build/jquery.steps.css">
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
                <h4>Update Package</h4>
              </div>
              <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Update Package</li>
                </ol>
              </nav>
            </div>
            <div class="col-md-3 col-sm-3">              
              <a class="btn btn-primary" href="package_view.php" role="button">
                  View Packege
                </a>
            </div>
          </div>
        </div>


        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
    <div class="wizard-content">

     <?php 
if(isset($_GET['package_id']))
{
$jhkj=mysqli_query($connect,"select * from tbl_packages where fld_package_id='".$_GET['package_id']."'");
$fetch=mysqli_fetch_array($jhkj);
$total=mysqli_num_rows($jhkj);
extract($fetch);
 ?>
           
            <form  class="tab-wizard wizard-circle wizard" method="post" enctype="multipart/form-data">
              <h5></h5>
              <section>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Product Type<span class="text-danger">*</span> :</label>
              <select name="fld_product_type_id" class="form-control custom-select1" id="product_type_id" required="">
                  <option value="">Select Product Type</option> 
                  <?php
                    $cont=mysqli_query($connect,"select * from tbl_product_type where fld_product_type_delete='0' order by fld_product_type_id desc") or die(mysqli_error($connect));
                    while ($product_type1=mysqli_fetch_array($cont)) {
                  ?>
                  <option value="<?php echo $product_type1['fld_product_type_id']; ?>" <?php if($product_type1['fld_product_type_id']==$fetch['fld_product_type_id']) { echo "selected";} ?> ><?php echo $product_type1['fld_product_type_name']; ?></option>
                  <?php } ?>
                </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label >Package Name <span class="text-danger">*</span> :</label>
              <input type="text" class="form-control" placeholder="Enter Package Name" name="fld_package_name" required="" oninput="this.value = this.value.replace(/[^0-9a-zA-Z,-&\s]/g, '').replace(/(\..*)\./g, '$1');" style="text-transform: capitalize;" value="<?php echo $fetch['fld_package_name']; ?>">
            </div>
          </div>
        </div>
        <div class="row">
           <div class="col-md-6">
            <div class="form-group">
              <label >Business Type <span class="text-danger">*</span> :</label>
              <select name="business_id" id="business_type" class="form-control custom-select2" required="">
                              <option value="">Select Business Type</option>
                                <?php 
                                $cat=mysqli_query($connect,"select * from tbl_business_type where fld_business_delete ='0' order by fld_business_id desc") or die(mysqli_error($connect));  
                                  while ($fetch2=mysqli_fetch_array($cat)) {
                              ?>
                                    <option value="<?php echo $fetch2['fld_business_id']; ?>" <?php if($fetch2['fld_business_id']==$fetch['fld_business_id']){ echo "selected";} ?>>
                                      <?php echo $fetch2['fld_business_name'] ?>
                                     </option>

                              <?php      
                                  }
                                ?>
                            </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label >Business Category <span class="text-danger">*</span> :</label>
              <select name="fld_business_category_id" id="business_category" class="form-control custom-select3" required="">
                              <option value="">Select Business Category</option>
                                <?php 
                                  $cat11=mysqli_query($connect,"select * from tbl_business_category where fld_business_category_delete='0' and fld_business_id='".$fetch['fld_business_id']."' order by fld_business_category_id desc");
                                  while ($fetch11=mysqli_fetch_array($cat11)) {
                              ?>
                                    <option value="<?php echo $fetch11['fld_business_category_id']; ?>" <?php if($fetch['fld_business_category_id']==$fetch11['fld_business_category_id']){ echo "selected";} ?>>
                                      <?php echo $fetch11['fld_business_category_name'] ?>
                                     </option>

                              <?php      
                                  }
                                ?>
                            </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Amount<span class="text-danger">*</span> : </label>
                  <input class="form-control" type="text" name="fld_package_amount" id="txt1"  placeholder="Cost" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $fetch['fld_package_amount']; ?>" required="">
            </div>
          </div>
        <!--  <div class="col-md-6">
               <label class="col-form-label">Number of Request/Leads <span class="text-danger">*</span> : </label>
                <select name="fld_number_of_request_leads_id" class="form-control custom-select4" id="" required="">
                  <option value="">Select Number of Request/Leads</option> 
                  <?php
                    $request//=mysqli_query($connect,"select * from tbl_number_of_request_leads where fld_number_of_request_leads_delete ='0' order by fld_number_of_request_leads_id desc") or die(mysqli_error($connect));
                    //while ($fetch_request_type1=mysqli_fetch_array($request)) {
                  ?>
                    <option value="<?php //echo $fetch_request_type1['fld_number_of_request_leads_id']; ?>" <?php //if($fetch_request_type1['fld_number_of_request_leads_id']==$fetch['fld_number_of_request_leads_id']) { echo "selected";} ?> ><?php //echo $fetch_request_type1['fld_number_of_request_leads_name']; ?></option>
                  <?php //} ?>
                </select>
              </div>
        </div>
        <div class="row"> -->
          <div class="col-md-6">
            <div class="form-group">
            
              <label class="col-form-label">Validity in Days <span class="text-danger">*</span> : </label>

              <input class="form-control" type="text" name="fld_validity_in_days_number" id=""  placeholder="Cost" value="<?php echo $fetch['fld_validity_in_days_number']; ?>" required="">
                <!-- <select name="fld_validity_in_days_id" class="form-control custom-select5" id="fld_validity_in_days_name" required="">
                  <option value="">Select Validity in Days</option> 
                  <?php
                    $validity//=mysqli_query($connect,"select * from tbl_validity_in_days where fld_validity_in_days_delete ='0' order by fld_validity_in_days_id desc") or die(mysqli_error($connect));
                    //while ($fetch_validity=mysqli_fetch_array($validity)) {
                  ?>
                   <option value="<?php //echo $fetch_validity['fld_validity_in_days_id']; ?>" <?php //if($fetch_validity['fld_validity_in_days_id']==$fetch['fld_validity_in_days_id']) { echo "selected";} ?> ><?php //echo $fetch_validity['fld_validity_in_days_name']; ?></option>
                  <?php //} ?>
                </select> -->
              </div>
            </div>
          </div>
          
        
        
        
        <div class="row">                 
                  <div class="col-md-12">
            <div class="form-group">
              <center>
                  <button class="btn btn-success" name="update" type="submit" value="Submit">Update</button>
                  <button class="btn btn-danger" name="reset" type="reset" value="Reset">Reset</button>
                  <a href="package_view.php"><button class="btn btn-warning" name="button" type="button" value="Back">Back</button></a>                  
                </center>
            </div>
          </div>
        </div>
      </section>
            </form>
            <?php } ?>
        </div>
    </div>
           
        </div>
      <?php include('include/footer.php'); ?>
    </div>
  </div>
  <?php include('include/script.php'); ?>

 

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


</body>
</html>

<?php 

if(isset($_POST['update']))
{
  extract($_POST);
 
  echo $add="Update tbl_packages set
      fld_product_type_id='".$fld_product_type_id."',
      fld_package_name='".$fld_package_name."',
     fld_business_id='".$business_id."',
      fld_business_category_id='".$fld_business_category_id."',
      fld_package_amount='".$fld_package_amount."',
      fld_validity_in_days_number='".$fld_validity_in_days_number."'
      where fld_package_id='".$_GET['package_id']."'";
    $result=mysqli_query($connect, $add) or die(mysqli_error($connect));

    if($result)
    {
      echo "<script>";
    //   echo "alert('Package Updated Successfully');";
      echo "window.location.href='package_view.php';";
      echo "</script>";
    }
    else
    {
      echo "<script>";
      echo "alert('Error In Record Update');";
      echo "window.location.href='package_view.php';";
      echo "</script>";
    }
}
 ?>