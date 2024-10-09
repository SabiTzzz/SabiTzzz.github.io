<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BORNEO FC | Login Page</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logomerch">
                <a href="index.php">
                    <img src="assets/logo_borneofc.png" alt="BORNEO FC" width="50" height="60" />
                </a>
                <h>merchandise.</h>
            </div>

            <menu class="menu-navbar">
                <ul>
                    <li>
                        <a class="navbar-link" id="active" href="index.php#home"><b>Home</b></a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a class="navbar-link" href="index.php#merchandise"><b>Merchandise</b></a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a class="navbar-link" href="index.php#about"><b>About Me</b></a>
                    </li>
                </ul>
            </menu>

            <div class="buy-ham-toggle">
                <div class="buy-now">
                    <a href="" id="buy"><i data-feather="shopping-cart" width="30px" height="30px"></i></a>
                </div>
                <div class="darkmode-toggle">
                    <img src="assets/moon.png" alt="darkmode" id="icon" />
                </div>
                <div class="user">
                    <a href="tambah.php"><i class="fa-solid fa-user fa-2xl" style="color: #ffffff;"></i></a>
                </div>
                <div class="ham">
                    <button class="hamburger" id="hamburger">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </button>
                </div>
            </div>
        </nav>
    </header>
    <script text="text/javascript" src="scripts/script.js"></script>
    <script>feather.replace()</script>
</body>
</php>