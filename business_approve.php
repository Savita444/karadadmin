<?php include('include/header_session.php'); ?>
<?php
include "include/config.php";
         
          $approve = mysqli_query($connect,"update business_information set business_status = 'Approved' where business_info_id='".$_GET['business_id']."' ")or die(mysqli_error($connect));

$back="javascript:history.back()";
  if($approve)

          {

            echo '<script type="text/javascript">';
            echo "alert('Business Information Active');";
            echo 'window.location.href = "business_information_disapprove_view.php";';             
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('Business Information Not Active');";
            echo 'window.location.href = "business_information_disapprove_view.php";';
            echo "</script>";
             
          }

 ?>