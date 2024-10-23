<?php
include "include/config.php";

          $delete1 = mysqli_query($connect,"update tbl_product_type set fld_product_type_delete='1' where fld_product_type_id='".$_GET['fld_product_type_id']."'")or die(mysqli_error($connect));
          
          


$back="javascript:history.back()";
  if($delete1)

          {
            echo '<script type="text/javascript">';
            echo "alert('Product Type Details Deleted');";
            echo 'window.location.href = "product_type_view.php";';
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('Product Type Details Not Delete');";
            echo 'window.location.href = "product_type_view.php";';
            echo "</script>";
             
             }

             ?>