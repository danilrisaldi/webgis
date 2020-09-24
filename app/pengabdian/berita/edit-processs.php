<?php
session_start();
?>
<?php 

include "../../../config/connect.php";

//terima data dari halaman form edit
$fid_jembat = $_POST['fid_jembat'];
$id = $_POST['id'];
$nm_jbtn = $_POST['nm_jbtn'];
$sungai = $_POST['sungai'];
$kecamatan = $_POST['kecamatan'];
$nama_jalan = $_POST['nama_jalan'];

$panjang_m = $_POST['panjang_m'];
$lebar_m = $_POST['lebar_m'];
$j_bentang = $_POST['j_bentang'];
$b_atas = $_POST['b_atas'];
$ba_kondisi = $_POST['ba_kondisi'];
$b_bawah = $_POST['b_bawah'];

$bb_kondisi = $_POST['bb_kondisi'];
$fondasi = $_POST['fondasi'];
$f_kondisi = $_POST['f_kondisi'];
$koor_x = $_POST['koor_x'];
$koor_y = $_POST['koor_y'];
$keterangan = $_POST['keterangan'];

$tpe_lantai = $_POST['tpe_lantai'];
$l_kondisi = $_POST['l_kondisi'];
$thn_pembua = $_POST['thn_pembua'];
$thn_penang = $_POST['thn_penang'];
$no_jmbtn = $_POST['no_jmbtn'];
$msg = array();

$namafile = $_POST['fileToUploadOld'];
if ($_FILES["fileToUpload"]["name"]!=NULL) 
{
    // $file_type	= array('jpg','jpeg','png','gif','bmp', 'JPG','JPEG','PNG','GIF','BMP');
    $file_type	= array('shp');
    $max_size	= 500000;

    $lokasiFile = $_FILES['fileToUpload']['tmp_name'];
    $namaFile = $_FILES['fileToUpload']['name'];
    $sizeFile = $_FILES['fileToUpload']['size'];
    $explode	= explode('.',$namaFile);
    $tipeFile	= $explode[count($explode)-1];

    if(!in_array($tipeFile,$file_type)){
        $msg[]='<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Format file anda '.$tipeFile.' tidak diterima
                    </div>';
        goto errorUpload;
    }
    if($sizeFile > $max_size){
        $msg[]='<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Ukuran foto anda melebihi batas
                    </div>';
        goto errorUpload;
    }
    $namaFile=$id.'_'.uniqid().'.'.$tipeFile;
    $lokasBaruFile = 'file/'.$namaFile;
    if (move_uploaded_file($lokasiFile, $lokasBaruFile)) {
        $msg[]='<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        file '. $namaFile. ' Berhasil diupload.
                    </div>';
        unlink('file/'.$namafile);
        $namafile=$namaFile;
    } else {
        $msg[]='<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        file '. $namaFile. ' Gagal diupload.
                    </div>';
    }
}
errorUpload:


$foto1 = $_POST['foto1Old'];
if ($_FILES["foto1"]["name"]!=NULL) 
{
     $file_type	= array('jpg','jpeg','png','gif','bmp', 'JPG','JPEG','PNG','GIF','BMP');
    //  $file_type	= array('shp');
     $max_size	= 500000;
 
     $lokasiFile = $_FILES['foto1']['tmp_name'];
     $namaFile = $_FILES['foto1']['name'];
     $sizeFile = $_FILES['foto1']['size'];
     $explode	= explode('.',$namaFile);
     $tipeFile	= $explode[count($explode)-1];
 
     if(!in_array($tipeFile,$file_type)){
         $msg[]='<div class="alert alert-danger">
                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                         Format file anda '.$tipeFile.' tidak diterima
                     </div>';
         goto errorUpload2;
     }
     if($sizeFile > $max_size){
         $msg[]='<div class="alert alert-danger">
                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                         Ukuran foto anda melebihi batas
                     </div>';
         goto errorUpload2;
     }
 
    $namaFile=$id.'_'.uniqid().'.'.$tipeFile;
    $lokasBaruFile = 'foto/'.$namaFile;
     if (move_uploaded_file($lokasiFile, $lokasBaruFile)) {
         $msg[]='<div class="alert alert-success">
                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                         file '. $namaFile. ' Berhasil diupload.
                     </div>';
        unlink('foto/'.$foto1);
        $foto1=$namaFile;
     } else {
         $msg[]='<div class="alert alert-danger">
                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                         file '. $namaFile. ' Gagal diupload.
                     </div>';
     }
}
errorUpload2:

