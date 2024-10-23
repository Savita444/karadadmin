<?php include('include/header_session.php'); ?>
<?php
include "include/config.php";
if (isset($_POST['update'])) 
    {
        
        extract($_POST);

        $area1=$_POST['area'];
        $area=ucwords(strtolower($area1));
        $coulmn=array();
        $query1=mysqli_query($connect,"select * from tbl_area where fld_country_id='".$_POST['country']."' and fld_state_id='".$_POST['state']."' and fld_area_name='".$area."' and fld_district_id='".$_POST['district']."' and fld_taluka_id='".$_POST['taluka']."' and fld_city_id='".$_POST['city']."' and fld_area_id!='".$_GET['fld_area_id']."' and fld_area_delete='0'");
       
        if (mysqli_num_rows($query1)==1) 
        {
          echo '<script type="text/javascript">'; 
          echo 'alert("Area Is Already Exist");';
          echo "window.location.href = 'area_view.php';";
          echo '</script>'; 
        }    
        else
        {

            $query="Update tbl_area set fld_area_name='".$area."',fld_country_id='".$_POST['country']."', fld_state_id='".$_POST['state']."', fld_district_id='".$_POST['district']."',fld_taluka_id='".$_POST['taluka']."', fld_city_id='".$_POST['city']."' where fld_area_id='".$_GET['fld_area_id']."' ";
            //echo $query."<br>";
            $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
            if ($row) 
            {
              echo '<script type="text/javascript">';
              // echo "alert('Area Updated Successfully');";
              echo 'window.location.href = "area_view.php";';
              echo "</script>";

            }
           else
            {
              echo '<script type="text/javascript">';
              echo "alert('Error in Updating Area');";
              echo 'window.location.href = "area_view.php";';
              echo "</script>";
               
            }
        }    
    }      

?>
