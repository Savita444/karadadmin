<?php include('include/header_session.php'); ?>
<?php
include "include/config.php";
if (isset($_POST['update'])) 
    {
        
        extract($_POST);

        $landmark1=$_POST['landmark'];
        $landmark=ucwords(strtolower($landmark1));
        $coulmn=array();
        $query1=mysqli_query($connect,"select * from tbl_landmark where  fld_landmark_name='".$landmark."' and fld_district_id='".$_POST['district']."' and fld_taluka_id='".$_POST['taluka']."' and fld_city_id='".$_POST['city']."' and fld_area_id='".$_POST['area']."' and fld_landmark_id!='".$_GET['fld_landmark_id']."' and fld_landmark_delete='0'");
       
        if (mysqli_num_rows($query1)==1) 
        {
          echo '<script type="text/javascript">'; 
          echo 'alert("Landmark Is Already Exist");';
          echo "window.location.href = 'landmark_view.php';";
          echo '</script>'; 
        }    
        else
        {

            $query="Update tbl_landmark set fld_landmark_name='".$landmark."', fld_district_id='".$_POST['district']."',fld_taluka_id='".$_POST['taluka']."', fld_city_id='".$_POST['city']."',fld_area_id='".$_POST['area']."' where fld_landmark_id='".$_GET['fld_landmark_id']."' ";
            //echo $query."<br>";
            $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
            if ($row) 
            {
              echo '<script type="text/javascript">';
              // echo "alert('Landmark Updated');";
              echo 'window.location.href = "landmark_view.php";';
              echo "</script>";

            }
           else
            {
              echo '<script type="text/javascript">';
              echo "alert('Error in Updating Landmark');";
              echo 'window.location.href = "landmark_view.php";';
              echo "</script>";
               
            }
        }    
    }      

?>