$foto2 = $_POST['foto2Old'];
if ($_FILES["foto2"]["name"]!=NULL) 
{
    $file_type	= array('jpg','jpeg','png','gif','bmp', 'JPG','JPEG','PNG','GIF','BMP');
   //  $file_type	= array('shp');
    $max_size	= 500000;

    $lokasiFile = $_FILES['foto2']['tmp_name'];
    $namaFile = $_FILES['foto2']['name'];
    $sizeFile = $_FILES['foto2']['size'];
    $explode	= explode('.',$namaFile);
    $tipeFile	= $explode[count($explode)-1];

    if(!in_array($tipeFile,$file_type)){
        $msg[]='<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Format file anda '.$tipeFile.' tidak diterima
                    </div>';
        goto errorUpload3;
    }
    if($sizeFile > $max_size){
        $msg[]='<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Ukuran foto anda melebihi batas
                    </div>';
        goto errorUpload3;
    }
    $namaFile=$id.'_'.uniqid().'.'.$tipeFile;
    $lokasBaruFile = 'foto/'.$namaFile;
    if (move_uploaded_file($lokasiFile, $lokasBaruFile)) {
        $msg[]='<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        file '. $namaFile. ' Berhasil diupload.
                    </div>';
        unlink('foto/'.$foto2);
        $foto2=$namaFile;
    } else {
        $msg[]='<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        file '. $namaFile. ' Gagal diupload.
                    </div>';
    }
}
errorUpload3:

$foto3 = $_POST['foto3Old'];
if ($_FILES["foto3"]["name"]!=NULL) 
{
    $file_type	= array('jpg','jpeg','png','gif','bmp', 'JPG','JPEG','PNG','GIF','BMP');
   //  $file_type	= array('shp');
    $max_size	= 500000;

    $lokasiFile = $_FILES['foto3']['tmp_name'];
    $namaFile = $_FILES['foto3']['name'];
    $sizeFile = $_FILES['foto3']['size'];
    $explode	= explode('.',$namaFile);
    $tipeFile	= $explode[count($explode)-1];

    if(!in_array($tipeFile,$file_type)){
        $msg[]='<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Format file anda '.$tipeFile.' tidak diterima
                    </div>';
        goto errorUpload4;
    }
    if($sizeFile > $max_size){
        $msg[]='<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Ukuran foto anda melebihi batas
                    </div>';
        goto errorUpload4;
    }

    $namaFile=$id.'_'.uniqid().'.'.$tipeFile;
    $lokasBaruFile = 'foto/'.$namaFile;
    if (move_uploaded_file($lokasiFile, $lokasBaruFile)) {
        $msg[]='<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        file '. $namaFile. ' Berhasil diupload.
                    </div>';
        unlink('foto/'.$foto3);
        $foto3=$namaFile;
    } else {
        $msg[]='<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        file '. $namaFile. ' Gagal diupload.
                    </div>';
    }
}
errorUpload4:

//simpan data ke database
$sql="UPDATE `jembatan` SET 
        fid_jembat='$fid_jembat', nm_jbtn='$nm_jbtn',
        sungai='$sungai', kecamatan='$kecamatan', nama_jalan='$nama_jalan', 
        panjang_m='$panjang_m', lebar_m='$lebar_m', j_bentang='$j_bentang', 
        b_atas='$b_atas', ba_kondisi='$ba_kondisi', b_bawah='$b_bawah', 
        bb_kondisi='$bb_kondisi', fondasi='$fondasi', f_kondisi='$f_kondisi', 
        koor_x='$koor_x', koor_y='$koor_y', keterangan='$keterangan', 
        foto='$foto1', foto2='$foto2', foto3='$foto3',tpe_lantai='$tpe_lantai', l_kondisi='$l_kondisi', 
        thn_pembua='$thn_pembua', thn_penang='$thn_penang', no_jmbtn='$no_jmbtn', file='$namafile'
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