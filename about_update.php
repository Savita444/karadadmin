<?php include('include/header_session.php'); ?>
<?php
include "include/config.php";
if (isset($_POST['update'])) 
    {
        
        extract($_POST);

    //     $about1=$_POST['about'];
    //     $about=ucwords(strtolower($about1));
    //     $coulmn=array();
    //     $query1=mysqli_query($connect,"select * from about where about_id!='".$_GET['about_id']."'  and about_desc='".$about."' ");
        
    //     $total=mysqli_num_rows($query1);
    // if ($total==1)     
    // {
    //   echo '<script type="text/javascript">'; 
    //   echo 'alert("Number of Request/Leads Is Already Exist");';
    //   echo "window.location.href = 'about_view.php';";
    //   echo '</script>'; 
    // }    
    //     else
    //     {

            $query="Update about set about_desc='".$about."' where about_id='".$_GET['about_id']."'";
            //echo $query."<br>";
            $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
            if ($row) 
            {
                echo "<script>";
                echo "alert('About Us Updated Successfully');";
                echo "window.location.href='about_us_view.php';";
                echo "</script>";                 
            }
            else
            {
                echo "<script>";
                echo "alert('About Us Not Update.);";
                echo "window.location.href='about_us_view.php';";
                echo "</script>";
            }
        }    
    //}
?>