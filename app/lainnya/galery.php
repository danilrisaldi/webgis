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
	
		  <div  id="containt">
        
	
			<div class="row-fluid"  id="content">
            <div class="row-fluid" id="bottom-content">
            
            <div class="span4" id="galery_lp2m">
                	<h4>&nbsp;&nbsp;Umum</h4>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                            <th></th>			
                            <th></th>			

                        </tr>
                      </thead>
                      
                      <tbody>
		
                    
                    <ul>
                    <?php 
					 $sql_galery= mysqli_query($db,"select id_galery,kategori,judul,foto,ket from galery  where status='Publish' and kategori='Umum' order by id_galery desc limit 5");			
                        while(list($id_galery,$kategori,$judul,$fot,$ket_foto)=mysqli_fetch_array($sql_galery)):
                        ?>
                        
                        </div>
                        <tr>
                            <td>
                            <a href="../../<?php echo $fot; ?>" target="_blank">
                       		 <p align="center"><img src="../../<?php echo $fot; ?>" width="70%" class="img-polaroid"></p></a><?php echo "<p align='center'>$ket_foto</p>"; ?>
                            </td>			
                            <td></td>
                        </tr>
                           
                    	 <?php endwhile; ?>
                      </ul>
                        </tbody>
					</table>
              </div>
              <!-- END OF LP2M -->
            
            <div class="span4" id="galery1">
                	<h4>&nbsp;&nbsp;Pimpinan</h4>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                            <th></th>			
                            <th></th>			

                        </tr>
                      </thead>
                      
                      <tbody>
		
                    
                    <ul>
                    <?php 
					 $sql_galery= mysqli_query($db,"select id_galery,kategori,judul,foto,ket from galery  where status='Publish' and kategori='Pimpinan' order by id_galery desc limit 5");			
                        while(list($id_galery,$kategori,$judul,$fot,$ket_foto)=mysqli_fetch_array($sql_galery)):
                        ?>
                        
                        
                        <tr>
                            <td>
                            <a href="../../<?php echo $fot; ?>" target="_blank">
                       		 <img src="../../<?php echo $fot; ?>" width="100%" class="img-polaroid"></a><?php echo "<p align='center'>$ket_foto</p>"; ?>
                            </td>			
                            <td></td>
                        </tr>
                           
                    	 <?php endwhile; ?>
                      </ul>
                        </tbody>
					</table>
              </div>
              <!-- END OF Penelitian -->
				
					<div class="span4" id="galery2">
                	<h4>&nbsp;&nbsp;Jalan</h4>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                            <th></th>			
                            <th></th>			

                        </tr>
                      </thead>
                      
                      <tbody>
		
                    
                    
                    <?php 
					 $sql_galery= mysqli_query($db,"select id_galery,kategori,judul,foto,ket from galery  where status='Publish' and kategori='Jalan' order by id_galery desc limit 5");			
                        while(list($id_galery,$kategori,$judul,$fot,$ket_foto)=mysqli_fetch_array($sql_galery)):
                        ?>
                        
                        
                        <tr>
                            <td>
                            <a href="../../<?php echo $fot; ?>" target="_blank">
                       		 <img src="../../<?php echo $fot; ?>" width="100%" class="img-polaroid"></a><?php echo "<p align='center'>$ket_foto</p>"; ?>
                            </td>			
                            <td></td>
                        </tr>
                        
                     
                        
                                                  
                    	 <?php endwhile; ?>
                      </ul>
                        </tbody>
					</table>
              </div>
              <!-- END OF Galeri Pengabdian -->
          
		  
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