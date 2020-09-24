<?php
session_start();
include "config/security.php";
include "config/connect.php";
include "config/class_paging.php";
 $p=mysqli_real_escape_string($db,$_GET['p']);
 $sesiid=$_SESSION['sesiid'];
 // $sesifak=$_SESSION['sesifak'];
  $sesiusername=$_SESSION['sesiusername'];
 $sesirole=$_SESSION['sesirole'];
?>
<!doctype html>
<html lang="en">
 <head>
 
 

 <!-- Grafik -->
	<title>LP2M UIN Raden Fatah Palembang</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="ico/logo.jpg">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-responsive.css">
	<link rel="stylesheet" href="css/style.css">
   
 </head>
 <body>
 <div class="navbar navbar-inverse">
 <div class="navbar-inner">
	<ul class="nav pull-right">
		<li><a href="config/logout.php">Logout</a></li>
		
	</ul>
 </div>
 </div>
 
 <div class="container-fluid">
	<div class="span12" id="wrapper">
		
		<div class="row-fluid" id="header">
			<a href="index.php">
			<img src="img/logo.jpg" align="left" style="height:90px; padding-top: 5px;">			
			<h3>
				Sistem Informasi Elektronik Kuliah Kerja Nyata (E-KKN) Berbasis Web Service
				pada Lembaga Penelitian dan Pengabdian Masyarakat (LP2M)UIN Raden Fatah Palembang
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
			<div class="span10" id="right">

		<center><h3>Tambah Lokasi</h3></center><br/>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <form class="form-horizontal" action="" method="post">
				 <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Id Lokasi</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama" placeholder="isikan id lokasi">
                    </div>
                  </div>
				 <div class="form-group ">
    				 <label for="nim" class="col-sm-2 control-label">Kategori Daerah</label>
					  <div class="col-sm-4">
     				 <select class="form-control" id="">
     			 	 <option>Palembang</option>
       				 <option>Banyuasin</option>
					 <option>Prabumulih</option>
					 <option>Muaraenim</option>
     				 </select>
   					 </div>
					</div>
                  <div class="form-group ">
                    <label for="nim" class="col-sm-2 control-label">Nama Lokasi</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nmlokasi" name="nmlokasi" placeholder="Isikan Nama Lokasi">
                    </div>
                  </div>
				  <div class="form-group ">
    					<label for="nim" class="col-sm-2 control-label">Latar Belakang Desa</label>
						<div class="col-sm-4">
    					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  					</div>
					</div>
                  <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Luas Desa</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama" placeholder="isikan luas desa">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="alamat" class="col-sm-2 control-label">Lahan Perkebunan</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="isikan luas lahan perkebunan">
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Lahan Persawahan</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama" placeholder="isikan luas lahan persawahan">
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Lahan Pemukiman</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama" placeholder="isikan luas lahan pemukiman">
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Jarak desa Kecamatan</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama" placeholder="isikan jarak dari desa ke kecamatan">
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Jarak Desa Kebupati</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama" placeholder="isikan jarak dari desa ke kebupati">
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Jarak Desa Keprovinsi</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama" placeholder="isikan jarak dari desa ke keprovinsi">
                    </div>
                  </div>
				   <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">S1</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama" placeholder="isikan pendidikan terakhir">
                    </div>
                  </div>
				    <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">SMA</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama" placeholder="isikan pendidikan terakhir">
                    </div>
                  </div>
				    <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">SMP</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama" placeholder="isikan pendidikan terakhir">
                    </div>
                  </div>
				   <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">SD</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama" placeholder="isikan pendidikan terakhir">
                    </div>
                  </div>
				   <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Tidak Sekolah</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama" placeholder="isikan pendidikan terakhir">
                    </div>
                  </div>
				   <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">PNS</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama" placeholder="isikan mata pencarian">
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Wiraswasta</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama" placeholder="isikan mata pencarian">
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Petani</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama" placeholder="isikan mata pencarian">
                    </div>
                  </div>
				  <div class="form-group">
    				 <label for="nim" class="col-sm-2 control-label">Letak Geografis Wilayah</label>
					  <div class="col-sm-4">
     				 <select class="form-control" id="">
     			 	 <option>Dataran Tinggi</option>
       				 <option>Dataran Rendah</option>
     				 </select>
   					 </div>
					</div>
					<div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Foto Desa</label>
                    <div class="col-sm-4">
					<input type="file" value="upload gambar"/></td></tr>
					</div>
					</div>
				<div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Latitude</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama" placeholder="isikan Latitude">
                    </div>
                  </div>
				 <div class="form-group ">
                    <label for="nama" class="col-sm-2 control-label">Longitude</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama" placeholder="isikan Longitude">
                    </div>
                  </div>
				  
                  <div class="col-sm-offset-2 col-sm-3">
                      <button type="submit" class="btn btn-info">Simpan</button>
					  
	
				  <div class="col-sm-offset-2 col-sm-3">
                      <button type="reset" class="btn btn-info">Batal</button>
                  </div>
				  </div>
                </form>
				
		<div class="row-fluid" id="footer">
				<p>Copyright &copy; 2017 LP2M UIN RADEN FATAH PALEMBANG
                 <a href="https://web.facebook.com/lp2mrafah/?fref=ts">
					<img src="img/fb.jpg" align="right" style="width:20px; padding-top: 5px;">			
				 </a>
                </p>
                
		</div>