<?php
include 'authcheck.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //menampilkan data berdasarkan ID
    $data = mysqli_query($dbconnect, "SELECT * FROM role where id_role='$id'");
    $data = mysqli_fetch_assoc($data);
}
$_SESSION['success'] = 'mengedit data';

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $nama = $_POST['nama'];

    // Simpan perubahan ke database
    mysqli_query($dbconnect, "UPDATE role SET nama='$nama' WHERE id_role='$id'") 
        or die(mysqli_error($dbconnect));

    $_SESSION['success'] = 'Data berhasil diperbarui.';
    header('location:index.php?page=role/role');
}
?>

<div class="container">
	<h1>Edit Role</h1>
	<form method="post">
	  <div class="form-group">
	    <label>Nama Role</label>
	    <input type="text" name="nama" class="form-control" placeholder="Nama Role" value="<?=$data['nama']?>">
	  </div>
  	<input type="submit" name="update" value="Perbaruhi" class="btn btn-primary">
  	<a href="index.php?page=role/role" class="btn btn-warning">Kembali</a>
	</form>
</div>
