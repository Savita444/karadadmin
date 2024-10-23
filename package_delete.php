<?php include('include/header_session.php'); ?>
<?php
include "include/config.php";

          $delete_package = mysqli_query($connect,"Delete from tbl_packages where fld_package_id='".$_GET['package_id']."' ")or die(mysqli_error($connect));

// $back="javascript:history.back()";
  if($delete_package)

          {
            echo '<script type="text/javascript">';
            echo "alert('Package Details Deleted');";
            echo 'window.location.href = "package_view.php";';
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('Package Details Not Delete');";
            echo 'window.location.href = "package_view.php";';
            echo "</script>";
             
             }

             ?>