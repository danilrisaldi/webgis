
<h4>Tambah Data jembatan</h4>
<hr>
  <form method="post" class="form-horizontal" action="app/pengabdian/jembatan/add-process.php" enctype="multipart/form-data">
      
      <input type="hidden" name="fid_jembat" id="inputid" class="form-control" >
      <input type="hidden" name="id" id="inputid" class="form-control" >
      
    		<table class="table table-bordered">
                <tr align="left" valign="top" >
                            <td width="18%">FID Jembatan</td>
                        <td>:</td>
                        <td><input type="text" name="fid_jembat" class="form-control" ></td>
          				</tr>    
               		    <tr align="left" valign="top" >
                            <td width="18%">Nama Jembatan</td>
                        <td>:</td>
                        <td><input type="text" name="nm_jbtn" class="form-control" ></td>
          				</tr>              
                        <tr align="left" valign="top" >
                            <td>No Jembatan</td>
                        <td>:</td>
                        <td><input type="text" name="no_jmbtn" class="form-control" ></td>
          				</tr>
                  <tr align="left" valign="top" >
                            <td>Sungai</td>
                        <td>:</td>
                        <td><input type="text" name="sungai" class="form-control" ></td>
                  </tr>
                  <tr align="left" valign="top" >
                  <td>Kecamatan</td>
                        
                        <td>:</td>
                        <td><input type="text" name="kecamatan" class="form-control" ></td>
                  </tr>
                  <tr align="left" valign="top" >
                  <td>Nama jalan</td>
                        
                        <td>:</td>
                        <td><input type="text" name="nama_jalan" class="form-control" ></td>
                  </tr>
                  <tr align="left" valign="top" >
                        <td>Panjang</td>
                        <td>:</td>
                        <td><input type="text" name="panjang_m" class="form-control" ></td>
                  </tr>
                  <tr align="left" valign="top" >
                        <td>Lebar</td>
                        <td>:</td>
                        <td><input type="text" name="lebar_m" class="form-control" ></td>
                  </tr>
                  <tr align="left" valign="top" >
                            <td>J Bentang</td>
                        <td>:</td>
                        <td><input type="text" name="j_bentang" class="form-control" ></td>
                  </tr>
                  <tr align="left" valign="top" >
                            <td>B Atas</td>
                        <td>:</td>
                        <td><input type="text" name="b_atas" class="form-control" ></td>
                  </tr>
                  <tr align="left" valign="top" >
                            <td>BA Kondisi</td>
                        <td>:</td>
                        <td><input type="text" name="ba_kondisi" class="form-control" ></td>
                  </tr>
          				<tr align="left" valign="top" >
                                  <td>B Bawah</td>
                        <td>:</td>
                        <td><input type="text" name="b_bawah" class="form-control" ></td>
          				</tr>
                        <tr align="left" valign="top" >
                        <td>BB Kondisi</td>
                        <td>:</td>
                        <td><input type="text" name="bb_kondisi" class="form-control" ></td>
          				</tr><tr align="left" valign="top" >
                   <tr align="left" valign="top" >
                            <td>fondasi</td>
                        <td>:</td>
                        <td><input type="text" name="fondasi" class="form-control" ></td>
          				</tr>
                  <tr align="left" valign="top" >
                        <td>f_kondisi</td>
                        <td>:</td>
                        <td><input type="text" name="f_kondisi" class="form-control" ></td>
                  </tr>
                  <tr align="left" valign="top" >
                        <td>koor_x</td>
                        <td>:</td>
                        <td><input type="text" name="koor_x" class="form-control" ></td>
                  </tr>
                  <tr align="left" valign="top" >
                        <td>koor_y</td>
                        <td>:</td>
                        <td><input type="text" name="koor_y" class="form-control" ></td>
                  </tr>
                  <tr align="left" valign="top" >
                        <td>Keterangan</td>
                        <td>:</td>
                        <td><input type="text" name="keterangan" class="form-control" ></td>
                  </tr>
                  <tr align="left" valign="top" >
                  <td>tpe_lantai</td>
                        
                        <td>:</td>
                        <td><input type="text" name="tpe_lantai" class="form-control" ></td>
                  </tr>
                  <tr align="left" valign="top" >
                  <td>l_kondisi</td>
                        
                        <td>:</td>
                        <td><input type="text" name="l_kondisi" class="form-control" ></td>
                  </tr>
                  <tr align="left" valign="top" >
                  <td>thn_pembua</td>
                        <td>:</td>
                        <td><input type="text" name="thn_pembua" class="form-control" ></td>
                  <tr align="left" valign="top" >
                  <td>thn_penang</td>
                        <td>:</td>
                        <td><input type="text" name="thn_penang" class="form-control" ></td>
                  </tr>
                  
                    <tr align="left" valign="top" >
                        <td>File</td>
                        <td>:</td>
    				            <td>
                                <input type="hidden" >
                                <input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-warning pull-LEFT">
                                </td> 
                        </tr>
                        </tr>

                        <tr align="left" valign="top" >
                        <td>Foto 1</td>
                        <td>:</td>
                        <td>
                        <br>
                        <input type="file" name="foto1" id="foto1" class="btn btn-warning pull-LEFT"></td> 
                        </tr>

                        <tr align="left" valign="top" >
                        <td>Foto 2</td>
                        <td>:</td>
                        <td>
                        <br>
                        <input type="file" name="foto2" id="foto1" class="btn btn-warning pull-LEFT"></td> 
                        </tr>

                        <tr align="left" valign="top" >
                        <td>Foto 3</td>
                        <td>:</td>
                        <td>
                        <br>
                        <input type="file" name="foto3" id="foto1" class="btn btn-warning pull-LEFT"></td> 
                        </tr>

                        </tr>
                        <tr align="left" valign="top">
                            <td></td>
                            <td></td>
                            <td>
                            <input type="submit" class="btn btn-primary" value="Simpan" name="simpan" >
                                    <a href="aplikasi.php?p=jembatan" class="btn btn-warning">Batal </a>
                            </td>
                        </tr>
                        
           </table>
    </form>