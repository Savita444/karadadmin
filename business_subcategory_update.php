<?php include('include/header_session.php'); ?>
<?php
include "include/config.php";
if (isset($_POST['update'])) 
    {
        
        extract($_POST);

        $business_subcategory1=$_POST['business_subcategory'];
        $business_subcategory=ucwords(strtolower($business_subcategory1));
        $coulmn=array();
        $query1=mysqli_query($connect,"select * from tbl_business_subcategory where fld_business_id='".$_POST['business_type']."' and fld_business_subcategory_name='".$business_subcategory."' and fld_business_category_id='".$_POST['business_category']."' and fld_business_subcategory_id!='".$_GET['fld_business_subcategory_id']."' and fld_business_subcategory_delete='0'");
       
        if (mysqli_num_rows($query1)==1) 
        {
          echo '<script type="text/javascript">'; 
          echo 'alert("Business Subcategory Is Already Exist");';
          echo "window.location.href = 'business_subcategory_view.php';";
          echo '</script>'; 

        }    
        else
        {

            $query="Update tbl_business_subcategory set fld_business_subcategory_name='".$business_subcategory."', fld_business_id='".$_POST['business_type']."', fld_business_category_id='".$_POST['business_category']."' where fld_business_subcategory_id='".$_GET['fld_business_subcategory_id']."' ";
            //echo $query."<br>";
            $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
            if ($row) 
            {
              echo '<script type="text/javascript">';
              // echo "alert('Business Subcategory Updated');";
              echo 'window.location.href = "business_subcategory_view.php";';
              echo "</script>";

            }
           else
            {
              echo '<script type="text/javascript">';
              echo "alert('Error in Updating Business Subcategory');";
              echo 'window.location.href = "business_subcategory_view.php";';
              echo "</script>";
               
            }
        }    
    }      

?>
