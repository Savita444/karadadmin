<?php
include "include/config.php"; 
if(isset($_POST["city"])){

	 $str1 = $_POST['city'];
				
     

	
?>
		<option value="">Select Area</option>
<?php	
 $gdf="select * from tbl_area where fld_city_id='".$str1."' and fld_area_delete='0' ";
	   $select=mysqli_query($connect,$gdf) or die(mysqli_error($connect));
	 while($sele=mysqli_fetch_array($select))
	{
		
			echo "<option value=\"{$sele['fld_area_id']}\">{$sele['fld_area_name']}</option>";
		

	}	 
		
}

?>