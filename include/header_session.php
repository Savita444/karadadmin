<?php
if( empty(session_id()) && !headers_sent()){
    session_start();
}

if(!(isset($_SESSION['admin_email'])))
{
    echo "<script>";
echo 'window.location.href="index.php";';
echo "</script>";
}
?>