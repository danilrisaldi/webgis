<script src="config/ckeditor/ckeditor.js"></script>
<?php
include "../../../config/connect.php";

if ($_POST['simpan']=='Simpan') {
      $foto="";
      $dirLok='app/pengabdian/berita/foto/';
      if ($_FILES["foto"]["name"]!=NULL) {
            $file_type  = array('jpg','jpeg','png','gif','bmp', 'JPG','JPEG','PNG','GIF','BMP');
           //  $file_type = array('shp');
            $max_size = 10000000;
        
            $lokasiFile = $_FILES['foto']['tmp_name'];
            $namaFile = $_FILES['foto']['name'];
            $sizeFile = $_FILES['foto']['size'];
            $explode  = explode('.',$namaFile);
            $tipeFile = $explode[count($explode)-1];
        
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
                                file '. $lokasBaruFile. ' Gagal diupload. '.$_FILES["foto"]["error"].'
                            </div>';
            }
       }
       errorUpload2:

      $judul = $_POST['judul'];
      $deskripsi = $_POST['deskripsi'];
      $isi = $_POST['isi'];
      $foto = $dirLok.$foto;
      $tgl = date('Y-m-d',strtotime($_POST['tgl'])).' '.date('H:i:s',strtotime($_POST['jam']));
      $status = $_POST['status'];
      
      //simpan data ke database
      $sql="insert into slide  SET 
              judul='$judul', deskripsi='$deskripsi', isi='$isi'
              ,img='$foto', tgl='$tgl', status='$status'
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
      echo "<script>location.href='?p=berita';</script>";
}
?>


<h4>Tambah Data Berita</h4>
<hr>
  <form method="post" class="form-horizontal" action="" enctype="multipart/form-data">
      <input type="hidden" name="id" class="form-control" >
        <table class="table table-bordered">
                  <tr align="left" valign="top" >
                  <td width="18%">Judul</td>
                  <td>:</td>
                  <td><input required="required" type="text" name="judul" class="form-control" ></td>
                        </tr>
                        <tr align="left" valign="top" >
                  <td width="18%">Deskripsi</td>
                  <td>:</td>
                  <td>
                    <textarea id="editor1" name="deskripsi" rows="10" cols="80" required="required">
                    </textarea>
                  </td>
                        </tr>
                        <tr align="left" valign="top" >
                  <td width="18%">Isi</td>
                  <td>:</td>
                  <td><textarea type="text" id="editor2" required="required" name="isi" class="form-control" ></textarea></td>
                        </tr>
                        <tr align="left" valign="top" >
                        <td>Foto</td>
                        <td>:</td>
                        <td>
                        <br>
                        <input type="file" required="required" name="foto" class="btn btn-warning pull-LEFT"></td> 
                        </tr>
                        <tr align="left" valign="top" >
                        <td width="18%">Tanggal</td>
                  <td>:</td>
                  <td><input type="date" required="required" name="tgl" class="form-control" ></td>
                        </tr>
                        <tr align="left" valign="top" >
                        <td width="18%">Jam</td>
                  <td>:</td>
                  <td><input type="time" required="required" name="jam" class="form-control" placeholder="00:00:00"></td>
                        </tr>
                        <tr align="left" valign="top" >
                  <td>Status</td>
                        
                        <td>:</td>
                        <td>
                        <input type="radio" name="status" required="required" value="Publish" class="form-control" >Publish &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="status" value="UnPublish" class="form-control" >UnPublish
                        </td>
                  </tr>            
                  <tr align="left" valign="top">
                        <td></td>
                        <td></td>
                        <td>
                        <input type="submit" class="btn btn-primary" value="Simpan" name="simpan" >
                              <a href="aplikasi.php?p=berita" class="btn btn-warning">Batal </a>
                        </td>
                  </tr>
                  
           </table>
    </form>
  <script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor2');
  })
</script>