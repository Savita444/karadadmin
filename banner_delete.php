<?php
include "include/config.php";

          $delete1 = mysqli_query($connect,"update tbl_banner_images set banner_photo_delete='1' where banner_images_id='".$_GET['banner_id']."'")or die(mysqli_error($connect));
          
          


$back="javascript:history.back()";
  if($delete1)

          {
            echo '<script type="text/javascript">';
            echo "alert('Banner Photo Deleted');";
            echo 'window.location.href = "banner_view.php";';
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('Banner Photo Not Delete');";
            echo 'window.location.href = "banner_view";';
            echo "</script>";
             
             }

             ?>