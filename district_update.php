<?php include('include/header_session.php'); ?>
<?php
include "include/config.php";
if (isset($_POST['update'])) 
    {
        
        extract($_POST);

        $district1=$_POST['district'];
        $district=ucwords(strtolower($district1));
        $coulmn=array();
        $query1=mysqli_query($connect,"select * from tbl_district where fld_country_id='".$_POST['country']."' and fld_state_id='".$_POST['state']."' and fld_district_name='".$district."' and  fld_district_id!='".$_GET['fld_district_id']."' and fld_district_delete='0'");
       
        if (mysqli_num_rows($query1)==1) 
        {
          echo '<script type="text/javascript">'; 
          echo 'alert("District Is Already Exist");';
          echo "window.location.href = 'district_view.php';";
          echo '</script>'; 

        }    
        else
        {

            $query="Update tbl_district set fld_district_name='".$district."', fld_country_id='".$_POST['country']."', fld_state_id='".$_POST['state']."'  where fld_district_id='".$_GET['fld_district_id']."' ";
            //echo $query."<br>";
            $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
            if ($row) 
            {
              echo '<script type="text/javascript">';
              // echo "alert('District Updated');";
              echo 'window.location.href = "district_view.php";';
              echo "</script>";

            }
           else
            {
              echo '<script type="text/javascript">';
              echo "alert('Error in Updating District');";
              echo 'window.location.href = "district_view.php";';
              echo "</script>";
               
            }
        }    
    }      

?>
