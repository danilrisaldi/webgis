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
                    <center><h4 style="font-size:22px">Database GIS Jembatan
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
                    <th>Jenis</th>
                    <th>Panjang</th>
                    <th>Lebar</th>
                    <th>Keterangan</th>
                </tr> 
            </thead>
            <tbody>';
                $sql = "SELECT * FROM jembatan";
                $result = mysqli_query($db, $sql);
                $no_urut=0;
                while($data = mysqli_fetch_array($result)) {
                    $no_urut++;
                    $html.='<tr>
                        <td>'.$no_urut.'</td>
                        <td>'.$data['jenis'].'</td>
                        <td>'.$data['panjang'].'</td>
                        <td>'.$data['lebar'].'</td>
                        <td>'.$data['keterangan'].'</td>
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
$mpdf->SetTitle('Database GIS Jembatan Kota Lubuklinggau');
$mpdf->Output('Database GIS Jembatan Kota Lubuklinggau.pdf','I');


?>