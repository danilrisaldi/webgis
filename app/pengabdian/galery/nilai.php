<?php
session_start();
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
?>
<h4 class=""align="center">Input Data Galery</h4>

<form method="post" class="form-horizontal" action="">
    <!-- <input name="keyword" value="<?=$_POST['keyword']?>" style="width:300px;display:inline-block;"  class="form-control" type="text" placeholder="Pencarian berdasarkan judul">
	<button type="submit" name="btnsearch" value="Search" class="btn btn-success"><i class="fa fa-search"></i> Cari</button> -->
	<a href="aplikasi.php?p=add_galery" class="btn btn-primary pull-right">Add <i class="fa fa-plus"></i></a>
</form>
<hr>
<br>
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
		<td>No</td>
        <td>Kategori</td>
        <td>Judul</td>
        <td>Foto</td>
        <td>Tanggal</td>
		<td>Status</td>
		<td>Keterangan</td>
		<td></td>
	</tr> </thead>
	<tbody>
	<?php
	// $p = new paging;
	// $batas=10;
	// $posisi = $p->cariPosisi($batas);
	// $search = $_POST['keyword'];
	$sql = "SELECT * FROM galery";
	// $sql2=$sql;
	// $sql.=" limit $posisi, $batas";
	// echo $sql;
	$result = mysqli_query($db, $sql);
	// $prev=$_GET['halaman']-1;
	// $no=($prev*$batas)+1;
	$no=0;
	 while($r = mysqli_fetch_array($result)) {
		  $no++; ?>
		  <tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $r['kategori']; ?></td>
			<td><?php echo $r['judul'];; ?></td>
			<td><?php echo '<img src="'.$r['foto'].'">'; ?></td>
			<td><?php echo $r['tgl'];; ?></td>
			<td><?php echo $r['status'];; ?></td>
			<td><?php echo $r['ket'];; ?></td>
			<td>
				<!-- <a style="width:80px"  class="btn btn-xs btn-warning" href="?p=edit_galery&id=<?php echo $r['id']; ?>">
					<span class="fa fa-edit"></span> Update</a> -->
				<a  style="width:80px" class="btn btn-xs btn-danger" onclick="return confirm('Apakah yakin akan dihapus?')" href="app/pengabdian/galery/hapus.php?id=<?php echo $r['id_galery'].'&f='.urlencode($r['foto']); ?>">
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