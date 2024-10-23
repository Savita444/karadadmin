<?php include('include/header_session.php'); ?>
<?php
include "include/config.php";

          $delete_city = mysqli_query($connect,"Delete from day_master where day_master_id='".$_GET['day_master_id']."' ")or die(mysqli_error($connect));

$back="javascript:history.back()";
  if($delete_city)

          {
            echo '<script type="text/javascript">';
            echo "alert('Day Deleted');";
            echo 'window.location.href = "day_master_view.php";';
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('Day Not Delete');";
            echo 'window.location.href = "day_master_view.php";';
            echo "</script>";
             
             }

             ?>