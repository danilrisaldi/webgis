<?php
session_start();
include "connect.php";

$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];

	if(empty($username)){
		echo"<script>alert('Username belum diisi')</script>";
		echo"<meta http-equiv='refresh' content='1 url=pendaftaran.php'>";
		}
		else
		if(empty($password)){
		echo"<script>alert('password belum diisi')</script>";
		echo"<meta http-equiv='refresh' content='1 url=pendaftaran.php'>";
		}
		else
		if(empty($email)){
		echo"<script>alert('email belum diisi')</script>";
		echo"<meta http-equiv='refresh' content='1 url=pendaftaran.php'>";
		}
		else{
	$pendaftaran = mysqli_query($db, "insert into user set username='$username', password='$password', email ='$email', role='user', id_login='0'");
			if($pendaftaran){
				echo "<script>alert('Berhasil Mendaftar')</script>";
				header("location:../");
				}else{
				echo "<script>alert('Gagal Mendaftar')</script>";
				echo "<script>alert('Failed Save Data');window.history.go(-1);</script>";
				
		}		
		}
		?>
		
