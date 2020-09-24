<?php
include "../../../config/connect.php";

if ($_POST['simpan']=='Simpan') {
      $id = $_POST['id'];
      $judul = $_POST['judul'];
      $tgl = date('Y-m-d',strtotime($_POST['tgl']));
      $pukul = $_POST['pukul'];
      $tempat = $_POST['tempat'];
      $status = $_POST['status'];
      $ket = $_POST['ket'];
      
      //simpan data ke database
      $sql="insert into agenda  SET 
              judul='$judul', tgl='$tgl', pukul='$pukul', 
              tempat='$tempat', status='$status', ket='$ket' 
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
      echo "<script>location.href='?p=agenda';</script>";
}
?>


<h4>Tambah Data agenda</h4>
<hr>
  <form method="post" class="form-horizontal" action="" enctype="multipart/form-data">
      <input type="hidden" name="id" class="form-control" >
    		<table class="table table-bordered">
                <tr align="left" valign="top" >
                            <td width="18%">Judul</td>
                        <td>:</td>
                        <td><input type="text" name="judul" class="form-control" ></td>
          				</tr>    
               		    <tr align="left" valign="top" >
                            <td width="18%">Tanggal</td>
                        <td>:</td>
                        <td><input type="date" name="tgl" class="form-control" ></td>
          				</tr>              
                        <tr align="left" valign="top" >
                            <td>Pukul</td>
                        <td>:</td>
                        <td><input type="text" name="pukul" class="form-control" ></td>
          				</tr>
                  <tr align="left" valign="top" >
                            <td>Tempat</td>
                        <td>:</td>
                        <td><input type="text" name="tempat" class="form-control" ></td>
                  </tr>
                  <tr align="left" valign="top" >
                  <td>Status</td>
                        
                        <td>:</td>
                        <td>
                        <input type="radio" name="status" value="Publish" class="form-control" >Publish &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="status" value="UnPublish" class="form-control" >UnPublish
                        </td>
                  </tr>
                  <tr align="left" valign="top" >
                  <td>Keterangan</td>
                        
                        <td>:</td>
                        <td><input type="text" name="ket" class="form-control" ></td>
                  </tr>
                  <tr align="left" valign="top">
                        <td></td>
                        <td></td>
                        <td>
                        <input type="submit" class="btn btn-primary" value="Simpan" name="simpan" >
                              <a href="aplikasi.php?p=agenda" class="btn btn-warning">Batal </a>
                        </td>
                  </tr>
                  
           </table>
    </form>