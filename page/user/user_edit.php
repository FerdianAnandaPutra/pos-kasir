<?php
include 'authcheck.php';

$role = mysqli_query($dbconnect,"SELECT * FROM role");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //menampilkan data berdasarkan ID
    $data = mysqli_query($dbconnect, "SELECT * FROM user where id_user='$id'");
    $data = mysqli_fetch_assoc($data);
}
$_SESSION['success'] = 'mengedit data';

if (isset($_POST['update'])) {

    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role_id = $_POST['role_id'];

    // Menyimpan ke database;
    mysqli_query($dbconnect, "UPDATE user SET nama='$nama', 
	username='$username', password='$password', role_id='$role_id' where id_user='$id' ");

    // mengalihkan halaman ke list barang
    header('location:index.php?page=user/user');
}
?>

<div class="container">
	<h1>Edit User</h1>
	<form method="post">

	  <div class="form-group">
	    <label>Nama User</label>
	    <input type="text" name="nama" class="form-control" placeholder="Nama User" value="<?=$data['nama']?>">
	  </div>
	  <div class="form-group">
	    <label>Username</label>
	    <input type="text" name="username" class="form-control" placeholder="Username" value="<?=$data['username']?>">
	  </div>
	  <div class="form-group">
	    <label>Password</label>
	    <input type="text" name="password" class="form-control" placeholder="password" value="<?=$data['password']?>">
	  </div>
      <div class="form-group">
    <label>Role Akses</label>
    <select name="role_id" class="form-control">
        <?php
        $roles = mysqli_query($dbconnect, "SELECT * FROM role");
        while ($role = mysqli_fetch_assoc($roles)) {
            $selected = ($role['id_role'] == $data['role_id']) ? 'selected' : '';
            echo "<option value='{$role['id_role']}' $selected>{$role['nama']}</option>";
        }
        ?>
    </select>
</div>

  	<input type="submit" name="update" value="Perbaruhi" class="btn btn-primary">
  	<a href="index.php?page=user/user" class="btn btn-warning">Kembali</a>
	</form>
</div>
