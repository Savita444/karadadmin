<?php include('include/header_session.php'); ?>
<?php
include "include/config.php";
if (isset($_POST['update'])) 
    {
        
        extract($_POST);

        $validity_in_days1=$_POST['validity_in_days'];
        $number_of_leads=$_POST['number_of_leads'];
        $validity_in_days=ucwords(strtolower($validity_in_days1));
        $coulmn=array();
        $query1=mysqli_query($connect,"select * from tbl_validity_in_days where fld_validity_in_days_id!='".$_GET['validity_in_days_id']."'  and fld_validity_in_days_name='".$validity_in_days."' and fld_number_of_leads='".$number_of_leads."'");
        
        $total=mysqli_num_rows($query1);
    if ($total==1)     
    {
      echo '<script type="text/javascript">'; 
      echo 'alert("Free Validity in Days Is Already Exist");';
      echo "window.location.href = 'validity_in_days_view.php';";
      echo '</script>'; 
    }    
        else
        {

            $query="Update tbl_validity_in_days set fld_validity_in_days_name='".$validity_in_days."',fld_number_of_leads='".$number_of_leads."' where fld_validity_in_days_id='".$_GET['validity_in_days_id']."'";
            //echo $query."<br>";
            $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
            if ($row) 
            {
                echo "<script>";
                echo "alert('Free Validity in Days Details Updated Successfully');";
                echo "window.location.href='validity_in_days_view.php';";
                echo "</script>";                 
            }
            else
            {
                echo "<script>";
                echo "alert('Free Validity in Days Details Not Update.);";
                echo "window.location.href='validity_in_days_view.php';";
                echo "</script>";
            }
        }    
    }
?>