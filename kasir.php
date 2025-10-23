<?php
include 'koneksidb.php';
session_start();
include 'authcheck_kasir.php';

$barang = mysqli_query($dbconnect, 'SELECT * FROM barang');
$sum = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $value) {
        $sum += (int)$value['harga'] * (int)$value['qty'];
    }
}

include 'includes/header.php';
?>

<div class="kasir-container">
  <div class="d-flex justify-content-between align-items-center mb-0">
    <h1>Kasir</h1>
    <div class="navbar-actions">
      <a href="logout.php">Logout</a> |
      <a href="keranjang_reset.php">Reset Keranjang</a> |
      <a href="riwayat.php">Riwayat Transaksi</a>
    </div>
  </div>

  <h4 class="mb-4">Hai, <?= $_SESSION['nama'] ?> 👋</h4>

  <div class="row g-2 mb-3">
    <form method="post" action="keranjang_act.php" class="d-flex flex-wrap gap-2">
      <select class="form-select" name="id_barang" required>
        <option value="">Pilih Barang</option>
        <?php while ($row = mysqli_fetch_array($barang)) { ?>
          <option value="<?= $row['id_barang'] ?>"><?= $row['nama'] ?></option>
        <?php } ?>
      </select>
      <input type="number" name="qty" class="form-control w-auto" placeholder="Jumlah" min="1" required>
      <button class="btn btn-primary">Tambah</button>
    </form>
  </div>

  <form method="post" action="keranjang_update.php">
    <div class="table-responsive">
      <table class="table table-bordered align-middle">
        <thead class="table-primary">
          <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Sub Total</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($_SESSION['cart'])): ?>
            <?php foreach ($_SESSION['cart'] as $value): ?>
              <tr>
                <td><?= $value['nama'] ?></td>
                <td>Rp <?= number_format($value['harga']) ?></td>
                <td class="col-md-2">
                  <input type="number" name="qty[]" value="<?= $value['qty'] ?>" class="form-control">
                </td>
                <td>Rp <?= number_format($value['qty'] * $value['harga']) ?></td>
                <td>
                  <a href="keranjang_hapus.php?id=<?= $value['id'] ?>" class="btn btn-sm btn-danger">
                    <i class="bi bi-trash"></i> Hapus
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr><td colspan="5" class="text-center text-muted">Belum ada barang</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
    <button type="submit" class="btn btn-success">Perbarui</button>
  </form>

  <div class="mt-4 d-flex justify-content-between align-items-center">
    <div class="fs-5 fw-bold">Total: Rp <?= number_format($sum) ?></div>
    <form action="transaksi_act.php" method="POST" class="text-end">
      <input type="hidden" name="total" value="<?= $sum ?>">
      <div class="form-group mb-2">
        <label class="fw-bold mb-1">Bayar</label>
        <input type="text" id="bayar" name="bayar" class="form-control" placeholder="Masukkan nominal">
      </div>
      <button type="submit" class="btn btn-primary w-100">Selesai</button>
    </form>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
