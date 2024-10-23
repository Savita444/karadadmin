<?php include('include/header_session.php'); ?>
<?php
include "include/config.php";
if (isset($_POST['update'])) 
    {
        
        extract($_POST);

        $business1=$_POST['business'];
        $business=ucwords(strtolower($business1));
        $coulmn=array();
        $query1=mysqli_query($connect,"select * from tbl_business_type where fld_business_id!='".$_GET['business_id']."'  and fld_business_name='".$business."' ");
        
        $total=mysqli_num_rows($query1);
    if ($total==1)     
    {
      echo '<script type="text/javascript">'; 
      echo 'alert("Business Type Is Already Exist");';
      echo "window.location.href = 'business_type_view.php';";
      echo '</script>'; 
    }    
        else
        {

            $query="Update tbl_business_type set fld_business_name='".$business."' where fld_business_id='".$_GET['business_id']."'";
            //echo $query."<br>";
            $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
            if ($row) 
            {
                echo "<script>";
                // echo "alert('Business Type Details Updated Successfully');";
                echo "window.location.href='business_type_view.php';";
                echo "</script>";                 
            }
            else
            {
                echo "<script>";
                echo "alert('Business Type Details Not Update.);";
                echo "window.location.href='business_type_view.php';";
                echo "</script>";
            }
        }    
    }
?>