<?php
include "include/config.php";

          $delete1 = mysqli_query($connect,"update tbl_validity_in_days set fld_validity_in_days_delete='1' where fld_validity_in_days_id='".$_GET['fld_validity_in_days_id']."'")or die(mysqli_error($connect));
          
          


$back="javascript:history.back()";
  if($delete1)

          {
            echo '<script type="text/javascript">';
            echo "alert('Validity in Days Details Deleted');";
            echo 'window.location.href = "validity_in_days_view.php";';
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('Validity in Days Details Not Delete');";
            echo 'window.location.href = "validity_in_days_view.php";';
            echo "</script>";
             
             }

             ?>