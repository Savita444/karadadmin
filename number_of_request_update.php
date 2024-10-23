<?php include('include/header_session.php'); ?>
<?php
include "include/config.php";
if (isset($_POST['update'])) 
    {
        
        extract($_POST);

        $number_of_request_leads1=$_POST['number_of_request_leads'];
        $number_of_request_leads=ucwords(strtolower($number_of_request_leads1));
        $coulmn=array();
        $query1=mysqli_query($connect,"select * from tbl_number_of_request_leads where fld_number_of_request_leads_id!='".$_GET['number_of_request_leads_id']."'  and fld_number_of_request_leads_name='".$number_of_request_leads."' ");
        
        $total=mysqli_num_rows($query1);
    if ($total==1)     
    {
      echo '<script type="text/javascript">'; 
      echo 'alert("Number of Request/Leads Is Already Exist");';
      echo "window.location.href = 'number_of_request_leads_view.php';";
      echo '</script>'; 
    }    
        else
        {

            $query="Update tbl_number_of_request_leads set fld_number_of_request_leads_name='".$number_of_request_leads."' where fld_number_of_request_leads_id='".$_GET['number_of_request_leads_id']."'";
            //echo $query."<br>";
            $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
            if ($row) 
            {
                echo "<script>";
                // echo "alert('Number of Request/Leads Details Updated Successfully');";
                echo "window.location.href='number_of_request_view.php';";
                echo "</script>";                 
            }
            else
            {
                echo "<script>";
                echo "alert('Number of Request/Leads Details Not Update.);";
                echo "window.location.href='number_of_request_view.php';";
                echo "</script>";
            }
        }    
    }
?>