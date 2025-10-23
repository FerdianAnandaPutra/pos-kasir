<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kasir Modern</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
</style>
</head>
<body>
