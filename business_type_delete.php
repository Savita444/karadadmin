<?php
include "include/config.php";

          $delete1 = mysqli_query($connect,"update tbl_business_type set fld_business_delete='1' where fld_business_id='".$_GET['fld_business_id']."'")or die(mysqli_error($connect));
          
          


$back="javascript:history.back()";
  if($delete1)

          {
            echo '<script type="text/javascript">';
            echo "alert('Business Type Details Deleted');";
            echo 'window.location.href = "business_type_view.php";';
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('Business Type Details Not Delete');";
            echo 'window.location.href = "business_type_view";';
            echo "</script>";
             
             }

             ?>