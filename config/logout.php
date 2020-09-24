<?php
session_start();

error_reporting("~E_ALL | ~E-NOTICE && ~E_DEPRECATED && ~E_STRITCH");

//hapus sesi yang diinginkan
unset($_SESSION['sesiid']);
unset($_SESSION['sesirole']);
unset($_SESSION['sesifak']);

//cek sesi terhapus atau tidak
if($_SESSION['sesiid']=="" and $_SESSION['sesirole']=="" and $_SESSION['sesifak']==""):
	echo "<script>location.href='../index.php';</script>";	
else:
	echo "<script>alert('Logout gagal, coba lagi !!!');window.history.go(-1);</script>";
endif;
?>