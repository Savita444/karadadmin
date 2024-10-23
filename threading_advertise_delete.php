<?php include('include/header_session.php'); ?>
<?php
//error_reporting(0);
include "include/config.php";
 $sel=mysqli_query($connect,"select * from threading_image where threading_image_id='".$_GET['threading_image_id']."' ");
while ($fetch=mysqli_fetch_array($sel))
 {
           $img=$fetch["image"];
 }

  $isrc="images/threading_image/".$img;
  unlink($isrc);
           
          
$delete1 = mysqli_query($connect,"Delete from threading_image where threading_image_id='".$_GET['threading_image_id']."' ")or die(mysqli_error($connect));

$back="javascript:history.back()";
  if($delete1)

          {
            echo '<script type="text/javascript">';
            echo "alert('Threading Advertise Image Details Deleted');";
            echo 'window.location.href = "threading_advertise_view.php";';
            // echo 'window.location.href = "'.$back.'"';
            echo "</script>";
          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('Threading Advertise Image Not Delete');";
            // echo 'window.location.href = "'.$back.'"';
            echo 'window.location.href = "threading_advertise_view.php";';
            echo "</script>";
             
             }

             ?>