<!doctype html>
<html lang="en">
 <head>
	<title>GIS PU Linggau</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="img/LOGO PU.jpg">
	<link rel="stylesheet" href="css/bootstrap1.css">
	<link rel="stylesheet" href="css/bootstrap-responsive.css">
	<link rel="stylesheet" href="css/mainstylee.css">
	<link rel="stylesheet"type="text/css" href="css/animate.css">
 </head>
 <body>
 <div class="navbar navbar-inverse">
 <div class="navbar-inner navbar-fixed-top">	
	<a href="index.php">
	<img src="img/LOGO PU.jpg" align="left" style="width:50px; padding-top: 5px;">			
		<h5 class="span5">
			SISTEM INFORMASI GEOGRAFIS <br>
			LUBUK LINGGAU
		</h5>
	</a>
	<ul class="nav nav-pills login-top pull-right">		
	    <li class="pull-right"><a href="loginadmin.php">|| ADMIN ||</a></li>
		<li class="pull-right"><a href="pendaftaran/daftar.php">|| DAFTAR ||</a></li>
		     
	</ul>
 </div>
 </div>
 
 <div class="container-fluid">
				
	<div class="span6 offset3" id="bungkus">
	
	<center><img src="img/qq.png" width="100" height="100"></center>
		<h3 class="animated infinite tada">LOGIN USER</h3>
		<form method="post" action="config/login-proses-lp2m.php">
			<input type="text" class="input-block-level" name="username" placeholder="MASUKKAN USERNAME" required>
			<input type="password" class="input-block-level" name="password" placeholder="MASUKKAN PASSWORD" required>
            
			<button class="btn btn-block btn-warning">LOGIN</button>
		</form>
        
	</div>


 </div>
 
 
 <div class="navbar navbar-inverse">
	<div class="navbar-inner navbar-fixed-bottom" id="login-footer">
	<p>Copyright &copy; GIS Pemetaan Jalan dan Jembatan 2019 
    <a href="#">
	<img src="img/fb.jpg" align="right" style="width:20px; padding-top: 5px;">			
	</a>
    
    </p>
	</div>
</div>
<!-- END OF FOOTER -->
 </body>
</html>