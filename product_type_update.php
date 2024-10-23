<?php include('include/header_session.php'); ?>
<?php
include "include/config.php";
if (isset($_POST['update'])) 
    {
        
        extract($_POST);

        $product_type1=$_POST['product_type'];
        $product_type=ucwords(strtolower($product_type1));
        $coulmn=array();
        $query1=mysqli_query($connect,"select * from tbl_product_type where fld_product_type_id!='".$_GET['product_type_id']."'  and fld_product_type_name='".$product_type."' ");
        
        $total=mysqli_num_rows($query1);
    if ($total==1)     
    {
      echo '<script type="text/javascript">'; 
      echo 'alert("Product Type Is Already Exist");';
      echo "window.location.href = 'product_type_view.php';";
      echo '</script>'; 
    }    
        else
        {

            $query="Update tbl_product_type set fld_product_type_name='".$product_type."' where fld_product_type_id='".$_GET['product_type_id']."'";
            //echo $query."<br>";
            $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
            if ($row) 
            {
                echo "<script>";
                // echo "alert('Product Type Details Updated Successfully');";
                echo "window.location.href='product_type_view.php';";
                echo "</script>";                 
            }
            else
            {
                echo "<script>";
                echo "alert('Product Type Details Not Update.);";
                echo "window.location.href='product_type_view.php';";
                echo "</script>";
            }
        }    
    }
?>