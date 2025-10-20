<?php
// Hitung total barang
$total_barang = mysqli_num_rows(mysqli_query($dbconnect, "SELECT * FROM barang"));

// Hitung total penjualan hari ini
$query_penjualan = mysqli_query($dbconnect, "SELECT SUM(total) as total FROM transaksi WHERE DATE(tanggal_waktu) = CURDATE()");
$data_penjualan = mysqli_fetch_assoc($query_penjualan);
$penjualan_hari_ini = $data_penjualan['total'] ?? 0; // jika null, jadi 0

// Hitung stok yang hampir habis
$stok_minimal = mysqli_num_rows(mysqli_query($dbconnect, "SELECT * FROM barang WHERE jumlah < 10"));

// Hitung jumlah user
$jumlah_user = mysqli_num_rows(mysqli_query($dbconnect, "SELECT * FROM user"));
?>

<h2 class="mt-3">Dashboard</h2>
<div class="row">
  <div class="col-md-3">
    <div class="card bg-primary text-white mb-3">
      <div class="card-body">
        <h5 class="card-title">Total Barang</h5>
        <p class="card-text fs-4"><?= $total_barang ?></p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card bg-success text-white mb-3">
      <div class="card-body">
        <h5 class="card-title">Penjualan Hari Ini</h5>
        <p class="card-text fs-4">Rp <?= number_format($penjualan_hari_ini) ?></p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card bg-warning text-white mb-3">
      <div class="card-body">
        <h5 class="card-title">Stok Hampir Habis</h5>
        <p class="card-text fs-4"><?= $stok_minimal ?></p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card bg-danger text-white mb-3">
      <div class="card-body">
        <h5 class="card-title">Jumlah User</h5>
        <p class="card-text fs-4"><?= $jumlah_user ?></p>
      </div>
    </div>
  </div>
</div>