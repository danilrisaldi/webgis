<?php
session_start();
include "config/security.php";
include "config/connect.php";
include "config/class_paging.php";
include "library/enkripsi.php";
$p=mysqli_real_escape_string($db,$_GET['p']);
$sl=mysqli_real_escape_string($db,$_GET['sl']);
$key=mysqli_real_escape_string($db,$_GET['key']);
?>
<!doctype html>
<html lang="en">
 <head>
	<title>GIS PU Linggau</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="img/LOGO PU.jpg">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-responsive.css">
	<link rel="stylesheet" href="css/mainstyleep.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="fontawesome/css/all.css">
		<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
	<script type="text/javascript" src="js/datatable.js"></script>
 </head>
 <body>
	<div class="navbar navbar-inverse">
		<div class="navbar-inner navbar-fixed-top">
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
		a.paginate_button {
    padding-right: 3px;
    padding-left: 3px;
    cursor: pointer;
}
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
				<li><a href="https://www.facebook.com/"><img src="img/fb-logo.png"/> Facebook</a></li>
				<li><a href="https://www.instagram.com/"><img src="img/ig-logo.png"/> Instagram</a></li>
				<li><a href="https://twitter.com/"><img src="img/tw-icon.png"/> Twitter</a></li>
			</ul>
			<ul class="nav pull-right">
				<li><a href="config/logout.php">Logout</a></li>
			</ul>
		</div>
 </div>
 <div class="container-fluid" style="padding:0;">
	<!-- <div class="span10 offset1" id="wrapper"> -->
	<div class="" id="">
		<div class="row-fluid" id="header">
			<img src="img/hider.png">
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
								<li><a href="homeuser.php?p=<?php echo $idsub; ?>"><?php echo $sub; ?></a></li>
								<?php endwhile; ?>
							</ul>
						</li>
				<?php else: ?>
						<li><a href="homeuser.php?p=<?php echo $idpage; ?>"><?php echo $page;?></a></li>
				<?php 
					endif;
				endwhile; ?>
                <li><a href="?p=oopwnohfowjfw">Topomini Kota Lubuk Linggau</a></li>
								<li><a href="?p=xbntt09i9i9jcchh">Database</a></li>
                			
			</ul>
		  </div>
		</div>
        <div class="row-fluid" id="info">
       <!-- > <H4 align="justify">Perbaikan Selesai, Terima Kasih Telah Bersabar Menunggu. Silahkan Login Menu Sebelah Kanan Atas :  Mahasiswa. Bagi Yang Sudah Mendaftar KKN Silahkan Upload Berkas Di Menu 02. Upload Berkas</H4> -->
        </div>
		<!-- END OF NAVIGASI -->


		<div class="row-fluid" id="contain">
			<?php
				if($p=="")
				{
					if(!empty($sl)) include "frontend/slide.php";
					else {
					?>
					<div class="span12" id="containt">
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
											<div class="carousel-caption">
												<h4><a href="homeuser.php?sl=<?php echo $idsl; ?>"><?php echo $judulsl; ?></a></h4>
												<?php echo $deskripsl; ?>
												
											</div>
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
							
							<!-- CONTENT -->
							<!-- <div class="row-fluid" id="content">
								<ul class="postings">
									<?php
									// $sqlnews="select id_page,tgl,judul,deskripsi from page where parent='8' and status='Publish'";
									// if(!empty($key)): $sqlnews.=" and judul like '%$key%' or parent='8' and status='Publish' and isi like '%$key%' order by id_page desc";
									// else: $sqlnews.=" order by id_page desc limit 2";
									// endif;
													
									// $qnews=mysqli_query($db,$sqlnews);
									// echo mysqli_error($db);
									// while(list($idn,$tgln,$jdln,$deskn)=mysqli_fetch_row($qnews)):
									?>
									<li class="span6 posting" style="padding: 5px; min-height: 220px; max-height: 160px; display: block; overflow: auto;">
										<code><?php //echo $tgln; ?></code><br>
										<h4><a href="homeuser.php?p=<?php //echo $idn; ?>"><?php //echo $jdln; ?></a></h4>
										<?php //echo $deskn; ?>
										<p><a href="homeuser.php?p=<?php //echo $idn; ?>" class="btn btn-inverse">Readmore &raquo;</a></p>
															<a href="app/lainnya/berita.php">Berita Lainnya...</a>
									</li>
									<?php //endwhile; ?>
								</ul>
							</div> -->
							<!-- END OF CONTENT -->

					</div>
					<?php
					}
				}	
				elseif($p=="xbntt09i9i9jcchh") include "pagemenu/database.php";	
				// elseif($p=="jifneinineingoefiee") include "pagemenu/shp.php";	
				elseif($p=="jifneinineingoefiee") include "pagemenu/shp2.php";	
				elseif($p=="jifneinijhbvfuywfdw") include "pagemenu/shp_jembatan.php";
				elseif($p=="oopwnohfowjfw") include "pagemenu/peta.php";	
				elseif($p=="976kjkkjfnnii") include "pagemenu/database_detail.php";
				
				else {
					include "frontend/page.php";
				}


				?>
		</div>

				<!-- BOTTOM CONTENT --> 
			<div class="row-fluid" id="bottom-content" style="position: relative;">
					
					<div class="span4" id="klm2">
						
							<div class="row-fluid" id="galery">
								<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Galeri</h4>
									<ul>
									<?php 
					$sql_galery= mysqli_query($db,"select id_galery,judul,foto from galery  where status='Publish' order by id_galery desc limit 20");			
											while(list($id_galery,$judul,$fot)=mysqli_fetch_array($sql_galery)):
											?>
					<a href="<?php echo $fot; ?>" target="_blank"><img src="<?php echo $fot; ?>" width="55px" class="img-polaroid"></a>
												
											<?php endwhile; ?>
												<br>
												<a href="app/lainnya/galery.php">Galeri Lainnya...</a>
										</ul>
						</div>
						<!-- END OF Galeri -->
						
						
						
					
					</div>
					
					<div class="span4" id="agenda">
								<h4 align="center" class="animated infinite heartBeat">Agenda</h4>
											<ul>
											<?php 
											$sql_agenda= mysqli_query($db,"select id_agenda,judul,tgl,pukul,tempat,status,ket from agenda where status='Publish' order by id_agenda desc limit 3");			echo mysqli_error($db);
											while(list($id_agenda,$judul,$tgl,$pukul,$tempat,$status,$ket)=mysqli_fetch_array($sql_agenda)):
											?>
												<hr>
													
													<table class="table-hover" >
														<tr style="font-family:'Times New Roman', Times, serif">
																	<td>Perihal</td>
																	<td>: </td>
																	<td><?php echo $judul; ?></td>
															</tr>
															<tr style="font-family:'Times New Roman', Times, serif">
																	<td>Tanggal</td>
																	<td>: </td>
																	
																	<td><?php echo $tgl; ?></td>
															</tr>
															<tr style="font-family:'Times New Roman', Times, serif">
																	<td>Pukul</td>
																	<td>: </td>
																	<td><?php echo $pukul; ?></td>
															</tr>
															<tr style="font-family:'Times New Roman', Times, serif">
																	<td>Tempat</td>
																	<td>: </td>
																	<td><?php echo $tempat; ?></td>
															</tr>
															<tr style="font-family:'Times New Roman', Times, serif">
																	<td>Keterangan</td>
																	<td>: </td>
																	<td><?php echo $ket; ?></td>
															</tr>
													</table>
													
											<?php endwhile; ?>
											</ul>
							</div>
							<!-- END OF AGENDA -->
							
							<div class="span4" id="pengumuman" style="margin-left: 2%;">
									<h4 align="center" class="animated infinite heartBeat">Pengumuman</h4>
											<ul>
									<?php 
											$sql_pengumuman= mysqli_query($db,"select id_pengumuman,deskripsi,judul,isi,tgl,status from pengumuman where status='Publish' order by id_pengumuman desc limit 3");			
											while(list($id_pengumuman,$de,$judul,$isi,$tgl,$status)=mysqli_fetch_array($sql_pengumuman)):
											?>
												<hr>
														<table class="table-hover">
														<tr style="font-family:'Times New Roman', Times, serif">
																	<td></td>
																	<td></td>
																	<td><?php echo '<b>'; echo $judul; echo '</b>'; ?>                          
																		<b> |</b> <?php echo '<b>';echo $tgl; echo '</b>';?></td>
															<tr style="font-family:'Times New Roman', Times, serif">
																	<td></td>
																	<td></td>
																	<td><?php echo $isi; ?></td>
															</tr>
														
													</table>                  
														
											<?php endwhile; ?>
												<a href="app/lainnya/pengumuman.php">Pengumuman Lainnya...</a>
											</ul>
							</div>
					<!-- END OF EVENT -->
			</div>
			<!-- END OF BOTTOM CONTENT --> 

		<div class="row-fluid" id="footer">
			<p>Copyright &copy; WebGis Database Jalan dan Jembatan Kota Lubuklinggau 
               <a href="#">
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
	<script>
    $(document).ready(function() {
        $('.datatabel').DataTable({
            pageLength : 5,
        } );
    } );
    </script>
 

 </body>
</html>