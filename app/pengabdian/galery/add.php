<?php
include "../../../config/connect.php";

if ($_POST['simpan']=='Simpan') {
      $foto="";
      $dirLok='app/pengabdian/galery/foto/';

      if ($_FILES["foto"]["name"]!=NULL) {
            $file_type	= array('jpg','jpeg','png','gif','bmp', 'JPG','JPEG','PNG','GIF','BMP');
           //  $file_type	= array('shp');
            $max_size	= 10000000;
        
            $lokasiFile = $_FILES['foto']['tmp_name'];
            $namaFile = $_FILES['foto']['name'];
            $sizeFile = $_FILES['foto']['size'];
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
            $namaFile=date('Ymd').'_'.uniqid().'_'.$namaFile;
            $lokasBaruFile = $dirLok.$namaFile;
            if (move_uploaded_file($lokasiFile, $lokasBaruFile)) {
                $msg[]='<div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                file '. $namaFile. ' Berhasil diupload.
                            </div>';
               $foto=$namaFile;
            } else {
                $msg[]='<div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                file '. $namaFile. ' Gagal diupload.
                            </div>';
            }
       }
       errorUpload2:

      $kategori = $_POST['kategori'];
      $judul = $_POST['judul'];
      $foto = $dirLok.$foto;
      $tgl = date('Y-m-d',strtotime($_POST['tgl']));
      $status = $_POST['status'];
      $ket = $_POST['ket'];
      
      //simpan data ke database
      $sql="insert into galery  SET 
              kategori='$kategori', judul='$judul', foto='$foto', 
              tgl='$tgl', status='$status', ket='$ket' 
              ";
      // echo $sql; exit();
      $query=mysqli_query($db,$sql);
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
      $_SESSION['msg']=$msg;
      echo "<script>location.href='?p=galery';</script>";
}
?>


<h4>Tambah Data Galery</h4>
<hr>
  <form method="post" class="form-horizontal" action="" enctype="multipart/form-data">
      <input type="hidden" name="id" class="form-control" >
    		<table class="table table-bordered">
                <tr align="left" valign="top" >
                        <td width="18%">Kategori</td>
                  <td>:</td>
                  <td>
                    <select required="required" name="kategori" class="form-control" >
                      <option value="Umum">Umum</option>
                      <option value="Pimpinan">Pimpinan</option>
                      <option value="Jalan">Jalan</option>
                    </select></td>
                  </tr>  
                  <tr align="left" valign="top" >
                  <td width="18%">Judul</td>
                  <td>:</td>
                  <td><input type="text" required="required" name="judul" class="form-control" ></td>
                        </tr>
                        <tr align="left" valign="top" >
                        <td>Foto</td>
                        <td>:</td>
                        <td>
                        <br>
                        <input required="required" type="file" name="foto" class="btn btn-warning pull-LEFT"></td> 
                        </tr>
                        <tr align="left" valign="top" >
                        <td width="18%">Tanggal</td>
                  <td>:</td>
                  <td><input type="date" required="required" name="tgl" class="form-control" ></td>
                        </tr>              
                  <tr align="left" valign="top" >
                  <td>Status</td>
                        
                        <td>:</td>
                        <td>
                        <input type="radio" required="required" name="status" value="Publish" class="form-control" >Publish &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="status" value="UnPublish" class="form-control" >UnPublish
                        </td>
                  </tr>
                  <tr align="left" valign="top" >
                  <td>Keterangan</td>
                        
                        <td>:</td>
                        <td><input required="required" type="text" name="ket" class="form-control" ></td>
                  </tr>
                  <tr align="left" valign="top">
                        <td></td>
                        <td></td>
                        <td>
                        <input type="submit" class="btn btn-primary" value="Simpan" name="simpan" >
                              <a href="aplikasi.php?p=galery" class="btn btn-warning">Batal </a>
                        </td>
                  </tr>
                  
           </table>
    </form>