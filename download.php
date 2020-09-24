<?php
// echo password_hash('admin', PASSWORD_DEFAULT);
$back_dir='app/pengabdian/SHP/file/';
if(isset($_GET['nm']))
{
	 $file = $back_dir.$_GET['nm'];
	 if (file_exists($file))
	 {
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.basename($file));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: private');
		header('Pragma: private');
		header('Content-Length: ' . filesize($file));
		ob_clean();
		flush();
		readfile($file);
		exit;
	 } 
	 else 
	 {
		  echo "file {$_GET['nm']} sudah tidak ada.";
	 }
}
?>