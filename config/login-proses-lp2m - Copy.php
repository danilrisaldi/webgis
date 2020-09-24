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
 $query=mysqli_query($db,"select id_user,username FROM user WHERE username='$username' and password='$password' and role='admin'");
 list($id,$usernamesesi) = mysqli_fetch_row($query);

//cek ada atau tidaknya data yang dipanggil
 if(mysqli_num_rows($query)>0) //jika data yang dipanggil lebih dari 0 atau ada
 :	$_SESSION['sesiid']=$id; // mendaftarkan id ke dalam server
	$_SESSION['sesiusername']=$usernamesesi;
	$_SESSION['sesirole']='admin';
	
	echo '<script>
			var newLine = "\r\n"
			var msg = "Selamat Datang. Anda Login Sebagai Admin"
			msg += newLine;
			msg += "Jangan lupa untuk update data terbaru!";
			msg += newLine;
			msg += "Klik Ok Untuk melanjutkan!";
			var d = confirm(msg);
			if(d){
				location.href="../aplikasi.php";
			}
			else{
				window.history.go(-1);
			}
			</script>';
				
else
 :	echo "<script>alert('Invalid Username or Password');window.history.go(-1);</script>"; 
endif;
?>	