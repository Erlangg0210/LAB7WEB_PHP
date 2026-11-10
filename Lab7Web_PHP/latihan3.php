<?php
$mahasiswa = [
    "Alya",
    "Bima",
    "Citra",
    "Doni",
    "Eka",
    "Farhan",
    "Gita"
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 3 - Array dan Perulangan</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <ol>
        <?php foreach ($mahasiswa as $nama): ?>
            <li>
                <?= htmlspecialchars($nama, ENT_QUOTES, "UTF-8") ?>
            </li>
        <?php endforeach; ?>
    </ol>

    <p>Jumlah mahasiswa: <?= count($mahasiswa) ?></p>
</body>
</html>