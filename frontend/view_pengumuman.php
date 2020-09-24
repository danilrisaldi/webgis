<div class="span12" id="containt">
<?php 
$qhalaman=mysqli_query($db,"select id_pengumuman,judul,isi,tgl from pengumuman where id_pengumuman='$p' and status='Publish'");
list($idhalaman,$judulhalaman,$isihalaman,$tglhalaman)=mysqli_fetch_row($qhalaman);
?>

<h4><?php echo $judulhalaman; ?> | <code><?php echo $tglhalaman; ?></code></h4>
<hr>
<?php echo $isihalaman; ?>
</div>