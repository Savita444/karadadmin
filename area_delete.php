<?php
include "include/config.php";

$delete5=mysqli_query($connect, "update tbl_area set fld_area_delete='1' where fld_area_id='".$_GET['fld_area_id']."'")or die(mysqli_error($connect));

$back="area_view.php";
  if($delete5)

          {
            echo '<script type="text/javascript">';
            echo "alert('Area Deleted');";
            echo 'window.location.href = "'.$back.'"';
            echo "</script>";

          }
         else
          {
            echo '<script type="text/javascript">';
            echo "alert('Error in Deleting Area');";
            echo 'window.location.href = "'.$back.'"';
            echo "</script>";
             
          }

?>