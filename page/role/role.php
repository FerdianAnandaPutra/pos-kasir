<?php
$view = $dbconnect->query("SELECT * FROM role");
include 'authcheck.php';
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
  <span>Role</span>
</h6>
<hr class="my-2">
	<div class="d-flex justify-content-between align-items-center mb-1">
    <a href="index.php?page=barang/barang_add" class="btn btn-primary">Tambah Data</a>
</div>
	<table class="table table-bordered">
		 <thead class="table-dark"> 
		<tr>
			<th>ID Role</th>
			<th>Nama</th>
			<!-- <th>Harga</th>
			<th>Jumlah Stok</th> -->
			<th>Aksi</th>
		</tr>
	</thead>
		<?php
        while ($row = $view->fetch_array()) { ?>
		<tr>
			<td> <?= $row['id_role'] ?> </td>
			<td><?= $row['nama'] ?></td>
			
			<td>
				<a href="index.php?page=role/role_edit&id=<?= $row['id_role'] ?>">Edit</a> |
				<a href="index.php?page=role/role_hapus&id=<?= $row['id_role'] ?>" 
				onclick="return confirm('apakah anda yakin?')">Hapus</a>
				</td>
		</tr>
		<?php }
        ?>
	</table>
</div>