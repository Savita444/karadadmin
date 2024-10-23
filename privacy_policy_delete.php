<?php
include "include/config.php";

          $delete1 = mysqli_query($connect,"update privacy_policy set privacy_policy_delete='1' where privacy_policy_id='".$_GET['privacy_policy_id']."'")or die(mysqli_error($connect));
          
          


$back="javascript:history.back()";
  if($delete1)

          {
            echo '<script type="text/javascript">';
            echo "alert('Privacy and Policy Details Deleted');";
            echo 'window.location.href = "privacy_policy_view.php";';
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('Privacy and Policy Details Not Delete');";
            echo 'window.location.href = "privacy_policy_view.php";';
            echo "</script>";
             
             }

             ?>