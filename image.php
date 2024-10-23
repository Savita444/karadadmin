
<?php include('include/header_session.php'); ?>
<?php
if(isset($_POST["select1"])){

	 $str1 = $_POST['select1'];
				
     include "include/config.php"; 
     ?>
 
    <?php
    if ($str1=='Slider') {
    	
       	$asd="select image from slider_advertise_image";
		$log=mysqli_query($connect,$asd) or die (mysqli_error($connect));
		$fetch=mysqli_fetch_array($log);
	?>
					<?php
	 				if ($fetch['image']=="") 
                        {
                    ?>
                            <img src="images/No-image-full.jpg" alt="" id="preview_img" height="100px" width="100px"/>
                    <?php
                        }
                        else
                        {
                    ?>                                        
                            <img src="images/slider_advertise/<?php echo $fetch['image'];?>" alt="" id="preview_img" height="100px" width="100px" />
                    <?php
                        }

                    ?> 
                    <input type="file" name="photo" id="image" hidden />

	<?php 	 } if ($str1=='Threading') {
			$asd1="select image from threading_image";
              $log1=mysqli_query($connect,$asd1) or die (mysqli_error($connect));
              $fetch1=mysqli_fetch_array($log1);
		?>	
		<?php
	 				if ($fetch1['image']=="") 
                        {
                    ?>
                            <img src="images/No-image-full.jpg" alt="" id="preview_img" height="100px" width="100px"/>
                    <?php
                        }
                        else
                        {
                    ?>                                        
                            <img src="images/threading_image/<?php echo $fetch1['image'];?>" alt="" id="preview_img" height="100px" width="100px" />
                    <?php
                        }
                    ?> 


				  
       <?php } } else { ?>

       		 <img id="preview_img" src="images/No-image-full.jpg" height="100" width="100"/>
             <input type="file" id="image" name="photo"  accept=" .jpg , .jpeg , .png " required="" />

   <?php }   ?>
               
         
   
               