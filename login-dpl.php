<!doctype html>
<html lang="en">
 <head>
	<title>LP2M UIN Raden Fatah Palembang</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="ico/logo.jpg">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-responsive.css">
	<link rel="stylesheet" href="css/mainstyle.css">
 </head>
 <body>
 <div class="navbar navbar-inverse">
 <div class="navbar-inner navbar-fixed-top">	
	<a href="index.php">
	<img src="img/logo.jpg" align="left" style="width:50px; padding-top: 5px;">			
		<h5 class="span5">
			LP2M <br>
			UIN RADEN FATAH PALEMBANG
		</h5>
	</a>
	<ul class="nav nav-pills login-top pull-right">		
	    <li class="pull-right"><a href="lp2m.php">|| LP2M ||</a></li>
		<li class="pull-right"><a href="login-dpl.php">DPL</a></li>
        <li class="pull-right"><a href="login.php">MAHASISWA</a></li> 
       
       
	</ul>
 </div>
 </div>
 
 <div class="container-fluid">
			
		
	<div class="span6 offset3" id="bungkus">
		<h3>LOGIN DOSEN PEMBIMBING LAPANGAN</h3>
		<form method="post" action="config/login-proses-dpl.php">
			<input type="text" class="input-block-level" name="username" placeholder="Masukkan Nomor Induk Pegawai (NIP)" required>
			<input type="password" class="input-block-level" name="password" placeholder="Masukkan Password" required>
			
             <select class="input-block-level" name="jenis">      
                <option value="">Pilih Jenis KKN</option>
				<option value="4">KKN Reguler Angkatan 68</option>
                <option value="5">KKN Mandiri 2017</option>	
			</select>
            
			<button class="btn btn-block btn-primary">LOGIN</button>
		</form>
        
        <?php 
		 include "config/connect.php";
			$query=mysqli_query($db,"select judul,status from aktif where judul='DPL'");
			list($judul,$status)=mysqli_fetch_row($query);		
			if($status=='AKTIF'):
		?>
       <a href="app/pengabdian/register_dpl/register.php" class="btn btn-warning" target='_blank'>Form Register Calon DPL Angkatan 68</a>
       <?php
	   endif;
	   ?>
      
	</div>



 </div>
 
 
 <div class="navbar navbar-inverse">
	<div class="navbar-inner navbar-fixed-bottom" id="login-footer">
	<p>Copyright &copy; 2017 LP2M UIN RADEN FATAH PALEMBANG
        <a href="https://web.facebook.com/lp2mrafah/?fref=ts">
			<img src="img/fb.jpg" align="right" style="width:20px; padding-top: 5px;">			
	     </a>
    </p>
	</div>
</div>
<!-- END OF FOOTER -->
 </body>
</html>