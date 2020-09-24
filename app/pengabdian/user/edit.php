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
                            <td width="18%">FID Jembatan</td>
                        <td>:</td>
                        <td><input type="text" name="fid_jembat" value="<?=$value['fid_jembat']?>" class="form-control" ></td>
          				</tr>
               		    <tr align="left" valign="top" >
                            <td width="18%">Nama Jembatan</td>
                        <td>:</td>
                        <td><input type="text" name="nm_jbtn" class="form-control" value="<?=$value['nm_jbtn']?>"></td>
          				</tr>              
                        <tr align="left" valign="top" >
                            <td>No Jembatan</td>
                        <td>:</td>
                        <td><input type="text" name="no_jmbtn" class="form-control" value="<?=$value['no_jmbtn']?>"></td>
          				</tr>
                  <tr align="left" valign="top" >
                            <td>Sungai</td>
                        <td>:</td>
                        <td><input type="text" name="sungai" class="form-control" value="<?=$value['sungai']?>"></td>
                  </tr>
                  <tr align="left" valign="top" >
                  <td>Kecamatan</td>
                        
                        <td>:</td>
                        <td><input type="text" name="kecamatan" class="form-control" value="<?=$value['kecamatan']?>"></td>
                  </tr>
                  <tr align="left" valign="top" >
                  <td>Nama jalan</td>
                        
                        <td>:</td>
                        <td><input type="text" name="nama_jalan" class="form-control" value="<?=$value['nama_jalan']?>"></td>
                  </tr>
                  <tr align="left" valign="top" >
                        <td>Panjang</td>
                        <td>:</td>
                        <td><input type="text" name="panjang_m" class="form-control" value="<?=$value['panjang_m']?>"></td>
                  </tr>
                  <tr align="left" valign="top" >
                        <td>Lebar</td>
                        <td>:</td>
                        <td><input type="text" name="lebar_m" class="form-control" value="<?=$value['lebar_m']?>"></td>
                  </tr>
                  <tr align="left" valign="top" >
                            <td>J Bentang</td>
                        <td>:</td>
                        <td><input type="text" name="j_bentang" class="form-control" value="<?=$value['j_bentang']?>"></td>
                  </tr>
                  <tr align="left" valign="top" >
                            <td>B Atas</td>
                        <td>:</td>
                        <td><input type="text" name="b_atas" class="form-control" value="<?=$value['b_atas']?>"></td>
                  </tr>
                  <tr align="left" valign="top" >
                            <td>BA Kondisi</td>
                        <td>:</td>
                        <td><input type="text" name="ba_kondisi" class="form-control" value="<?=$value['ba_kondisi']?>"></td>
                  </tr>
          				<tr align="left" valign="top" >
                                  <td>B Bawah</td>
                        <td>:</td>
                        <td><input type="text" name="b_bawah" class="form-control" value="<?=$value['b_bawah']?>"></td>
          				</tr>
                        <tr align="left" valign="top" >
                        <td>BB Kondisi</td>
                        <td>:</td>
                        <td><input type="text" name="bb_kondisi" class="form-control" value="<?=$value['bb_kondisi']?>"></td>
          				</tr><tr align="left" valign="top" >
                   <tr align="left" valign="top" >
                            <td>fondasi</td>
                        <td>:</td>
                        <td><input type="text" name="fondasi" class="form-control" value="<?=$value['fondasi']?>"></td>
          				</tr>
                  <tr align="left" valign="top" >
                        <td>f_kondisi</td>
                        <td>:</td>
                        <td><input type="text" name="f_kondisi" class="form-control" value="<?=$value['f_kondisi']?>"></td>
                  </tr>
                  <tr align="left" valign="top" >
                        <td>koor_x</td>
                        <td>:</td>
                        <td><input type="text" name="koor_x" class="form-control" value="<?=$value['koor_x']?>"></td>
                  </tr><tr align="left" valign="top" >
                        <td>koor_y</td>
                        <td>:</td>
                        <td><input type="text" name="koor_y" class="form-control" value="<?=$value['koor_y']?>"></td>
                  </tr>
                  <tr align="left" valign="top" >
                        <td>Keterangan</td>
                        <td>:</td>
                        <td><input type="text" name="keterangan" value="<?=$value['keterangan']?>" class="form-control" ></td>
                  </tr>
                  <tr align="left" valign="top" >
                  <td>tpe_lantai</td>
                        
                        <td>:</td>
                        <td><input type="text" name="tpe_lantai" class="form-control" value="<?=$value['tpe_lantai']?>"></td>
                  </tr>
                  <tr align="left" valign="top" >
                  <td>l_kondisi</td>
                        
                        <td>:</td>
                        <td><input type="text" name="l_kondisi" class="form-control" value="<?=$value['l_kondisi']?>"></td>
                  </tr>
                  <tr align="left" valign="top" >
                  <td>thn_pembua</td>
                        <td>:</td>
                        <td><input type="text" name="thn_pembua" class="form-control" value="<?=$value['thn_pembua']?>"></td>
                  <tr align="left" valign="top" >
                  <td>thn_penang</td>
                        <td>:</td>
                        <td><input type="text" name="thn_penang" class="form-control" value="<?=$value['thn_penang']?>"></td>
                  </tr>
                  
                    <tr align="left" valign="top" >
                        <td>File</td>
                        <td>:</td>
    				            <td>
                                <?=$value['file'];?><br>
                                <input type="hidden" value="<?=$value['file'];?>" name="fileToUploadOld">
                                <input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-warning pull-LEFT">
                                </td> 
                        </tr>
                        </tr>

                        <tr align="left" valign="top" >
                        <td>Foto 1</td>
                        <td>:</td>
                        <td>
                        <br>
                        <img style="width: 250px;height: auto;" src="app/pengabdian/jembatan/foto/<?=$value['foto'];?>" class="img-responsive" alt="Image"><br>
                                <input type="hidden" value="<?=$value['foto'];?>" name="foto1Old">
                        <input type="file" name="foto1" id="foto1" class="btn btn-warning pull-LEFT"></td> 
                        </tr>
                        
                        <tr align="left" valign="top" >
                        <td>Foto 2</td>
                        <td>:</td>
                        <td>
                        <br>
                        <img style="width: 250px;height: auto;" src="app/pengabdian/jembatan/foto/<?=$value['foto2'];?>" class="img-responsive" alt="Image"><br>
                                <input type="hidden" value="<?=$value['foto2'];?>" name="foto2Old">
                        <input type="file" name="foto2" id="foto1" class="btn btn-warning pull-LEFT"></td> 
                        </tr>

                        <tr align="left" valign="top" >
                        <td>Foto 3</td>
                        <td>:</td>
                        <td>
                        <br>
                        <img style="width: 250px;height: auto;" src="app/pengabdian/jembatan/foto/<?=$value['foto3'];?>" class="img-responsive" alt="Image"><br>
                                <input type="hidden" value="<?=$value['foto3'];?>" name="foto3Old">
                        <input type="file" name="foto3" id="foto3" class="btn btn-warning pull-LEFT"></td> 
                        </tr>

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