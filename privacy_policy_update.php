<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Update Privacy and Policy</title>
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
                <h4>Update Privacy and Policy</h4>
              </div>
              <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Update Privacy and Policy</li>
                </ol>
              </nav>
            </div>
            <div class="col-md-3 col-sm-3">              
              <a class="btn btn-primary" href="privacy_policy_view.php" role="button">
                  View Privacy and Policy
                </a>
            </div>
          </div>
        </div>


        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
    <div class="wizard-content">

     <?php 
if(isset($_GET['privacy_policy']))
{
$jhkj=mysqli_query($connect,"select * from privacy_policy where privacy_policy_id='".$_GET['privacy_policy']."'");
$fetch=mysqli_fetch_array($jhkj);
$total=mysqli_num_rows($jhkj);
extract($fetch);
 ?>
           
            <form  class="tab-wizard wizard-circle wizard" method="post" enctype="multipart/form-data">
              <h5></h5>
              <section>
        <div class="row form-group">
          <label class="col-sm-12 col-md-4 col-form-label">Privacy and Policy Heading<span class="text-danger">*</span> : </label>
             <div class="col-sm-12 col-md-8">
              <input class="form-control" type="text" name="privacy_policy_heading" placeholder="Enter Privacy and Policy Heading" required="" value="<?php echo $fetch['privacy_policy_heading'] ?>"  style="text-transform: capitalize;">
            </div>
        </div>
        <div class="row form-group">
            <label class="col-sm-12 col-md-4 col-form-label">Privacy and Policy Description <span class="text-danger">*</span> :</label>
              <div class="col-sm-12 col-md-8">
                 <textarea name="privacy_policy_desc" class="form-control" placeholder="Enter Term Condition Description" required="" style="height: 125px;"  style="text-transform: capitalize;"><?php echo $fetch['privacy_policy_desc'] ?></textarea>
            </div>
          </div>
        <div class="row">                 
                  <div class="col-md-12">
            <div class="form-group">
              <center>
                  <button class="btn btn-success" name="update" type="submit" value="Submit">Update</button>
                  <a href="privacy_policy_view.php"><button class="btn btn-warning" name="button" type="button" value="Back">Back</button></a>                  
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

</body>
</html>

<?php 

if(isset($_POST['update']))
{
  extract($_POST);
 
  echo $add="Update privacy_policy set
      privacy_policy_heading='".$privacy_policy_heading."',
      privacy_policy_desc='".$privacy_policy_desc."'
    
      where privacy_policy_id='".$_GET['privacy_policy']."'";
    $result=mysqli_query($connect, $add) or die(mysqli_error($connect));

    if($result)
    {
      echo "<script>";
      echo "alert('Privacy and Policy Updated Successfully');";
      echo "window.location.href='privacy_policy_view.php';";
      echo "</script>";
    }
    else
    {
      echo "<script>";
      echo "alert('Error In Privacy and Policy Updated');";
      echo "window.location.href='privacy_policy_view.php';";
      echo "</script>";
    }
}
 ?>