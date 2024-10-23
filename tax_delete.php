<?php
include "include/config.php";

          $delete_city = mysqli_query($connect,"Delete from tbl_tax where fld_tax_id='".$_GET['fld_tax_id']."' ")or die(mysqli_error($connect));

$back="javascript:history.back()";
  if($delete_city)

          {
            echo '<script type="text/javascript">';
            echo "alert('Tax Details Deleted');";
            echo 'window.location.href = "tax_view.php";';
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('Tax Details Not Delete');";
            echo 'window.location.href = "tax_view.php";';
            echo "</script>";
             
             }

             ?>