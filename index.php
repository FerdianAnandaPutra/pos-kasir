<?php
session_start();
include 'koneksidb.php';

//fungsi dari membatasi hak akses
if (isset($_SESSION['userid'])) {
    if ($_SESSION['role_id'] == 2) {
        //redirect ke halaman kasir.php
        header('Location:kasir.php');
        exit;
    }
} else {
    $_SESSION['error'] = 'Anda harus login dahulu';
    header('location:login.php');
    exit;
}
?>
<?php ob_start(); ?>

<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kasir</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Google Font (Poppins) -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../../css/style.css">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
</head>

  <body>

  <!-- Navbar -->
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3 d-flex align-items-center" href="#" style="font-family: 'Poppins', sans-serif; font-size: 22px;">
        <img src="img/logo.png" alt="Logo" width="70" height="50" class="d-inline-block align-top mr-2">
        FERDI SPORT
        </a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
   <ul class="navbar-nav px-3">
  <li class="nav-item text-nowrap">
    <a class="btn btn-outline-light btn-sm" href="logout.php" onclick="return confirm('Yakin ingin logout?')">
      <i class="bi bi-box-arrow-right"></i> <strong>Logout</strong>
    </a>
  </li>
</ul>
</nav>

<!-- Container utama -->
<div class="container-fluid">
  <div class="row">
    
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <div class="px-3 mt-4 mb-2">

        <!-- Pemisah Master Data -->
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Master Data</span>
        <link rel="stylesheet" href="css/style.css">
        </h6>
        <hr class="my-1">

        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="index.php" style="font-size: 16px;">
              <i class="bi bi-speedometer2 me-2" style="font-size: 18px;"></i> <strong>Dashboard</strong>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=barang/barang" style="font-size: 16px;">
              <i class="bi bi-box-seam me-2" style="font-size: 18px;"></i> <strong>Barang</strong>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=user/user" style="font-size: 16px;">
              <i class="bi bi-person me-2" style="font-size: 18px;"></i> <strong>User</strong> 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=role/role" style="font-size: 16px;">
              <i class="bi bi-person-badge me-2" style="font-size: 18px;"></i> <strong>Role</strong>
            </a>
          </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=laporan/laporan" style="font-size: 16px;">
            <i class="bi bi-file-earmark-text me-2" style="font-size: 18px;"></i> <strong>Laporan</strong> 
        </a>
        </li>
        </ul>
      </div>
    </nav>

    <!-- Konten Utama -->
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

      <?php
      if (isset($_GET['page']) && $_GET['page'] != '') {
          include 'page/' . $_GET['page'] . '.php';
      } else {
          include 'page/home.php';
      }
      ?>
    </main>

  </div> <!-- penutup row -->
</div> <!-- penutup container-fluid -->
  </body>
  <?php ob_end_flush(); ?>
</html>