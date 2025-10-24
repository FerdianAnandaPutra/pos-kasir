<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kasir Modern</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Select2 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <!-- jQuery (dibutuhkan oleh Select2) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Select2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<style>
body {
  background-color: #f5f7fa;
  font-family: 'Poppins', sans-serif;
  overflow-x: hidden;
  margin: 0;
  padding: 0;
}

.kasir-container {
  max-width: 1400px;
  background: white;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
  padding: 35px;
  box-sizing: border-box;
  overflow-x: hidden;
}

/* Pastikan tabel tidak membuat lebar berlebih */
.table-responsive {
  width: 100%;
  overflow-x: auto;
}
.table th, .table td {
  white-space: nowrap;
}

/* Biar tombol dan form tetap sejajar tanpa lebar berlebih */
form.d-flex.flex-wrap {
  flex-wrap: wrap;
  gap: 10px;
  width: 100%;
}
.form-select, .form-control, .btn {
  max-width: 100%;
}

/* Biar layout mobile tetap rapi */
@media (max-width: 768px) {
  .kasir-container {
    padding: 15px;
    margin: 10px;
  }
  .d-flex.justify-content-between {
    flex-direction: column;
    gap: 10px;
  }
}
 .select2-container .select2-selection--single {
    height: 43px !important;        /* tinggi form */
    font-size: 16px;                /* ukuran font */
    display: flex;
    align-items: center;
  }

  .select2-selection__rendered {
    line-height: 48px !important;
    padding-left: 12px !important;
  }

  .select2-selection__arrow {
    height: 48px !important;
  }
</style>
</head>
<body>
