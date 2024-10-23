<?php
include "include/config.php";

          $delete1 = mysqli_query($connect,"update tbl_landmark set fld_landmark_delete='1' where fld_landmark_id='".$_GET['fld_landmark_id']."'")or die(mysqli_error($connect));
          
          


$back="javascript:history.back()";
  if($delete1)

          {
            echo '<script type="text/javascript">';
            echo "alert('Landmark Details Deleted');";
            echo 'window.location.href = "landmark_view.php";';
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('Landmark Details Not Delete');";
            echo 'window.location.href = "landmark_view.php";';
            echo "</script>";
             
             }

             ?>