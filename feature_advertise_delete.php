<?php include('include/header_session.php'); ?>
<?php
//error_reporting(0);
include "include/config.php";
           
  $sel=mysqli_query($connect,"select * from feature_image where feature_image_id='".$_GET['feature_image_id']."' ");
while ($fetch=mysqli_fetch_array($sel))
 {
           $img=$fetch["image"];
 }

  $isrc="images/feature_advertise/".$img;
  unlink($isrc);

$delete1 = mysqli_query($connect,"Delete from feature_image where feature_image_id='".$_GET['feature_image_id']."' ")or die(mysqli_error($connect));

$back="javascript:history.back()";
  if($delete1)

          {
            echo '<script type="text/javascript">';
            echo "alert('Feature Advertise Image Details Deleted');";
            echo 'window.location.href = "feature_advertise_view.php";';
            // echo 'window.location.href = "'.$back.'"';
            echo "</script>";
          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('Feature Advertise Image Not Delete');";
            // echo 'window.location.href = "'.$back.'"';
            echo 'window.location.href = "feature_advertise_view.php";';
            echo "</script>";
             
             }

             ?>