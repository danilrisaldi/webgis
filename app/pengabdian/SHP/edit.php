<?php 
include "../../../config/connect.php";

$id=$_GET['id'];
$sql="select * from shp where id=$id";
$qkkn=mysqli_query($db,$sql);
while($value = mysqli_fetch_array($qkkn)){
// echo '<pre>'; print_r($value); echo '</pre>';
?>
<h4>Edit SHP</h4>
<hr>

  <form method="post" action="app/pengabdian/SHP/edit-processs.php" enctype="multipart/form-data">
      
      <input type="hidden" name="id" id="inputid" class="form-control" value="<?=$_GET['id']?>">
      
    		<table >
                  <tr align="left" valign="top" >
                        <th>No Ruas</th>
                        <th>:</th>
                        <th><input type="text" readonly name="n_ruas" class="input-xlarge" value="<?=$value['No_Ruas']?>"></th>
                  </tr>
               		    <tr align="left" valign="top" >
                        <th>Nama Jalan</th>
                        <th>:</th>
                        <th><input type="text" readonly name="namajalan" class="input-xlarge" value="<?=$value['Nama_Jalan']?>"></th>
          				</tr>              
                        <tr align="left" valign="top" >
                        <th>Status Jalan</th>
                        <th>:</th>
                        <th><input type="text" readonly name="statusjalan" class="input-xlarge" value="<?=$value['Status_Jal']?>"></th>
          				</tr>
                  <tr align="left" valign="top" >
                            <th>P_RUAS(KM)</th>
                        <th>:</th>
                        <th><input type="text" readonly name="P_RUAS" class="input-xlarge" value="<?=$value['P_RUAS_KM']?>"></th>
                  </tr>
                  <tr align="left" valign="top" >
                            <th>P_SURV(KM)</th>
                        <th>:</th>
                        <th><input type="text" readonly name="P_SURV" class="input-xlarge" value="<?=$value['P_SURV_KM']?>"></th>
                  </tr>
                  <tr align="left" valign="top" >
                            <th>L_JALAN(M)</th>
                        <th>:</th>
                        <th><input type="text" readonly name="L_JALAN" class="input-xlarge" value="<?=$value['L_JALAN_M']?>"></th>
                  </tr>
                  <tr align="left" valign="top" >
                        <th>LB_BAHU</th>
                        <th>:</th>
                        <th><input type="text" readonly name="LB_BAHU" class="input-xlarge" value="<?=$value['LB_BAHU']?>"></th>
                  </tr>
                  <tr align="left" valign="top" >
                            <th>P_ASPAL_KM</th>
                        <th>:</th>
                        <th><input type="text" readonly name="P_ASPAL_KM" class="input-xlarge" value="<?=$value['P_ASPAL_KM']?>"></th>
                  </tr>
                  <tr align="left" valign="top" >
                            <th>Tipe_Permu</th>
                        <th>:</th>
                        <th><input type="text" readonly name="Tipe_Permu" class="input-xlarge" value="<?=$value['TIPE_PERM']?>"></th>
                  </tr>
                  <tr align="left" valign="top" >
                            <th>Kondisi%</th>
                        <th>:</th>
                        <th><input type="text" readonly name="Kondisi_persen" class="input-xlarge" value="<?=$value['KONDISI_PE']?>"></th>
                  </tr>
          				<tr align="left" valign="top" >
                            <th>P_RIGID</th>
                        <th>:</th>
                        <th><input type="text" readonly name="P_RIGID" class="input-xlarge" value="<?=$value['P_RIGID']?>"></th>
          				</tr>
                   <tr align="left" valign="top" >
                   <th>P_KON_BAIK</th>
                        <th>:</th>
                        <th><input type="text" readonly name="P_KON_BAIK" class="input-xlarge" value="<?=$value['P_KON_BAIK']?>"></th>
          				</tr>
                  <tr align="left" valign="top" >
                            <th>P_KON_SED</th>
                        <th>:</th>
                        <th><input type="text" readonly name="P_KON_SED" class="input-xlarge" value="<?=$value['P_KON_SED']?>"></th>
                  </tr>
                  <tr align="left" valign="top" >
                  <th>P_KON_RR</th>
                        
                        <th>:</th>
                        <th><input type="text" readonly name="P_KON_RR" class="input-xlarge" value="<?=$value['P_KON_RR']?>"></th>
                  </tr>
                  <tr align="left" valign="top" >
                  <th>P_KON_RB</th>
                        <th>:</th>
                        <th><input type="text" readonly name="P_KON_RB" class="input-xlarge" value="<?=$value['P_KON_RB']?>"></th>
                  </tr>
                  <tr align="left" valign="top" >
                        <th>Lhr</th>
                        <th>:</th>
                        <th><input type="text" readonly name="Lhr" class="input-xlarge" value="<?=$value['LHR']?>"></th>
                  </tr>
                  <tr align="left" valign="top" >
                        <th>Akses_Ke_J</th>
                        <th>:</th>
                        <th><input type="text" readonly name="Akses_Ke_J" class="input-xlarge" value="<?=$value['akses_ke_j']?>"></th>
                  </tr>
                  <tr align="left" valign="top" >
                        <th>Keterangan</th>
                        <th>:</th>
                        <th><input type="text" readonly name="Keterangan" class="input-xlarge" value="<?=$value['keterangan']?>"></th>
                  </tr>
                  <tr align="left" valign="top" >
                        <th>Tahun</th>
                        <th>:</th>
                        <th><input type="text" readonly name="Tahun" class="input-xlarge" value="<?=$value['tahun']?>"></th>
                  <tr align="left" valign="top" >
                        <th>X Awal</th>
                        <th>:</th>
                        <th><input type="text" readonly name="XAwal" class="input-xlarge" value="<?=$value['x_awal']?>"></th>
                  </tr>
                  <tr align="left" valign="top" >
                        <th>X Akhir</th>
                        <th>:</th>
                        <th><input type="text" readonly name="xakhir" class="input-xlarge" value="<?=$value['x_akhir']?>"></th>
                  </tr>
                  <tr align="left" valign="top" >
                        <th>Y Awal</th>
                        <th>:</th>
                        <th><input type="text" readonly name="Yawal" class="input-xlarge" value="<?=$value['y_awal']?>"></th>
                  </tr>
                  <tr align="left" valign="top" >
                        <th>Y Akhir</th>
                        <th>:</th>
                        <th><input type="text" readonly name="yakhir" class="input-xlarge" value="<?=$value['y_akhir']?>"></th>
                  </tr>
                  <tr align="left" valign="top" >
                        <th>Kd Join</th>
                        <th>:</th>
                        <th><input type="text" readonly name="kdjoin" class="input-xlarge" value="<?=$value['kd_join']?>"></th>
                  </tr>
                 
                  <!-- <tr align="left" valign="top" >
                        <th>Kondisi Jalan</th>
                        <th>:</th>
                        <th><input type="text" readonly name="kd_jalan" class="input-xlarge" value="<?=$value['kd_jalan']?>"></th>
                  </tr> -->
                    <tr align="left" valign="top" >
                    <th>File SHP</th>
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
                        <img style="width: 250px;height: auto;" src="app/pengabdian/SHP/file/<?=$value['foto1'];?>" class="img-responsive" alt="Image"><br>
                                <input type="hidden" value="<?=$value['foto1'];?>" name="foto1Old">
                        <input type="file" name="foto1" id="foto1" class="btn btn-warning pull-LEFT"></th> 
                        </tr>
                        </tr>
                        <tr align="left" valign="top" >
                        <th>Foto 2</th>
                        <th>:</th>
                        <th>
                        <br>
                        <img style="width: 250px;height: auto;" src="app/pengabdian/SHP/file/<?=$value['foto2'];?>" class="img-responsive" alt="Image"><br>
                                <input type="hidden" value="<?=$value['foto2'];?>" name="foto2Old">
                        <input type="file" name="foto2" id="foto2" class="btn btn-warning pull-LEFT"></th> 
                        </tr>
                        <tr align="left" valign="top" >
                        <th>Foto SHP</th>
                        <th>:</th>
                        <th>
                        <br>
                        <img style="width: 250px;height: auto;" src="app/pengabdian/SHP/file/<?=$value['fotoSHP'];?>" class="img-responsive" alt="Image"><br>
                                <input type="hidden" value="<?=$value['fotoSHP'];?>" name="fotoSHPOld">
                        <input type="file" name="fotoSHP" id="fotoSHP" class="btn btn-warning pull-LEFT"></th> 
                        </tr>
                        <tr align="left" valign="top">
                            <th></th>
                            <th></th>
                            <th><input type="submit" class="btn btn-primary" name="simpanEdit" value="Simpan">
	                 	<a href="aplikasi.php?p=shp" class="btn btn-warning">Batal </a>
                            </th>
                        </tr>
                        
           </table>
    </form>
<?php
}
?>