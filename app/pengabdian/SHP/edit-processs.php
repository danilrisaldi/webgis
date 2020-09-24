<?php
session_start();
?>
<?php 

include "../../../config/connect.php";



//terima data dari halaman form add
$kdjoin = $_POST['kdjoin'];
$noruas = $_POST['n_ruas'];
$id = $_POST['id'];
$namajalan = $_POST['namajalan'];
$statusjalan = $_POST['statusjalan'];

$P_RUAS = $_POST['P_RUAS'];
$P_SURV = $_POST['P_SURV'];
$L_JALAN = $_POST['L_JALAN'];
$LB_BAHU = $_POST['LB_BAHU'];
$P_ASPAL_KM = $_POST['P_ASPAL_KM'];
$tipe_permu = $_POST['Tipe_Permu'];
$Kondisi_persen = $_POST['Kondisi_persen'];
$P_RIGID = $_POST['P_RIGID'];
$P_KON_BAIK = $_POST['P_KON_BAIK'];
$P_KON_SED = $_POST['P_KON_SED'];
$P_KON_RR = $_POST['P_KON_RR'];
$P_KON_RB = $_POST['P_KON_RB'];

$lhr = $_POST['Lhr'];
$akses_ke_j = $_POST['Akses_Ke_J'];
$keterangan = $_POST['Keterangan'];
$tahun = $_POST['Tahun'];
$xawal = $_POST['Xawal'];
$xakhir = $_POST['xakhir'];
$yawal = $_POST['Yawal'];
$yakhir = $_POST['yakhir'];
// $kondisijalan = $_POST['kd_jalan'];
$kondisijalan="";
if ($P_KON_BAIK!="") {
    $kondisijalan=$P_KON_BAIK;
}
elseif ($P_KON_SED!="") {
    $kondisijalan=$P_KON_SED;
}
elseif ($P_KON_RR!="") {
    $kondisijalan=$P_KON_RR;
}
elseif ($P_KON_RB!="") {
    $kondisijalan=$P_KON_RB;
}

$namafile = $_POST['fileToUploadOld'];
if ($_FILES["fileToUpload"]["name"]!=NULL) {
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
}
$foto1 = $_POST['foto1Old'];
if ($_FILES["foto1"]["name"]!=NULL) {
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
}

$foto2 = $_POST['foto2Old'];
if ($_FILES["foto2"]["name"]!=NULL) {
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
}

$fotoSHP = $_POST['fotoSHPOld'];
if ($_FILES["fotoSHP"]["name"]!=NULL) {
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
}
// $namafile = basename($_FILES["fileToUpload"]["name"]);
// $foto1 = basename($_FILES["foto1"]["name"]);
// $foto2 = basename($_FILES["foto2"]["name"]);
// $fotoSHP = basename($_FILES["fotoSHP"]["name"]);
// echo $namafile.'<br>';
// echo $foto1.'<br>';
// echo $foto2.'<br>';

//simpan data ke database
$sql="UPDATE `shp` SET 
       Nama_Jalan='$namajalan', Status_Jal='$statusjalan', P_RUAS_KM='$P_RUAS',
        P_SURV='$P_SURV_KM', L_JALAN_M='$L_JALAN', LB_BAHU='$LB_BAHU',P_ASPAL_KM='$P_ASPAL_KM', 
        KONDISI_PE='$Kondisi_persen', P_RIGID='$P_RIGID', P_KON_BAIK='$P_KON_BAIK', 
        P_KON_SED='$P_KON_SED', P_KON_RR='$P_KON_RR', P_KON_RB='$P_KON_RB', 
        TIPE_PERM='$tipe_permu',LHR='$lhr', akses_ke_j='$akses_ke_j', 
        keterangan='$keterangan', tahun='$tahun', x_awal='$xawal', 
        x_akhir='$xakhir', y_awal='$yawal', y_akhir='$yakhir', 
        NO_Ruas='$noruas', kd_join='$kd_join',
        file='$namafile',foto1='$foto1', foto2='$foto2', fotoSHP='$fotoSHP'
        WHERE `shp`.`id` = $id;";
        // echo $sql; exit();

$query=mysqli_query($db,$sql);

if($query)
{
    $_SESSION['msg']='<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Data Berhasil diupdate
                    </div>';
                    // exit();
}
else{
    $_SESSION['msg']='<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Data Gagal diupdate.'.mysqli_error($db).'
                    </div>';
}
echo "<script>location.href='../../../aplikasi.php?p=jalan';</script>";

?>