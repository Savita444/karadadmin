<?php
include "include/config.php";

          $delete1 = mysqli_query($connect,"update term_condition set term_condition_delete='1' where term_condition_id='".$_GET['term_condition_id']."'")or die(mysqli_error($connect));
          
          


$back="javascript:history.back()";
  if($delete1)

          {
            echo '<script type="text/javascript">';
            echo "alert('Term and Condition Details Deleted');";
            echo 'window.location.href = "term_condition_view.php";';
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('Term and Condition Details Not Delete');";
            echo 'window.location.href = "term_condition_view.php";';
            echo "</script>";
             
             }

             ?>