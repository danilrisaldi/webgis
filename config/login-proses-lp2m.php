<?php
session_start();
include "connect.php";

//terima data username dan password yang akan di cek kebenarannya
$username=mysqli_real_escape_string($db,$_POST['username']);
$pass=mysqli_real_escape_string($db,$_POST['password']);
$password=md5($pass);

//cek data tidak kosong
	if(empty($username) or empty($password))
	:	echo "<script>alert('Pilih Jenis Pengguna');window.history.go(-1);</script>";
	endif;

//panggil data dari database yang sesuai dengan user dan pss yang diterima
 $query=mysqli_query($db,"select id_user,username FROM user WHERE username='$username' and password='$password' and role='user'");
 list($id,$usernamesesi) = mysqli_fetch_row($query);

//cek ada atau tidaknya data yang dipanggil
 if(mysqli_num_rows($query)>0) //jika data yang dipanggil lebih dari 0 atau ada
 {
	 //  echo $id.' '.$usernamesesi; exit();
	  $_SESSION['sesiid']=$id; // mendaftarkan id ke dalam server
		 $_SESSION['sesiusername']=$usernamesesi;
		 $_SESSION['sesirole']='user';
		 // header('url:');
		 echo "<script>location.href='../aplikasi.php';</script>";
 }
else{
	echo "<script>alert('Invalid Username or Password');window.history.go(-1);</script>"; 
}
?>	