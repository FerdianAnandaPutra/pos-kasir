<?php
session_start(); // Tambahkan ini jika belum ada
include 'koneksidb.php';
include 'authcheck_kasir.php';

$id = $_GET['id'];

// Pastikan $_SESSION['cart'] terdefinisi
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Ambil cart dari session
$cart = $_SESSION['cart'];

// Filter data sesuai ID
$k = array_filter($cart, function ($var) use ($id) {
    return ($var['id'] == $id);
});

// Hapus item dari cart
foreach ($k as $key => $value) {
    unset($_SESSION['cart'][$key]);
}

// Reset index array
$_SESSION['cart'] = array_values($_SESSION['cart']);

// Redirect kembali ke halaman kasir
header('Location: kasir.php');
exit;
?>
