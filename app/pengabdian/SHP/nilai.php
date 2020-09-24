<?php
session_start();
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
	

if (@$_POST['importExcel']!='') {
	require_once "library/phpexcel/PHPExcel.php";
	$file = $_FILES['fileExcel']['tmp_name'];
	//load the excel library
	$objPHPExcel = PHPExcel_IOFactory::load($file);

	$worksheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
	$numRows = count($worksheet);
	$msg = array();
		// echo '<pre>'; print_r($worksheet[1]); echo '</pre>';
		// exit();
	for ($i=2; $i <= ($numRows) ; $i++) {
		$noruas = $worksheet[$i]['A'];
		$namajalan = $worksheet[$i]['B'];
		$statusjalan = $worksheet[$i]['C'];
		
		$P_RUAS = $worksheet[$i]['D'];
		$P_SURV = $worksheet[$i]['E'];
		$L_JALAN = $worksheet[$i]['F'];
		$LB_BAHU = $worksheet[$i]['G'];
		$P_ASPAL_KM = $worksheet[$i]['H'];
		$tipe_permu= $worksheet[$i]['I'];
		// $Tipe_Permu = $worksheet[$i]['F'];
		$Kondisi_persen = $worksheet[$i]['J'];
		$P_RIGID = $worksheet[$i]['K'];
		$P_KON_BAIK = $worksheet[$i]['L'];
		$P_KON_SED = $worksheet[$i]['M'];
		$P_KON_RR = $worksheet[$i]['N'];
		$P_KON_RB = $worksheet[$i]['O'];
		
		$lhr = $worksheet[$i]['P'];
		$akses_ke_j = $worksheet[$i]['Q'];
		$keterangan = $worksheet[$i]['R'];
		$tahun = $worksheet[$i]['S'];
		$xawal = $worksheet[$i]['T'];
		$xakhir = $worksheet[$i]['U'];
		$yawal = $worksheet[$i]['V'];
		$yakhir = $worksheet[$i]['W'];
		$kdjoin = $worksheet[$i]['X'];
		$id = $worksheet[$i]['Y'];
		$kondisijalan="";
		if ($P_KON_BAIK!="") {
			$kondisijalan=$P_KON_BAIK;
		}
		elseif ($P_KON_SED!="") {
			$kondisijalan=$P_KON_SED;
		}
		elseif ($P_KON_RR!="") {
			$kondisijalan=$P_KON_RR;
		}
		elseif ($P_KON_RB!="") {
			$kondisijalan=$P_KON_RB;
		}
		
		$namafile='';
		$foto1='';
		$foto2='';
		$fotoSHP='';
		//simpan data ke database
		$result=mysqli_query($db,"select * from shp where id='$id'");
		if (!$result) {
			continue;
		}
		else {
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC); //get 1 row from search
			// echo '<pre>';
			// print_r($row);
			// echo '</pre>';
			if (count($row)==0)  //kd_join masih kosong di database
			{
				$query = "insert into shp set 
				id='$id',
				No_Ruas='$noruas',
				Nama_Jalan ='$namajalan',
				Status_Jal ='$statusjalan',
				P_RUAS_KM  ='$P_RUAS',
				P_SURV_KM  ='$P_SURV',
				L_JALAN_M  ='$L_JALAN', 
				LB_BAHU    ='$LB_BAHU',
				P_ASPAL_KM ='$P_ASPAL_KM', 
				TIPE_PERM  ='$tipe_permu',
				KONDISI_PE ='$Kondisi_persen', 
				P_RIGID    ='$P_RIGID', 
				P_KON_BAIK ='$P_KON_BAIK', 
				P_KON_SED  ='$P_KON_SED', 
				P_KON_RR   ='$P_KON_RR', 
				P_KON_RB   ='$P_KON_RB', 
				LHR        ='$lhr', 

				akses_ke_j='$akses_ke_j', 
				keterangan='$keterangan', 
				tahun='$tahun', 
				x_awal='$xawal', 
				x_akhir='$xakhir', 
				y_awal='$yawal', 
				y_akhir='$yakhir',  
				kd_join='$kdjoin',
				file='$namafile',
				foto1='$foto1', 
				foto2='$foto2', 
				fotoSHP='$fotoSHP'";
				// echo 'Insert : '.$query; exit();

				$sql=mysqli_query($db,$query);
				
						if($sql)
				{
					$msg[]='<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										Data Berhasil Disimpan
									</div>';
				}
				else{
					$msg[]='<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										Data Gagal Disimpan.'.mysqli_error($db).'
									</div>';
				
				}
			}
			else 
			{
				$sql="UPDATE `shp` SET 


						Nama_Jalan ='$namajalan',
						Status_Jal ='$statusjalan',
						P_RUAS_KM  ='$P_RUAS',
						P_SURV_KM  ='$P_SURV',
						L_JALAN_M  ='$L_JALAN', 
						LB_BAHU    ='$LB_BAHU',
						P_ASPAL_KM ='$P_ASPAL_KM', 
						TIPE_PERM  ='$tipe_permu',
						KONDISI_PE ='$Kondisi_persen', 
						P_RIGID    ='$P_RIGID', 
						P_KON_BAIK ='$P_KON_BAIK', 
						P_KON_SED  ='$P_KON_SED', 
						P_KON_RR   ='$P_KON_RR', 
						P_KON_RB   ='$P_KON_RB', 
						LHR        ='$lhr', 	

						akses_ke_j='$akses_ke_j', 
						keterangan='$keterangan', 
						tahun='$tahun', 
						x_awal='$xawal', 
						x_akhir='$xakhir', 
						y_awal='$yawal', 
						y_akhir='$yakhir', 
						No_Ruas='$noruas', 
						kd_join='$kdjoin'
						WHERE `shp`.`id` = $id;";
						// echo 'Update : '.$sql; exit();
				$query=mysqli_query($db,$sql);

				if($query)
				{
					$msg[]='<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								Data Telah diupdate di database
							</div>';
				}
				else{
					// Data Gagal diupdate di database.'.$sql.'

					$msg[]='<div class="alert alert-warning">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								Data Gagal diupdate di database.
							</div>';
				}
			}
		}
	}
	$_SESSION['msg']=$msg;
	echo "<script>location.href='aplikasi.php?p=jalan';</script>";
	exit();
}
?>
<h4 class=""align="center">Input Data Jalan</h4>

