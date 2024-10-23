<?php
  session_start();
if(isset($_SESSION['CODE']))
{
unset($_SESSION['CODE']); // destroy the session if already there
}
$string1="abcdefghijklmnopqrstuvwxyz";
$string2="1234567890";
$string=$string1.$string2;
$string= str_shuffle($string);
$random_text= substr($string,0,6); // change the number to change number of chars
$_SESSION['CODE']=$random_text;
$im = @ImageCreate (100, 37)
or die ("Cannot Initialize new GD image stream");
$background_color = ImageColorAllocate ($im, 23, 162, 184); // Assign background color
$text_color = ImageColorAllocate ($im, 255, 255, 255); // text color is given 
ImageString($im,5,5,2,$_SESSION['CODE'],$text_color); // Random string from session added 
ImagePng ($im); // image displayed
imagedestroy($im); // Memory allocation for the image is removed. 
?>


