<?php include('include/header_session.php'); ?>
<?php
include "include/config.php";
if (isset($_POST['update'])) 
    {
        
        extract($_POST);

        $tax1=$_POST['tax'];
        //$HSN_Description1=$_POST['fld_hsn_description'];
        $tax=ucwords(strtolower($tax1));
        $coulmn=array();
        $query1=mysqli_query($connect,"select * from tbl_tax where fld_tax_id!='".$_GET['fld_tax_id']."' and fld_tax='".$tax."' ");
        
        $total=mysqli_num_rows($query1);
        if ($total==1)       
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("Tax is already exist");';
            echo "window.location.href = 'tax_type_view.php';";
            echo '</script>'; 
        }    
        else
        {

            $query="Update tbl_tax set fld_tax='".$tax."' where fld_tax_id='".$_GET['fld_tax_id']."'";
            //echo $query."<br>";
            $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
            if ($row) 
            {
                echo "<script>";
                echo "alert('Tax details updated successfully');";
                echo "window.location.href='tax_view.php';";
                echo "</script>";                 
            }
            else
            {
                echo "<script>";
                echo "alert('Tax details not update.);";
                echo "window.location.href='tax_view.php';";
                echo "</script>";
            }
        }    
    }
?>