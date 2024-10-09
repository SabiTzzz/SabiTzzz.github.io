<?php
include 'psn-koneksi.php';

$id = $_GET["id"];
$result = mysqli_query($conn, "SELECT * FROM pesanan WHERE id = $id");
$pesanan = mysqli_fetch_assoc($result); 

if (isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $jersey = $_POST["jersey"];
    $jumlah = $_POST["jumlah"];
    $ukuran = $_POST["ukuran"];

    $sql = "UPDATE pesanan SET nama = '$nama', alamat = '$alamat', jersey = '$jersey', jumlah = '$jumlah', ukuran = '$ukuran' WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "
        <script>
            alert('Data berhasil diubah');
            document.location.href = '../pesan.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal diubah');
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan</title>
    <link rel="stylesheet" href="../styles/pesan.css">
    <link rel="stylesheet" href="../styles/admin.css">
</head>
<body>
    <div class="container">
        <div class="box">
            <div class="box-register" id="register">
                <div class="top-header">
                    <h3>Edit Data Pesanan</h3>
                </div>
                <div class="input-group">
                    <form action="" method="post">
                        <div class="input-field">
                            <input type="text" class="input-box" id="nama" name="nama" value="<?= $pesanan['nama'] ?>" required>
                            <label for="nama">Nama</label>
                        </div>
                        <div class="input-field">
                            <input type="text" class="input-box" id="alamat" name="alamat" value="<?= $pesanan['alamat'] ?>" required>
                            <label for="alamat">Alamat</label>
                        </div>
                        <div class="input-field">
                            <label for="jersey"></label>
                            <select class="input-box" id="jersey" name="jersey" required>
                                <option value="">-- Pilih Jersey --</option>
                                <option value="jersey home 24/25" <?= ($pesanan['jersey'] == 'jersey home 24/25') ? 'selected' : ''; ?>>Jersey Home 24/25</option>
                                <option value="jersey away 24/25" <?= ($pesanan['jersey'] == 'jersey away 24/25') ? 'selected' : ''; ?>>Jersey Away 24/25</option>
                                <option value="jersey third 24/25" <?= ($pesanan['jersey'] == 'jersey third 24/25') ? 'selected' : ''; ?>>Jersey Third 24/25</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <input type="number" class="input-box" id="jumlah" name="jumlah" min="1" value="<?= $pesanan['jumlah'] ?>" required>
                            <label for="jumlah">Jumlah</label>
                        </div>
                        <div class="input-field">
                            <label for="ukuran"></label>
                            <select class="input-box" id="ukuran" name="ukuran" required>
                                <option value="">-- Pilih Ukuran --</option>
                                <option value="S" <?= ($pesanan['ukuran'] == 'S') ? 'selected' : ''; ?>>S</option>
                                <option value="M" <?= ($pesanan['ukuran'] == 'M') ? 'selected' : ''; ?>>M</option>
                                <option value="L" <?= ($pesanan['ukuran'] == 'L') ? 'selected' : ''; ?>>L</option>
                                <option value="XL" <?= ($pesanan['ukuran'] == 'XL') ? 'selected' : ''; ?>>XL</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <input type="submit" name="submit" class="input-submit" value="Ubah Pesanan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
