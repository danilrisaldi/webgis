<?php
require('../fpdf.php');

class PDF extends FPDF
{
	// Better table
	function ImprovedTable($header, $data)
	{
		// Column widths
		$w = array(5, 25, 10, 10, 10, 30, 30, 50, 30, 30, 50, 15, 15, 15 );
		// Header
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],5,$header[$i],1,0,'C');
		$this->Ln();
		// Data
		foreach($data as $row)
		{
			$this->Cell($w[0],5,$row[0],'LR');
			$this->Cell($w[1],5,$row[3],'LR');
			$this->Cell($w[2],5,$row[4],'LR',0,'L');
			$this->Cell($w[3],5,$row[5],'LR',0,'L');
			$this->Cell($w[4],5,$row[6],'LR');
			$this->Cell($w[5],5,$row[7],'LR');
			$this->Cell($w[6],5,$row[11],'LR',0,'L');
			$this->Cell($w[7],5,$row[9],'LR',0,'L');
			$this->Cell($w[8],5,$row[8],'LR');
			$this->Cell($w[9],5,$row[12],'LR');
			$this->Cell($w[10],5,$row[10],'LR',0,'L');
			$this->Cell($w[11],5,$row[16],'LR',0,'L');
			$this->Cell($w[12],5,$row[18],'LR');
			$this->Cell($w[13],5,$row[17],'LR');

			$this->Ln();
		}
		// Closing line
		$this->Cell(array_sum($w),0,'','T');
	}

}

$pdf = new PDF('L','mm','Legal');
// Column headings
$header = array('id', 'Jenis Barang', 'Bobot', 'Paket', 'Tujuan', 'Pengirim', 'No Telp', 'Alamat', 'Penerima', 'No Telp', 'Alamat', 'Tarif', 'Diskon', 'Total Biaya');
// Data loading
$id_trans=$_POST['id_trans'];

include "../../connect.php";
$query = mysql_query("SELECT *FROM transaksi WHERE id_tran='$id_trans'");
$i=0;
while(list($id_tran,$jenis_barang, $bobot, $paket, $tujuan, $pengirim, $nohp_pengirim, $address_pengirim, $penerima, $nohp_penerima, $address_penerima, $tarif, $diskon, $total_biaya) = mysql_fetch_array($query)):

	$datanyo[] = "$id_tran|$jenis_barang|$bobot|$paket|$tujuan|$pengirim|$nohp_pengirim|$address_pengirim|$penerima|$nohp_penerima|$address_penerima|$tarif|$diskon|$total_biaya";
endwhile;

foreach ($datanyo as $Data):
	$data[] = explode('|',$Data);
endforeach;
$pdf->SetFont('Arial','',8);
$pdf->AddPage();
$pdf->ImprovedTable($header,$data);
$pdf->Output();
?>