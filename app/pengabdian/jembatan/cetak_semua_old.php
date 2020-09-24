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
    table {
    width: 100%;
    }
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
            width: 100%;
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
            /* height: 257mm; */
            outline: 2cm transparent solid;
        }
        
        @page {
            size: A4;
            margin: 0;
        }

        @media print {
            /* html, body {
                width: 210mm;
                height: 297mm;        
            } */
            html, body {
                width: 100%;
                height: 100%;        
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
    			
                <table border="1"  align="center" class="table_bordered" style="width: 100%;">
                    <thead>
                    <tr style="font-weight: bold;">
            <th>No</th>
            <th>FID Jembatan</th>
            <th>No Jembatan</th>
            <th>Nama Jembatan</th>
            <th>Sungai</th>
            <th>Kecamatan</th>
            <th>Nama jalan</th>
            <th>Panjang</th>
            <th>Lebar</th>
            <th>J Bentang</th>
            <th>B Atas</th>
            <th>BA Kondisi</th>
            <th>B Bawah</th>
            <th>BB Kondisi</th>
            <th>fondasi</th>
            <th>f_kondisi</th>
            <th>koor_x</th>
            <th>koor_y</th>
            <th>Keterangan</th>
            <th>tpe_lantai</th>
            <th>l_kondisi</th>
            <th>thn_pembua</th>
            <th>thn_penang</th>

        </tr> 
                    </thead>
                    <tbody>
                        <?php
        $sql = "SELECT * FROM jembatan";
        $result = mysqli_query($db, $sql);

        while($data = mysqli_fetch_array($result)) {
            $no_urut++; ?>
            <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['fid_jembat']; ?></td>
                <td><?php echo $data['no_jmbtn']; ?></td>
                <td><?php echo $data['nm_jbtn']; ?></td>
                <td><?php echo $data['sungai']; ?></td>
                <td><?php echo $data['kecamatan']; ?></td>
                <td><?php echo $data['nama_jalan']; ?></td>

                <td><?php echo $data['panjang_m']; ?></td>
                <td><?php echo $data['lebar_m']; ?></td>
                <td><?php echo $data['j_bentang']; ?></td>
                <td><?php echo $data['b_atas']; ?></td>
                <td><?php echo $data['ba_kondisi']; ?></td>
                <td><?php echo $data['b_bawah']; ?></td>

                <td><?php echo $data['bb_kondisi']; ?></td>
                <td><?php echo $data['fondasi']; ?></td>
                <td><?php echo $data['f_kondisi']; ?></td>
                <td><?php echo $data['koor_x']; ?></td>
                <td><?php echo $data['koor_y']; ?></td>
                <td><?php echo $data['keterangan']; ?></td>

                <td><?php echo $data['tpe_lantai']; ?></td>
                <td><?php echo $data['l_kondisi']; ?></td>
                <td><?php echo $data['thn_pembua']; ?></td>
                <td><?php echo $data['thn_penang']; ?></td>
            </tr>
        <?php } ?>
                    </tbody>
                </table>
                 <h6><center>Copyright &copy; GIS Pemetaan Jalan dan Jembatan 2019</center></h6>
            </div>    
        </div>
    </div>
</body>
</html>
    