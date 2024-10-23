<?php
include "include/config.php";

          $delete1 = mysqli_query($connect,"update about set about_us_delete='1' where about_id='".$_GET['about_id']."'")or die(mysqli_error($connect));
          
          


$back="javascript:history.back()";
  if($delete1)

          {
            echo '<script type="text/javascript">';
            echo "alert('About Us Details Deleted');";
            echo 'window.location.href = "about_us_view.php";';
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('About Us Details Not Delete');";
            echo 'window.location.href = "about_us_view.php";';
            echo "</script>";
             
             }

             ?>