<?php include('include/header_session.php'); ?>
<?php
include "include/config.php";
if (isset($_POST['update'])) 
    {
        
        extract($_POST);

        $business_subsubcategory1=$_POST['business_subsubcategory'];
        $business_subsubcategory=ucwords(strtolower($business_subsubcategory1));
        $coulmn=array();
        $query1=mysqli_query($connect,"select * from tbl_business_subsubcategory where fld_business_id='".$_POST['business_type']."' and fld_business_subsubcategory_name='".$business_subsubcategory."' and fld_business_category_id='".$_POST['business_category']."' and fld_business_subcategory_id='".$_POST['business_subcategory']."' and fld_business_subsubcategory_id!='".$_GET['fld_business_subsubcategory_id']."' and fld_business_subsubcategory_delete='0'");
       
        if (mysqli_num_rows($query1)==1) 
        {
          echo '<script type="text/javascript">'; 
          echo 'alert("Business Sub-subcategory Is Already Exist");';
          echo "window.location.href = 'business_subsubcategory_view.php';";
          echo '</script>'; 
        }    
        else
        {

            $query="Update tbl_business_subsubcategory set fld_business_subsubcategory_name='".$business_subsubcategory."', fld_business_id='".$_POST['business_type']."',fld_business_category_id='".$_POST['business_category']."', fld_business_subcategory_id='".$_POST['business_subcategory']."' where fld_business_subsubcategory_id='".$_GET['fld_business_subsubcategory_id']."' ";
            //echo $query."<br>";
            $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
            if ($row) 
            {
              echo '<script type="text/javascript">';
              // echo "alert('business Sub-subcategory Updated');";
              echo 'window.location.href = "business_subsubcategory_view.php";';
              echo "</script>";

            }
           else
            {
              echo '<script type="text/javascript">';
              echo "alert('Error in Updating Business Sub-subcategory');";
              echo 'window.location.href = "business_subsubcategory_view.php";';
              echo "</script>";
               
            }
        }    
    }      

?>
