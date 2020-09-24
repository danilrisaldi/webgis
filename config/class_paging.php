<?php
class Paging{
  // Fungsi untuk mencek halaman dan posisi data
  function cariPosisi($batas){
    if(empty($_GET['halaman'])){
	     $posisi = 0;
	     $_GET['halaman'] = 1;
    }
    else{
	     $posisi = ($_GET['halaman']-1) * $batas;
    }
    return $posisi;
  }

  // Fungsi untuk menghitung total halaman
  function jumlahHalaman($jmldata, $batas){
    $jmlhalaman = ceil($jmldata/$batas);
    return $jmlhalaman;
  }

  // Fungsi untuk link halaman 1,2,3 ... Next, Prev, First, Last
  function navHalaman($halaman_aktif, $jmlhalaman, $sqlFilter=NULL){
    $file = $_SERVER['PHP_SELF'];

    $link_halaman = "";
	
	//link yang ada
	if($_GET):
		$args = explode("&",$_SERVER['QUERY_STRING']);
		foreach($args as $arg):
			$keyval = explode("=",$arg);
			if($keyval[0] != "halaman" And $keyval[0] != "halaman_aktif"):
				$querystring .= "&".$arg;
			endif;
		endforeach;
	endif;

    // Link First dan Previous
    if ($halaman_aktif > 1){
      $prev = $halaman_aktif-1;
      $link_halaman .= " <a href=\"$file?halaman=1$querystring\">First</a> 
                         <a href=\"$file?halaman=$prev$querystring\">Prev</a>  ";
    }
    else{ 
	    $link_halaman .= " First Prev ";
    }

    // Link halaman 1,2,3, ...
    // Angka awal
    $angka = ($halaman_aktif > 3 ? " ... " : " "); // Ternary operator 
    for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
      if ($i < 1) continue;
	    $angka .= "<a href=\"$file?halaman=$i&q=$sqlFilter$querystring\">$i</a>  ";
    }
    
    // Angka tengah
	  $angka .= "<b>$halaman_aktif</b>";
	  for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
      if($i > $jmlhalaman) break;
	    $angka .= "<a href=\"$file?halaman=$i&q=$sqlFilter$querystring\">$i</a> ";
    }
    
    // Angka akhir
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ...<a href=\"$file?halaman=$jmlhalaman&q=$sqlFilter$querystring\">$jmlhalaman</a>  " : "");

    $link_halaman .= " $angka ";

    // Link Next dan Last
    if ($halaman_aktif <= $jmlhalaman){
      $next=$halaman_aktif+1;
      $link_halaman .= "<a href=\"$file?halaman=$next$querystring\">Next</a>  
                        <a href=\"$file?halaman=$jmlhalaman$querystring\">Last</a> ";
    }
    else{
	    $link_halaman .= " Next Last ";
    }
    return $link_halaman;
  }
}
?>
