<?php
include 'authcheck.php';
$view = $dbconnect->query("SELECT u.*,r.nama as nama_role FROM user as u INNER JOIN role as r ON u.role_id=r.id_role");
?>

<div class="container">

<?php if (isset($_SESSION['success']) && $_SESSION['success'] != '') {?>

<div class="alert alert-success text-center" role="alert" style="font-size:18px;">
	<strong>Berhasil</strong> <?=$_SESSION['success']?>
</div>

<?php 
unset($_SESSION['success']);
} 
?>

	<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted" style="font-size: 25px;">
  <span>User</span>
</h6>
<hr class="my-2">
	<div class="d-flex justify-content-between align-items-center mb-1">
    <a href="index.php?page=barang/barang_add" class="btn btn-primary">Tambah Data</a>
</div>
	<table class="table table-bordered">
		 <thead class="table-dark"> 
		<tr>
			<th>ID User</th>
			<th>Nama</th>
			<th>Username</th>
            <th>Password</th>
			<th>Role Akses</th>
			<th>Aksi</th>
		</tr>
	</thead>
		<?php
        while ($row = $view->fetch_array()) { ?>
		<tr>
			<td> <?= $row['id_user'] ?> </td>
			<td><?= $row['nama'] ?></td>
			<td><?=$row['username']?></td>
            <td><?=$row['password']?></td>
			<td><?=$row['nama_role']?></td>
			<td>
				<a href="index.php?page=user/user_edit&id=<?= $row['id_user'] ?>">Edit</a> |
				<a href="index.php?page=user/user_hapus&id=<?= $row['id_user'] ?>" 
				onclick="return confirm('apakah anda yakin?')">Hapus</a>
				</td>
		</tr>
		<?php }
        ?>
	</table>
</div>