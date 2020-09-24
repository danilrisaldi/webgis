<!doctype html>
<html lang="en">
 <head>
	<title>GIS PU Linggau</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="img/LOGO PU.jpg">
	<link rel="stylesheet" href="css/bootstrap1.css">
	<link rel="stylesheet" href="css/bootstrap-responsive.css">
	<link rel="stylesheet" href="css/mainstyleep.css">
	<link rel="stylesheet"type="text/css" href="css/animate.css">
 </head>
 <body>
 <div class="navbar navbar-inverse">
 <div class="navbar-inner navbar-fixed-top">	
	<a href="index.php">
	<img src="img/LOGO PU.jpg" align="left" style="width:50px; padding-top: 5px;">			
		<h5 class="span3">
		WebGis Database Jalan dan Jembatan <br>Kota Lubuklinggau
		</h5>
		<h5 class="span7"><marquee width="100%"><b>SELAMAT DATANG DIWEBGIS  DATABASE JALAN DAN JEMBATAN KOTA LUBUKLINGGAU </b></marquee></h4>
	</a>
	<ul class="nav nav-pills login-top pull-right">		
	    <li class="pull-right"><a href="loginadmin.php">|| ADMIN ||</a></li>
		<li class="pull-right"><a href="pendaftaran.php">|| DAFTAR ||</a></li>
		     
	</ul>
 </div>
 </div>
 
 <div class="container-fluid">
				
	<div class="span6 offset3" id="bungkus">
	
	<center><img src="img/1558051095418.gif" width="140" height="150"></center>
		<h3 class="animated infinite pulse">Silakan Melakukan Pendaftaran </h3>
		
		<form method="post" action="config/proses-daftar.php">
			<input type="text" class="input-block-level" name="username" placeholder="Masukan Username Anda" required>
			<input type="password" class="input-block-level" name="password" placeholder="Password" required>
			<input type="email" class="input-block-level" name="email" placeholder="Masukan Email Anda" required>
            
			<button class="btn btn-block  btn-info btn-lg">Daftar</button>
		</form>
        
	</div>


 </div>
 
 
 <div class="navbar navbar-inverse">
	<div class="navbar-inner navbar-fixed-bottom" id="login-footer">
	<p>Copyright &copy; WebGis Database Jalan dan Jembatan Kota Lubuklinggau 
    
    </p>
	</div>
</div>
<!-- END OF FOOTER -->
 </body>
</html>