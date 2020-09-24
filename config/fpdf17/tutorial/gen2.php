<?php
require('../fpdf.php');
require('../../connect.php');

$reportName='Report Daftar Surat';
$pdf = new FPDF( 'L', 'mm', 'Legal' );
$pdf->AddPage();
$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Ln(15);
$pdf->Cell( 0, 7, $reportName, 0, 0, 'C' );
$pdf->Ln(5);
$pdf->SetFont( 'Arial', '', 8 );
$pdf->Ln(5);

// Header (penamaan kolom)
   $pdf->Cell(8 ,7,'No',1,0,'C');
   $pdf->Cell(25,7,'Tanggal Masuk',1,0,'C');
   $pdf->Cell(25,7,'Pengirim',1,0,'C');
   $pdf->Cell(50,7,'No Surat',1,0,'C');
   $pdf->Cell(25,7,'Tanggal Surat',1,0,'C');
   $pdf->Cell(60,7,'Perihal',1,0,'C');
   //panggil seluruh data divisi
	$divisi = mysql_query("SELECT id_divisi,divisi FROM divisi ORDER BY id_divisi");
	$i=0;
	//loopig menggunakan pendefinisian field ke dalam variabel
	while(list($idDiv,$Div) = mysql_fetch_row($divisi))
	{
	//data divisi yang dimunculkan
	$pdf->Cell(20,7,$Div,1,0,'C');
    //ubah data divisi menjadi array
    $div[$i]['id'] = $idDiv;
	$div[$i]['nama'] = $Div;
	$i++;
    }
   $pdf->Ln();

// Data loading (data yang akan di tampilkan)
   //query pemanggil data
   $sql="SELECT id_surat_masuk,tgl_masuk,sumber,no_surat,tgl_surat,perihal FROM surat_masuk";
   //PENGGUNAAN QUERY SESUAI DENGAN KEY YANG DI PILIH (SUMBER, TANGGAL, ATAU PERIODE)
   $key=$_POST['key'];
   $keyword=$_POST['keyword'];
   //penggunaan query
   if($key=="sumber surat")
   {
       $sql .= " WHERE sumber='$keyword'";

   }
   else
   {

   }
   $query=mysql_query($sql);
   $i=0;
   $no=1;
   while(list($id, $tglms, $sumber, $nosur, $tglsur, $perihal)= mysql_fetch_array($query))
   {
    // Data
	$pdf->Cell(8,6,$no,1,'LR');
	$pdf->Cell(25,6,$tglms,1,'LR');
	$pdf->Cell(25,6,$sumber,1,',LR');
	$pdf->Cell(50,6,$nosur,1,'LR');
    $pdf->Cell(25,6,$tglsur,1,'LR');
	$pdf->Cell(60,6,$perihal,1,'LR');
    //pemanggilan data untuk direksi
    foreach($div as $divnyo)
	{
        $queryhist=mysql_query("SELECT status FROM history WHERE id_surat_masuk='$id' AND id_divisi='$divnyo[id]'");
        list($status)=mysql_fetch_row($queryhist);
       	$pdf->Cell(20,6,$status,1,'LR');
    }
	$pdf->Ln();
    $no++;
   }
$pdf->Output();
?>