<form method="post" action="" enctype="multipart/form-data">
	Import File Excel<br>
    <input type="file" required class="form-control" style="width:300px;display:inline-block;" name="fileExcel">
	<button type="submit" name="importExcel" value="Upload" class="btn btn-success"><i class="fa fa-upload"></i> Update</button>
</form>
<hr>
<form method="post" action="">
<!--<select name="kecamatan" id="input" class="input-xlarge search-query" style="width: 300px;">
            <option value="">--Tampil Semua--</option>
            <?php
            $sql = "SELECT kecamatan FROM shp GROUP by kecamatan";
            $result = mysqli_query($db, $sql);
        	 while($r = mysqli_fetch_array($result)) {
                 $sign=($_POST['kecamatan']==$r['kecamatan'])?'selected':'';
                 echo '<option '.$sign.' value="'.$r['kecamatan'].'">'.$r['kecamatan'].'</option>';
             }
            ?>
        </select><br> -->

		<input name="keyword" value="<?=@$_POST['keyword']?>" class="input-xlarge search-query" type="text" placeholder="Pencarian berdasarkan Nama_Jalan"><br>
		<input name="kondisi" value="<?=@$_POST['kondisi']?>" class="input-xlarge search-query" type="text" placeholder="Pencarian berdasarkan kondisi">
	<button type="submit" name="btnsearch" value="Search" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
	<a class="btn btn-sm btn-success" target="_blank" href="app/pengabdian/SHP/cetak_all.php">
					<i class="fa fa-print"></i> Cetak Semua
                </a>
		<!-- <a href="aplikasi.php?p=add" class="btn btn-primary pull-right">Add <i class="fa fa-plus"></i></a> -->
