<?php
include 'authcheck.php';

if (isset($_POST['simpan'])) {
	// echo var_dump($_POST);
	$nama = $_POST['nama'];
	// $kode_barang = $_POST['kode_barang'];
	// $harga = $_POST['harga'];
	// $jumlah = $_POST['jumlah'];

	// Menyimpan ke database;
	mysqli_query($dbconnect, "INSERT INTO role VALUES (NULL,  '$nama')");

	$_SESSION['success'] = 'menambahkan data';

	// mengalihkan halaman ke list barang
	header("location:index.php?page=role/role");
}
?>

<div class="container">
	<h1>Tambah Role</h1>
	<form method="post">

    <!-- <div class="form-group">
	    <label>ID Role</label>
	    <input type="number" name="harga" class="form-control" placeholder="ID Role">
	  </div> -->
	  <div class="form-group">
	    <label>Nama Role</label>
	    <input type="text" name="nama" class="form-control" placeholder="Nama Role">
	  </div>
	  <!-- <div class="form-group">
	    <label>Harga</label>
	    <input type="number" name="harga" class="form-control" placeholder="Harga Barang">
	  </div>
	  <div class="form-group">
	    <label>Jumlah Stock</label>
	    <input type="number" name="jumlah" class="form-control" placeholder="Jumlah Stock">
	  </div> -->
  	<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
  	<a href="index.php?page=role/role" class="btn btn-warning">Kembali</a>
	</form>
</div>