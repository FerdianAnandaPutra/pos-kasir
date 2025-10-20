<?php
session_start();
include 'koneksidb.php';
include 'authcheck_kasir.php';

$bayar = preg_replace('/\D/','',$_POST['bayar']);

// Simpan ke tabel transaksi
$tanggal_waktu = date('Y-m-d H:i:s');
$nomor = rand(111111, 999999);
$total = $_POST['total'];
$nama = $_SESSION['nama'];
$kembali = $bayar - $total;

mysqli_query($dbconnect, "INSERT INTO transaksi (id_transaksi, tanggal_waktu, nomor, total, nama, bayar, kembali) 
VALUES (NULL, '$tanggal_waktu', '$nomor', '$total', '$nama','$bayar', '$kembali')");

$id_transaksi = mysqli_insert_id($dbconnect);

// Simpan detail transaksi
foreach ($_SESSION['cart'] as $key => $value) {
    $id_barang = $value['id'];
    $harga = $value['harga'];
    $qty = $value['qty'];
    $tot = $harga * $qty;

    // Simpan ke tabel detail_transaksi
   

    mysqli_query($dbconnect, "INSERT INTO transaksi_detail (id_transaksi_detail, id_transaksi, id_barang, qty, harga, total)
    VALUES (NULL, '$id_transaksi', '$id_barang', '$qty', '$harga', '$tot')");

    // Kurangi stok barang
    mysqli_query($dbconnect, "UPDATE barang SET jumlah = jumlah - $qty WHERE id_barang = '$id_barang'");
}
 
// Reset keranjang
unset($_SESSION['cart']);
$_SESSION['success'] = "Transaksi berhasil dilakukan.";

header("Location: transaksi_selesai.php?id_trx= $id_transaksi");
exit();
?>