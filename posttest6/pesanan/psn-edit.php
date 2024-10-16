<?php
    include 'psn-koneksi.php';
    date_default_timezone_set('Asia/Makassar');

    $id = $_GET["id"];
    $result = mysqli_query($conn, "SELECT * FROM pesanan WHERE id = $id");
    while ($row = mysqli_fetch_assoc($result)) {
        $pesanan[] = $row;
    }
    $pesanan = $pesanan[0];

    if (isset($_POST["submit"])) {
        $nama = $_POST["nama"];
        $alamat = $_POST["alamat"];
        $jersey = $_POST["jersey"];
        $jumlah = $_POST["jumlah"];
        $ukuran = $_POST["ukuran"];
        $tmp_name = $_FILES["foto"]["tmp_name"];
        $file_name = $_FILES["foto"]["name"];
        $file_size = $_FILES["foto"]["size"];

        $ekstensi = explode(".", $file_name);
        $ekstensi = strtolower(end($ekstensi));

        $waktu = date("Y-m-d H.i.s");
        $maxfile_size = 1 * 1024 * 1024;

        if (!empty($file_name)) {
            if ($file_size > $maxfile_size) {
                echo "
                <script>
                    alert('⚠️ Ukuran file harus kurang dari 1MB');  
                </script>
                ";
                return false;
            } else if ($ekstensi !== 'png') {
                echo "
                <script>
                    alert('⚠️ Format file harus .png');
                </script>
                ";
            } else {
                $newFileName = $waktu . "." . $ekstensi;
                if (!empty($pesanan['foto'])) {
                    unlink("img/" . $pesanan['foto']);
                }
                move_uploaded_file($tmp_name, "img/" . $newFileName);
            }
        } else {
            $newFileName = $pesanan['foto'];
        }

        $sql = "UPDATE pesanan SET nama = '$nama', alamat = '$alamat', jersey = '$jersey', jumlah = '$jumlah', ukuran = '$ukuran', foto = '$newFileName' WHERE id = $id";

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
                    <form action="" method="post" enctype="multipart/form-data">
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
                                <option value="Jersey Home 24/25" <?= ($pesanan['jersey'] == 'Jersey Home 24/25') ? 'selected' : ''; ?>>Jersey Home 24/25</option>
                                <option value="Jersey Away 24/25" <?= ($pesanan['jersey'] == 'Jersey Away 24/25') ? 'selected' : ''; ?>>Jersey Away 24/25</option>
                                <option value="Jersey Third 24/25" <?= ($pesanan['jersey'] == 'Jersey Third 24/25') ? 'selected' : ''; ?>>Jersey Third 24/25</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <input type="number" class="input-box" id="jumlah" name="jumlah" min="1" value="<?= $pesanan['jumlah'] ?>" required>
                            <label for="jumlah">Jumlah</label>
                        </div>
                        <div class="input-field">
                            <select class="input-box" id="ukuran" name="ukuran" required>
                                <label for="ukuran"></label>
                                <option value="">-- Pilih Ukuran --</option>
                                <option value="S" <?= ($pesanan['ukuran'] == 'S') ? 'selected' : ''; ?>>S</option>
                                <option value="M" <?= ($pesanan['ukuran'] == 'M') ? 'selected' : ''; ?>>M</option>
                                <option value="L" <?= ($pesanan['ukuran'] == 'L') ? 'selected' : ''; ?>>L</option>
                                <option value="XL" <?= ($pesanan['ukuran'] == 'XL') ? 'selected' : ''; ?>>XL</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label for="foto"></label>
                            <input type="file" class="input-box" id="foto" name="foto" onchange="previewImage(this)">
                        </div>
                        <div class="foto-ttd">
                            <script>
                                function previewImage(input) {
                                    const preview = document.getElementById('foto-ttd');
                                    const file = input.files[0];
                                    const reader = new FileReader();

                                    reader.onload = function(e) {
                                        preview.src = e.target.result;
                                        preview.style.display = 'block';
                                    }
                                    reader.readAsDataURL(file);
                                }
                            </script>
                            <p>Foto Sebelumnya:</p>
                            <?php if ($pesanan['foto']): ?>
                                <img id="foto-ttd" src="img/<?= $pesanan['foto'] ?>" alt="Foto Sebelumnya" width="200" style="display: block;">
                            <?php endif; ?>
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
