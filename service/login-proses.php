<?php
session_start();
include "koneksi_simak.php";

$username=mysql_escape_string($_POST['username']);
$pass=mysql_escape_string($_POST['password']);
//$password=md5($pass);
$password=$pass;

	
//cek data tidak kosong
	if(empty($username) or  empty($password)){
		echo "<script>alerf('SILAHKAN ISI USERNAME DAN PASSWORD');window.history.go(-1);</script>";
		exit();
	}
		koneksi1_buka();
   		$login=mysql_query("select Login,Password,Nama FROM mhsw WHERE Login='$username' and Password=LEFT(PASSWORD('$password'), 10)")or die(mysql_error());
		 $ketemu=mysql_num_rows($login);
    		// Apabila username dan password ditemukan
    		if ($ketemu > 0){
        	 $r=mysql_fetch_array($login);
			
			 $_SESSION['sesiid'] = $r['Login']; 
			 $_SESSION['sesirole'] ='Mahasiswa';
		     $nim=$_SESSION['username'] = $r['Login'];
		     $nama=$_SESSION['Nama']    = $r['Nama'];
			
			  
		     $totsks=0;
			 $qsks=mysql_query("select SKS from krs where MhswID='$nim' and Final='Y' group by MkKode");
			 while(list($sks)=mysql_fetch_row($qsks)):
			 $totsks=$sks+$totsks;
			 endwhile;
			 $_SESSION['sks'] = $totsks;
			
		   	 echo "<script>location.href='../aplikasi.php?p=datakkn';</script>";
        	}else{
	          echo "<script>alert('Username Atau Password Salah');window.history.go(-1);</script>"; 
    		}
    	koneksi1_tutup();
 
?>	