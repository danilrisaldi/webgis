<?php
session_start();
?>
<?php 

include "../../../config/connect.php";

//terima data dari halaman form edit
$id = $_POST['id'];
$jenis = $_POST['jenis'];
$panjang = $_POST['panjang'];
$lebar = $_POST['lebar'];
$keterangan = $_POST['keterangan'];

$msg = array();

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

$foto3 = $_POST['fotoSHPOld'];
if ($_FILES["foto3"]["name"]!=NULL) {
    $target_dir = "file/";
    $target_file = $target_dir . basename($_FILES["foto3"]["name"]);
    $target_file;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $foto3 = basename($_FILES["foto3"]["name"]);

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

//simpan data ke database
$sql="UPDATE `jembatan` SET 
         
        jenis='$jenis',panjang='$panjang', lebar='$lebar', keterangan='$keterangan', 
        foto='$foto1', foto2='$foto2', foto3='$foto3', file='$namafile'
        WHERE id='$id';";
        // echo $sql; exit();

$query=mysqli_query($db,$sql);

if($query)
{
    $msg[]='<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Data Berhasil diupdate
                    </div>';
}
else{
    $msg[]='<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Data Gagal diupdate.'.mysqli_error($db).'
                    </div>';
}
$_SESSION['msg']=$msg;
echo "<script>location.href='../../../aplikasi.php?p=jembatan';</script>";


?>