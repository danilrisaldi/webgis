<?php
session_start();
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
include "config/security.php";
include "config/connect.php";
include "config/class_paging.php";
 $p=mysqli_real_escape_string($db,$_GET['p']);
 $sesiid=$_SESSION['sesiid'];
 // $sesifak=$_SESSION['sesifak'];
  $sesiusername=$_SESSION['sesiusername'];
?>
<!doctype html>
<html lang="en">
 <head>
 <!-- Grafik -->
	<title>GIS PU Linggau</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="img/LOGO PU.jpg">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-responsive.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/sliders.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="fontawesome/css/all.css">
	 <style>
	 .dataTables_filter{
			display: inline-block;
			position: absolute;
			right: 0;
		}
		.dataTables_length{
			display: inline-block;
		}
		.dataTables_info{
			display: inline-block;

		}
		.dataTables_paginate{
			display: inline-block;
			position: absolute;
			right: 0;
		}
		.datatabel img{
			height: 50px;
			width: auto;
		}
		a.paginate_button {
    padding-right: 3px;
    padding-left: 3px;
    cursor: pointer;
}
	 .list-group-item{
	display: block;
	padding: 10px 15px;
	margin-bottom: -1px;
	background-color: #fff;
	border: 1px solid #ddd;
	list-style: none;
}
</style>

