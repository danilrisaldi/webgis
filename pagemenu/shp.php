<?php
include 'connect.php';
?>
<div class="span12" id="containt">
<div class="row-fluid" id="bottom-content" >
<center><h3>SHP Jalan</h3></center>
<br>
<form method="post">
        
        <select name="kecamatan" id="input" class="input-xlarge search-query" style="width: 300px;">
            <option value="">--Tampil Semua--</option>
            <?php
            $sql = "SELECT kecamatan FROM shp GROUP by kecamatan";
            $result = mysqli_query($db, $sql);
        	 while($r = mysqli_fetch_array($result)) {
                 $sign=($_POST['kecamatan']==$r['kecamatan'])?'selected':'';
                 echo '<option '.$sign.' value="'.$r['kecamatan'].'">'.$r['kecamatan'].'</option>';
             }
            ?>
        </select><br>
		<input name="keyword" value="<?=@$_POST['keyword']?>" class="input-xlarge search-query" type="text" placeholder="Pencarian berdasarkan nm_ruas"><br>
		<input name="kondisi" value="<?=@$_POST['kondisi']?>" class="input-xlarge search-query" type="text" placeholder="Pencarian berdasarkan kondisi">
    <input type="submit" name="submit" value="Search" class="btn btn-success">
</form>

<div style="overflow-x:scroll;">
<style>
.table tr th{
    text-align:center;
}
</style>
    <table class="table table-striped" border="1">
        <thead>
        <tr style="font-weight: bold;">
            <th>ID</th>
            <th width="800px" >Nama Ruas</th>
            <th>Status Jalan</th>
            <th>Titik_Peng</th>
            <th>Titik_Pe_1</th>
            <th>Fungsi</th>
            <th>Panjang</th>
            <th>Lebar</th>
            <th>Lebar Kiri</th>
            <th>Lebar Kanan</th>
            <th>Kelurahan</th>
            <th>Kecamatan</th>
            <th>Tipe Perumahan</th>
            <th>Trotoar</th>
            <th>Drainase</th>
            <th>LHR</th>
            <th>Akses_ke_j</th>
            <th>Keterangan</th>
            <th>Tahun</th>
            <th>x_awal</th>
            <th>x_akhir</th>
            <th>y_awal</th>
            <th>y_akhir</th>
            <th>kd_join</th>
            <th>n_ruas</th>
            <th>Kondisi Jalan</th>
            <th>Action</th>
        </tr> 
        </thead>
        <tbody>
        <?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
        $p = new paging;
        $batas=5;
        if ($_POST['keyword']=='' OR $_POST['kecamatan'] == "" OR $_POST['kondisi'] =="") {
            $posisi = $p->cariPosisi($batas);
        }
        
        $search = $_POST['keyword'];
        $sql = "SELECT * FROM shp WHERE nm_ruas LIKE '%$search%'";
        if ($_POST['kecamatan'] != "") {
            $search = $_POST['kecamatan'];
            $sql.=" AND kecamatan LIKE '%$search%'";
        }
        if ($_POST['kondisi'] !="") {
            $search = $_POST['kondisi'];
            $sql.=" AND kd_jalan LIKE '%$search%'";
        }
        
		$sql2=$sql;
		$sql.=" limit $posisi, $batas";
        echo $sql;
        $result = mysqli_query($db, $sql);
		$prev=$_GET['halaman']-1;
        $no=($prev*$batas)+1;
        
        
        $no_urut=0;
        while($data = mysqli_fetch_array($result)) {
            $no_urut++; ?>
            <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['nm_ruas']; ?></td>
                <td><?php echo $data['st_jalan']; ?></td>
                <td><?php echo $data['titik_peng']; ?></td>
                <td><?php echo $data['titik_pe_1']; ?></td>
                <td><?php echo $data['fungsi']; ?></td>
                <td><?php echo $data['panjang']; ?></td>
                <td><?php echo $data['lebar']; ?></td>
                <td><?php echo $data['lb_kiri']; ?></td>
                <td><?php echo $data['lb_kanan']; ?></td>
                <td><?php echo $data['kelurahan']; ?></td>
                <td><?php echo $data['kecamatan']; ?></td>
                <td><?php echo $data['tipe_permu']; ?></td>
                <td><?php echo $data['trotoar']; ?></td>
                <td><?php echo $data['Drainase']; ?></td>
                <td><?php echo $data['lhr']; ?></td>
                <td><?php echo $data['akses_ke_j']; ?></td>
                <td><?php echo $data['keterangan']; ?></td>
                <td><?php echo $data['tahun']; ?></td>
                <td><?php echo $data['x_awal']; ?></td>
                <td><?php echo $data['x_akhir']; ?></td>
                <td><?php echo $data['y_awal']; ?></td>
                <td><?php echo $data['y_akhir']; ?></td>
                <td><?php echo $data['kd_join']; ?></td>
                <td><?php echo $data['n_ruas']; ?></td>
                <td><?php echo $data['kd_jalan']; ?></td>
                <td>
                <a class="btn btn-sm btn-success" style="width:80px" href="app/pengabdian/SHP/cetak.php?&id=<?php echo $data['id']; ?>">
					<i class="fa fa-print"></i> Cetak
                </a>
                <a style="width:80px" class="btn btn-sm btn-info" onclick="return confirm('Silahkan menghubungi admin untuk mendapatkan password file yang akan dibuka. Kik Ok untuk lanjut download')" href="download.php?nm=<?php echo $data['file']; ?>">
                    <i class="fa fa-download"></i> Download
                </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php

$data=mysqli_query($db,$sql2);
$seluruhdata=mysqli_num_rows($data);

// dapatkan jumlah halaman
$jmlhalaman= $p->jumlahHalaman($seluruhdata, $batas);
$linkhalaman= $p->navHalaman($_GET['halaman'], $jmlhalaman);
echo '<br><br>';
echo $linkhalaman;
echo '<br><br>';
?>
</div>
</div>