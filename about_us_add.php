<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add About Us</title>
  <?php include('include/head.php'); ?>
  <link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/responsive.dataTables.css">
</head>
<body>
  <?php include('include/header.php');
include('include/sidebar.php'); ?>
  <div class="main-container">
    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
      <div class="min-height-200px">
        <div class="page-header">
          <div class="row">
            <div class="col-md-10 col-sm-10">
              <div class="title">
                <h4>About Us </h4>
              </div>
              <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="#">Master Table</a></li>
                  <li class="breadcrumb-item"><a href="about_us_view.php">About Us</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add About Us</li>
                </ol>
              </nav>
            </div>
						<div class="col-md-2 col-sm-2" align="right">
              <!-- <a  href="#" data-toggle="modal" data-target="#bill_head_add" type="button"><button  class="btn btn-primary">Add About Us</button></a> -->
              <a  href="about_us_view.php" ><button  class="btn btn-primary">View About Us</button></a>
            </div>
					</div>
				</div>


				
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<!-- <h4 class="text-blue">Add about Bill_head</h4> -->
						</div>
						
					</div><br> 

							<?php
                                    
                if (isset($_POST['submit'])) 
                {                    
                    extract($_POST);

                    $total_taluka = count($_POST['about_desc']);

                    for($i=0;$i<$total_taluka;$i++)
                    {
                      if(($_POST['about_desc'][$i]!=""))
                      {

                        $nm=mysqli_query($connect,"select * from about type where about_desc = '".$_POST['about_desc'][$i]."' and about_us_delete='0' ");
                        if(mysqli_num_rows($nm)>0)
                        {
                            echo "<script>";
                            // echo "alert('About Us Is Already Exists');";
                            echo "window.location.href='about_us_view.php';";
                            echo "</script>";
                        }
                     
                        else
                        {
                          $about=$_POST['about_desc'][$i];
                          $about=ucwords(strtolower($about));

                          $query = "INSERT INTO  about(about_desc,about_us_delete) VALUES ('".$about."','0')" ;
                          $result = mysqli_query($connect,$query)or die(mysqli_error($connect));

                          if(!empty($result)) 

                              {
                                  echo "<script>";
                                  // echo "alert('About Us Added Successfully');";
                                  echo "window.location.href='about_us_view.php';";
                                  echo "</script>";                 
                              }
                              else
                              {
                                  echo "<script>";
                                   echo "alert('About Us Not Added Successfully');";
                                  echo "window.location.href='about_us_view.php';";
                                  echo "</script>";
                              }
                        }
                      }
                    }                  
                }
              ?>						
					<form method="post">
						 <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">About Us<span class="text-danger">*</span> : </label>
              <div class="col-sm-12 col-md-10">
                 <textarea class="textarea_editor form-control border-radius-0" id="desc" name="about_desc" placeholder="Enter About Us" required=""></textarea>
               </div>
              </div>   
						
						<div class="form-group row">
<!-- 							<label class="col-sm-12 col-md-3 col-form-label">Submit</label>
 -->							<div class="col-sm-12 col-md-9">
							<center><input class="btn btn-success" value="Submit" type="submit" name="submit" onclick="saveBook();">
								<input class="btn btn-danger" value="Reset" type="reset">
								<a href="about_us_view.php"><input class="btn btn-warning" value="Back" type="button"></a>
							</center>
							</div>
						</div>
					</form>

				</div>	 
	</div>
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
  <script>
$(function(){
    $('#addMore').on('click', function() {
              var data = $("#tb tr:eq(1)").clone(true).appendTo("#tb");
              data.find("input").val('');
     });
     $(document).on('click', '.remove', function() {
         var trIndex = $(this).closest("tr").index();
            if(trIndex>1) {
             $(this).closest("tr").remove();
           } else {
             alert("Sorry!! Can't remove first row!");
           }
      });
});      
</script>
<script type="text/javascript">
   function saveBook()
   {
     var desc=$("#desc"). val();
     
      if(desc=='' || desc==null)
          {
             alert("Enter Description");
             return false;
          }
      }
</script>
</body>
</html>




