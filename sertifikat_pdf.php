
<?php
include "config/fpdf17/fpdf.php";
include "config/connect.php";

//terima data search untuk memunculkan data dari database


$pdf = new FPDF('P','mm','A4'); //untuk memanggil seluruh data/perintah yang ada di class fpdf pada file fpdf | L/P |ukuran|kerta
$pdf->AddPage(); //membuat kertas pdf

//$pdf->Image('../../../img/KOPLP2M.jpg',30,45);
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Times','B','12'); //font| bold | size

$pdf->Image('img/logo.jpg',15,15,22,22);

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(200,10,'KEMENTRIAN AGAMA RI',0,0,'C'); 
$pdf->Ln(6); 

$pdf->Cell(200,10,'UNIVERSITAS ISLAM NEGERI RADEN FATAH PALEMBANG',0,0,'C'); 
$pdf->Ln(7); 

$pdf->SetFont('Times','B','19'); //font| bold | size
$pdf->Cell(200,10,'LEMBAGA PENELITIAN DAN PENGABDIAN',0,0,'C'); 
$pdf->Ln(7); 
$pdf->Cell(200,10,'KEPADA MASYARAKAT (LP2M)',0,0,'C'); 
$pdf->Ln(5); 

$pdf->SetFont('Times','B','6.5'); //font| bold | size
$pdf->Cell(200,10,'JL. Prof. K.H. Zainal Abidin Fikri No. 01 Km. 3,5 Palembang Sumatera Selatan 30126 Telp. 0711-362244/ 5730939 Email: lp2m@radenfatah.ac.id Website: http://lp2m.radenfatah.ac.ic',0,0,'C'); 
$pdf->Ln(10); 
//$pdf->Line(13,42,200,42);
$pdf->Line(13,42.5,200,42.5);
$pdf->Line(13,43,200,43);
 $pdf->Ln(8);
$pdf->SetFont('Times','B','14'); //font| bold | size
$pdf->Cell(200,10,'DATA KEASLIAN SERTIFIKAT',0,0,'C'); 
 $pdf->Ln();
$pdf->Cell(200,10,'KULIAH KERJA NYATA (KKN) MAHASISWA',0,0,'C'); 
$pdf->Ln(7); 


$katsearch=$_GET['katsearch'];
$kunci=mysqli_real_escape_string($db,$_GET['kunci']);

if($kunci!="" and $katsearch=="nim"):
$query=mysqli_query($db,"select a.id_register,a.MhswID,a.nama,a.jaket,a.prodi,a.fakultas,a.jk,a.tmp_lhr,a.tgl_lhr,b.angkatan_ke,c.nilaikades,c.nilaidpl,d.id_kelompok,d.no_kelompok,e.desa,e.kec,e.kab,e.propinsi, f.nama from register a, angkatan b, nilai c,kelompok d,desa e,dpl f where a.MhswID='$kunci' and a.id_angkatan=b.id_angkatan and b.status='On' and a.id_register=c.id_register and d.id_kelompok=a.id_kelompok and e.id_desa=d.id_desa and f.id_dpl=d.id_dpl");
list($id_register,$nimmhs,$namamhs,$jaket,$prodi,$fakultas,$jk,$tmp_lhr,$tgl_lhr,$angkatan_ke,$nilaikades,$nilaidpl,$id_kelompok,$no_kelompok,$desa,$kec,$kab,$propinsi,$namadpl)=mysqli_fetch_row($query);
echo mysqli_error($db);
	
		elseif($kunci!="" and $katsearch=="nama"):
$query=mysqli_query($db,"select a.id_register,a.MhswID,a.nama,a.jaket,a.prodi,a.fakultas,a.jk,a.tmp_lhr,a.tgl_lhr,b.angkatan_ke,c.nilaikades,c.nilaidpl,d.id_kelompok,d.no_kelompok,e.desa,e.kec,e.kab,e.propinsi, f.nama from register a, angkatan b, nilai c,kelompok d,desa e,dpl f where a.nama like '%$kunci%' and a.id_angkatan=b.id_angkatan and b.status='On' and a.id_register=c.id_register and d.id_kelompok=a.id_kelompok and e.id_desa=d.id_desa and f.id_dpl=d.id_dpl");
list($id_register,$nimmhs,$namamhs,$jaket,$prodi,$fakultas,$jk,$tmp_lhr,$tgl_lhr,$angkatan_ke,$nilaikades,$nilaidpl,$id_kelompok,$no_kelompok,$desa,$kec,$kab,$propinsi,$namadpl)=mysqli_fetch_row($query);
echo mysqli_error($db);

