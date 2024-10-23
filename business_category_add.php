<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Business Category</title>
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
            <div class="col-md-9 col-sm-9">
              <div class="title">
                <h4>Business Category </h4>
              </div>
              <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="#">Master Table</a></li>
                  <li class="breadcrumb-item"><a href="business_category_view.php">Business Category</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Business Category</li>
                </ol>
              </nav>
            </div>
						<div class="col-md-3 col-sm-3" align="right">
              <!-- <a  href="#" data-toggle="modal" data-target="#bill_head_add" type="button"><button  class="btn btn-primary">Add business Category</button></a> -->
              <a  href="business_category_view.php" ><button  class="btn btn-primary">View Business Category</button></a>
            </div>
					</div>
				</div>


				
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<!-- <h4 class="text-blue">Add business Bill_head</h4> -->
						</div>
						
					</div><br> 

							<?php
                                    
                if (isset($_POST['submit'])) 
                {                    
                    extract($_POST);

                    $total_business_category = count($_POST['fld_business_category_name']);

                    for($i=0;$i<$total_business_category;$i++)
                    {
                      if(($_POST['fld_business_category_name'][$i]!=""))
                      {

                        $nm=mysqli_query($connect,"select * from tbl_business_category where fld_business_id='".$_POST['business_type']."' and fld_business_category_name = '".$_POST['fld_business_category_name'][$i]."' and fld_business_category_delete='0' ");
                        if(mysqli_num_rows($nm)>0)
                        {
                            echo "<script>";
                            echo "alert('Business Category Is Already Exists');";
                            echo "window.location.href='business_category_view.php';";
                            echo "</script>";
                        }
                     
                        else
                        {

                           $business_category1=$_POST['fld_business_category_name'][$i];
                            $business_category=ucwords(strtolower($business_category1));

                          $query = "INSERT INTO tbl_business_category(fld_business_id,fld_business_category_name,fld_business_category_delete) VALUES ('".$_POST['business_type']."','".$business_category."','0')" ;
                          $result = mysqli_query($connect,$query)or die(mysqli_error($connect));

                          if(!empty($result)) 

                              {
                                  echo "<script>";
                                  // echo "alert('Business Category Added Successfully');";
                                  echo "window.location.href='business_category_view.php';";
                                  echo "</script>";                 
                              }
                              else
                              {
                                  echo "<script>";
                                   echo "alert('Business Category Not Added Successfully');";
                                  echo "window.location.href='business_category_view.php';";
                                  echo "</script>";
                              }
                        }
                      }
                    }                  
                }
              ?>						
					<form method="post">
            
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Business Type <span class="text-danger">*</span> : </label>
              <div class="col-sm-12 col-md-10">
                <select name="business_type" class="form-control custom-select2 " id="business_type" required="">
                  <option value="">Select Business Type</option> 
                  <?php
                    $cont=mysqli_query($connect,"select * from tbl_business_type where fld_business_delete ='0' order by fld_business_id desc") or die(mysqli_error($connect));
                    while ($fetch_business_type1=mysqli_fetch_array($cont)) {
                  ?>
                  <option value="<?php echo $fetch_business_type1['fld_business_id']; ?>" ><?php echo $fetch_business_type1['fld_business_name']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group row">              
              <div class="col-sm-12 col-md-12">
                <!-- <input class="form-control" type="text" name="bill_head" id="bill_head" placeholder="Enter business Category " required=""  oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '').replace(/(\..*)\./g, '$1');" > -->
                <table  class="table table-hover small-text" id="tb">
                  <tr class="tr-header">
                    <th><a href="javascript:void(0);" style="font-size:18px;" id="addMore" title="Add More Person"><span class="fa fa-plus text-success"></span></a></th>
                    <th>Business Category</th>
                  </tr>
                  <tr>
                    <td><a href='javascript:void(0);'  class='remove'><span class='fa fa-remove text-danger'></span></a></td>
                    <td><input type="text" name="fld_business_category_name[]" id="fld_business_category_name" placeholder="Enter Business Category" class="form-control" required="" oninput="this.value = this.value.replace(/[^A-Za-z0-9-,&\s]/g, '').replace(/(\..*)\./g, '$1');" style="text-transform: capitalize;"></td> 
                  </tr>                   
                  </table>
              </div>
            </div>

						
						<div class="form-group row">
<!-- 							<label class="col-sm-12 col-md-3 col-form-label">Submit</label>
 -->							<div class="col-sm-12 col-md-9">
							<center><input class="btn btn-success" value="Submit" type="submit" name="submit">
								<input class="btn btn-danger" value="Reset" type="reset">
								<a href="business_category_view.php"><input class="btn btn-warning" value="Back" type="button"></a>
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

<!-- <script type="text/javascript">
  $(document).ready(function(){
    $("select#business_type").change(function(){
          var t = $("#business_type option:selected").val();
          // alert(t);
          $.ajax({
              type: "POST",
              url: "business_for.php", 
              data: { business_type : t} 
          }).done(function(data){
              $("#business_for").html(data);
          });
      });
  });
</script> -->
</body>
</html>



