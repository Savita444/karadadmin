<?php
include "include/config.php"; 
if(isset($_POST["business_subcategory"])){

	 $str1 = $_POST['business_subcategory'];
				
     

	
?>
		<option value="">Select business Sub-subcategory</option>
<?php	
 $gdf="select * from tbl_business_subsubcategory where fld_business_subcategory_id='".$str1."' and fld_business_subsubcategory_delete='0' ";
	   $select=mysqli_query($connect,$gdf) or die(mysqli_error($connect));
	 while($sele=mysqli_fetch_array($select))
	{
		
			echo "<option value=\"{$sele['fld_business_subsubcategory_id']}\">{$sele['fld_business_subsubcategory_name']}</option>";
		

	}	 
		
}

?>