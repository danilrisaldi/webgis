<?php
session_start();
// error_reporting(E_ALL);
// ini_set('display_errors', 1);


if (@$_POST['importExcel']!='') {
	require_once "library/phpexcel/PHPExcel.php";
	$file = $_FILES['fileExcel']['tmp_name'];
	//load the excel library
	$objPHPExcel = PHPExcel_IOFactory::load($file);

	$worksheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
	$numRows = count($worksheet);
	$msg = array();
	for ($i=2; $i <= ($numRows) ; $i++) {
		$id = $worksheet[$i]['A'];
		$jenis = $worksheet[$i]['B'];
		$panjang = $worksheet[$i]['C'];
		$lebar= $worksheet[$i]['D'];
		$keterangan = $worksheet[$i]['E'];
		
		// $foto = $worksheet[$i]['S'];
		$foto1  = '';
		$foto2 = '';
		$foto3 = '';
		$namafile='';
				//simpan data ke database
		$result=mysqli_query($db,"select * from jembatan where id='$id'");
		if (!$result) {
			continue;
		}
		else {
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC); //get 1 row from search
			// echo $row[0]; // jum
			if (count($row)==0)  //fid_jembat masih kosong di database
			{
				$sqlq="insert into jembatan 
					set id='$id', jenis='$jenis',
						panjang='$panjang', lebar='$lebar', keterangan='$keterangan', file='$namafile', foto='$foto1', foto2='$foto2', foto3='$foto3'";

				$query=mysqli_query($db,$sqlq);
				
				if($query)
				{
					$msg[]='<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										Data Berhasil Disimpan
									</div>';
				}
				else{
					$msg[]='<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										Data Gagal Disimpan.'.mysqli_error($db).'
									</div>';
				
				}
			}
			else {
				$sql="UPDATE `jembatan` SET 
				id='$id', jenis='$jenis',
			    panjang='$panjang', lebar='$lebar', keterangan='$keterangan'
				
				WHERE id='$id' ";
				$query=mysqli_query($db,$sql);
				if($query)
				{
					$msg[]='<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								Data Telah diupdate di database
							</div>';
				}
				else{
					$msg[]='<div class="alert alert-warning">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					// Data Gagal diupdate di database.'.$sql.'
					</div>';
					// Data Gagal diupdate di database.
				}
				continue;
			}
		}
	}
	$_SESSION['msg']=$msg;
	echo "<script>location.href='aplikasi.php?p=jembatan';</script>";
	exit();
}
?>
<h4 class="animated infinite heartBeat "align="center">Input Data Jembatan</h4>

<form method="post" class="form-horizontal" action="" enctype="multipart/form-data">
	Import File Excel<br>
    <input type="file"  class="form-control" style="width:300px;display:inline-block;"  name="fileExcel">
	<button type="submit" name="importExcel" value="Upload" class="btn btn-success"><i class="fa fa-upload"></i> Update</button>
</form>
<hr>
<form method="post" class="form-horizontal" action="">
    <input name="keyword" value="<?=$_POST['keyword']?>" style="width:300px;display:inline-block;"  class="form-control" type="text" placeholder="Pencarian nama jembatan">
	<button type="submit" name="btnsearch" value="Search" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
	<a class="btn btn-sm btn-success" target="_blank" href="app/pengabdian/jembatan/cetak_semua.php">
					<i class="fa fa-print"></i> Cetak Semua
                </a>
		<!-- <a href="aplikasi.php?p=add_jembatan" class="btn btn-primary pull-right">Add <i class="fa fa-plus"></i></a> -->
</form>
	<hr />
	<?php
	if($_SESSION['msg']!=''){
		if (is_array($_SESSION['msg'])) {
			foreach ($_SESSION['msg'] as $key => $value) {
				echo $value;
			}
			unset($_SESSION['msg']);
		}else {
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
	}
	?>

 	<table class="datatabel table table-striped">
	 <thead>
	<tr style="font-weight: bold;">
		<td>ID</td>
        <td>jenis</td>
        <td>panjang</td>
		<td>lebar</td>
		<td>keterangan</td>
		<td>Action</td>
	</tr> </thead>
	<tbody>
	<?php
	// $p = new paging;
	// $batas=10;
	// $posisi = $p->cariPosisi($batas);
	$search = $_POST['keyword'];
	$sql = "SELECT * FROM jembatan WHERE jenis LIKE '%$search%'";
	// $sql2=$sql;
	// $sql.=" limit $posisi, $batas";
	// echo $sql;
	$result = mysqli_query($db, $sql);
	// $prev=$_GET['halaman']-1;
	// $no=($prev*$batas)+1;

	 while($r = mysqli_fetch_array($result)) {
		  $no++; ?>
		  <tr>
			<td><?php echo $r['id']; ?></td>
			<td><?php echo $r['jenis']; ?></td>
			<td><?php echo $r['panjang'];; ?></td>
			<td><?php echo $r['lebar'];; ?></td>
			<td><?php echo $r['keterangan'];; ?></td>
			<td>
				<a style="width:80px"  class="btn btn-xs btn-info" href="app/pengabdian/jembatan/cetak.php?&id=<?php echo $r['id']; ?>">
					<span class="fa fa-print"></span> Cetak</a>
				<a style="width:80px"  class="btn btn-xs btn-warning" href="?p=edit_jembatan&id=<?php echo $r['id']; ?>">
					<span class="fa fa-edit"></span> Update</a>
				<a  style="width:80px" class="btn btn-xs btn-danger" onclick="return confirm('Apakah yakin akan dihapus?')" href="app/pengabdian/jembatan/hapus.php?id=<?php echo $r['id']; ?>">
					<span class="fa fa-trash"></span> Hapus</a>
			</td>
		</tr>
	 <?php } 
	 echo "</tbody></table>";

// $data=mysqli_query($db,$sql2);
// $seluruhdata=mysqli_num_rows($data);

// dapatkan jumlah halaman
// $jmlhalaman= $p->jumlahHalaman($seluruhdata, $batas);
// $linkhalaman= $p->navHalaman($_GET['halaman'], $jmlhalaman); 
// echo $linkhalaman;
?>