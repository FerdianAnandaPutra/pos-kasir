<?php
ob_start();
include 'authcheck.php';

if (isset($_POST['simpan'])) {
	// echo var_dump($_POST);
	$nama = $_POST['nama'];
	$kode_barang = $_POST['kode_barang'];
	$harga = $_POST['harga'];
	$jumlah = $_POST['jumlah'];

	// Menyimpan ke database;
	mysqli_query($dbconnect, "INSERT INTO barang VALUES (NULL,'$nama','$harga','$jumlah','$kode_barang')");

	$_SESSION['success'] = 'menambahkan data';

	// mengalihkan halaman ke list barang
	header("location:index.php?page=barang/barang");
	exit;
}
?>

<div class="container">
	<h3>Tambah Barang</h3>
	<form method="post">

		<div class="form-group">
    <label>Kode Barang</label>
    <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang">
</div>
	  <div class="form-group">
	    <label>Nama Barang</label>
	    <input type="text" name="nama" class="form-control" placeholder="Nama barang">
	  </div>
	  <div class="form-group">
	    <label>Harga</label>
	    <input type="number" name="harga" class="form-control" placeholder="Harga Barang">
	  </div>
	  <div class="form-group">
	    <label>Jumlah Stock</label>
	    <input type="number" name="jumlah" class="form-control" placeholder="Jumlah Stock">
	  </div>

<style>
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
input[type=number] {
  -moz-appearance: textfield;
}
</style>
    <div class="row mt-2">
        <div class="d-flex justify-content-start gap-2 col-4">
            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary w-50 h-100">
            <a href="index.php?page=barang/barang" class="btn btn-warning w-50 h-100"><strong>Kembali</strong></a>
        </div>
    </div>
	</form>
	<?php ob_end_flush(); ?>
</div>