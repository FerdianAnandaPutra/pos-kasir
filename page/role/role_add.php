<?php
include 'authcheck.php';

if (isset($_POST['simpan'])) {
	$nama = $_POST['nama'];

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
	  <div class="form-group">
	    <label>Nama Role</label>
	    <input type="text" name="nama" class="form-control" placeholder="Nama Role">
	  </div>
<div class="row mt-2">
        <div class="d-flex justify-content-start gap-2 col-4">
            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary w-50 h-100">
            <a href="index.php?page=barang/barang" class="btn btn-warning w-50 h-100"><strong>Kembali</strong></a>
        </div>
    </div>
	</form>
</div>