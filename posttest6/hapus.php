<?php
    require "koneksi.php";

    $id = $_GET["id"];

    $sql = mysqli_query($conn, "DELETE FROM akun WHERE id = $id");

    if ($sql) {
        echo "
        <script>
            alert('Data berhasil dihapus');
            document.location.href = 'admin.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal dihapus');
            document.location.href = 'admin.php';
        </script>
        ";
    }
?>