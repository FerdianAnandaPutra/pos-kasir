<?php
include 'koneksidb.php';
session_start();
include 'authcheck_kasir';

$qty = $_POST['qty'];

foreach ($_SESSION['cart'] as $key => $value){
    
    $_SESSION['cart'][$key]['qty'] = $qty[$key];
}
header('location:kasir.php');
?>