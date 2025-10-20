<?php
include 'authcheck.php';

// Ambil daftar role dari tabel role
$roles = mysqli_query($dbconnect, "SELECT * FROM role");

if (isset($_POST['simpan'])) {
	// echo var_dump($_POST);
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$role_id = $_POST['role_id'];

	// Menyimpan ke database;
	mysqli_query($dbconnect, "INSERT INTO user VALUES ('','$nama','$username','$password','$role_id')");

	$_SESSION['success'] = 'menambahkan data';

	// mengalihkan halaman ke list barang
	header("location:index.php?page=user/user");
}
?>

<div class="container">
	<h1>Tambah User</h1>
	<form method="post">
    <!-- <div class="form-group">
	    <label>ID User</label>
	    <input type="text" name="id" class="form-control" placeholder="ID User">
	  </div> -->
	  <div class="form-group">
	    <label>Nama User</label>
	    <input type="text" name="nama" class="form-control" placeholder="Nama User">
	  </div>
	  <div class="form-group">
	    <label>Username</label>
	    <input type="text" name="username" class="form-control" placeholder="Username">
	  </div>
	  <div class="form-group">
	    <label>Password</label>
	    <input type="text" name="password" class="form-control" placeholder="Password">
	  </div>
      <div class="form-group">
    <label>Role Akses</label>
    <select name="role_id" class="form-control">
        <option value="">Pilih Role Akses</option>
        <?php while($row = mysqli_fetch_array($roles)) { ?>
            <option value="<?= $row['id_role'] ?>"><?= $row['nama'] ?></option>
        <?php } ?>
    </select>
</div>

  	<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
  	<a href="index.php?page=user/user" class="btn btn-warning">Kembali</a>
	</form>
</div>
