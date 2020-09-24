<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

include "../../../config/security.php";
include "../../../config/connect.php";
include "../../../library/mpdf/mpdf.php";

// @page { sheet-size: A3-L; }

// @page bigger { sheet-size: 420mm 370mm; }

// @page toc { sheet-size: A4; }

// h1.bigsection {
//         page-break-before: always;
//         page: bigger;
// }
$html='
<style type="text/css">
        h3, h4 {
            text-align: center;
            font-weight: bold;
        }
        .table_bordered tr td, .table_bordered tr th{
            padding: 5px;
        }

    </style>
    <div class="book" id="print">
<div class="page">
    <div class="subpage">
        <table align="center" style="border-bottom: 3px solid black; margin-bottom: 20px">
            <tr>
                <td width="10%">
                    <img style="margin-bottom: 10px" src="../../../img/LOGO PU.jpg" width="110px" height="120px">
                </td>
                <td width="60%">
                    <center><h4 style="font-size:22px">Database GIS Jaringan Jalan
                        <br>Kota Lubuklinggau</h4>
                    <h5>Tanggal Laporan : '.date("d-m-Y").'</h5></center>
                </td>
                <td width="10%">
                   <img style="margin-bottom: 10px" src="../../../img/qq.png" width="110px" height="120px">
                </td>
            </tr>
        </table>
        
        <table border="1"  align="center" cellspacing="0" class="table_bordered" style="width: 100%;">
            <thead>
                <tr style="font-weight: bold;">
                    <th>No</th>
                    <th>No Ruas</th>
                    <th>Nama Ruas</th>
                    <th>Status Jalan</th>
                    <th>P_RUAS(KM)</th> 
                    <th>P_SURV(KM)</th>
                    <th>L_JALAN(M)</th>
                    <th>LB_BAHU</th>
                    <th>P_ASPAL_KM</th>
                    <th>Tipe_Permu</th>
                    <th>Kondisi_%</th>
                    <th>P_RIGID</th>
                    <th>P_KON_BAIK</th>
                    <th>P_KON_SED</th>
                    <th>P_KON_RR</th>
                    <th>P_KON_RB</th>
        
                    <th>LHR</th>
                    <th>Akses_ke_j</th>
                    <th>Keterangan</th>
                    <th>Tahun</th>
                    <th>x_awal</th>
                    <th>x_akhir</th>
                    <th>y_awal</th>
                    <th>y_akhir</th>
                    <th>kd_join</th>
                </tr> 
            </thead>
            <tbody>';
                $sql = "SELECT * FROM shp";
                $result = mysqli_query($db, $sql);
                $no_urut=0;
                while($data = mysqli_fetch_array($result)) {
                    $no_urut++;
                    $html.='<tr>
                        <td>'.$no_urut.'</td>
                        <td>'.$data['No_Ruas'].'</td>
                        <td>'.$data['Nama_Jalan'].'</td>
                        <td>'.$data['Status_Jal'].'</td>
                        <td>'.$data['P_RUAS_KM'].'</td>
                        <td>'.$data['P_SURV_KM'].'</td>
                        <td>'.$data['L_JALAN_M'].'</td>
                        <td>'.$data['LB_BAHU'].'</td>
                        <td>'.$data['P_ASPAL_KM'].'</td>
                        <td>'.$data['TIPE_PERM'].'</td>

                        <td>'.$data['KONDISI_PE'].'</td>
                        <td>'.$data['P_RIGID'].'</td>
                        <td>'.$data['P_KON_BAIK'].'</td>
                        <td>'.$data['P_KON_SED'].'</td>
                        <td>'.$data['P_KON_RR'].'</td>
                        <td>'.$data['P_KON_RB'].'</td>

                        <td>'.$data['LHR'].'</td>
                        <td>'.$data['akses_ke_j'].'</td>
                        <td>'.$data['keterangan'].'</td>
                        <td>'.$data['tahun'].'</td>
                        <td>'.$data['x_awal'].'</td>
                        <td>'.$data['x_akhir'].'</td>
                        <td>'.$data['y_awal'].'</td>
                        <td>'.$data['y_akhir'].'</td>
                        <td>'.$data['kd_join'].'</td>
                    </tr>';
                }
            $html.='</tbody>
        </table>
    </div>    
</div>
</div>';
$footer='<h6 style="text-align:center;"><center>Copyright &copy; GIS Pemetaan Jalan dan Jembatan 2019</center></h6>';
$mpdf= new mPDF(
    '',    // mode - default ''
    'A3-L',    // format - A4, for example, default ''
    10,     // font size - default 0
    '',    // default font family
    10,    // margin_left
    10,    // margin right
    15,    // margin top
    15,    // margin bottom
    0,     // margin header
    5,     // margin footer
    'L'    // L - landscape, P - portrait
);
// $mpdf= new mPDF([
//     'debug' => true,
//     'allow_output_buffering' => true
// ]);
// echo $html;
$html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
$footer = mb_convert_encoding($footer, 'UTF-8', 'UTF-8');

// $mpdf->SetHTMLFooter($footer);
$mpdf->SetHTMLFooter($footer.'{PAGENO}');
$mpdf->shrink_tables_to_fit=0;

$mpdf->WriteHTML($html);
$mpdf->SetTitle('Database GIS Jaringan Jalan Kota Lubuklinggau');
$mpdf->Output('Database GIS Jaringan Jalan Kota Lubuklinggau.pdf','I');


?>