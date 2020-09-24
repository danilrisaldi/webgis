<div class="span12" id="containt">
<?php 
$qhalaman=mysqli_query($db,"select id_download,judul,isi from download where id_download='$p' and status='Publish'");
list($idhalaman,$judulhalaman,$isihalaman)=mysqli_fetch_row($qhalaman);
?>
Area Download...
<h4><?php echo $judulhalaman; ?></h4>
<hr>
<?php echo $isihalaman; ?>
</div>