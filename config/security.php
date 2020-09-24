<?php
	if(empty($_SESSION['sesiid']))
	: echo "<script>alert('Can\'t Access This Pages!!!');window.history.go(-1);</script>";
	  exit();
	endif;

?>