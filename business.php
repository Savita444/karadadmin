
<?php
 include "include/config.php"; 
if(isset($_POST["business_category"])){

	 $str1 = $_POST['business_category'];
				
    

	
?>
		<option value="">Select Business Name</option>
<?php	
     $gdf="select * from business_information where fld_business_category_id='".$str1."' and fld_business_delete ='0' ";
	   $select=mysqli_query($connect,$gdf) or die(mysqli_error($connect));
	 while($sele=mysqli_fetch_array($select))
	{
		
			echo "<option value=\"{$sele['business_info_id']}\">{$sele['business_info_name']}</option>";
		

	}	 
		
}

?>