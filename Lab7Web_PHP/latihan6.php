<?php
$nama = "";
$prodi = "";
$error = "";
$berhasil = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = isset($_POST["nama"]) && is_string($_POST["nama"])
        ? trim($_POST["nama"])
        : "";

    $prodi = isset($_POST["prodi"]) && is_string($_POST["prodi"])
        ? trim($_POST["prodi"])
        : "";

    if ($nama === "" || $prodi === "") {
        $error = "Semua kolom wajib diisi.";
    } else {
        $berhasil = true;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 6 - Form POST</title>
</head>
<body>
    <h1>Form Data Mahasiswa dengan POST</h1>

    <form method="POST" action="">
        <p>
            <label for="nama">Nama:</label><br>
            <input
                type="text"
                id="nama"
                name="nama"
                value="<?= htmlspecialchars($nama, ENT_QUOTES, "UTF-8") ?>"
                required
            >
        </p>

        <p>
            <label for="prodi">Program studi:</label><br>
            <input
                type="text"
                id="prodi"
                name="prodi"
                value="<?= htmlspecialchars($prodi, ENT_QUOTES, "UTF-8") ?>"
                required
            >
        </p>

        <button type="submit">Kirim Data</button>
    </form>

    <?php if ($error !== ""): ?>
        <p style="color: red;">
            <?= htmlspecialchars($error, ENT_QUOTES, "UTF-8") ?>
        </p>
    <?php elseif ($berhasil): ?>
        <hr>
        <h2>Data diterima</h2>
        <p>
            Nama:
            <?= htmlspecialchars($nama, ENT_QUOTES, "UTF-8") ?>
        </p>
        <p>
            Program studi:
            <?= htmlspecialchars($prodi, ENT_QUOTES, "UTF-8") ?>
        </p>
    <?php endif; ?>
</body>
</html>