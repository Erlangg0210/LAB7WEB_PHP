<?php
$kata = "";
$dikirim = isset($_GET["kata"]);

if ($dikirim && is_string($_GET["kata"])) {
    $kata = trim($_GET["kata"]);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 5 - Form GET</title>
</head>
<body>
    <h1>Form Kata Kunci dengan GET</h1>

    <form method="GET" action="">
        <label for="kata">Kata kunci:</label>
        <input
            type="text"
            id="kata"
            name="kata"
            value="<?= htmlspecialchars($kata, ENT_QUOTES, "UTF-8") ?>"
        >

        <button type="submit">Cari</button>
    </form>

    <?php if ($dikirim): ?>
        <hr>

        <?php if ($kata === ""): ?>
            <p>Kata kunci belum diisi.</p>
        <?php else: ?>
            <p>
                Kata kunci:
                <?= htmlspecialchars($kata, ENT_QUOTES, "UTF-8") ?>
            </p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>