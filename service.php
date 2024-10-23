<?php include('include/header_session.php'); ?>
<?php
if(isset($_POST["business"])){

	 $str1 = $_POST['business'];
				
     include "include/config.php"; 

     ?>

     <option value="">Select Service</option>
     <?php
	
	
	   $select=mysqli_query($connect,"select * from service where business_id='".$str1."' order by service_name asc") or die(mysqli_error($connect));


	 while($sele=mysqli_fetch_array($select))
{
	echo"<option value=\"{$sele['service_id']}\">{$sele['service_name']}</option>";

	}	 
		
}


?>