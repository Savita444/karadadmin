<?php
include "include/config.php";

          $delete_city = mysqli_query($connect,"Delete from tbl_tax_type where fld_taxtype_id='".$_GET['fld_taxtype_id']."' ")or die(mysqli_error($connect));

$back="javascript:history.back()";
  if($delete_city)

          {
            echo '<script type="text/javascript">';
            echo "alert('Tax Type Details Deleted');";
            echo 'window.location.href = "tax_type_view.php";';
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('Tax Type Details Not Delete');";
            echo 'window.location.href = "tax_type_view.php";';
            echo "</script>";
             
             }

             ?>