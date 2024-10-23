<?php include('include/header_session.php'); ?>
<?php
//error_reporting(0);

include "include/config.php";
 $sel=mysqli_query($connect,"select * from slider_advertise_image where slider_advertise_id='".$_GET['slider_advertise_id']."' ");
while ($fetch=mysqli_fetch_array($sel))
 {
           $img=$fetch["image"];
 }

  $isrc="images/slider_advertise/".$img;
  unlink($isrc);
           
          
$delete1 = mysqli_query($connect,"Delete from slider_advertise_image where slider_advertise_id='".$_GET['slider_advertise_id']."' ")or die(mysqli_error($connect));

$back="javascript:history.back()";
  if($delete1)

          {
            echo '<script type="text/javascript">';
            echo "alert('Slider Advertise Image Details Deleted');";
            echo 'window.location.href = "slider_advertise_view.php";';
            // echo 'window.location.href = "'.$back.'"';
            echo "</script>";
          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('Slider Advertise Image Not Delete');";
            // echo 'window.location.href = "'.$back.'"';
            echo 'window.location.href = "slider_advertise_view.php";';
            echo "</script>";
             
             }

             ?>