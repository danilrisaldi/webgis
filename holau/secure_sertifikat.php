<?php
        $cek_query=mysqli_query($db,"select judul,status from aktif where judul='SERTIFIKAT'");
		list($judul_proses,$status_proses)=mysqli_fetch_row($cek_query);
		if($status_proses=="NON AKTIF"):
			 echo "<script>alert('MAAF, PENGINPUTAN NOMOR SERTIFIKAT TELAH BERAKHIR');window.history.go(-1);</script>";
		     exit();
		endif;
?>