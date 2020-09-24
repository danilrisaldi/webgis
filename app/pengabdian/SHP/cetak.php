<?php
// ini_set('display_errors', 1);
session_start();
include "../../../config/security.php";
include "../../../config/connect.php";
?>  
<!DOCTYPE html>
<html>
<head>
   <title>GIS PU Linggau</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/LOGO PU.jpg">
    <link rel="stylesheet" href="../../../css/bootstrap.css">
    
    <style type="text/css">
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font: 12pt "Tahoma";
        }
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .page {
            width: 210mm;
            min-height: 400mm;
            padding: 10mm;
            margin: 8mm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .subpage {
            padding: 0cm;
            height: 257mm;
            outline: 2cm transparent solid;
        }
        
        @page {
            size: A4;
            margin: 0;
        }

        @media print {
            html, body {
                width: 210mm;
                height: 297mm;        
            }
            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
            .hidden-print{
                display: none;
            }
        }

        h3, h4 {
            text-align: center;
            font-weight: bold;
        }

        table {
            font-size: 12px;
        }
        .table_bordered tr td{
            padding: 3px;
        }

    </style>
</head>

<!-- <body onload="window.print()"> -->
<body>

    <center>
        <div class="btn-group hidden-print" >
        <button class="btn btn-primary " style="text-transform: none;width: 300px; margin-top: 20px" type="button" onclick="history.back()"><i class="fa fa-arrow-circle-o-left"></i> Kembali</button>
        <button class="btn btn-default " style="text-transform: none;width: 300px; margin-top: 20px" type="button" onclick="window.print();"><i class="fa fa-print"></i> Cetak Data Jalan</button>
        </div>
    </center>
    <div class="book" id="print">
        <div class="page">
            <div class="subpage">
                <?php 
                $id=$_GET['id'];
                $sql="select * from shp where id=$id";
                $qkkn=mysqli_query($db,$sql);
                while($value = mysqli_fetch_array($qkkn)){
                    // echo '<pre>'; print_r($value); echo '</pre>';
                 ?>
                <table align="center" style="border-bottom: 3px solid black; margin-bottom: 20px">
                    <tr>
                        <td width="10%">
                            <img style="margin-bottom: 10px" src="<?php echo ('../../../img/LOGO PU.jpg'); ?>" width="110px" height="120px">
                        </td>
                        <td width="60%">
                            <center><h4 style="font-size:22px">Database GIS Jaringan Jalan
                                <br>Kota Lubuklinggau</h4>
                            <h5><?php echo 'Tanggal Laporan : '.date("d-m-Y"); ?></h5></center>
                        </td>
                        <td width="10%">
                           <img style="margin-bottom: 10px" src="<?php echo ('../../../img/qq.png'); ?>" width="110px" height="120px">
                        </td>
                    </tr>
                </table>
    			
                <div class="table-responsive">
                <table border="1"  align="center" class="table_bordered" style="width: 100%;">
                    <thead>
                        <tr>
                            <td colspan="3"><strong>Peta Jalan</strong></td>
                            <td colspan="3"><strong>Data Jalan</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="16" colspan="3" width="50%" >
                                <div id="map" style="height: 100%;width: 100%;display: block; padding: 20px;">
                                    <image style="width: 100;height: 250;" src="file/<?=$value['fotoSHP'];?>"/>
                                </div>
                            </td>
                            <tr>
                                <td>No Ruas</td>
                                <td style="text-align:center;">:</td>
                                <td width="30%"><?php echo $value['No_Ruas']; ?></td>
                            </tr>
                            
                        </tr>
                        <tr>
                            <td width="18%">Nama Ruas</td>
                            <td width="2%">:</td>
                            <td width="30%"><?php echo $value['Nama_Jalan']; ?></td>
                        </tr>
                        <tr>
                            <td>Status Jalan</td>
                            <td style="text-align:center;">:</td>
                            <td><?php echo $value['Status_Jal']; ?></td>
                        </tr>
                        <tr>
                            <td>P_RUAS(KM)</td>
                            <td style="text-align:center;">:</td>
                            <td width="30%"><?php echo $value['P_RUAS_KM']; ?></td>
                        </tr>
                        <tr>
                            <td>P_SURV(KM)</td>
                            <td style="text-align:center;">:</td>
                            <td><?php echo $value['P_SURV_KM']; ?></td>
                        </tr>
                        <tr>
                            <td>L_JALAN(M)</td>
                            <td style="text-align:center;">:</td>
                            <td><?php echo $value['L_JALAN_M']; ?></td>
                        </tr>
                        <tr>
                            <td>LB_BAHU</td>
                            <td style="text-align:center;">:</td>
                            <td><?php echo $value['LB_BAHU']; ?></td>
                        </tr>
                        <tr>
                            <td>P_ASPAL_KM</td>
                            <td style="text-align:center;">:</td>
                            <td><?php echo $value['P_ASPAL_KM']; ?></td>
                        </tr>
                        <tr>
                            <td>Tipe_Permu</td>
                            <td style="text-align:center;">:</td>
                            <td><?php echo $value['TIPE_PERM']; ?></td>
                        </tr>
                        <tr>
                            <td>Kondisi%</td>
                            <td style="text-align:center;">:</td>
                            <td><?php echo $value['KONDISI_PE']; ?></td>
                        </tr>
                        <tr>
                            <td>P_RIGID</td>
                            <td style="text-align:center;">:</td>
                            <td><?php echo $value['P_RIGID']; ?></td>
                        </tr>
                        <tr>
                            <td>P_KON_BAIK</td>
                            <td style="text-align:center;">:</td>
                            <td width="30%"><?php echo $value['P_KON_BAIK']; ?></td>
                        </tr>
                        <tr>
                            <td>P_KON_SED</td>
                            <td style="text-align:center;">:</td>
                            <td width="30%"><?php echo $value['P_KON_SED']; ?></td>
                        </tr>
                        <tr>
                            <td>P_KON_RR</td>
                            <td style="text-align:center;">:</td>
                            <td width="30%"><?php echo $value['P_KON_RR']; ?></td>
                        </tr>
                        <tr>
                            <td>P_KON_RB</td>
                            <td style="text-align:center;">:</td>
                            <td width="30%"><?php echo $value['P_KON_RB']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="6">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>LHR</td>
                            <td style="text-align:center;">:</td>
                            <td ><?php echo $value['LHR']; ?></td>
                             <td>Y_awal</td>
                            <td style="text-align:center;">:</td>
                            <td ><?php echo $value['y_awal']; ?></td>
                        </tr>
                        <tr>
                            <td>Akses_Ke_J</td>
                            <td style="text-align:center;">:</td>
                            <td ><?php echo $value['akses_ke_j']; ?></td>
                            <td>Y_akhir</td>
                            <td style="text-align:center;">:</td>
                            <td ><?php echo $value['y_akhir']; ?></td>
                        </tr>
                        <tr>
                        <td>Tahun</td>
                            <td style="text-align:center;">:</td>
                            <td ><?php echo $value['tahun']; ?></td>
                           <td>Kode_Join</td>
                            <td style="text-align:center;">:</td>
                            <td ><?php echo $value['kd_join']; ?></td>
                        </tr>
                        <tr>
                        <td>X_awal</td>
                            <td style="text-align:center;">:</td>
                            <td ><?php echo $value['x_awal']; ?></td>
                            <td>Kd_Jalan</td>
                            <td style="text-align:center;">:</td>
                            <td ><?php echo $value['kd_join']; ?></td>
                        </tr>
                        <tr>
                        <td>X_akhir</td>
                            <td style="text-align:center;">:</td>
                           <td ><?php echo $value['x_akhir']; ?></td>
                            <td colspan="3"></td>
                            <!-- <td style="text-align:center;"></td> -->
                            <!-- <td ><?php //echo $value['kd_jalan']; ?></td> -->
                        </tr>
                        
                         <tr>
                            <td colspan="6">&nbsp;</td>
                            
                        </tr>
                        <tr>
                            <td colspan="3"><strong>Foto 1</strong></td>
                            <td colspan="3"><strong>Foto 2</strong></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="padding:30px">
                                <?php
                                echo ($value['foto1']!='')?'<image style="width: 100;height: 200px;" src="file/'.$value['foto1'].'"></image>':'';
                                ?>
                            </td>
                            <td colspan="3" style="padding:30px">
                                <?php
                                echo ($value['foto1']!='')?'<image style="width: 100;height: 200px;" src="file/'.$value['foto2'].'"></image>':'';
                                ?>
                               
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6"><strong>Keterangan</strong>
                            <br>
                            <?php echo $value['keterangan']; ?></td>
                        </tr>
                        
                    </tbody>
                </table>
                 <h6><center>Copyright &copy; GIS Pemetaan Jalan dan Jembatan 2019</center></h6>
                </div>
            <?php } ?>
            </div>    
        </div>
    </div>
</body>
</html>
    