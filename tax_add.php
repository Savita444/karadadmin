<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Tax</title>
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
                <h4>Add Tax </h4>
              </div>
              <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <!-- <li class="breadcrumb-item"><a href="#">Master Table</a></li> -->
                  <li class="breadcrumb-item"><a href="tax_view.php">Tax details </a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Tax </li>
                </ol>
              </nav>
            </div>
      <div class="col-md-4 col-sm-4" align="right">
              <!-- <a  href="#" data-toggle="modal" data-target="#bill_head_add" type="button"><button  class="btn btn-primary">Add Product Type</button></a> -->
              <a  href="tax_view.php" ><button  class="btn btn-primary">View Tax</button></a>
            </div>
      </div>
    </div>
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
      <div class="clearfix">
        <div class="pull-left">
          <!-- <h4 class="text-blue">Add Product Bill_head</h4> -->
        </div>
      </div>
      <br> 
          <form method="post">
              <div class="form-group row">              
                <div class="col-sm-12 col-md-12">
                  <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Tax</label>
                      <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="fld_tax" type="text" placeholder="Enter Tax" required="">
                      </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-12 col-md-9">
                  <center>
                    <input class="btn btn-success" value="Submit" type="submit" name="submit">
                    <input class="btn btn-danger" value="Reset" type="reset">
                    <a href="tax_view.php">
                    <input class="btn btn-warning" value="Back" type="button"></a>
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
</body>
</html>
<?php  
  if(isset($_POST['submit']))
  {
    extract($_POST);

    $query=mysqli_query($connect,"select * from tbl_tax where fld_tax='".$fld_tax."' ") or die(mysqli_error($connect));

    if(mysqli_num_rows($query)=='1')
    {
        echo "<script>";
        echo "alert('Record already exist');";
        echo "window.location.href='tax_view.php';";
        echo "</script>";
    }
    else
    {
      $add="insert into tbl_tax(fld_tax)value('$fld_tax')";
        $show=mysqli_query($connect,$add) or die(mysqli_error($connect));
      if ($show)
      {
          echo '<script type="text/javascript">';
          echo "alert('Record  inserted');";
          echo 'window.location.href = "tax_view.php";';
          echo "</script>";
      }
      else
      {
          echo '<script type="text/javascript">';
        echo "alert('error');";
        echo 'window.location.href = "tax.php";';
        echo "</script>";
      }
    }
  }

  ?>