<div class="span12" id="containt">
<?php 
$qhalaman=mysqli_query($db,"select id_slide,judul,isi,tgl,img from slide where id_slide='$sl' and status='Publish'");
list($idhalaman,$judulhalaman,$isihalaman,$tglhalaman,$imghalaman)=mysqli_fetch_row($qhalaman);
?>

<h4><?php echo $judulhalaman; ?> | <code><?php echo $tglhalaman; ?></code></h4>
<hr>
<img src="<?php echo $imghalaman; ?>" width="50%"> <br>
<?php echo $isihalaman; ?>
</div>