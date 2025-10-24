<?php
include 'koneksidb.php';
session_start();
include 'authcheck_kasir';

$qty = $_POST['qty'];

foreach (array_keys($_SESSION['cart']) as $i => $key) {
    $_SESSION['cart'][$key]['qty'] = $qty[$i];
}

header('location:kasir.php');
?>