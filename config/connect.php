<?php 
error_reporting(~E_ALL);
$_hostdb="127.0.0.1";
$_userdb="root";
$passworddb="";
$namadb="webgis_linggau";
// $namadb="lp2mkkn";

//hubungkan file dengan database
$db=mysqli_connect($_hostdb,$_userdb,$passworddb,$namadb);
?>
