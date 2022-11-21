<?php  
include "connectdb.php";

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR : MISSING ID. ');
$delete = mysqli_query($koneksi,"DELETE FROM tbl_mhs 
								WHERE id_mhs='$id'");
if ($delete) {
	echo "<script>location.href='index.php';</script>";
}else {
	echo "<script>alert('Gagal Hapus Data');location.href='index.php';</script>";
}
?>