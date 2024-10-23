<?php
include "include/config.php"; 
if(isset($_POST["taluka"])){

	 $str1 = $_POST['taluka'];
				
     

	
?>
		<option value="">Select City</option>
<?php	
 $gdf="select * from tbl_city where fld_taluka_id='".$str1."' and fld_city_delete='0' ";
	   $select=mysqli_query($connect,$gdf) or die(mysqli_error($connect));
	 while($sele=mysqli_fetch_array($select))
	{
		
			echo "<option value=\"{$sele['fld_city_id']}\">{$sele['fld_city_name']}</option>";
		

	}	 
		
}

?>