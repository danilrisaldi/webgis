<h4>Input Atribut</h4>
<hr />

<form method="post" action="aplikasi.php?p=nilaikkn">
    <input name="keyword" value="" class="input-xlarge search-query" type="text" placeholder="Masukkan Kata Kunci Pencarian">
    <input type="submit" name="btnsearch" value="Search" class="btn btn-success">
</form>
	<form method="post" action="#">
		<a href="aplikasi.php?p=add" class="btn btn-primary pull-right">Add <i class="icon-plus icon-white"></i></a>
	</form>
	<hr />

<table class="table table-striped">
	<tr style="font-weight: bold;">
		<td>No</td>
        <td>Nama Ruas</td>
        <td>Setatus Jalan</td>
        <td>Titik_Peng</td>
		<td>Titik_Pe_1</td>
		<td>Fungsi</td>
		<td>Panjang</td>
		<td>Lebar</td>
		<td>LB_Kiri</td>
		<td>LB_Kanan</td>
		<td>Kelurahan</td>
		<td>Kecamatan</td>
		<td>Tipe_Permu</td>
		<td>Kondisi</td>
		<td>Trotoar</td>
		<td>Drainase</td>
		<td>LHR</td>
		<td>Akses_Ke_J</td>
		<td>Keterangan</td>
		<td>Tahun</td>
		<td>X_Awal</td>
		<td>X_Akhir</td>
		<td>Y_Awal</td>
		<td>Y_Akhir</td>
		<td>No Ruas</td>
		
	</tr>
<?php
$p = new paging;
//batas / limit
$batas=10;
//cek halamn dan posisi data
$posisi = $p->cariPosisi($batas);

$sql="select * from shp";

$sql2=$sql;
$sql.=" limit $posisi, $batas";

$qkkn=mysqli_query($db,$sql);
echo mysqli_error($db);
	$prev=$_GET['halaman']-1;
	$no=($prev*$batas)+1;
	
//while(list($id,$idmhs,$prodi,$fakultas,$nama,$nilai_teori,$angkatan)=mysqli_fetch_row($qkkn)):
//$qnilai=mysqli_query($db,"select nilaikades,nilaidpl,pembekalan,id_user from nilai where id_register='$id'");
//list($nkades,$ndpl,$pembekalan,$id_user)=mysqli_fetch_row($qnilai);
//$totn=(($nkades*50/100)+($ndpl*25/100)+($pembekalan*25/100)); 

while($r = mysqli_fetch_array($qkkn)){

?>
	<tr>
		<td><?php echo $no++; ?></td>
        <td><?php echo $r['nm_ruas']; ?></td>
        <td><?php echo $r['st_jalan'];; ?></td>
        <td><?php echo $r['kelurahan'];; ?></td>
		<td><?php echo $r['kecamatan'];; ?></td>
		<td><?php echo $r['kd_jalan'];; ?></td>
  	</tr>
<?php
}
		$data=mysqli_query($db,$sql2);
		$seluruhdata=mysqli_num_rows($data);
		
		// dapatkan jumlah halaman
		$jmlhalaman= $p->jumlahHalaman($seluruhdata, $batas);
		$linkhalaman= $p->navHalaman($_GET['halaman'], $jmlhalaman); 
?>

</table>
<?php
echo $linkhalaman;
?>