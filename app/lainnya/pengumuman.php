<?php
session_start();
include "../../config/security.php";
include "../../config/connect.php";
$p=mysqli_real_escape_string($db,$_GET['p']);
$sl=mysqli_real_escape_string($db,$_GET['sl']);
$key=mysqli_real_escape_string($db,$_GET['key']);

?>
<!doctype html>
<html lang="en">
 <head>
	<title>GIS PU Linggau</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="../../img/LOGO PU.jpg">
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<link rel="stylesheet" href="../../css/bootstrap-responsive.css">
	<link rel="stylesheet" href="../../css/mainstyleep.css">
	<link rel="stylesheet" href="../../css/animate.css">
	<link rel="stylesheet" href="../../fontawesome/css/all.css">

		<script type="text/javascript" src="../../js/jquery.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
 </head>
 <body>
 <div class="navbar navbar-inverse">
		<div class="navbar-inner navbar-fixed-top">
		<style>
		.nav.nav-pills.sosmed li a {
				font-size: 16px;
				font-weight: normal;
		}
		.nav > li > a > img {
				max-width: none;
				width: 20px;
				background: #99998c;
		}
		.nav > li:hover > a > img {
				background: white;
		}
		</style>
		<ul class="nav nav-pills sosmed">
				<li><a href="tel:082176896550"><i class="fa fa-phone fa-lg"></i> Telepon</a></li>
				<li><a href="https://www.google.com/gmail/"><i class="fa fa-envelope-square fa-lg"></i> Email</a></li>
				<li><a href="https://www.facebook.com/"><img src="../../img/fb-logo.png"/> Facebook</a></li>
				<li><a href="https://www.instagram.com/"><img src="../../img/ig-logo.png"/> Instagram</a></li>
				<li><a href="https://twitter.com/"><img src="../../img/tw-icon.png"/> Twitter</a></li>
			</ul>
			<ul class="nav pull-right">
				<li><a href="../../config/logout.php">Logout</a></li>
			</ul>
		</div>
 </div>
 
 <div class="container-fluid">
		<div class="" id="">
			<div class="row-fluid" id="header">
				<img src="../../img/hider.png">
			</div>
		<!-- END OF HEADER -->
		
		<div class="row-fluid" id="navigasi">
		  <div class="span12">
			<ul class="nav nav-pills">
				<li><a href="../../homeuser.php">Beranda</a></li>
				<?php
					$qpage=mysqli_query($db,"select id_page,judul from page where status='Publish' and parent='0' order by orders asc");
					while(list($idpage,$page)=mysqli_fetch_row($qpage)):
					  $sqlsub="select id_page,judul from page where status='Publish' and parent='$idpage' order by orders asc";
					  $countsub=mysqli_num_rows(mysqli_query($db,$sqlsub));
					if($countsub>0):
				?>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $page;?> <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<?php
								$qsub=mysqli_query($db,$sqlsub);
								while(list($idsub,$sub)=mysqli_fetch_row($qsub)):
								?>
								<li><a href="berita.php?p=<?php echo $idsub; ?>"><?php echo $sub; ?></a></li>
								<?php endwhile; ?>
							</ul>
						</li>
				<?php else: ?>
						<li><a href="berita.php?p=<?php echo $idpage; ?>"><?php echo $page;?></a></li>
				<?php 
					endif;
				endwhile; ?>
                <li><a href="../../homeuser.php?p=oopwnohfowjfw">Topomini Kota Lubuk Linggau</a></li>
								<li><a href="../../homeuser.php?p=xbntt09i9i9jcchh">Database</a></li>		
			</ul>
		  </div>
		</div>
		<!-- END OF NAVIGASI -->
		
			
		<div class="row-fluid" id="contain">
		<?php
		if(!empty($p)): include "../../frontend/view_pengumuman.php";
		elseif(!empty($sl)): include "../../frontend/slide.php";
		else:
		?>
		  <div class="span12" id="containt">
			<!--<div class="row-fluid" id="c-top">
				<h3>NEWS </h3>								
			</div> -->
			<!-- END OF C-TOP -->
			
			<div class="row-fluid" id="content">
				<ul class="postings">
					<?php
					$sqlnews="select id_pengumuman,tgl,judul from pengumuman where status='Publish'";
					if(!empty($key)): $sqlnews.=" and judul like '%$key%' and status='Publish' and isi like '%$key%' order by id_pengumuman desc";
					else: $sqlnews.=" order by id_pengumuman desc";
					endif;
									
					$qnews=mysqli_query($db,$sqlnews);
					echo mysqli_error($db);
					while(list($idn,$tgln,$jdln)=mysqli_fetch_row($qnews)):
					?>
				<li class="span6 posting" style="padding: 5px; min-height: 165px; max-height: 160px; display: block; overflow: auto;">
						<code><?php echo $tgln; ?></code><br>
						<h4><a href="pengumuman.php?p=<?php echo $idn; ?>"><?php echo $jdln; ?></a></h4>
						
						<p><a href="pengumuman.php?p=<?php echo $idn; ?>" class="btn btn-inverse">readmore &raquo;</a></p>
                     
					</li>
					<?php endwhile; ?>
					
				</ul>
                
			</div>
			<!-- END OF CONTENT -->
		   </div>
		   <?php endif; ?>
		</div>
		<!-- END OF CONTAIN -->
        

		
		<div class="row-fluid" id="footer">
			<p>Copyright &copy; WebGIS Database Jalan dan Jembatan Kota Lubuklinggau</p>
		</div>
		<!-- END OF FOOTER -->
 
	</div>
	<!-- END OF WRAPPER -->
 </div>
 <!-- JAVASCRIPT -->
 <script type="text/javascript" src="../../js/jquery.js"></script>
 <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
 </body>
</html>