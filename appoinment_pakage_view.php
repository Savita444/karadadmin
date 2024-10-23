<?php include('include/header_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>View Appoinment Packages</title>
  <?php include('include/head.php'); ?>
  <link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/responsive.dataTables.css">

  <!-- <script type="text/javascript">

    function calculate() {
    var myBox1 = document.getElementById('txt1').value; 
    var myBox2 = document.getElementById('txt2').value;
    var result = document.getElementById('txt3'); 
    var myResult = myBox1 * myBox2;
     document.getElementById('txt3').value = myResult;
      // document.getElementById('txt4').value = myResult;
    var monthresult = myResult * 30;
    document.getElementById('txt5').value = monthresult;

    // var percentage = monthresult *100 /100;
    var myBox4 = document.getElementById('txt7').value; 
   
    var appointments = myBox4 * 30;
     document.getElementById('txt8').value = appointments;

}

function yesnoCheck() {
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes11').style.display = 'block';
    }
    else document.getElementById('ifYes11').style.display = 'none';
    {
      if (document.getElementById('noCheck').checked) {
        document.getElementById('ifYes').style.display = 'block';
    }
    else document.getElementById('ifYes').style.display = 'none';
    }

}
</script>  -->
  

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
                <h4>Appoinment Packages Details</h4>
              </div>
              <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Appoinment Packages Details</li>
                </ol>
              </nav>
            </div>

            <div class="col-md-2 col-sm-2">
              <!-- <a  href="#" data-toggle="modal" data-target="#package_add" type="button"><button  class="btn btn-primary">Add Packages</button></a> -->
              <a class="btn btn-primary" href="appoinment_pakage_add.php" role="button">
                  Add Appoinment <br>Packages
              </a>
            </div>
            
          </div>
        </div>


  
        
        
        <!-- Export Datatable start -->
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
          <div class="clearfix mb-20">
            <div class="pull-left">
              <!-- <h5 class="text-blue">View State</h5> -->
            </div>
          </div>
          <div class="row">
            <!-- <table class="stripe hover multiple-select-row data-table-export nowrap"> -->
            <table class="stripe hover data-table-export nowrap">
              <thead>
                <tr>
                  <th class="table-plus datatable-nosort">Sr No</th>
                  <th class="datatable-nosort">Action</th>
                                    <th>Business Type</th>
                                    <th>Package Name</th>
                                    <th>Package Type</th>
                                    <th>Validity</th>
                                    <th>Cost</th>
                                    <th>Multiple<br> Cost for<br> Benefit</th>
                                    <th>Free <br>Appointment<br> Per Day</th>
                                    <!-- <th>Free order amount per day</th> -->
                                    <th>Free Appointment <br>Amount Per Month</th>
                                    <!-- <th>Percentage of Commission after free order</th>
                                    <th>Free appointment per day Appointment</th> -->
                                    <th>Cost Per App. after<br> free appointment</th>
                                    <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                                    $count=0; 
                                    $query1="select *  from packages where business_type='Appoinments'order by package_id desc";
                                    $row1=mysqli_query($connect,$query1) or die(mysqli_error($connect));

                                   // $total_record=mysqli_num_rows($row1);
                                                                        
                                    while($fetch=mysqli_fetch_array($row1)) {

                                    extract($fetch);

                                ?>
                <tr>
                  <td class="table-plus"><?php echo ++$count; ?></td>
                  <td>
                    <!-- <a href="area_update.php" data-toggle="modal" data-target="#area_update<?php //echo $fetch['area_id'] ?>"  title="Edit Area"><i class="fa fa-pencil-square-o text-success" style="font-size: 20px" ></i> </a> -->

                    <a href="appoinment_package_update.php?package_id=<?php echo $fetch['package_id'] ?>" title="Edit Package" ><i class="fa fa-pencil-square-o text-success" style="font-size: 20px; padding-left: 10px" ></i></a>

                    <a href="package_delete.php?package_id=<?php echo $fetch['package_id'] ?>" onclick="return confirm('You are sure to delete the Package Details.')" title="Delete Package" ><i class="fa fa-trash text-danger" style="font-size: 20px; padding-left: 10px" ></i></a>
                  </td>
                  <td><?php echo $fetch['business_type'];?></td>
                  <td><?php echo $fetch['package_name'];?></td>
                  <td><?php echo $fetch['Type_free_paid'];?></td>
                  <td><?php echo $fetch['number_of_days'];?></td> 
                  <!-- <td><?php //echo $fetch['validity_to'];?></td>                     -->
                  <td><?php echo $fetch['cost'];?></td>
                  <td><?php echo $fetch['multiple_cost_of_benefit'];?></td>
                  <td><?php echo $fetch['free_appointment_per_day_appointment'];?></td>
                  <!-- <td><?php //echo $fetch['free_order_amount_per_day'];?></td> -->
                  <td><?php echo $fetch['free_appointment_per_month_appointment'];?></td>
                  <td><?php echo $fetch['per_appointment_cost'];?></td>
                  <!-- <td><?php //echo $fetch['free_appointment_per_day_appointment'];?></td> -->
                  <!-- <td><?php //echo $fetch['free_appointment_per_month_appointment'];?></td> -->
                  <td><?php echo $fetch['package_date'];?></td>
                
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- Export Datatable End -->
      </div>
      <?php include('include/footer.php'); ?>
    </div>
  </div>
  <?php include('include/script.php'); ?>
  <script src="src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script>
  <script src="src/plugins/datatables/media/js/dataTables.responsive.js"></script>
  <script src="src/plugins/datatables/media/js/responsive.bootstrap4.js"></script>
  <!-- buttons for Export datatable -->
  <script src="src/plugins/datatables/media/js/button/dataTables.buttons.js"></script>
  <script src="src/plugins/datatables/media/js/button/buttons.bootstrap4.js"></script>
  <script src="src/plugins/datatables/media/js/button/buttons.print.js"></script>
  <script src="src/plugins/datatables/media/js/button/buttons.html5.js"></script>
  <script src="src/plugins/datatables/media/js/button/buttons.flash.js"></script>
  <script src="src/plugins/datatables/media/js/button/pdfmake.min.js"></script>
  <script src="src/plugins/datatables/media/js/button/vfs_fonts.js"></script>
  <script>
    $('document').ready(function(){
      $('.data-table').DataTable({
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        columnDefs: [{
          targets: "datatable-nosort",
          orderable: false,
        }],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "language": {
          "info": "_START_-_END_ of _TOTAL_ entries",
          searchPlaceholder: "Search"
        },
      });
      $('.data-table-export').DataTable({
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        columnDefs: [{
          targets: "datatable-nosort",
          orderable: false,
        }],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "language": {
          "info": "_START_-_END_ of _TOTAL_ entries",
          searchPlaceholder: "Search"
        },
        dom: 'Bfrtip',
        buttons: [
        'copy', 'csv', 'pdf', 'print'
        ]
      });
      var table = $('.select-row').DataTable();
      $('.select-row tbody').on('click', 'tr', function () {
        if ($(this).hasClass('selected')) {
          $(this).removeClass('selected');
        }
        else {
          table.$('tr.selected').removeClass('selected');
          $(this).addClass('selected');
        }
      });
      var multipletable = $('.multiple-select-row').DataTable();
      $('.multiple-select-row tbody').on('click', 'tr', function () {
        $(this).toggleClass('selected');
      });
    });
  </script>

  <!-- <script type="text/javascript">
  function titleCase1() {
    var str=document.getElementById("package").value;
   var splitStr = str.toLowerCase().split(' ');
   for (var i = 0; i < splitStr.length; i++) {
       // You do not need to check if i is larger than splitStr length, as your for does that for you
       // Assign it back to the array
       splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);     
   }
   // Directly return the joined string
   document.getElementById("package").value = splitStr.join(' '); 
}

</script> -->

<!-- <script type="text/javascript">
  function titleCase2() {
    var str=document.getElementById("area1").value;
   var splitStr = str.toLowerCase().split(' ');
   for (var i = 0; i < splitStr.length; i++) {
       // You do not need to check if i is larger than splitStr length, as your for does that for you
       // Assign it back to the array
       splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);     
   }
   // Directly return the joined string
   document.getElementById("area1").value = splitStr.join(' '); 
}

</script> -->

<!-- <script type="text/javascript">
  $(document).ready(function(){
    $("select#district").change(function(){
          var s = $("#district option:selected").val();
      
        // alert(s);
          $.ajax({
              type: "POST",
              url: "taluka.php", 
              data: { district : s  } 
          }).done(function(data){
              $("#taluka").html(data);
          });
      });
  });
</script> -->

<!-- <script type="text/javascript">
  $(document).ready(function(){
  $("select#taluka").change(function(){
        var s = $("#taluka option:selected").val();
    
      // alert(s);
        $.ajax({
            type: "POST",
            url: "village.php", 
            data: { taluka : s  } 
        }).done(function(data){
            $("#village").html(data);
        });
    });
  });
</script> -->
</body>
</html>