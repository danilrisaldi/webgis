<div class="span12" id="containt">
<br>
<a href="?p=xbntt09i9i9jcchh" class="btn btn-warning pull-right">Kembali </a>
<br>
<?php
$judul;
if ($_GET['nmkcjln']!="") {
    $judul='PETA JARINGAN JALAN '.$_GET['nmkcjln'];
}
if ($_GET['nmkcjb']!="") {
    $judul='PETA JARINGAN JEMBATAN '.$_GET['nmkcjb'];
}

?>
<h4 class="span3"></h4>
<center><h4 class="span6">
<marquee><?=$judul?></marquee></h4></center>
<br>
<iframe src="<?=@$_GET['nmfilehtml']?>" height="500px" width="100%"></iframe>
<br>
</div>