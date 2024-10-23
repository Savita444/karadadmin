<?php
include "include/config.php";
if(isset($_GET['a_id']))
{
  extract($_POST);

          $delete1 = mysqli_query($connect,"update tbl_user_issued_services set status='Disapproved', fld_service_issuedorreturned='2' where fld_user_issued_servicesApp='".$_GET['a_id']."'")or die(mysqli_error($connect));


    


$back="javascript:history.back()";
  if($delete1)

          {
            echo '<script type="text/javascript">';
            echo "alert('User Disapprove');";
            echo 'window.location.href = "user_request_disapprove.php";';
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('User Not Disapprove');";
            echo 'window.location.href = "user_request_disapprove.php";';
            echo "</script>";
             
             }
           }

             ?>