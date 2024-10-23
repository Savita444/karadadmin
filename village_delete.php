<?php include('include/header_session.php'); ?>
<?php
include "include/config.php";

          $delete_city = mysqli_query($connect,"Delete from village where village_id='".$_GET['village_id']."' ")or die(mysqli_error($connect));

$back="javascript:history.back()";
  if($delete_city)

          {
            echo '<script type="text/javascript">';
            echo "alert('Village Details Deleted');";
            echo 'window.location.href = "village_view.php";';
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('Village Details Not Delete');";
            echo 'window.location.href = "village_view.php";';
            echo "</script>";
             
             }

             ?>