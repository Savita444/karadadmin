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
        $query1=mysqli_query($connect,"select * from tbl_tax_type where fld_taxtype_id!='".$_GET['fld_taxtype_id']."' and fld_tax_type='".$tax."' ");
        
        $total=mysqli_num_rows($query1);
        if ($total==1)       
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("Tax Type is already exist");';
            echo "window.location.href = 'tax_type.php';";
            echo '</script>'; 
        }    
        else
        {

            $query="Update tbl_tax_type set fld_tax_type='".$tax."' where fld_taxtype_id='".$_GET['fld_taxtype_id']."'";
            //echo $query."<br>";
            $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
            if ($row) 
            {
                echo "<script>";
                echo "alert('Tax Type details updated successfully');";
                echo "window.location.href='tax_type_view.php';";
                echo "</script>";                 
            }
            else
            {
                echo "<script>";
                echo "alert('Tax Type details not update.);";
                echo "window.location.href='tax_type.php';";
                echo "</script>";
            }
        }    
    }
?>