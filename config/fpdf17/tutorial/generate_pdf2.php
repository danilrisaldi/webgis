<?php
require('../fpdf.php');

class PDF extends FPDF
{
	// Simple table
	function BasicTable($header, $data)
	{
		// Header
		foreach($header as $col)
			$this->Cell(40,7,$col,1); //lebar, tinggi, teks, border
		$this->Ln();
		// Data
		foreach($data as $row)
		{
			foreach($row as $col)
				$this->Cell(40,6,$col,1);
			$this->Ln();
		}
	}

	// Better table
	function ImprovedTable($header, $data)
	{
		// Column widths
		$w = array(10, 20, 20, 20, 10, 20, 20, 20, 10, 20, 20, 20, 20, 20 );
		// Header
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C');
		$this->Ln();
		// Data
		foreach($data as $row)
		{
			$this->Cell($w[0],6,$row[0],'LR');
			$this->Cell($w[1],6,$row[1],'LR');
			$this->Cell($w[2],6,$row[2],'LR',0,'L');
			$this->Cell($w[3],6,$row[3],'LR',0,'R');
			$this->Cell($w[4],6,$row[4],'LR');
			$this->Cell($w[5],6,$row[5],'LR');
			$this->Cell($w[6],6,$row[6],'LR',0,'L');
			$this->Cell($w[7],6,$row[7],'LR',0,'R');
			$this->Cell($w[8],6,$row[8],'LR');
			$this->Cell($w[9],6,$row[9],'LR');
			$this->Cell($w[10],6,$row[10],'LR',0,'L');
			$this->Cell($w[11],6,$row[11],'LR',0,'R');
			$this->Cell($w[12],6,$row[12],'LR');
			$this->Cell($w[13],6,$row[13],'LR');

			$this->Ln();
		}
		// Closing line
		$this->Cell(array_sum($w),0,'','T');
	}

}

$pdf = new PDF();
// Column headings
$header = array('id', 'Jenis Barang', 'Bobot', 'Paket', 'Tujuan', 'Pengirim', 'No Telp', 'Alamat', 'Penerima', 'No Telp', 'Alamat', 'Tarif', 'Diskon', 'Total Biaya');
// Data loading
include "../../connect.php";
$query = mysql_query("SELECT a.id_tran,a.jenis_barang,a.bobot,b.paket,c.tujuan,a.pengirim,a.nohp_pengirim,a.address_pengirim,a.penerima,a.nohp_penerima,a.address_penerima,a.tarif,a.diskon,a.total_biaya FROM produk a, paket b, tujuan c WHERE a.id_tran = '$id_trans', b.id_paket = a.id_paket, c.id_tujuan = a.id_tujuan");
$i=0;
while(list($id_tran,$jenis_barang, $bobot, $paket, $tujuan, $pengirim, $nohp_pengirim, $address_pengirim, $penerima, $nohp_penerima, $address_penerima, $tarif, $diskon, $total_biaya) = mysql_fetch_array($query)):

	$datanyo[] = "$id_tran|$jenis_barang|$bobot|$paket|$tujuan|$pengirim|$nohp_pengirim|$address_pengirim|$penerima|$nohp_penerima|$address_penerima|$tarif|$diskon|$total_biaya";
endwhile;

foreach ($datanyo as $Data):
	$data[] = explode('|',$Data);
endforeach;
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->BasicTable($header,$data);
$pdf->AddPage();
$pdf->ImprovedTable($header,$data);
$pdf->AddPage();
$pdf->FancyTable($header,$data);
$pdf->Output();
?>