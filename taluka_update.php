<?php include('include/header_session.php'); ?>
<?php
include "include/config.php";
if (isset($_POST['update'])) 
    {
        
        extract($_POST);

        $taluka1=$_POST['taluka'];
        $taluka=ucwords(strtolower($taluka1));
        $coulmn=array();
        $query1=mysqli_query($connect,"select * from tbl_taluka where fld_country_id='".$_POST['country']."' and fld_state_id='".$_POST['state']."' and fld_taluka_name='".$taluka."' and fld_district_id='".$_POST['district']."' and fld_taluka_id!='".$_GET['fld_taluka_id']."' and fld_taluka_delete='0'");
       
        if (mysqli_num_rows($query1)==1) 
        {
          echo '<script type="text/javascript">'; 
          echo 'alert("Taluka Is Already Exist");';
          echo "window.location.href = 'taluka_view.php';";
          echo '</script>'; 

        }    
        else
        {

            $query="Update tbl_taluka set fld_taluka_name='".$taluka."' ,fld_country_id='".$_POST['country']."', fld_state_id='".$_POST['state']."', fld_district_id='".$_POST['district']."' where fld_taluka_id='".$_GET['fld_taluka_id']."' ";
            //echo $query."<br>";
            $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
            if ($row) 
            {
              echo '<script type="text/javascript">';
              // echo "alert('Taluka Updated');";
              echo 'window.location.href = "taluka_view.php";';
              echo "</script>";

            }
           else
            {
              echo '<script type="text/javascript">';
              echo "alert('Error in Updating Taluka');";
              echo 'window.location.href = "taluka_view.php";';
              echo "</script>";
               
            }
        }    
    }      

?>
