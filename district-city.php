<?php
include "include/config.php"; 
if(isset($_POST["district"])){

	 $str1 = $_POST['district'];
				
     

	
?>
		<option value="">Select City</option>
<?php	
 $gdf="select * from tbl_city where fld_district_id='".$str1."' and fld_city_delete='0' ";
	   $select=mysqli_query($connect,$gdf) or die(mysqli_error($connect));
	 while($sele=mysqli_fetch_array($select))
	{
		
			echo "<option value=\"{$sele['fld_city_id']}\">{$sele['fld_city_name']}</option>";
		

	}	 
		
}

?>