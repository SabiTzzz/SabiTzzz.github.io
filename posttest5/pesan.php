<?php
    require "pesanan/psn-koneksi.php";

    $sql = mysqli_query($conn, "SELECT * FROM pesanan");
    $pesanan = [];
    while ($row = mysqli_fetch_assoc($sql)) {
        $pesanan[] = $row;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borneo FC | Pesanan</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="styles/pesan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="box">
            <h1>Pesanan</h1>
            <table border="1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jersey</th>
                        <th>Jumlah</th>
                        <th>Ukuran</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach ($pesanan as $order) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= htmlspecialchars($order["nama"]) ?></td>
                        <td><?= htmlspecialchars($order["alamat"]) ?></td>
                        <td><?= htmlspecialchars($order["jersey"]) ?></td>
                        <td><?= htmlspecialchars($order["jumlah"]) ?></td>
                        <td><?= htmlspecialchars($order["ukuran"]) ?></td>
                        <td id="btn">
                            <a title="Edit" href="pesanan/psn-edit.php?id=<?= $order['id'] ?>" class="action-button edit">
                                <i class="fa-solid fa-pen-to-square" style="color: white;"></i>
                            </a>
                            <a title="Delete" href="pesanan/psn-hapus.php?id=<?= $order['id'] ?>" class="action-button delete" onclick="return confirm('Yakin ingin menghapus data?')">
                                <i class="fa-solid fa-trash" style="color: white;"></i>
                            </a>
                        </td>
                    </tr>
                    <?php $i++; endforeach; ?>
                </tbody>
            </table>
            <div class="input-field" style="margin-top: 20px;">
                <a href="pesanan/psn-tambah.php" class="input-submit">Tambah Data Pesanan</a>
            </div>
        </div>
    </div>
</body>
</html>
