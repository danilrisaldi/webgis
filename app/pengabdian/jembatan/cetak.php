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

<body onload="window.print()">
    <center>
        <div class="btn-group hidden-print" >
        <button class="btn btn-primary " style="text-transform: none;width: 300px; margin-top: 20px" type="button" onclick="history.back()"><i class="fa fa-arrow-circle-o-left"></i> Kembali</button>
        <button class="btn btn-default " style="text-transform: none;width: 300px; margin-top: 20px" type="button" onclick="window.print();"><i class="fa fa-print"></i> Cetak Asset</button>
        </div>
    </center>
    <div class="book" id="print">
        <div class="page">
            <div class="subpage">
                <?php 
                $id=$_GET['id'];
                $sql="select * from jembatan where id=$id";
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
                            <center><h4 style="font-size:22px">Database GIS Jembatan
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
                            <td colspan="3"><strong>Peta Jembatan</strong></td>
                            <td colspan="3"><strong>Data Jembatan</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="3" colspan="3" width="50%" >
                                <div id="map" style="height: 100%;width: 100%;display: block; padding: 20px;">
                                    <image style="width: 100;height: 250;" src="file/<?=$value['foto'];?>"/>
                                </div>
                            </td>
                            <td width="18%">Jenis</td>
                            <td width="2%">:</td>
                            <td width="30%"><?php echo $value['jenis']; ?></td>
                        </tr>
                        <tr>
                            <td>Panjang</td>
                            <td style="text-align:center;">:</td>
                            <td><?php echo $value['panjang']; ?></td>
                        </tr>
                        <tr>
                            <td>lebar</td>
                            <td style="text-align:center;">:</td>
                            <td><?php echo $value['lebar']; ?></td>
                        </tr>
                       
                        
                       <tr>
                            <td colspan="6"><strong>Keterangan</strong>
                            <br>
                            <?php echo $value['keterangan']; ?></td>
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
                                echo ($value['foto2']!='')?'<image style="width: 100;height: 200px;" src="file/'.$value['foto2'].'"></image>':'';
                                ?>
                            </td>
                            <td colspan="3" style="padding:30px">
                                <?php
                                echo ($value['foto3']!='')?'<image style="width: 100;height: 200px;" src="file/'.$value['foto3'].'"></image>':'';
                                ?>
                               
                            </td>
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
    