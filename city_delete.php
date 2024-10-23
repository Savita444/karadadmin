<?php
include "include/config.php";
$delete1 = mysqli_query($connect, "update tbl_city set fld_city_delete='1' where fld_city_id='".$_GET['fld_city_id']."'")or die(mysqli_error($connect));

// $delete2=mysqli_query($connect, "update tbl_area set fld_area_delete='1' where fld_city_id='".$_GET['fld_city_id']."'")or die(mysqli_error($connect));

$back="city_view.php";
  if($delete1)

          {
            echo '<script type="text/javascript">';
            echo "alert('City Deleted');";
            echo 'window.location.href = "'.$back.'"';
            echo "</script>";

          }
         else
          {
            echo '<script type="text/javascript">';
            echo "alert('Error in Deleting City');";
            echo 'window.location.href = "'.$back.'"';
            echo "</script>";
             
          }

?>