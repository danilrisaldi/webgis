<?php
        $cek_query=mysqli_query($db,"select judul,status from aktif where judul='KELOMPOK'");
		list($judul_proses,$status_proses)=mysqli_fetch_row($cek_query);
		if($status_proses=="NON AKTIF"):
			 echo "<script>alert('MAAF, TIDAK MEMPUNYAI AKSES PERUBAHAN KELOMPOK');window.history.go(-1);</script>";
		     exit();
		endif;
?>