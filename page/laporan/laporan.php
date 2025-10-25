<?php
include 'koneksidb.php';
include 'authcheck.php';

// Filter tanggal
$where = '';
if (isset($_POST['filter_tanggal'])) {
    $dari = $_POST['dari'];
    $sampai = $_POST['sampai'];
    $where = "WHERE DATE(tanggal_waktu) BETWEEN '$dari' AND '$sampai'";
}

// Query ambil data
$query = "SELECT * FROM transaksi $where ORDER BY tanggal_waktu DESC";
$result = mysqli_query($dbconnect, $query);

if (!$result) {
    die("Query error: " . mysqli_error($dbconnect));
}
?>
<!-- Pemisah Laporan -->
<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted" style="font-size: 25px;">
  <span>Laporan Penjualan</span>
</h6>
<hr class="my-2">

<form method="post" class="form-inline mb-3">
        <label class="mr-2">Dari:</label>
        <input type="date" name="dari" class="form-control mr-2" required>
        <label class="mr-2">Sampai:</label>
        <input type="date" name="sampai" class="form-control mr-2" required>
        <button type="submit" name="filter_tanggal" class="btn btn-primary mt-2">Filter</button>
    </form>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>No. Transaksi</th>
                <th>Total</th>
                <th>Bayar</th>
                <th>Kembali</th>
                <th>Kasir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= date('d-m-Y H:i:s', strtotime($row['tanggal_waktu'])) ?></td>
                <td><?= $row['nomor'] ?></td>
                <td>Rp <?= number_format($row['total'], 0, ',', '.') ?></td>
                <td>Rp <?= number_format($row['bayar'], 0, ',', '.') ?></td>
                <td>Rp <?= number_format($row['kembali'], 0, ',', '.') ?></td>
                <td><?= $row['nama'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>