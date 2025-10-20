<?php
session_start();
include 'koneksidb.php';
include 'authcheck_kasir.php';

// Ambil semua transaksi terbaru
$query = mysqli_query($dbconnect, "SELECT * FROM transaksi ORDER BY tanggal_waktu ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Riwayat Transaksi</h2>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Nomor Transaksi</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Kasir</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($query)) {
            $tanggal = date('d-m-Y', strtotime($row['tanggal_waktu']));
            $waktu = date('H:i:s', strtotime($row['tanggal_waktu']));
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nomor'] ?></td>
                <td><?= $tanggal ?></td>
                <td><?= $waktu ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= number_format($row['total']) ?></td>
                <td>
                    <a href="transaksi_selesai.php?id_trx=<?= $row['id_transaksi'] ?>" class="btn btn-sm btn-info" target="_blank">Lihat Nota</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>