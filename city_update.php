<?php include('include/header_session.php'); ?>
<?php
include "include/config.php";
if (isset($_POST['update'])) 
    {
        
        extract($_POST);

        $city1=$_POST['city'];
        $city=ucwords(strtolower($city1));
        $coulmn=array();
        $query1=mysqli_query($connect,"select * from tbl_city where fld_country_id='".$_POST['country']."' and fld_state_id='".$_POST['state']."' and fld_city_name='".$city."' and fld_district_id='".$_POST['district']."' and fld_taluka_id='".$_POST['taluka']."' and fld_city_id!='".$_GET['fld_city_id']."' and fld_city_delete='0'");
       
        if (mysqli_num_rows($query1)==1) 
        {
          echo '<script type="text/javascript">'; 
          echo 'alert("City Is Already Exist");';
          echo "window.location.href = 'city_view.php';";
          echo '</script>'; 

        }    
        else
        {

            $query="Update tbl_city set fld_city_name='".$city."',fld_country_id='".$_POST['country']."', fld_state_id='".$_POST['state']."', fld_district_id='".$_POST['district']."',fld_taluka_id='".$_POST['taluka']."' where fld_city_id='".$_GET['fld_city_id']."' ";
            //echo $query."<br>";
            $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
            if ($row) 
            {
              echo '<script type="text/javascript">';
              // echo "alert('City Updated Successfully');";
              echo 'window.location.href = "city_view.php";';
              echo "</script>";

            }
           else
            {
              echo '<script type="text/javascript">';
              echo "alert('Error in Updating City');";
              echo 'window.location.href = "city_view.php";';
              echo "</script>";
               
            }
        }    
    }      

?>
