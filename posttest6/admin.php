<?php 
    include 'expand/nav.php';
    require "koneksi.php";
    $sql = mysqli_query($conn, "SELECT * FROM akun");

    $akun = [];

    while ($row = mysqli_fetch_assoc($sql)) {
        $akun[] = $row;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola User</title>
    <link rel="stylesheet" href="styles/admin.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="box">
            <h1>Kelola User</h1>
            <table border="1">
                <thead>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php $i = 1; foreach($akun as $akun) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $akun["username"] ?></td>
                        <td><?= $akun["email"] ?></td>
                        <td><?= $akun["password"] ?></td>
                        <td id="btn">
                            <a title="Edit" href="edit.php?id=<?= $akun["id"] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a title="Delete" href="hapus.php?id=<?= $akun["id"] ?>" onclick="return confirm ('Yakin ingin menghapus data?')"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php $i++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php require 'expand/footer.php'; ?>