<?php
session_start();
include "connect.php";

//terima data username dan password yang akan di cek kebenarannya
$username=mysqli_real_escape_string($db,$_POST['username']);
$pass=mysqli_real_escape_string($db,$_POST['password']);
$jenis=$_POST['jenis'];
$password=md5($pass);
$role="Dpl";

if($jenis=='4'): $jen="Angkatan 68 Tahun 2018";
else: $jen="Mandiri 2017";
endif;


//cek data tidak kosong
	if(empty($username) or empty($password))
	:	echo "<script>alert('ISI USERNAME DAN PASSWORD');window.history.go(-1);</script>";
	endif;
//cek data tidak kosong
	if(empty($jenis))
	:	echo "<script>alert('Pilih Jenis KKN');window.history.go(-1);</script>";
	endif;

//panggil data dari database yang sesuai dengan user dan pss yang diterima
 $query=mysqli_query($db,"select id_dpl,nip FROM dpl WHERE nip='$username' and password='$password' and id_angkatan='$jenis'");
 list($id,$usernamesesi) = mysqli_fetch_row($query);
 
 $query2=mysqli_query($db,"select id_dpl,nip FROM dpl WHERE nip='$username' and id_angkatan='$jenis'");
 list($depel,$nipe) = mysqli_fetch_row($query2);
 
 //cek ada atau tidaknya data yang dipanggil
 if(mysqli_num_rows($query2)>0) //jika data yang dipanggil lebih dari 0 atau ada
  :	
  else
  :	echo "<script>alert('ANDA BELUM TERDAFTAR PADA DPL $jen ');window.history.go(-1);</script>"; 
 endif;

//cek ada atau tidaknya data yang dipanggil
 if(mysqli_num_rows($query)>0) //jika data yang dipanggil lebih dari 0 atau ada
 :	$_SESSION['sesiid']=$id; // mendaftarkan id ke dalam server
	$_SESSION['sesirole']=$role;
	$_SESSION['sesiusername']=$usernamesesi;
	$_SESSION['jenis']=$jenis;
	
	echo "<script>location.href='../aplikasi.php?p=regisdpl';</script>";
else
 :	echo "<script>alert('Salah Username or Password');window.history.go(-1);</script>"; 
endif;
?>	