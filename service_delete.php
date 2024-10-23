<?php include('include/header_session.php'); ?>
<?php
error_reporting(0);
include "include/config.php";
           
          
$delete1 = mysqli_query($connect,"Delete from service where service_id='".$_GET['service_id']."' ")or die(mysqli_error($connect));

$back="javascript:history.back()";
  if($delete1)

          {
            echo '<script type="text/javascript">';
            echo "alert('Service Details Deleted');";
            echo 'window.location.href = "service_view.php";';
            // echo 'window.location.href = "'.$back.'"';
            echo "</script>";
          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('Service Details Not Delete');";
            // echo 'window.location.href = "'.$back.'"';
            echo 'window.location.href = "service_view.php";';
            echo "</script>";
             
        }

             ?>