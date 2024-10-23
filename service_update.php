<?php include('include/header_session.php'); ?>
<?php
include "include/config.php";
if (isset($_POST['update'])) 
    {
        
        extract($_POST);

        $service1=$_POST['service1'];
        $service=ucwords(strtolower($service1));
        $coulmn=array();
        $query1=mysqli_query($connect,"select * from service where service_id!='".$_GET['service_id']."' and business_id='".$_POST['business1']."' and service_name='".$service."'");
        while ($row=mysqli_fetch_assoc($query1))
        {
          $coulmn[]=$row['service_name'];
        }        

		if (in_array($service, $coulmn)) 
		{
			echo '<script type="text/javascript">'; 
			echo 'alert("Service Is Already Exist");';
			echo "window.location.href = 'service_view.php';";
			echo '</script>'; 
			return true;

		}    
        else
        {

            $query="Update service set service_name='".$service."',
            business_id='".$_POST['business1']."' 
             where service_id='".$_GET['service_id']."'";
            //echo $query."<br>";
            $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
            if ($row) 
            {
                echo "<script>";
                echo "alert('Service Details Updated Successfully');";
                echo "window.location.href='service_view.php';";
                echo "</script>";                 
            }
            else
            {
                echo "<script>";
                echo "alert('Service Details Not Update.);";
                echo "window.location.href='service_view.php';";
                echo "</script>";
            }
        }    
    }
?>

