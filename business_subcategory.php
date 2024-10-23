<?php
include "include/config.php"; 
if(isset($_POST["business_category"])){

	 $str1 = $_POST['business_category'];
				
     

	
?>
		<option value="">Select Business Subcategory</option>
<?php	
 $gdf="select * from tbl_business_subcategory where fld_business_category_id='".$str1."' and fld_business_subcategory_delete='0' ";
	   $select=mysqli_query($connect,$gdf) or die(mysqli_error($connect));
	 while($sele=mysqli_fetch_array($select))
	{
		
			echo "<option value=\"{$sele['fld_business_subcategory_id']}\">{$sele['fld_business_subcategory_name']}</option>";
		

	}	 
		
}

?>