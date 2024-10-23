<?php  
 //$connect=mysqli_connect("localhost","root","","services_booking_application")or die(mysqli_error($connect));

 /*$connect=mysqli_connect("localhost","sumagoso_servicebooking","?Fe?AV5lR)PQ","sumagoso_service_booking_application")or die(mysqli_error($connect));
 if($connect)
{     echo "conected";
 }
 else{
     echo"not connected";
     exit;
 }*/
 
 
//  $connect = new mysqli("localhost","sumagosolutions_serAppBooking","Y2KrXDM)D)e%","sumagosolutions_service_booking_application");
  $connect = new mysqli("localhost","onlineqnew","VmQBfag#@gw%","onlineqnew");
// Check connection
if ($connect -> connect_errno) {
  echo "Failed to connect to MySQL: " . $connect -> connect_error;
  exit();
}

?> 