<?php
 include "include/config.php"; 
if(isset($_POST["product_type"])){

	 $str1 = $_POST['product_type'];
				
    

	
?>
		<option value="">Select Package Name</option>
<?php	
     $gdf="select * from tbl_packages where fld_product_type_id='".$str1."' and fld_package_delete ='0' ";
	   $select=mysqli_query($connect,$gdf) or die(mysqli_error($connect));
	 while($sele=mysqli_fetch_array($select))
	{
		
			echo "<option value=\"{$sele['fld_package_id']}\">{$sele['fld_package_name']}</option>";
		

	}	 
		
}

?>