<?php
require('../fpdf.php');

class PDF extends FPDF
{

//header
function Header()
{
    // Select Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Framed title
    $this->Cell(80,10,'Report Surat Masuk',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Better table
function ImprovedTable($header, $data)
{
  	// Column widths
	$w = array(15, 27, 26, 45, 30, 60, 20, 20, 20, 20, 20);
	// Header
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C');
	$this->Ln();
	// Data
	foreach($data as $row)
	{
		$this->Cell($w[0],6,$row[0],1,'LR');
		$this->Cell($w[1],6,$row[1],1,'LR');
		$this->Cell($w[2],6,$row[2],1,',LR');
		$this->Cell($w[3],6,$row[3],1,'LR');
        $this->Cell($w[4],6,$row[4],1,'LR');
		$this->Cell($w[5],6,$row[5],1,'LR');
		$this->Cell($w[6],6,$row[6],1,'LR');
		$this->Cell($w[7],6,$row[7],1,'LR');
        $this->Cell($w[8],6,$row[8],1,'LR');
		$this->Cell($w[9],6,$row[9],1,'LR');
		$this->Cell($w[10],6,$row[10],1,'LR');

		$this->Ln();
	}
	// Closing line
	$this->Cell(array_sum($w),0,'','T');
}
//tutup class fpdf
}

$pdf = new PDF('L','mm','Legal');

// Column headings
$header = array('Id Surat', 'Tanggal Masuk', 'Pengirim', 'No Surat','Tanggal Surat','Perihal','DIRUT','DIRPEM','DIRPROD','DIRKU','DIRUM');

// Data loading (data yang akan di tampilkan)
   //menghubungkan file dengan database
   include "../../connect.php";
   //query pemanggil data
   $sql="SELECT id_surat_masuk,tgl_masuk,sumber,no_surat,tgl_surat,perihal, b.status FROM surat_masuk a, history b";
   //PENGGUNAAN QUERY SESUAI DENGAN KEY YANG DI PILIH (SUMBER, TANGGAL, ATAU PERIODE)
   $key=$_POST['key'];
   $keyword=$_POST['keyword'];
   //penggunaan query
   if($key=="sumber")
   {
       $sql .= " WHERE sumber='$keyword' AND a.id_surat_masuk=b.id_surat_masuk AND ";

   }
   else
   {

   }
   $query=mysql_query($sql);
   $i=0;
   while(list($id, $tglms, $sumber, $nosur, $tglsur, $perihal)= mysql_fetch_array($query))
   {
       $datanyo[] = "$id|$tglms|$sumber|$nosur|$tglsur|$perihal";
   }
   foreach ($datanyo as $Data)
   {
       $data[] = explode('|',$Data);
   }

$pdf->SetFont('Arial','',10);
$pdf->AddPage();
$pdf->ImprovedTable($header,$data);
$pdf->Output();
?>
