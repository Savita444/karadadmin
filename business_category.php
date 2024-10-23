<?php
include "include/config.php"; 
if(isset($_POST["business_type"])){

	 $str1 = $_POST['business_type'];
				
     

	
?>
		<option value="">Select business Category</option>
<?php	
 $gdf="select * from tbl_business_category where fld_business_id='".$str1."' and fld_business_category_delete='0' ";
	   $select=mysqli_query($connect,$gdf) or die(mysqli_error($connect));
	 while($sele=mysqli_fetch_array($select))
	{
		
			echo "<option value=\"{$sele['fld_business_category_id']}\">{$sele['fld_business_category_name']}</option>";
		

	}	 
		
}

?>