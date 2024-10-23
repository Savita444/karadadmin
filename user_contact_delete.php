<?php
include "include/config.php";

          $delete1 = mysqli_query($connect,"update tbl_contact set contact_delete='1' where con_id='".$_GET['con_id']."'")or die(mysqli_error($connect));
          
          


$back="javascript:history.back()";
  if($delete1)

          {
            echo '<script type="text/javascript">';
            echo "alert('User Contact Details Deleted');";
            echo 'window.location.href = "user_contact.php";';
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('User Contact Details Deleted');";
            echo 'window.location.href = "user_contact.php";';
            echo "</script>";
             
             }

             ?>