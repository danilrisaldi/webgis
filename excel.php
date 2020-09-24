<?php
error_reporting(0);
include "config/connect.php";
	$fileName="Laporan Daerah Lokasi KKN.xls";
	header("Content-type: image/jpeg"); 
	header("Content-Disposition: attachment; filename=$fileName");
	session_start();
?>
<div class="row-fluid" id="baris1">
<h4 align="center">Lembaga Penelitian dan Pengabdian (LP2M) <br />
Universitas Islam Negeri (UIN) Raden Fatah Palembang</h4>
<h4 align="left">Laporan Daerah Lokasi KKN</h4>
<h4 align="center">KKN   <?PHP echo $_SESSION['angkatan']; ?> </h4>

<?php 	
		//nama kabupaten dan desa
		
		$idangkatan = $_SESSION['id'];
		$query = mysqli_query($db, "select * from desa where id_angkatan= '$idangkatan'");
		?>
<table border="1">
		<tr>
			<th>No</th>
			<th>Kabupaten</th>			
			<th>Kecamatan</th>			
			<th>Desa</th>			
			<th>Provinsi</th>
         </tr>
		 <?php
		 $no=1;
		while($row = mysqli_fetch_array($query)){ ?>
    	<tr>
			<td><?php echo $no++; ?></td>
        	<td><?php echo $row[kab]; ?></td>
            <td><?php echo $row[kec]; ?></td>
			<td><?php echo $row[desa]; ?></td>
			<td><?php echo $row[propinsi]; ?></td>
        </tr>
        <?php } ?>
	</table>

</div>