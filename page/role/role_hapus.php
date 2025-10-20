<?php 

include '../koneksidb.php';
session_start(); //untuk memanggil alert yang ada di file barang
include '../authcheck.php';

if (isset($_GET['id'])) {
	
	$id = $_GET['id'];
	
	mysqli_query($dbconnect, "DELETE FROM `role` WHERE id_role='$id' ");
	
	$_SESSION['success'] = 'menghapus data';
	
	header("location:index.php?page=role/role");
}

?>