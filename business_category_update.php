<?php include('include/header_session.php'); ?>
<?php
include "include/config.php";
if (isset($_POST['update'])) 
    {
        
        extract($_POST);

        $business_category1=$_POST['business_category'];
        $business_category=ucwords(strtolower($business_category1));
        $coulmn=array();
        $query1=mysqli_query($connect,"select * from tbl_business_category where  fld_business_id='".$_POST['business_type']."' and fld_business_category_name='".$business_category."' and fld_business_category_id!='".$_GET['fld_business_category_id']."' and fld_business_category_delete='0'");
       
        if (mysqli_num_rows($query1)==1) 
        {
          echo '<script type="text/javascript">'; 
          echo 'alert("Business Category Is Already Exist");';
          echo "window.location.href = 'business_category_view.php';";
          echo '</script>'; 

        }    
        else
        {

            $query="Update tbl_business_category set fld_business_category_name='".$business_category."' , fld_business_id='".$_POST['business_type']."' where fld_business_category_id='".$_GET['fld_business_category_id']."' ";
            //echo $query."<br>";
            $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
            if ($row) 
            {
              echo '<script type="text/javascript">';
              // echo "alert('Business Category Updated');";
              echo 'window.location.href = "business_category_view.php";';
              echo "</script>";

            }
           else
            {
              echo '<script type="text/javascript">';
              echo "alert('Error in Updating Business Category');";
              echo 'window.location.href = "business_category_view.php";';
              echo "</script>";
               
            }
        }    
    }      

?>
