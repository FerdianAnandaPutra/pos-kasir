<?php
$view = $dbconnect->query('SELECT * FROM barang ORDER BY nama ASC');
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
  <span>List Barang</span>
</h6>

<hr class="my-2">
	<div class="d-flex justify-content-between align-items-center mb-1">
    <a href="index.php?page=barang/barang_add" class="btn btn-primary">Tambah Data</a>
</div>
	<table class="table table-bordered table-striped table-hover shadow-sm">
    <thead class="table text-center">
        <tr>
            <th>ID Barang</th>
            <th>Kode Barang</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Jumlah Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $view->fetch_array()) { ?>
        <tr class="text-center align-middle">
            <td><?= $row['id_barang'] ?></td>
            <td><?= $row['kode_barang'] ?></td>
            <td class="text-left"><?= $row['nama'] ?></td>
            <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
            <td><?= $row['jumlah'] ?></td>
            <td>
                <a href="index.php?page=barang/barang_edit&id=<?= $row['id_barang'] ?>" class="btn btn-sm btn-warning">
                    <i class="bi bi-pencil-square"></i> Edit
                </a>
                <a href="index.php?page=barang/barang_hapus&id=<?= $row['id_barang'] ?>" 
                   class="btn btn-sm btn-danger"
                   onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">
                    <i class="bi bi-trash"></i> Hapus
                </a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>