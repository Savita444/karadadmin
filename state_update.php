<?php include('include/header_session.php'); ?>
<?php
include "include/config.php";
if (isset($_POST['update'])) 
    {
        
        extract($_POST);

        $state1=$_POST['state'];
        $state=ucwords(strtolower($state1));
        $coulmn=array();
        $query1=mysqli_query($connect,"select * from tbl_state where fld_country_id='".$_POST['country']."' and fld_state_id!='".$_GET['state_id']."' and fld_state_name='".$state."' ");
        
        $total=mysqli_num_rows($query1);
		if ($total==1)		 
		{
			echo '<script type="text/javascript">'; 
			echo 'alert("State Is Already Exist");';
			echo "window.location.href = 'state_view.php';";
			echo '</script>'; 
		}    
        else
        {

            $query="Update tbl_state set fld_state_name='".$state."', fld_country_id='".$_POST['country']."' where fld_state_id='".$_GET['state_id']."'";
            //echo $query."<br>";
            $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
            if ($row) 
            {
                echo "<script>";
                // echo "alert('State Details Updated Successfully');";
                echo "window.location.href='state_view.php';";
                echo "</script>";                 
            }
            else
            {
                echo "<script>";
                echo "alert('State Details Not Update.);";
                echo "window.location.href='state_view.php';";
                echo "</script>";
            }
        }    
    }
?>