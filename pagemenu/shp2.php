<?php
include 'connect.php';
?>
<div class="span12" id="containt">
<div class="row-fluid" id="bottom-content" >
<center><h3>SHP Jalan</h3></center>
<br>
<form method="post">
        
      <!--  <select name="kecamatan" id="input" class="input-xlarge search-query" style="width: 300px;">
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
    -->
		<input name="keyword" value="<?=@$_POST['keyword']?>" class="input-xlarge search-query" type="text" placeholder="Pencarian berdasarkan Nama Jalan"><br>
		<input name="kondisi" value="<?=@$_POST['kondisi']?>" class="input-xlarge search-query" type="text" placeholder="Pencarian berdasarkan kondisi">
    <input type="submit" name="submit" value="Search" class="btn btn-success">
    <a class="btn btn-sm btn-success" target="_blank" href="app/pengabdian/SHP/cetak_all.php">
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
            <th>No Ruas</th>
            <th>Nama Ruas</th>
            <th>Status Jalan</th>
            <th>P_RUAS(KM)</th> 
            <th>P_SURV(KM)</th>
            <th>L_JALAN(M)</th>
            <th>LB_BAHU</th>
            <th>P_ASPAL_KM</th>
            <th>Tipe_Permu</th>
            <th>Kondisi_%</th>
            <th>P_RIGID</th>
            <th>P_KON_BAIK</th>
            <th>P_KON_SED</th>
            <th>P_KON_RR</th>
            <th>P_KON_RB</th>

            <th>LHR</th>
            <th>Akses_ke_j</th>
            <th>Keterangan</th>
            <th>Tahun</th>
            <th>x_awal</th>
            <th>x_akhir</th>
            <th>y_awal</th>
            <th>y_akhir</th>
            <th>Kd_join</th>
            <th>Action</th>
        </tr> 
        </thead>
        <tbody>
        <?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
        $p = new paging;
		$batas=5;
		// $posisi = $p->cariPosisi($batas);
        
        $search = $_POST['keyword'];
        $sql = "SELECT * FROM shp WHERE Nama_Jalan LIKE '%$search%'";
        if ($_POST['kecamatan'] != "") {
            $search = $_POST['kecamatan'];
            $sql.=" AND kecamatan LIKE '%$search%'";
        }
       if ($_POST['kondisi'] !="") {
            $search = $_POST['kondisi'];
            $sql.=" AND P_KON_BAIK LIKE '%$search%' || P_KON_RB LIKE '%$search%' || P_KON_RR LIKE '%$search%' || P_KON_SED  LIKE '%$search%' ";
        }
        
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
                <td><?php echo $data['No_Ruas']; ?></td>
                <td><?php echo $data['Nama_Jalan']; ?></td>
                <td><?php echo $data['Status_Jal']; ?></td>
                <td><?php echo $data['P_RUAS_KM']; ?></td>
                <td><?php echo $data['P_SURV_KM']; ?></td>
                <td><?php echo $data['L_JALAN_M']; ?></td>
                <td><?php echo $data['LB_BAHU']; ?></td>
                <td><?php echo $data['P_ASPAL_KM']; ?></td>
                <td><?php echo $data['TIPE_PERM,']; ?></td>

                <td><?php echo $data['KONDISI_PE']; ?></td>
                <td><?php echo $data['P_RIGID']; ?></td>
                <td><?php echo $data['P_KON_BAIK']; ?></td>
                <td><?php echo $data['P_KON_SED']; ?></td>
                <td><?php echo $data['P_KON_RR']; ?></td>
                <td><?php echo $data['P_KON_RB']; ?></td>

                <td><?php echo $data['LHR']; ?></td>
                <td><?php echo $data['akses_ke_j']; ?></td>
                <td><?php echo $data['keterangan']; ?></td>
                <td><?php echo $data['tahun']; ?></td>
                <td><?php echo $data['x_awal']; ?></td>
                <td><?php echo $data['x_akhir']; ?></td>
                <td><?php echo $data['y_awal']; ?></td>
                <td><?php echo $data['y_akhir']; ?></td>
                <td><?php echo $data['kd_join']; ?></td>
                
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
// $data=mysqli_query($db,$sql2);
// $seluruhdata=mysqli_num_rows($data);

// dapatkan jumlah halaman
// $jmlhalaman= $p->jumlahHalaman($seluruhdata, $batas);
// $linkhalaman= $p->navHalaman($_GET['halaman'], $jmlhalaman, $sql2);
// echo '<br><br>';
// echo $linkhalaman;
// echo '<br><br>';
?>
</div>
</div>