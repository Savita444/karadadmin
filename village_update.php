<?php include('include/header_session.php'); ?>
<?php
include "include/config.php";
if (isset($_POST['update'])) 
    {
        
        extract($_POST);

        $village1=$_POST['village'];
        $village=ucwords(strtolower($village1));
        $coulmn=array();
        $query1=mysqli_query($connect,"select * from village where village_id!='".$_GET['village_id']."' and district_id='".$_POST['district1']."' and taluka_id='".$_POST['taluka1']."' and village_name='".$village."' ");
        
        $total=mysqli_num_rows($query1);
		if ($total==1)		 
		{
			echo '<script type="text/javascript">'; 
			echo 'alert("Village Is Already Exist");';
			echo "window.location.href = 'village_view.php';";
			echo '</script>'; 
		}    
        else
        {

            $query="Update village set village_name='".$village."',
            district_id='".$_POST['district1']."', 
            taluka_id='".$_POST['taluka1']."'
            where village_id='".$_GET['village_id']."'";
            //echo $query."<br>";
            $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
            if ($row) 
            {
                echo "<script>";
                echo "alert('Village Details Updated Successfully');";
                echo "window.location.href='village_view.php';";
                echo "</script>";                 
            }
            else
            {
                echo "<script>";
                echo "alert('Village Details Not Update.);";
                echo "window.location.href='village_view.php';";
                echo "</script>";
            }
        }    
    }
?>