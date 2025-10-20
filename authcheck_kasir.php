<?php

// Cek apakah sudah login
if (!isset($_SESSION['userid'])) {
    $_SESSION['error'] = 'Anda harus login dahulu';
    header('Location: login.php');
    exit;
}

// Cek apakah user bukan kasir (role_id != 2)
if ($_SESSION['role_id'] != 2) {
    header('Location: index.php'); // Arahkan ke halaman sesuai role lain (misalnya admin)
    exit;
}

// Jika lolos semua, maka halaman kasir bisa dilanjutkan
?>
