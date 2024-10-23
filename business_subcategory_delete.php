<?php
include "include/config.php";
$delete1 = mysqli_query($connect, "update tbl_business_subcategory set fld_business_subcategory_delete='1' where fld_business_subcategory_id='".$_GET['fld_business_subcategory_id']."'")or die(mysqli_error($connect));

$delete5=mysqli_query($connect, "update tbl_business_subsubcategory set fld_business_subsubcategory_delete='1' where fld_business_subcategory_id='".$_GET['fld_business_subcategory_id']."'")or die(mysqli_error($connect));

// $gsafdh=mysqli_query($connect,"select * from tbl_book where fld_business_subcategory_id='".$_GET['fld_business_subcategory_id']."'");

//           while($fetch=mysqli_fetch_array($gsafdh))
//           {           

//             $delete7=mysqli_query($connect, "update tbl_book_details set fld_book_details_delete='1' where fld_book_id='".$fetch['fld_book_id']."'")or die(mysqli_error($connect));
//           }

//           $delete9=mysqli_query($connect, "update tbl_book set fld_book_delete='1' where fld_business_subcategory_id='".$_GET['fld_business_subcategory_id']."'")or die(mysqli_error($connect));

$back="business_subcategory_view.php";
  if($delete1)

          {
            echo '<script type="text/javascript">';
            echo "alert('Business Subcategory Deleted');";
            echo 'window.location.href = "'.$back.'"';
            echo "</script>";

          }
         else
          {
            echo '<script type="text/javascript">';
            echo "alert('Error in Deleting Business Subcategory');";
            echo 'window.location.href = "'.$back.'"';
            echo "</script>";
             
          }

?>