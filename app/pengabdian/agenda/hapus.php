<?php
session_start();
?>
<?php 

include "../../../config/connect.php";
$id = $_GET['id'];
//simpan data ke database
$sql="DELETE FROM `agenda`
        WHERE `id_agenda` = $id;";
// echo $sql; exit();
$query=mysqli_query($db,$sql);
echo mysqli_error($db);
if($query)
{
    $_SESSION['msg']='<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Data Berhasil Dihapus
                    </div>';
}
else{
    $_SESSION['msg']='<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Data Gagal Dihapus
                    </div>';
}
echo "<script>location.href='../../../aplikasi.php?p=agenda';</script>";


?>