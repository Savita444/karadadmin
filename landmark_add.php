<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Landmark</title>
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
                <h4>Landmark</h4>
              </div>
              <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="#">Master Table</a></li>
                  <li class="breadcrumb-item"><a href="landmark_view.php">Landmark</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Landmark</li>
                </ol>
              </nav>
            </div>
						<div class="col-md-2 col-sm-2" align="right">
              <!-- <a  href="#" data-toggle="modal" data-target="#bill_head_add" type="button"><button  class="btn btn-primary">Add landmark</button></a> -->
              <a  href="landmark_view.php" ><button  class="btn btn-primary">View Landmark</button></a>
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

                    $total_landmark = count($_POST['fld_landmark_name']);

                    for($i=0;$i<$total_landmark;$i++)
                    {
                      if(($_POST['fld_landmark_name'][$i]!=""))
                      {

                        $nm=mysqli_query($connect,"select * from tbl_landmark where fld_district_id='".$_POST['district']."' and fld_taluka_id='".$_POST['taluka']."' and fld_city_id='".$_POST['city']."' and fld_landmark_name = '".$_POST['fld_landmark_name'][$i]."' and fld_landmark_delete='0' ");
                        if(mysqli_num_rows($nm)>0)
                        {
                            echo "<script>";
                            echo "alert('landmark Is Already Exists');";
                            echo "window.location.href='landmark_view.php';";
                            echo "</script>";
                        }
                     
                        else
                        {

                          $landmark1=$_POST['fld_landmark_name'][$i];
                          $landmark=ucwords(strtolower($landmark1));
                          $query = "INSERT INTO tbl_landmark(fld_district_id, fld_taluka_id, fld_city_id,fld_area_id, fld_landmark_name,fld_landmark_delete) VALUES ('".$_POST['district']."','".$_POST['taluka']."','".$_POST['city']."','".$_POST['area']."','".$landmark."','0')" ;
                          $result = mysqli_query($connect,$query)or die(mysqli_error($connect));

                          if(!empty($result)) 

                              {
                                  echo "<script>";
                                  // echo "alert('Landmark Added Successfully');";
                                  echo "window.location.href='landmark_view.php';";
                                  echo "</script>";                 
                              }
                              else
                              {
                                  echo "<script>";
                                   echo "alert('Landmark Not Added Successfully');";
                                  echo "window.location.href='landmark_view.php';";
                                  echo "</script>";
                              }
                        }
                      }
                    }                  
                }
              ?>						
					<form method="post">
            
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">District <span class="text-danger">*</span> : </label>
              <div class="col-sm-12 col-md-10">
                <select name="district" class="form-control custom-select2 " id="district" required="">
                  <option value="">Select District</option> 
                  <?php
                    $cont1=mysqli_query($connect,"select * from tbl_district where fld_district_delete ='0' order by fld_district_id desc") or die(mysqli_error($connect));
                    while ($fetch_district1=mysqli_fetch_array($cont1)) {
                  ?>
                  <option value="<?php echo $fetch_district1['fld_district_id']; ?>" ><?php echo $fetch_district1['fld_district_name']; ?></option>
                  <?php } ?>                 
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Taluka <span class="text-danger">*</span> : </label>
              <div class="col-sm-12 col-md-10">
                <select name="taluka" class="form-control custom-select2" id="taluka" required="">
                  <option value="">Select Taluka</option>                  
                </select>
              </div>
            </div>
						<div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">City/Village <span class="text-danger">*</span> : </label>
              <div class="col-sm-12 col-md-10">
                <select name="city" class="form-control custom-select2" id="city" required="">
                  <option value="">Select City</option>                  
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Area <span class="text-danger">*</span> : </label>
              <div class="col-sm-12 col-md-10">
                <select name="area" class="form-control custom-select2" id="area" required="">
                  <option value="">Select Area</option>                  
                </select>
              </div>
            </div>
            <div class="form-group row">              
              <div class="col-sm-12 col-md-12">
                <!-- <input class="form-control" type="text" name="bill_head" id="bill_head" placeholder="Enter landmark " required=""  oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '').replace(/(\..*)\./g, '$1');" > -->
                <table  class="table table-hover small-text" id="tb">
                  <tr class="tr-header">
                    <th><a href="javascript:void(0);" style="font-size:18px;" id="addMore" title="Add More Person"><span class="fa fa-plus text-success"></span></a></th>
                    <th>Landmark</th>
                  </tr>
                  <tr>
                    <td><a href='javascript:void(0);'  class='remove'><span class='fa fa-remove text-danger'></span></a></td>
                    <td><input type="text" name="fld_landmark_name[]" id="fld_landmark_name" placeholder="Enter landmark" class="form-control" required="" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '').replace(/(\..*)\./g, '$1');" style="text-transform: capitalize;"></td>
                    </tr>                    
                  </table>
              </div>
            </div>

						
						<div class="form-group row">
<!-- 							<label class="col-sm-12 col-md-3 col-form-label">Submit</label>
 -->							<div class="col-sm-12 col-md-9">
							<center><input class="btn btn-success" value="Submit" type="submit" name="submit">
								<input class="btn btn-danger" value="Reset" type="reset">
								<a href="landmark_view.php"><input class="btn btn-warning" value="Back" type="button"></a>
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
  $(document).ready(function(){
    $("select#country").change(function(){
          var t = $("#country option:selected").val();
          // alert(t);
          $.ajax({
              type: "POST",
              url: "state.php", 
              data: { country : t} 
          }).done(function(data){
              $("#state").html(data);
          });
      });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("select#state").change(function(){
          var t = $("#state option:selected").val();
          // alert(t);
          $.ajax({
              type: "POST",
              url: "district.php", 
              data: { state : t} 
          }).done(function(data){
              $("#district").html(data);
          });
      });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("select#district").change(function(){
          var t = $("#district option:selected").val();
          // alert(t);
          $.ajax({
              type: "POST",
              url: "taluka.php", 
              data: { district : t} 
          }).done(function(data){
              $("#taluka").html(data);
          });
      });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("select#taluka").change(function(){
          var t = $("#taluka option:selected").val();
          // alert(t);
          $.ajax({
              type: "POST",
              url: "city.php", 
              data: { taluka : t} 
          }).done(function(data){
              $("#city").html(data);
          });
      });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("select#city").change(function(){
          var t = $("#city option:selected").val();
          // alert(t);
          $.ajax({
              type: "POST",
              url: "area.php", 
              data: { city : t} 
          }).done(function(data){
              $("#area").html(data);
          });
      });
  });
</script>
</body>
</html>


