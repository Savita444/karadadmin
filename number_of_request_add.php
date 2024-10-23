<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Number of Request/Leads</title>
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
            <div class="col-md-8 col-sm-8">
              <div class="title">
                <h4>Number of Request/Leads </h4>
              </div>
              <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="#">Master Table</a></li>
                  <li class="breadcrumb-item"><a href="number_of_request_leads_view.php">Number of Request/Leads</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Number of Request/Leads</li>
                </ol>
              </nav>
            </div>
						<div class="col-md-4 col-sm-4" align="right">
              <!-- <a  href="#" data-toggle="modal" data-target="#bill_head_add" type="button"><button  class="btn btn-primary">Add number_of_request_leads</button></a> -->
              <a  href="number_of_request_view.php" ><button  class="btn btn-primary">View Number of Request/Leads</button></a>
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

                    $total_request = count($_POST['fld_number_of_request_leads_name']);

                    for($i=0;$i<$total_request;$i++)
                    {
                      if(($_POST['fld_number_of_request_leads_name'][$i]!=""))
                      {

                        $nm=mysqli_query($connect,"select * from tbl_number_of_request_leads where fld_number_of_request_leads_name = '".$_POST['fld_number_of_request_leads_name'][$i]."' and fld_number_of_request_leads_delete='0' ");
                        if(mysqli_num_rows($nm)>0)
                        {
                            echo "<script>";
                            // echo "alert('number_of_request_leads Is Already Exists');";
                            echo "window.location.href='number_of_request_leads_view.php';";
                            echo "</script>";
                        }
                     
                        else
                        {
                          $number_of_request_leads1=$_POST['fld_number_of_request_leads_name'][$i];
                          $number_of_request_leads=ucwords(strtolower($number_of_request_leads1));

                          $query = "INSERT INTO tbl_number_of_request_leads(fld_number_of_request_leads_name,fld_number_of_request_leads_delete) VALUES ('".$number_of_request_leads."','0')" ;
                          $result = mysqli_query($connect,$query)or die(mysqli_error($connect));

                          if(!empty($result)) 

                              {
                                  echo "<script>";
                                  echo "alert('Number of Request/Leads Added Successfully');";
                                  echo "window.location.href='number_of_request_view.php';";
                                  echo "</script>";                 
                              }
                              else
                              {
                                  echo "<script>";
                                   echo "alert('Number of Request/Leads Not Added Successfully');";
                                  echo "window.location.href='number_of_request_leads_view.php';";
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
                <!-- <input class="form-control" type="text" name="bill_head" id="bill_head" placeholder="Enter number_of_request_leads " required=""  oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '').replace(/(\..*)\./g, '$1');" > -->
                <table  class="table table-hover small-text" id="tb">
                  <tr class="tr-header">
                    <th><a href="javascript:void(0);" style="font-size:18px;" id="addMore" title="Add More Person"><span class="fa fa-plus text-success"></span></a></th>
                    <th>Number of Request/Leads</th>
                  </tr>
                  <tr>
                    <td><a href='javascript:void(0);'  class='remove'><span class='fa fa-remove text-danger'></span></a></td>
                    <td><input type="text" name="fld_number_of_request_leads_name[]" id="fld_number_of_request_leads_name" placeholder="Enter Number of Request/Leads" class="form-control" required="" style="text-transform: capitalize;"></td>
                    </tr>                    
                  </table>
              </div>
            </div>

						
						<div class="form-group row">
<!-- 							<label class="col-sm-12 col-md-3 col-form-label">Submit</label>
 -->							<div class="col-sm-12 col-md-9">
							<center><input class="btn btn-success" value="Submit" type="submit" name="submit">
								<input class="btn btn-danger" value="Reset" type="reset">
								<a href="number_of_request_leads_view.php"><input class="btn btn-warning" value="Back" type="button"></a>
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




