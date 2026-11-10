<?php
function hitungDiskon($harga, $persen)
{
    $potongan = $harga * ($persen / 100);
    return $harga - $potongan;
}

function hitungLuasPersegiPanjang($panjang, $lebar)
{
    return $panjang * $lebar;
}

$harga = 150000;
$diskon = 10;
$hargaAkhir = hitungDiskon($harga, $diskon);

$panjang = 8;
$lebar = 4;
$luas = hitungLuasPersegiPanjang($panjang, $lebar);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 4 - Function</title>
</head>
<body>
    <h1>Penggunaan Function</h1>

    <h2>Perhitungan Diskon</h2>
    <p>Harga awal: Rp<?= number_format($harga, 0, ",", ".") ?></p>
    <p>Diskon: <?= $diskon ?>%</p>
    <p>
        Harga setelah diskon:
        Rp<?= number_format($hargaAkhir, 0, ",", ".") ?>
    </p>

    <hr>

    <h2>Luas Persegi Panjang</h2>
    <p>Panjang: <?= $panjang ?> cm</p>
    <p>Lebar: <?= $lebar ?> cm</p>
    <p>Luas: <?= $luas ?> cm²</p>
</body>
</html>