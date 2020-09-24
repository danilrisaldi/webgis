<?php 
 error_reporting(0);
	 session_start();
	if(empty($_SESSION['sesiid']) or ($_SESSION['sesirole']!='Staff_Penelitian')):
	 echo "<script>alert('Can\'t Access This Page!!!');location.href='http://lp2m.radenfatah.ac.id/';</script>";
	  exit();
	endif;
?>