<?php include('include/header_session.php'); ?>
<?php
error_reporting(0);
include "include/config.php"; 

$sel=mysqli_query($connect,"select * from business_information where business_info_id='".$_GET['business_info_id']."'");
   while ($fetch=mysqli_fetch_array($sel))
        {
           $img=$fetch["shop_act"];
           $isrc="../document/shopact/".$img;
           unlink($isrc);
           $img1=$fetch["pan_card"];
             $isrc1="../document/pancard/".$img1;
           unlink($isrc1);
           $img2=$fetch["aadhar_card"];
             $isrc2="../document/aadharcard/".$img2;
           unlink($isrc2);
        }
    $delete1 = mysqli_query($connect,"Delete from business_information where business_info_id='".$_GET['business_info_id']."' ")or die(mysqli_error($connect)); 

$sel=mysqli_query($connect,"select * from business_photos where business_info_id='".$_GET['business_info_id']."'");
 while ($fetch=mysqli_fetch_array($sel))
        {
           $img3=$fetch["business_photo"];
           $isrc3="images/".$img3;
         unlink($isrc3);
        }               

$delete2 = mysqli_query($connect,"Delete from business_photos where business_info_id='".$_GET['business_info_id']."' ")or die(mysqli_error($connect));

$back="javascript:history.back()";
  if($delete1 && $delete2)

          {
            echo '<script type="text/javascript">';
            echo "alert('Business Information Deleted');";
            echo 'window.location.href = "business_information_view.php";';
            // echo 'window.location.href = "'.$back.'"';
            echo "</script>";
          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('Business Information Not Delete');";
            // echo 'window.location.href = "'.$back.'"';
            echo 'window.location.href = "business_information_view.php";';
            echo "</script>";
             
         }

    ?>