<div class="span12" id="containt">
<div class="row-fluid" id="bottom-content" >
<center><h3>SHP Jembatan</h3></center>
<br>
<form method="post">
		<input name="keyword" value="<?=@$_POST['keyword']?>" class="input-xlarge search-query" type="text" placeholder="Pencarian Berdasarkan Jenis">
    <input type="submit" name="submit" value="Search" class="btn btn-success">
    <a class="btn btn-sm btn-success" href="app/pengabdian/jembatan/cetak_semua.php">
					<i class="fa fa-print"></i> Cetak Semua
                </a>
</form>

<div style="overflow-x:scroll;">
<style>
.table tr th{
    text-align:center;
}
</style>
    <table class="datatabel table table-striped" border="1">
        <thead>
        <tr style="font-weight: bold;">
            <th>No</th>
            <th>jenis</th>
            <th>Panjang</th>
            <th>Lebar</th>
            <th>Keterangan</th>
            <th>file</th>
            <th>foto 1</th>
            <th>foto 2</th>
            <th>foto 3</th>
            <th style="width: 60px">Action</th>

        </tr> 
        </thead>
        <tbody>
        <?php
        include 'connect.php';
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
        $p = new paging;
		$batas=10;
		$posisi = $p->cariPosisi($batas);
		$search = $_POST['keyword'];
        $sql = "SELECT * FROM jembatan WHERE jenis LIKE '%$search%'";
		// $sql2=$sql;
		// $sql.=" limit $posisi, $batas";
	// echo $sql;
    $result = mysqli_query($db, $sql);
		// $prev=$_GET['halaman']-1;
        // $no=($prev*$batas)+1;
        
        
        $no_urut=0;
        while($data = mysqli_fetch_array($result)) {
            $no_urut++; ?>
            <tr>
                <td><?php echo $no_urut; ?></td>
                <td><?php echo $data['jenis']; ?></td>

                <td><?php echo $data['panjang']; ?></td>
                <td><?php echo $data['lebar']; ?></td>
                <td><?php echo $data['keterangan']; ?></td>

                <td><?php echo $data['file']; ?></td>
                <td><img src="app/pengabdian/jembatan/file/<?php echo $data['foto']; ?>" style="width: 100;height: 100px;"> </td>
                <td><img src="app/pengabdian/jembatan/file/<?php echo $data['foto2']; ?>" style="width: 100;height: 100px;"></td>
                <td><img src="app/pengabdian/jembatan/file/<?php echo $data['foto3']; ?>" style="width: 100;height: 100px;"></td>
                <td>
                <a class="btn btn-sm btn-success" style="width:80px" href="app/pengabdian/jembatan/cetak.php?&id=<?php echo $data['id']; ?>">
					<i class="fa fa-print"></i> Cetak
                </a>
                <a style="width:80px" class="btn btn-sm btn-info" onclick="return confirm('Silahkan menghubungi admin untuk mendapatkan password file yang akan dibuka. Kik Ok untuk lanjut download')" href="download_shpjembatan.php?nm=<?php echo $data['file']; ?>">
                    <i class="fa fa-download"></i> Download
                </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php
// $data=mysqli_query($db,$sql2);
// $seluruhdata=mysqli_num_rows($data);

// dapatkan jumlah halaman
// $jmlhalaman= $p->jumlahHalaman($seluruhdata, $batas);
// $linkhalaman= $p->navHalaman($_GET['halaman'], $jmlhalaman);
// echo '<br><br>';
// echo $linkhalaman;
// echo '<br><br>';
?>
</div>
</div>