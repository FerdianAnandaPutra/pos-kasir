<?php
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

include 'authcheck.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //menampilkan data berdasarkan ID
    $data = mysqli_query($dbconnect, "SELECT * FROM barang where id_barang='$id'");
    $data = mysqli_fetch_assoc($data);

// if (!$data) {
//         echo "Data tidak ditemukan untuk ID $id";
//         exit;
//     }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $kode_barang = $_POST['kode_barang'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];

    // Simpan ke database
    mysqli_query($dbconnect, "UPDATE barang SET kode_barang='$kode_barang', nama='$nama', harga='$harga', jumlah='$jumlah' WHERE id_barang='$id'")
        or die(mysqli_error($dbconnect));

    $_SESSION['success'] = 'Data berhasil diperbarui.';
    header('Location: index.php?page=barang/barang');
    exit;
}
?>

<div class="container">
	<h1>Edit Barang</h1>
	<form method="post">
	<div class="form-group">
	    <label>Kode Barang</label>
	    <input type="text" name="kode_barang" class="form-control" placeholder="Kode barang" value="<?=$data['kode_barang']?>">
	  </div>
	  <div class="form-group">
	    <label>Nama Barang</label>
	    <input type="text" name="nama" class="form-control" placeholder="Nama barang" value="<?=$data['nama']?>">
	  </div>
	  <div class="form-group">
	    <label>Harga</label>
	    <input type="number" name="harga" class="form-control" placeholder="Harga Barang" value="<?=$data['harga']?>">
	  </div>
	  <div class="form-group">
	    <label>Jumlah Stock</label>
	    <input type="number" name="jumlah" class="form-control" placeholder="Jumlah Stock" value="<?=$data['jumlah']?>">
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

  	<input type="submit" name="update" value="Perbaruhi" class="btn btn-primary">
  	<a href="index.php?page=barang/barang" class="btn btn-warning">Kembali</a>
	</form>
</div>