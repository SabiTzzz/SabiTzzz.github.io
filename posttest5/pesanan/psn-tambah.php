<?php
    include 'psn-koneksi.php';

    if (isset($_POST["submit"])) {
        $nama = $_POST["nama"];
        $alamat = $_POST["alamat"];
        $jersey = $_POST["jersey"];
        $jumlah = $_POST["jumlah"];
        $ukuran = $_POST["ukuran"];

        $sql = "INSERT INTO pesanan (nama, alamat, jersey, jumlah, ukuran) VALUES ('$nama', '$alamat', '$jersey', '$jumlah', '$ukuran')";

        if (mysqli_query($conn, $sql)) {
            echo "
            <script>
                alert('Data berhasil ditambahkan');
                document.location.href = '../pesan.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Data gagal ditambahkan');
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
    <title>Tambah Pesan</title>
    <link rel="stylesheet" href="../styles/pesan.css">
    <link rel="stylesheet" href="../styles/admin.css">
</head>
<body>
    <div class="container">
        <div class="box">
            <div class="box-register" id="register">
                <div class="top-header">
                    <h3>Tambah Data Pesanan</h3>
                </div>
                <div class="input-group">
                    <form action="" method="post">
                        <div class="input-field">
                            <input type="text" class="input-box" id="nama" name="nama" required>
                            <label for="nama">Nama</label>
                        </div>
                        <div class="input-field">
                            <input type="text" class="input-box" id="alamat" name="alamat" required>
                            <label for="alamat">Alamat</label>
                        </div>
                        <div class="input-field">
                            <label for="jersey"></label>
                            <select class="input-box" id="jersey" name="jersey" required>
                                <option value="">-- Pilih Jersey --</option>
                                <option value="jersey home 24/25">Jersey Home 24/25</option>
                                <option value="jersey away 24/25">Jersey Away 24/25</option>
                                <option value="jersey third 24/25">Jersey Third 24/25</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <input type="number" class="input-box" id="jumlah" name="jumlah" min="1" required>
                            <label for="jumlah">Jumlah</label>
                        </div>
                        <div class="input-field">
                            <label for="ukuran"></label>
                            <select class="input-box" id="ukuran" name="ukuran" required>
                                <option value="">-- Pilih Ukuran --</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <input type="submit" name="submit" class="input-submit" value="Tambah Pesanan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>