<?php
    require "psn-koneksi.php";

    $id = $_GET["id"];

    $sql = mysqli_query($conn, "DELETE FROM pesanan WHERE id = $id");

    if ($sql) {
        echo "
        <script>
            alert('Data berhasil dihapus');
            document.location.href = '../pesan.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal dihapus');
            document.location.href = '../pesan.php';
        </script>
        ";
    }
?>