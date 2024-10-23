<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Country</title>
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
                <h4>Country </h4>
              </div>
              <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="#">Master Table</a></li>
                  <li class="breadcrumb-item"><a href="country_view.php">Country</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Country</li>
                </ol>
              </nav>
            </div>
						<div class="col-md-2 col-sm-2" align="right">
              <!-- <a  href="#" data-toggle="modal" data-target="#bill_head_add" type="button"><button  class="btn btn-primary">Add country</button></a> -->
              <a  href="country_view.php" ><button  class="btn btn-primary">View Country</button></a>
            </div>
					</div>
				</div>


				
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<!-- <h4 class="text-blue">Add Product Bill_head</h4> -->
						</div>
						
					</div><br> 

							<?php
                                    
                if (isset($_POST['submit'])) 
                {                    
                    extract($_POST);

                    $total_taluka = count($_POST['fld_country_name']);

                    for($i=0;$i<$total_taluka;$i++)
                    {
                      if(($_POST['fld_country_name'][$i]!=""))
                      {

                        $nm=mysqli_query($connect,"select * from tbl_country where fld_country_name = '".$_POST['fld_country_name'][$i]."' and fld_country_delete='0' ");
                        if(mysqli_num_rows($nm)>0)
                        {
                            echo "<script>";
                            echo "alert('country Is Already Exists');";
                            echo "window.location.href='country_view.php';";
                            echo "</script>";
                        }
                     
                        else
                        {
                          $country1=$_POST['fld_country_name'][$i];
                          $country=ucwords(strtolower($country1));

                          $query = "INSERT INTO tbl_country(fld_country_name,fld_country_delete) VALUES ('".$country."','0')" ;
                          $result = mysqli_query($connect,$query)or die(mysqli_error($connect));

                          if(!empty($result)) 

                              {
                                  echo "<script>";
                                  // echo "alert('country Added Successfully');";
                                  echo "window.location.href='country_view.php';";
                                  echo "</script>";                 
                              }
                              else
                              {
                                  echo "<script>";
                                   echo "alert('country Not Added Successfully');";
                                  echo "window.location.href='country_view.php';";
                                  echo "</script>";
                              }
                        }
                      }
                    }                  
                }
              ?>						
					<form method="post">
						
            <div class="form-group row">              
              <div class="col-sm-12 col-md-12">
                <!-- <input class="form-control" type="text" name="bill_head" id="bill_head" placeholder="Enter country " required=""  oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '').replace(/(\..*)\./g, '$1');" > -->
                <table  class="table table-hover small-text" id="tb">
                  <tr class="tr-header">
                    <th><a href="javascript:void(0);" style="font-size:18px;" id="addMore" title="Add More Person"><span class="fa fa-plus text-success"></span></a></th>
                    <th>country</th>
                  </tr>
                  <tr>
                    <td><a href='javascript:void(0);'  class='remove'><span class='fa fa-remove text-danger'></span></a></td>
                    <td><input type="text" name="fld_country_name[]" id="fld_country_name" placeholder="Enter country" class="form-control" required="" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '').replace(/(\..*)\./g, '$1');" style="text-transform: capitalize;"></td>
                    </tr>                    
                  </table>
              </div>
            </div>

						
						<div class="form-group row">
<!-- 							<label class="col-sm-12 col-md-3 col-form-label">Submit</label>
 -->							<div class="col-sm-12 col-md-9">
							<center><input class="btn btn-success" value="Submit" type="submit" name="submit">
								<input class="btn btn-danger" value="Reset" type="reset">
								<a href="country_view.php"><input class="btn btn-warning" value="Back" type="button"></a>
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

</body>
</html>




