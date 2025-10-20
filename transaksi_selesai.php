<?php
session_start();
include 'koneksidb.php';
include 'authcheck_kasir.php';

$id_trx = $_GET['id_trx'];

$data = mysqli_query($dbconnect, "SELECT * FROM transaksi WHERE id_transaksi='$id_trx'");
$trx = mysqli_fetch_assoc($data);

$detail = mysqli_query($dbconnect, "SELECT transaksi_detail.*,barang.nama FROM `transaksi_detail` INNER JOIN barang ON transaksi_detail.id_barang=barang.id_barang WHERE transaksi_detail.id_transaksi='$id_trx'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir Selesai</title>
    <style type= "text/css">
        body{
            color: #a7a7a7;
        }
    </style>
    
</head>
<body>
    <div align="center">
        <table width="500" border="0" cellpadding="1" cellspacing="0">
            <tr>
                <th>FERDI SPORT <br>
            JL RAYA KEDIRI - PLOSOKLATEN <br>
        TURUS GURAH KEDIRI</th>
            </tr>
            <tr align="center"><td><hr></td></tr>
            <tr>
                <td style="padding-left: 2px;">No : <?=$trx['nomor']?></td>
            </tr>
            <tr>
                <td style="padding-left: 2px;">
                    Tanggal : <?=date('d-m-Y', strtotime($trx['tanggal_waktu']))?>
                    <span style="float: right; padding-right: 2px;">
                        <?=date('H:i:s', strtotime($trx['tanggal_waktu']))?>
                    </span>
                </td>
            </tr>
            <tr>
                <td style="padding-left: 2px;">Kasir : <?=$trx['nama']?></td>
            </tr>
            <tr><td><hr></td></tr>
        </table>
        <table width="500" border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th style="text-align: left; padding: 5px;">Nama</th>
                <th style="text-align: center; padding: 5px;">Qty</th>
                <th style="text-align: right; padding: 5px;">Harga</th>
                <th style="text-align: right; padding: 5px;">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_array($detail)){ ?>
            <tr>
                <td style="text-align: left; padding: 5px;"><?=$row['nama']?></td>
                <td style="text-align: center; padding: 5px;"><?=$row['qty']?></td>
                <td style="text-align: right; padding: 5px;"><?=number_format($row['harga'])?></td>
                <td style="text-align: right; padding: 5px;"><?=number_format($row['total'])?></td>
            </tr>
            <?php } ?>
        </tbody>
            <tr>
                <td colspan="4"><hr></td>
            </tr>
            <tr>
                <td align="right" colspan="3">Total</td>
                <td align="right"><?=number_format($trx['total'])?></td>
            </tr>
            <tr>
                <td align="right" colspan="3">Bayar</td>
                <td align="right"><?=number_format($trx['bayar'])?></td>
            </tr>
            <tr>
                <td align="right" colspan="3">Kembali</td>
                <td align="right"><?=number_format($trx['kembali'])?></td>
            </tr>  
        </table>
        <table width="500" border="0" cellpadding="1" cellspacing="0">
            <tr><td><hr></td></tr>
            <tr>
                <th>***Terima Kasih***</th>
            </tr>
            <tr>
                <th>=== Silahkan Datang Kembali ===</th>
            </tr>
            <tr>
                <th>"Barang Yang Sudah Dibeli Tidak Dapat Di Kembalikan Kecuali Ada Perjanjian"</th>
            </tr>
        </table>
    </div>
    
    <script>
window.onload = function() {
    window.print();
}
</script>

</body>
</html>