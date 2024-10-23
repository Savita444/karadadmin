<?php
include "include/config.php";

          $delete1 = mysqli_query($connect,"update tbl_number_of_request_leads set fld_number_of_request_leads_delete='1' where fld_number_of_request_leads_id='".$_GET['fld_number_of_request_leads_id']."'")or die(mysqli_error($connect));
          
          


$back="javascript:history.back()";
  if($delete1)

          {
            echo '<script type="text/javascript">';
            echo "alert('Number of Request/Leads Details Deleted');";
            echo 'window.location.href = "number_of_request_view.php";';
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('Number of Request/Leads Details Not Delete');";
            echo 'window.location.href = "number_of_request_view.php";';
            echo "</script>";
             
             }

             ?>