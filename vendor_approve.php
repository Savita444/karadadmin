<!-- <?php include('include/header_session.php'); ?>
 --><?php
include "include/config.php";
         
          $mobile=$_GET['mobile'];
          $approve = mysqli_query($connect,"update vendor set vendor_status = 'Approved' where vendor_id='".$_GET['vendor_id']."' and mobile='".$mobile."' ")or die(mysqli_error($connect));

          $back="javascript:history.back()";

         if($approve)

          {
            // $msg="Your OTP Verfication Code is 'Approved'. Please do not share it with anyone. -5um@g0";

             // $msg="Your Registration Successfully and Please login.";

        //   $ch = "SUMAGO";
                    
        //   $apiurl = "http://sms.happysms.in/api/sendhttp.php?authkey=240394AvXoLMXQL9P5bb1b130&mobiles=$mobile&message=$msg&sender=$ch&route=4&country=91&DLT_TE_ID=1207162798995433854";
        //   $apiurl = str_replace(" ", '%20', $apiurl);
         //echo '>>'.$apiurl;
           //exit;
            // $ch = curl_init($apiurl);
            // $get_url = $apiurl;
            // curl_setopt($ch, CURLOPT_POST,0);
            // curl_setopt($ch, CURLOPT_URL, $get_url);
            // curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
            // curl_setopt($ch, CURLOPT_HEADER,0);
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            // $return_val = curl_exec($ch);


            echo '<script type="text/javascript">';
            echo "alert('Vendor Approved');";
            echo 'window.location.href = "approve_vendor.php";';
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('Vendor Not Approved');";
            echo 'window.location.href = "'.$back.'";';
            echo "</script>";
             
          }

 ?>