<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
	<script type="text/javascript" src="js/datatable.js"></script>
	
 </head>
 <body style ="background-color:#FFFF00;">
 <div class="navbar navbar-inverse">
 <div class="navbar-inner">
	<ul class="nav pull-right">
		<li><a href="config/logout.php">Logout</a></li>
		
	</ul>
 </div>
 </div>
 
 <div class="container-fluid" style="padding-right: 0px;padding-left: 0px;">
	<div class="" id="wrapper">
		
		<div class="row-fluid" id="header">
			<a href="index.php">
			<img src="img/pu.gif" align="left" style="height:80px; padding-top: 5px; padding-right:20px; padding-bottom:5px; padding-left:5px;">	
			<br>		
			<h3>
				WebGis Database Jalan dan Jembatan Kota Lubuklinggau
			</h3>
			</a>
		</div>
		<!-- END OF HEADER -->
		
		<div class="row-fluid" id="container">
			<div class="span2" id="left">
				<ul class="nav nav-tabs nav-stacked">
					<li><a href="aplikasi.php">Beranda</a></li>					
					<?php include "frontend/navigasi.php"; ?>
				</ul>
			</div>
			  <!-- END OF LEFT -->
			  
			<div class="span10" id="right">
			<?php
			
		
						
			//Pengabdian
			if($p=="angkatan"): include "app/pengabdian/angkatan/view.php";	
			
			elseif($p=="oopwnohfowjfw"): include "pagemenu/peta.php";	
				elseif($p=="xbntt09i9i9jcchh"): include "app/pengabdian/peta/peta.php";	
			elseif($p=="976kjkkjfnnii"): include "pagemenu/database_detail.php";
					
			elseif($p=="shp"): include "app/pengabdian/SHP/menu_input.php"; 

			elseif($p=="jalan"): include "app/pengabdian/SHP/nilai.php"; 
			elseif($p=="add"): include "app/pengabdian/SHP/add.php"; 
			elseif($p=="edit"): include "app/pengabdian/SHP/edit.php"; 
			elseif($p=="hapus"): include "app/pengabdian/SHP/hapus.php"; 
			elseif($p=="editnilai"): include "app/pengabdian/SHP/editnilai.php";

			elseif($p=="jembatan"): include "app/pengabdian/jembatan/nilai.php"; 
			elseif($p=="add_jembatan"): include "app/pengabdian/jembatan/add.php"; 
			elseif($p=="edit_jembatan"): include "app/pengabdian/jembatan/edit.php"; 
			elseif($p=="hapus_jembatan"): include "app/pengabdian/jembatan/hapus.php"; 

			elseif($p=="agenda"): include "app/pengabdian/agenda/nilai.php"; 
			elseif($p=="add_agenda"): include "app/pengabdian/agenda/add.php"; 
			elseif($p=="edit_agenda"): include "app/pengabdian/agenda/edit.php"; 
			elseif($p=="hapus_agenda"): include "app/pengabdian/agenda/hapus.php"; 

			elseif($p=="pengumuman"): include "app/pengabdian/pengumuman/nilai.php"; 
			elseif($p=="add_pengumuman"): include "app/pengabdian/pengumuman/add.php"; 
			elseif($p=="edit_pengumuman"): include "app/pengabdian/pengumuman/edit.php"; 
			elseif($p=="hapus_pengumuman"): include "app/pengabdian/pengumuman/hapus.php"; 

			elseif($p=="galery"): include "app/pengabdian/galery/nilai.php"; 
			elseif($p=="add_galery"): include "app/pengabdian/galery/add.php"; 
			elseif($p=="edit_galery"): include "app/pengabdian/galery/edit.php"; 
			elseif($p=="hapus_galery"): include "app/pengabdian/galery/hapus.php"; 

			elseif($p=="berita"): include "app/pengabdian/berita/nilai.php"; 
			elseif($p=="add_berita"): include "app/pengabdian/berita/add.php"; 
			elseif($p=="edit_berita"): include "app/pengabdian/berita/edit.php"; 
			elseif($p=="hapus_berita"): include "app/pengabdian/berita/hapus.php"; 

			elseif($p=="user"): include "app/pengabdian/user/nilai.php"; 
			elseif($p=="add_user"): include "app/pengabdian/user/add.php"; 
			elseif($p=="edit_user"): include "app/pengabdian/user/edit.php"; 
			elseif($p=="hapus_user"): include "app/pengabdian/user/hapus.php"; 
								
			else:
				if($_SESSION['sesirole']!=""):
			?>
			
                <p>ANDA LOGIN : <b> <?php echo $_SESSION['sesiusername']; ?></b></p>	
				<!-- <h4></h4> -->
				<div class="span3"></div><div class="span6"><h4 classalign="center"><marquee width="80%"><b>SELAMAT DATANG DI WEBGIS DATABASE JALAN DAN JEMBATAN KOTA LUBUKLINGGAU </b></marquee></h4></div><div class="span3"></div>
				
								<style>
									.item img{
										max-height:500px !important;
									}
								</style>
					<!-- SLIDER -->
					<div class="row-fluid" id="slider">	
									<div id="mainslide" class="carousel slide">
										<ol class="carousel-indicators">
										<?php
										$orders=0;
										$qslides=mysqli_query($db,"select id_slide,judul,deskripsi,img,tgl from slide where status='Publish' order by orders desc limit 10");
										while(list($idsl,$judulsl,$deskripsl,$imgsl,$tglsl)=mysqli_fetch_row($qslides)):
										?>
										<li data-target="#mainslide" data-slide-to="<?php echo $orders; ?>" <?php if($orders==0): ?> class="active" <?php endif; ?>></li>
										<?php $orders++; endwhile; ?>
										</ol>
										<!-- Carousel items -->
										<div class="carousel-inner">
										<?php
										$order=0;
										$qslide=mysqli_query($db,"select id_slide,judul,deskripsi,img,tgl from slide where status='Publish' order by orders desc limit 10");
										while(list($idsl,$judulsl,$deskripsl,$imgsl,$tglsl)=mysqli_fetch_row($qslide)):
										?>
										<div class="<?php if($order==0): echo "active"; endif;?> item">
											<img src="<?php echo $imgsl; ?>" width="100%">
										</div>
										<?php 
										$order++;
										endwhile; 
										?>
										</div>
										<a class="carousel-control left" href="#mainslide" data-slide="prev">&lsaquo;</a>
										<a class="carousel-control right" href="#mainslide" data-slide="next">&rsaquo;</a>
									</div>
							</div>
							<!-- END OF SLIDER -->

				<!-- <div class=malasngoding-slider>
					<div class="isi-slider">
						<img class="" src="img/H_Majid_1.JPG" alt="Gambar 1">
						<img class=""  alt="Gambar 2">
						<img class="" src="img/Garuda_1.JPG" alt="Gambar 3">
						<img class="" src="img/Jendral_A_Yani.JPG" alt="Gambar 4">
					</div>
				</div> -->
			<?php 
				else:
				include "app/responden/view.php";
				endif;
			endif; ?>
			</div>
			<!-- END OF RIGHT -->
		</div>
		<!-- END OF CONTAINER -->
			
		<div class="row-fluid" id="footer">
				<p>Copyright &copy; WebGis Database Jalan dan Jembatan Kota Lubuklinggau
                </p>
                
		</div>
		<!-- END OF FOOTER -->
 
	</div>
	<!-- END OF WRAPPER -->
 </div>
 <!-- JAVASCRIPT -->

 <script>
    $(document).ready(function() {
        $('.datatabel').DataTable({
            pageLength : 5,
        });
    } );
    </script>

 </body>
</html>