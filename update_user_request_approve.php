<?php include('include/header_session.php'); ?>
<?php
include "include/config.php";
if(isset($_GET['a_id']))
{
  extract($_POST);
         
          $approve = mysqli_query($connect,"update tbl_user_issued_services set status = 'Approved', fld_service_issuedorreturned='0' where fld_user_issued_servicesApp='".$_GET['a_id']."' ")or die(mysqli_error($connect));

$back="javascript:history.back()";
  if($approve)

          {

            echo '<script type="text/javascript">';
            echo "alert('Request Approved');";
            echo 'window.location.href = "user_request_approve.php";';
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('Request Not Approved');";
            //echo 'window.location.href = "'.$back.'";';
            echo "</script>";
             
          }
        }

 ?>