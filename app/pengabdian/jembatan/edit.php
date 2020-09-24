<?php 
include "../../../config/connect.php";
$id=$_GET['id'];
$sql="select * from jembatan where id=$id";
$qkkn=mysqli_query($db,$sql);
while($value = mysqli_fetch_array($qkkn)){
// echo '<pre>'; print_r($value); echo '</pre>';
?>
<h4>Edit Data jembatan</h4>
<hr>
  <form method="post" class="form-horizontal" action="app/pengabdian/jembatan/edit-processs.php" enctype="multipart/form-data">
      
      <input type="hidden" name="id" id="inputid" class="form-control" value="<?=$_GET['id']?>">
      
    		<table class="table table-bordered">
                <tr align="left" valign="top" >
                            <td width="18%">Id</td>
                        <td>:</td>
                        <td><input type="text" readonly name="id" value="<?=$value['id']?>" class="form-control" ></td>
          				</tr>
               		    <tr align="left" valign="top" >
                            <td width="18%">Jenis</td>
                        <td>:</td>
                        <td><input type="text" readonly name="jenis" class="form-control" value="<?=$value['jenis']?>"></td>
          				</tr>              
                        <tr align="left" valign="top" >
                            <td>Panjang</td>
                        <td>:</td>
                        <td><input type="text" readonly name="panjang" class="form-control" value="<?=$value['panjang']?>"></td>
          				</tr>
                  <tr align="left" valign="top" >
                            <td>lebar</td>
                        <td>:</td>
                        <td><input type="text" readonly name="lebar" class="form-control" value="<?=$value['lebar']?>"></td>
                  </tr>
                  <td>Keterangan</td>
                        <td>:</td>
                        <td><input type="text" readonly name="keterangan" class="form-control" value="<?=$value['keterangan']?>"></td>
                  </tr>
                  
                       <tr align="left" valign="top" >
                    <th>File </th>
                        <th>:</th>
                        <th>
                                <?=$value['file'];?><br>
                                <input type="hidden" value="<?=$value['file'];?>" name="fileToUploadOld">
                                <input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-warning pull-LEFT">
                                </th> 
                        </tr>
                        </tr>
                        <tr align="left" valign="top" >
                        <th>Foto 1</th>
                        <th>:</th>
                        <th>
                        <br>
                        <img style="width: 250px;height: auto;" src="app/pengabdian/jembatan/file/<?=$value['foto'];?>" class="img-responsive" alt="Image"><br>
                                <input type="hidden" value="<?=$value['foto'];?>" name="foto1Old">
                        <input type="file" name="foto1" id="foto1" class="btn btn-warning pull-LEFT"></th> 
                        </tr>
                        </tr>
                        <tr align="left" valign="top" >
                        <th>Foto 2</th>
                        <th>:</th>
                        <th>
                        <br>
                        <img style="width: 250px;height: auto;" src="app/pengabdian/jembatan/file/<?=$value['foto2'];?>" class="img-responsive" alt="Image"><br>
                                <input type="hidden" value="<?=$value['foto2'];?>" name="foto2Old">
                        <input type="file" name="foto2" id="foto2" class="btn btn-warning pull-LEFT"></th> 
                        </tr>
                        <tr align="left" valign="top" >
                        <th>Foto 3</th>
                        <th>:</th>
                        <th>
                        <br>
                        <img style="width: 250px;height: auto;" src="app/pengabdian/jembatan/file/<?=$value['foto3'];?>" class="img-responsive" alt="Image"><br>
                                <input type="hidden" value="<?=$value['foto3'];?>" name="fotoSHPOld">
                        <input type="file" name="foto3" id="foto3" class="btn btn-warning pull-LEFT"></th> 
                        </tr>
            
                        <tr align="left" valign="top">
                            <td></td>
                            <td></td>
                            <td><input type="submit" class="btn btn-primary" name="simpanEdit" value="Simpan">
                                    <a href="aplikasi.php?p=jembatan" class="btn btn-warning">Batal </a>
                            </td>
                        </tr>
                        
           </table>
    </form>
<?php
}
?>