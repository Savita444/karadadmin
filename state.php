<?php include('include/header_session.php'); ?>

<?php
 include "include/config.php"; 
if(isset($_POST["country"])){

	 $str1 = $_POST['country'];
					
?>
		<option value="">Select State</option>
<?php	
     $gdf="select * from tbl_state where fld_country_id='".$str1."' and fld_state_delete='0' ";
	   $select=mysqli_query($connect,$gdf) or die(mysqli_error($connect));
	 while($sele=mysqli_fetch_array($select))
	{
		
			echo "<option value=\"{$sele['fld_state_id']}\">{$sele['fld_state_name']}</option>";
		

	}	 
		
}

?>