else:
endif;
$totn=($nilaikades+$nilaidpl)/2; 			
			if($totn>=80): $nhuruf="A";
			elseif($totn>=70): $nhuruf="B";
			elseif($totn>=60): $nhuruf="C";
			elseif($totn>=50): $nhuruf="T (Tertunda)";
			elseif($totn>=0): $nhuruf="T (Tertunda)";
			else: $nhuruf="T (Tertunda)";
			endif;
			
			if($totn>=2):

			$pdf->Ln(0); 
			$pdf->SetFont('Times','','11'); 
			$pdf->Ln();
			$pdf->Cell(15,7,'                    Nama',0,0,'L');
			$pdf->Cell(50,7,' : ',0,0,'R');
			$pdf->Cell(10,7,$namamhs,0,0,'L');
			$pdf->Ln();
			$pdf->Cell(15,7,'                    NIM',0,0,'L');
			$pdf->Cell(50,7,' : ',0,0,'R');
			$pdf->Cell(10,7,$nimmhs,0,0,'L');
			$pdf->Ln();
			$pdf->Cell(15,7,'                    Fakultas',0,0,'L');
			$pdf->Cell(50,7,' : ',0,0,'R');
			$pdf->Cell(10,7,$fakultas,0,0,'L');
			$pdf->Ln();
			$pdf->Cell(15,7,'                    Prodi',0,0,'L');
			$pdf->Cell(50,7,' : ',0,0,'R');
			$pdf->Cell(10,7,$prodi,0,0,'L');
			$pdf->Ln();
			$pdf->Cell(15,7,'                    KKN',0,0,'L');
			$pdf->Cell(50,7,' : ',0,0,'R');
			$pdf->Cell(10,7,$angkatan_ke,0,0,'L');
			$pdf->Ln();
			$pdf->Cell(15,7,'                    Kelompok',0,0,'L');
			$pdf->Cell(50,7,' : ',0,0,'R');
			$pdf->Cell(10,7,$no_kelompok,0,0,'L');
			$pdf->Ln();
			$pdf->Cell(15,7,'                    Desa / Kelurahan',0,0,'L');
			$pdf->Cell(50,7,' : ',0,0,'R');
			$pdf->Cell(10,7,$desa,0,0,'L');
			$pdf->Ln();
			$pdf->Cell(15,7,'                    Kecamatan',0,0,'L');
			$pdf->Cell(50,7,' : ',0,0,'R');
			$pdf->Cell(10,7,$kec,0,0,'L');
			$pdf->Ln();
			$pdf->Cell(15,7,'                    Kabupaten / Kota',0,0,'L');
			$pdf->Cell(50,7,' : ',0,0,'R');
			$pdf->Cell(10,7,$kab,0,0,'L');
			$pdf->Ln();
			$pdf->Cell(15,7,'                    Provinsi',0,0,'L');
			$pdf->Cell(50,7,' : ',0,0,'R');
			$pdf->Cell(10,7,$propinsi,0,0,'L');
			$pdf->Ln();
			$pdf->Cell(15,7,'                    Nama DPL',0,0,'L');
			$pdf->Cell(50,7,' : ',0,0,'R');
			$pdf->Cell(10,7,$namadpl,0,0,'L');
			
			$pdf->Ln();
			$pdf->Cell(15,7,'                    Nilai Akhir',0,0,'L');
			$pdf->Cell(50,7,' : ',0,0,'R');
			$pdf->Cell(10,7,$totn,0,0,'L');
			$pdf->Ln();
			$pdf->Cell(15,7,'                    Nilai Huruf',0,0,'L');
			$pdf->Cell(50,7,' : ',0,0,'R');
			$pdf->Cell(10,7,$nhuruf,0,0,'L');
			
			$pdf->Ln();
			$pdf->Ln();




/* script menentukan hari */  
 $array_hr= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
 $hr = $array_hr[date('N')];

/* script menentukan tanggal */   
$tgl= date('j');
/* script menentukan bulan */
  $array_bln = array(1=>"Januari","Februari","Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
  $bln = $array_bln[date('n')];
/* script menentukan tahun */ 
$thn = date('Y');
/* script perintah keluaran*/ 
 //echo $hr . ", " . $tgl . " " . $bln . " " . $thn . " " . date('H:i');
  
$query=mysqli_query($db,"select nama,nip,jabatan from personalia where jabatan like '%Ketua LP2M%'");
//pecah data yang dipanggil menjadi array
list($nama,$nip,$jabatan)=mysqli_fetch_row($query);
		
$pdf->SetFont('Times','','12'); 


/* script menentukan hari */  
 $array_hr= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
 $hr = $array_hr[date('N')];

/* script menentukan tanggal */   
$tgl= date('j');
/* script menentukan bulan */
  $array_bln = array(1=>"Januari","Februari","Maret","April", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
  $bln = $array_bln[date('n')];
/* script menentukan tahun */ 
$thn = date('Y');
/* script perintah keluaran*/ 
 //echo $hr . ", " . $tgl . " " . $bln . " " . $thn . " " . date('H:i');
  

$pdf->Ln(0);



			$pdf->Cell(15,6,'                                                                                                                 Palembang',0,0,'L');
			$pdf->Cell(128,5,' , ',0,0,'R');
			$pdf->Cell(165,6,$tgl." ".$bln." ".$thn." ",0,0,'L');			
$pdf->Ln(5);
$pdf->Cell(132.7,5,'Ketua,',0,0,'R');
$pdf->Ln(20);
$pdf->Cell(158.5,5,''.$nama,0,0,'R');
$pdf->Ln();
$pdf->Cell(170.5,5,'NIP.'.$nip,0,0,'R');

else:
$pdf->Cell(200,10,'DATA TIDAK DI TEMUKAN',0,0,'C'); 
$pdf->Ln(7); 
endif;

		
$pdf->Output();

?>