<?php
 include "include/config.php"; 
if(isset($_POST["state"])){

	 $str1 = $_POST['state'];
				
    

	
?>
		<option value="">Select District</option>
<?php	
     $gdf="select * from tbl_district where fld_state_id='".$str1."' and fld_district_delete='0' ";
	   $select=mysqli_query($connect,$gdf) or die(mysqli_error($connect));
	 while($sele=mysqli_fetch_array($select))
	{
		
			echo "<option value=\"{$sele['fld_district_id']}\">{$sele['fld_district_name']}</option>";
		

	}	 
		
}

?>