</form>
	<hr />
	<?php
	if($_SESSION['msg']!=''){
		if (is_array($_SESSION['msg'])) {
			foreach ($_SESSION['msg'] as $key => $value) {
				echo $value;
			}
			unset($_SESSION['msg']);
		}else {
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
	}
	?>

<?php  
 if (isset($_POST['btnsearch'])){ ?>
 	<table class="datatabel table table-striped">
	 <thead>
	<tr style="font-weight: bold;">
		<td>No</td>
        <td>No Ruas</td>
        <td>Nama Ruas</td>
        <td>Status Jalan</td>
		<td>Kondisi Jalan</td>
		<td>Action</td>
	</tr> 
	</thead>
	<tbody>
	<?php
	 $no_urut = 0;

	 $search = $_POST['keyword'];
		$sql = "SELECT * FROM shp WHERE Nama_Jalan LIKE '%$search%'";
		if ($_POST['kecamatan'] != "") {
			$search = $_POST['kecamatan'];
			$sql.=" AND kecamatan LIKE '%$search%'";
		}
		 if ($_POST['kondisi'] !="") {
            $search = $_POST['kondisi'];
            $sql.=" AND P_KON_BAIK LIKE '%$search%' || P_KON_RB LIKE '%$search%' || P_KON_RR LIKE '%$search%' || P_KON_SED  LIKE '%$search%' ";
        }
	//  echo $sql;
	 $result = mysqli_query($db, $sql);
	//  print_r($result);
	 $no=0;
	 while($r = mysqli_fetch_array($result)) {
		  $no++; ?>
		  <tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $r['No_Ruas']; ?></td>
			<td><?php echo $r['Nama_Jalan']; ?></td>
			<td><?php echo $r['Status_Jal']; ?></td>
			<td><?php echo  $r['P_KON_BAIK']; ?> </td>
			<td>
				<a style="width:80px"  class="btn btn-xs btn-info" href="app/pengabdian/SHP/cetak.php?&id=<?php echo $r['id']; ?>">
					<span class="fa fa-print"></span> Cetak</a>
				<a style="width:80px"  class="btn btn-xs btn-warning" href="?p=edit&id=<?php echo $r['id']; ?>">
					<span class="fa fa-edit"></span> Update</a>
				<a  style="width:80px" class="btn btn-xs btn-danger" onclick="return confirm('Apakah yakin akan dihapus?')" href="app/pengabdian/SHP/hapus.php?id=<?php echo $r['id']; ?>">
					<span class="fa fa-trash"></span> Hapus</a>
			</td>
		</tr>
	 <?php } 
	 echo "</tbody></table>";
 } else {
 ?>
	<table class="datatabel table table-striped">
	<thead>

		<tr style="font-weight: bold;">
			<td>No</td>
			<td>No Ruas</td>
			<td>Nama Ruas</td>
			<td>Status Jalan</td>
			<td>Kondisi Jalan</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php
		// $p = new paging;
		//batas / limit
		// $batas=10;
		//cek halamn dan posisi data
		// $posisi = $p->cariPosisi($batas);
		$sql="select * from shp";
		// $sql2=$sql;
		// $sql.=" limit $posisi, $batas";
		$qkkn=mysqli_query($db,$sql);
		// echo mysqli_error($db);
		// $prev=$_GET['halaman']-1;
		// $no=($prev*$batas)+1;
		
		//while(list($id,$idmhs,$prodi,$fakultas,$nama,$nilai_teori,$angkatan)=mysqli_fetch_row($qkkn)):
		//$qnilai=mysqli_query($db,"select nilaikades,nilaidpl,pembekalan,id_user from nilai where id_register='$id'");
		//list($nkades,$ndpl,$pembekalan,$id_user)=mysqli_fetch_row($qnilai);
		//$totn=(($nkades*50/100)+($ndpl*25/100)+($pembekalan*25/100)); 
		$i=0;
		while($r = mysqli_fetch_array($qkkn)){
			$i++;
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $r['No_Ruas']; ?></td>
			<td><?php echo $r['Nama_Jalan']; ?></td>
			<td><?php echo $r['Status_Jal']; ?></td>
			<td><?php echo $r['P_KON_BAIK'] . $r['P_KON_SED'] . $r['P_KON_RR'] . $r['P_KON_RB']; ?></td>
			<td>
				<a style="width:80px"  class="btn btn-xs btn-info" href="app/pengabdian/SHP/cetak.php?&id=<?php echo $r['id']; ?>">
					<span class="fa fa-print"></span> Cetak</a>
				<a style="width:80px"  class="btn btn-xs btn-warning" href="?p=edit&id=<?php echo $r['id']; ?>">
					<span class="fa fa-edit"></span> Update</a>
				<a style="width:80px"  class="btn btn-xs btn-danger" onclick="return confirm('Apakah yakin akan dihapus?')" href="app/pengabdian/SHP/hapus.php?id=<?php echo $r['id']; ?>">
					<span class="fa fa-trash"></span> Hapus</a>
			</td>

		</tr>
		<?php
		}
		?>
        </tbody>
	</table>
<?php
}

// $data=mysqli_query($db,$sql2);
// $seluruhdata=mysqli_num_rows($data);

// dapatkan jumlah halaman
// $jmlhalaman= $p->jumlahHalaman($seluruhdata, $batas);
// $linkhalaman= $p->navHalaman($_GET['halaman'], $jmlhalaman); 
// echo $linkhalaman;
?>
 