<?php 

session_start(); //untuk memanggil alert yang ada di file barang
include '../koneksidb.php';
include '../authcheck.php';

if (isset($_GET['id'])) {
	
	$id = $_GET['id'];
	
	mysqli_query($dbconnect, "DELETE FROM `barang` WHERE id_barang='$id' ");
	
	$_SESSION['success'] = 'menghapus data';
	
	header("location:index.php?page=barang/barang");
exit;
}
?>