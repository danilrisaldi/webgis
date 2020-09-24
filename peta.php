<?php
include "config/connect.php";
$p=mysqli_real_escape_string($db,$_GET['p']);
$sl=mysqli_real_escape_string($db,$_GET['sl']);
$key=mysqli_real_escape_string($db,$_GET['key']);

?>
<!doctype html>
<html lang="en">
 <head>

	<title>GIS PU Linggau</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="img/LOGO PU.gif">
	
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-responsive.css">
	<link rel="stylesheet" href="css/mainstyleep.css">
	<link rel="stylesheet" href="css/animate.css">
 
 </head>
 <body>
 <div id="area-web">  
 <div class="navbar navbar-inverse">
 <div class="navbar-inner navbar-fixed-top">
	<ul class="nav pull-right">
	  <li><a href="config/logout.php">Logout</a></li>
       
	</ul>
 </div>
 </div>
 
 <div class="container-fluid" style="padding:0;">
	<!-- <div class="span10 offset1" id="wrapper"> -->
	<div class="" id="">
		<div class="row-fluid" id="header">
			<img src="img/22.png">	
           
		</div>
		<!-- END OF HEADER -->
		
		<div class="row-fluid" id="navigasi">
		  <div class="span12">
			<ul class="nav nav-pills">
				<li><a href="homeuser.php">Beranda</a></li>
				<?php
					$qpage=mysqli_query($db,"select id_page,judul from page where status='Publish' and parent='0' order by orders asc");
					while(list($idpage,$page)=mysqli_fetch_row($qpage)):
					  $sqlsub="select id_page,judul from page where status='Publish' and parent='$idpage' order by orders desc";
					  $countsub=mysqli_num_rows(mysqli_query($db,$sqlsub));
					if($countsub>0):
				?>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $page;?> <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<?php
								$qsub=mysqli_query($db,$sqlsub);
								while(list($idsub,$sub)=mysqli_fetch_row($qsub)):
								?>
								<li><a href="index.php?p=<?php echo $idsub; ?>"><?php echo $sub; ?></a></li>
								<?php endwhile; ?>
							</ul>
						</li>
				<?php else: ?>
						<li><a href="index.php?p=<?php echo $idpage; ?>"><?php echo $page;?></a></li>
				<?php 
					endif;
				endwhile; ?>
                <li><a href="peta.php">Topomini Kota Lubuk Linggau</a></li>
				<li><a href="SHP.php">Download SHP</a></li>
                			
			</ul>
		  </div>
		</div>
        <div class="row-fluid" id="info">
       <!-- > <H4 align="justify">Perbaikan Selesai, Terima Kasih Telah Bersabar Menunggu. Silahkan Login Menu Sebelah Kanan Atas :  Mahasiswa. Bagi Yang Sudah Mendaftar KKN Silahkan Upload Berkas Di Menu 02. Upload Berkas</H4> -->
        </div>
		<!-- END OF NAVIGASI -->
		<br>
<iframe src="peta.html" height="500px" width="100%"></iframe>
<br>
            <!-- END OF EVENT -->
	
        <!-- END OF BOTTOM CONTENT --> 
        
        
		
		<div class="row-fluid" id="footer">
			<p>Copyright &copy; GIS Pemetaan Jalan dan Jembatan 2019 
               <a href="#">
					<img src="img/fb.jpg" align="right" style="width:30px; padding-top: 5px;">			
			  </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        
            </p>
		</div>
		<!-- END OF FOOTER -->
 
	</div>
	<!-- END OF WRAPPER -->
 </div>
 <!-- JAVASCRIPT -->
 </div>
  <!-- AREA WEB -->
 <script type="text/javascript" src="js/jquery.js"></script>
 <script type="text/javascript" src="js/bootstrap.min.js"></script>
 

 </body>
</html>
