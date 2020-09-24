<?php
session_start();
include "connect.php";

//terima data username dan password yang akan di cek kebenarannya
$username=mysqli_real_escape_string($db,$_POST['username']);
$pass=mysqli_real_escape_string($db,$_POST['password']);
$password=md5($pass);


//cek data tidak kosong
	if(empty($username) or empty($password))
	:	echo "<script>alert('ISI USERNAME DAN PASSWORD');window.history.go(-1);</script>";
	endif;

//panggil data dari database yang sesuai dengan user dan pss yang diterima
 $query=mysqli_query($db,"select id_user,role,username FROM user WHERE username='$username' and password='$password'");
 list($id,$role,$usernamesesi) = mysqli_fetch_row($query);

//cek ada atau tidaknya data yang dipanggil
 if(mysqli_num_rows($query)>0) //jika data yang dipanggil lebih dari 0 atau ada
 :	$_SESSION['sesiid']=$id; // mendaftarkan id ke dalam server
	$_SESSION['sesirole']=$role;
	$_SESSION['sesiusername']=$usernamesesi;
	
	echo "<script>location.href='../aplikasi.php';</script>";
else
 :	echo "<script>alert('Invalid Username or Password');window.history.go(-1);</script>"; 
endif;
?>	