<?php include('include/header_session.php'); ?>
<?php
if(isset($_POST["taluka"])){

	 $str1 = $_POST['taluka'];
				
     include "include/config.php"; 

     ?>

     <option value="">Select village</option>
     <?php
	
	
	   $select=mysqli_query($connect,"select * from village where taluka_id='".$_POST['taluka']."' order by village_name asc") or die(mysqli_error($connect));


	 while($sele=mysqli_fetch_array($select))
{
	echo"<option value=\"{$sele['village_id']}\">{$sele['village_name']}</option>";

	}	 
		
}

?>