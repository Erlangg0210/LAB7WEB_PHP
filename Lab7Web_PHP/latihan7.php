<?php
$barang = "";
$hargaInput = "";
$jumlahInput = "";

$errors = [];
$hasil = null;

function e($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, "UTF-8");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $barang = isset($_POST["barang"]) && is_string($_POST["barang"])
        ? trim($_POST["barang"])
        : "";

    $hargaInput = isset($_POST["harga"]) && is_string($_POST["harga"])
        ? trim($_POST["harga"])
        : "";

    $jumlahInput = isset($_POST["jumlah"]) && is_string($_POST["jumlah"])
        ? trim($_POST["jumlah"])
        : "";

    if ($barang === "") {
        $errors[] = "Nama barang wajib diisi.";
    }

    if (
        !is_numeric($hargaInput) ||
        !is_finite((float) $hargaInput) ||
        (float) $hargaInput < 0
    ) {
        $errors[] = "Harga harus berupa angka minimal 0.";
    }

    $jumlahValid = filter_var($jumlahInput, FILTER_VALIDATE_INT);

    if (
        !ctype_digit($jumlahInput) ||
        $jumlahValid === false ||
        $jumlahValid < 1
    ) {
        $errors[] = "Jumlah harus berupa bilangan bulat minimal 1.";
    }

    if (empty($errors)) {
        $harga = (float) $hargaInput;
        $jumlah = $jumlahValid;
        $subtotal = $harga * $jumlah;

        if (!is_finite($subtotal)) {
            $errors[] = "Nilai transaksi terlalu besar.";
        } else {
            $hasil = [
                "barang" => $barang,
                "harga" => $harga,
                "jumlah" => $jumlah,
                "subtotal" => $subtotal
            ];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 7 - Subtotal Barang</title>
</head>
<body>
    <h1>Perhitungan Subtotal Barang</h1>

    <form method="POST" action="">
        <p>
            <label for="barang">Nama barang:</label><br>
            <input
                type="text"
                id="barang"
                name="barang"
                value="<?= e($barang) ?>"
                required
            >
        </p>

        <p>
            <label for="harga">Harga satuan:</label><br>
            <input
                type="number"
                id="harga"
                name="harga"
                min="0"
                step="0.01"
                value="<?= e($hargaInput) ?>"
                required
            >
        </p>

        <p>
            <label for="jumlah">Jumlah:</label><br>
            <input
                type="number"
                id="jumlah"
                name="jumlah"
                min="1"
                step="1"
                value="<?= e($jumlahInput) ?>"
                required
            >
        </p>

        <button type="submit">Hitung Subtotal</button>
    </form>

    <?php if (!empty($errors)): ?>
        <h2>Periksa kembali input</h2>
        <ul style="color: red;">
            <?php foreach ($errors as $error): ?>
                <li><?= e($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php elseif ($hasil !== null): ?>
        <hr>
        <h2>Ringkasan Transaksi</h2>

        <p>Nama barang: <?= e($hasil["barang"]) ?></p>
        <p>
            Harga satuan:
            Rp<?= number_format($hasil["harga"], 2, ",", ".") ?>
        </p>
        <p>Jumlah: <?= e($hasil["jumlah"]) ?></p>
        <p>
            Subtotal:
            Rp<?= number_format($hasil["subtotal"], 2, ",", ".") ?>
        </p>
    <?php endif; ?>
</body>
</html>