<!-- link ke nav.php -->
<?php 
    include 'expand/nav.php'; 
    require "koneksi.php";

    if (isset($_POST["submit"])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $verif_email = mysqli_query($conn, "SELECT email FROM akun WHERE email = '$email'");

        if(mysqli_num_rows($verif_email) != 0) {
            echo "
            <script>
                alert('⚠️ Email sudah terdaftar');
            </script>
            ";
        }
        else {
            $sql = "INSERT INTO akun (username, email, password) VALUES ('$username', '$email', '$password')";

            if (mysqli_query($conn, $sql)) {
                echo "
                <script>
                    alert('Data berhasil ditambahkan');
                    document.location.href = 'admin.php';
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
    }

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
    <title>Borneo FC | Login Page</title>
    <link rel="stylesheet" href="styles/daftar.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="box">
            <div class="box-register" id="register">
                <div class="top-header">
                    <h3>Tambah Data</h3>
                </div>
                <div class="input-group">
                    <form action="" method="post">
                        <div class="input-field">
                            <input type="text" class="input-box" id="username" name="username" required>
                            <label for="username">Username</label>
                        </div>
                        <div class="input-field">
                            <input type="text" class="input-box" id="email" name="email" required>
                            <label for="email">Email address</label>
                        </div>
                        <div class="input-field">
                            <input type="password" class="input-box" id="password" name="password" required>
                            <label for="password">Password</label>
                            <div class="eye-area">
                                <div class="eye-box" onclick="mypassword()">
                                    <i class="fa-regular fa-eye" id="eye-2"></i>
                                    <i class="fa-regular fa-eye-slash" id="eye-slash-2"></i>
                                </div>
                            </div>
                        </div>
                        <div class="remember">
                            <input type="checkbox" id="formCheck2" class="check">
                            <label for="formCheck2">Remember Me</label>
                        </div>
                        <div class="input-field">
                            <input type="submit" name="submit" class="input-submit" value="Tambah">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function mypassword() {
            var d = document.getElementById("password");
            var b = document.getElementById("eye-2");
            var c = document.getElementById("eye-slash-2");

            if (d.type === "password") {
                d.type = "text";
                b.style.opacity = "0";
                c.style.opacity = "1";
            } else {
                d.type = "password";
                b.style.opacity = "1";
                c.style.opacity = "0";
            }
        }
    </script>
</body>
</html>

<!-- link ke footer.php -->
<?php require 'expand/footer.php' ?>