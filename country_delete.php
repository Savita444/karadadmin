<?php
include "include/config.php";

          $delete = mysqli_query($connect,"update tbl_country set fld_country_delete='1' where fld_country_id='".$_GET['fld_country_id']."'")or die(mysqli_error($connect));

//            $delete1 = mysqli_query($connect,"update tbl_state set fld_state_delete='1' where fld_state_id='".$_GET['fld_state_id']."'")or die(mysqli_error($connect));
//     $delete2 = mysqli_query($connect, "update tbl_district set fld_district_delete='1' where fld_district_id='".$_GET['fld_district_id']."'")or die(mysqli_error($connect));

// $delete3 = mysqli_query($connect, "update tbl_taluka set fld_taluka_delete='1' where fld_district_id='".$_GET['fld_district_id']."'")or die(mysqli_error($connect));

// $delete4 = mysqli_query($connect, "update tbl_city set fld_city_delete='1' where fld_district_id='".$_GET['fld_district_id']."'")or die(mysqli_error($connect));

// $delete5=mysqli_query($connect, "update tbl_area set fld_area_delete='1' where fld_district_id='".$_GET['fld_district_id']."'")or die(mysqli_error($connect));
          
          


$back="javascript:history.back()";
  if($delete)

          {
            echo '<script type="text/javascript">';
            echo "alert('Country Details Deleted');";
            echo 'window.location.href = "country_view.php";';
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('Country Details Not Delete');";
            echo 'window.location.href = "country_view.php";';
            echo "</script>";
             
             }

             ?>