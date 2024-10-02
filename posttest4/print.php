<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $regNama = $_POST['regNama'];
    $regEmail = $_POST['regEmail'];
    $regPassword = $_POST['regPassword'];
} else {
    header('Location: daftar.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Berhasil</title>
    <link rel="stylesheet" href="styles/print.css">
</head>
<body>

<div class="box">
    <div class="header">Registrasi Berhasil</div>
    <div class="message">Selamat datang, <?php echo htmlspecialchars($regNama); ?>!</div>
    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td class="spasi"><?php echo htmlspecialchars($regNama); ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td class="spasi"><?php echo htmlspecialchars($regEmail); ?></td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td class="spasi"><?php echo htmlspecialchars($regPassword); ?></td>
        </tr>
    </table>
    <div class="back-button">
        <button onclick="window.location.href='index.html'">Kembali ke Halaman Utama</button>
    </div>
</div>

</body>
</html>

