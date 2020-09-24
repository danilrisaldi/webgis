<?php 
session_start();

include "../../../config/connect.php";

$target_dir = "file/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$namafile = basename($_FILES["fileToUpload"]["name"]);

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$target_dir = "file/";
$target_file = $target_dir . basename($_FILES["foto1"]["name"]);
$target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$foto1 = basename($_FILES["foto1"]["name"]);

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["foto1"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["foto1"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$target_dir = "file/";
$target_file = $target_dir . basename($_FILES["foto2"]["name"]);
$target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$foto2 = basename($_FILES["foto2"]["name"]);

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["foto2"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["foto2"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$target_dir = "file/";
$target_file = $target_dir . basename($_FILES["fotoSHP"]["name"]);
$target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$fotoSHP = basename($_FILES["fotoSHP"]["name"]);

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["fotoSHP"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fotoSHP"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

//terima data dari halaman form add
$namajalan = $_POST['namajalan'];
$statusjalan = $_POST['statusjalan'];
$titik_peng = $_POST['Titik_peng'];
$titik_pe_1 = $_POST['Titik_Pe_1'];
$fungsi = $_POST['Fungsi'];
$panjang = $_POST['panjang'];
$lebar = $_POST['Lebar'];
$lebarkanan = $_POST['Lebarkanan'];
$lebarkiri = $_POST['lebarkiri'];
$kelurahan = $_POST['kelurahan'];
$kecamatan = $_POST['kecamatan'];
$tipe_permu = $_POST['Tipe_Permu'];
$trotoar = $_POST['Trotoar'];
$drainase = $_POST['Drainase'];
$lhr = $_POST['Lhr'];
$akses_ke_j = $_POST['Akses_Ke_J'];
$keterangan = $_POST['Keterangan'];
$tahun = $_POST['Tahun'];
$xawal = $_POST['Xawal'];
$xakhir = $_POST['xakhir'];
$yawal = $_POST['Yawal'];
$yakhir = $_POST['yakhir'];
$kdjoin = $_POST['kdjoin'];
$noruas = $_POST['n_ruas'];
$kondisijalan = $_POST['kd_jalan'];

//cek validasi data
//if(empty($namajalan) or empty($statusjalan) or empty($titik_peng) or empty($titik_pe_1) or empty($fungsi) or empty($lebar) 
  //  or empty($lebarkanan) or empty($lebarkiri) or empty($kelurahan) or empty($kecamatan) or empty($tipe_permu) or empty($trotoar) 
   // or empty($drainase) or empty($lhr) or empty($akses_ke_j) or empty($keterangan) or empty($tahun) or empty($xawal) 
   // or empty($xakhir) or empty($yawal) or empty($yakhir) or empty($kdjoin) or empty($noruas)  or empty($kondisijalan) 
   // or empty($foto1) or empty($foto2) or empty($fotoSHP))
 //: echo "<script>alert('DATA TIDAK BOLEH KOSONG');window.history.go(-1);</script>";
//exit();
//endif;


//simpan data ke database
$query=mysqli_query($db,"insert into shp set nm_ruas='$namajalan', st_jalan='$statusjalan', titik_peng='$titik_peng',
						titik_pe_1='$titik_pe_1', fungsi='$fungsi', panjang='$panjang', lebar='$lebar', lb_kiri='$lebarkiri', lb_kanan='$lebarkanan', kelurahan='$kelurahan', kecamatan='$kecamatan', tipe_permu='$tipe_permu', trotoar='$trotoar', 
						Drainase='$drainase', lhr='$lhr', akses_ke_j='$akses_ke_j', keterangan='$keterangan', tahun='$tahun', x_awal='$xawal', x_akhir='$xakhir', y_awal='$yawal', y_akhir='$yakhir', kd_join='$kdjoin', 
							n_ruas='$noruas', kd_jalan='$kondisijalan', file='$namafile',foto1='$foto1', foto2='$foto2', 
                            fotoSHP='$fotoSHP'");

// echo mysqli_error($db);
// if($query)
// 	: echo "<script>location.href='../../../aplikasi.php?p=shp';</script>";
// else
// 	: echo "<script>alert('Failed Save Data');window.history.go(-1);</script>";
// endif;
if($query)
{
    $_SESSION['msg']='<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Data Berhasil Disimpan
                    </div>';
                    // exit();
}
else{
    $_SESSION['msg']='<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Data Gagal Disimpan.'.mysqli_error($db).'
                    </div>';
}
echo "<script>location.href='../../../aplikasi.php?p=jalan';</script>";

?>