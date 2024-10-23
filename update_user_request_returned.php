<?php include('include/header_session.php'); ?>
<?php
include "include/config.php";
if(isset($_GET['return_id']))
{
  extract($_POST);
         
          $approve = mysqli_query($connect,"update tbl_user_issued_services set fld_service_issuedorreturned='1' where fld_user_issued_servicesApp='".$_GET['return_id']."' ")or die(mysqli_error($connect));

$back="javascript:history.back()";
  if($approve)

          {

            echo '<script type="text/javascript">';
            echo "alert('Request Return');";
            echo 'window.location.href = "user_request_returned.php";';
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('Request Not Return');";
            //echo 'window.location.href = "'.$back.'";';
            echo "</script>";
             
          }
        }

 ?>