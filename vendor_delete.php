<!-- <?php //include('include/header_session.php'); ?>
 --><?php
include "include/config.php";

          $delete_city = mysqli_query($connect,"Delete from vendor where vendor_id='".$_GET['vendor_id']."' ")or die(mysqli_error($connect));

$back="javascript:history.back()";
  if($delete_city)

          {
            echo '<script type="text/javascript">';
            echo "alert('Vendor Details Deleted');";
            echo 'window.location.href = "'.$back.'";';
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('Vendor Details Not Delete');";
            echo 'window.location.href =  "'.$back.'";';
            echo "</script>";
             
        }

             ?>