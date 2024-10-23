<?php include('include/header_session.php'); ?>
<?php
include "include/config.php";
if (isset($_POST['update'])) 
    {
        
        extract($_POST);

        $country1=$_POST['country'];
        $country=ucwords(strtolower($country1));
        $coulmn=array();
        $query1=mysqli_query($connect,"select * from tbl_country where fld_country_id!='".$_GET['country_id']."'  and fld_country_name='".$country."' ");
        
        $total=mysqli_num_rows($query1);
    if ($total==1)     
    {
      echo '<script type="text/javascript">'; 
      echo 'alert("Country Is Already Exist");';
      echo "window.location.href = 'country_view.php';";
      echo '</script>'; 
    }    
        else
        {

            $query="Update tbl_country set fld_country_name='".$country."' where fld_country_id='".$_GET['country_id']."'";
            //echo $query."<br>";
            $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
            if ($row) 
            {
                echo "<script>";
                // echo "alert('Country Details Updated Successfully');";
                echo "window.location.href='country_view.php';";
                echo "</script>";                 
            }
            else
            {
                echo "<script>";
                echo "alert('Country Details Not Update.);";
                echo "window.location.href='country_view.php';";
                echo "</script>";
            }
        }    
    }
?>