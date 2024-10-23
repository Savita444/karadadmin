<?php
include "include/config.php";
$delete1 = mysqli_query($connect, "update tbl_taluka set fld_taluka_delete='1' where fld_taluka_id='".$_GET['fld_taluka_id']."'")or die(mysqli_error($connect));

// $delete2 = mysqli_query($connect, "update tbl_city set fld_city_delete='1' where fld_taluka_id='".$_GET['fld_taluka_id']."'")or die(mysqli_error($connect));

// $delete3=mysqli_query($connect, "update tbl_area set fld_area_delete='1' where fld_taluka_id='".$_GET['fld_taluka_id']."'")or die(mysqli_error($connect));

$back="taluka_view.php";
  if($delete1)

          {
            echo '<script type="text/javascript">';
            echo "alert('Taluka Deleted');";
            echo 'window.location.href = "'.$back.'"';
            echo "</script>";

          }
         else
          {
            echo '<script type="text/javascript">';
            echo "alert('Error in Deleting Taluka');";
            echo 'window.location.href = "'.$back.'"';
            echo "</script>";
             
          }

?>