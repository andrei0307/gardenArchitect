<?php

session_start();
require_once("dbcontroller.php");
include_once("config.php");
$db_handle = new DBController();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="./images/head.ico" type="image/x-icon">

   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="./css/styles.css">

    <title>Home</title>
</head>

<body class="home-background">

    <header>
        <nav class="nav main-nav">
            <ul>
                <li><a href="index.php">Pagina Principala</a></li>
                <li><a href="list.php">Produse</a></li>
                <li><a href="editProfile.php">Editare Cont</a></li>
                <li><a href="cart.php"><i class='bx bx-cart'></i></a></li>
                <li><a href="account.php"><i class='bx bx-user-pin'></i></a></li>
                <?php if(isset($_SESSION["user"])){ echo '<li><a href="logout.php">Logout</a></li>';} ?>
            </ul>
        </nav>
        <h1 class="shop-name shop-name-large">Garden Architect</h1>
        <div class="Container">
            <h2 class="quote">"How lovely is the silence of growing things"</h2>
        </div>

    </header>

    <main class="main">
        <section class="section categories">
            <div class="title">
                <h1>Categorii</h1>
            </div>

            <div class="categories-center container">
                <a href="flowers.php">
                    <div class="categories-box">
                        <div class="content">
                            <h2>
                                Flori
                            </h2>
                        </div>

                        <img src="./images/categories/pic1.jpg" alt="">
                    </div>
                </a>
                <a href="trees.php">
                    <div class="categories-box">
                        <div class="content">
                            <h2>
                                Arbori
                            </h2>
                        </div>

                        <img src="./images/categories/pic2.jpg" alt="">
                    </div>
                </a>
                <a href="furniture.php">
                    <div class="categories-box">
                        <div class="content">
                            <h2>
                                Mobilier <br>de gradina
                            </h2>
                        </div>

                        <img src="./images/categories/pic3.jpg" alt="">
                    </div>
                </a>
                <a href="ornaments.php">
                    <div class="categories-box">
                        <div class="content">
                            <h2>
                                Ornamente <br>de gradina
                            </h2>
                        </div>

                        <img src="./images/categories/pic4.jpg" alt="">
                    </div>
                </a>
            </div>
        </section>
    </main>

    <footer class="main-footer">

        <div class="container main-footer-container">
            <h3 class="shop-name">Garden Architect</h3>

            <ul class="nav footer-nav">
                <li>
                    <a href="https://youtube.com" target="_blank">
                        <img src="images/Contact/Facebook Logo.png">
                    </a>
                </li>
                <li>
                    <a href="https://www.spotify.com" target="_blank">
                        <img src="images/Contact/Spotify Logo.png">
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com" target="_blank">
                        <img src="images/Contact/YouTube Logo.png">
                    </a>
                </li>
            </ul>
            <div class="container contact">
                <h3>CONTACT</h3>
                <p>Bulevardul Marin Sorescu nr. 39-49 Sector 5, BUCURESTI</p>
                <p>Email: gardenarchitect@gmail.com</p>
                <p>Tel: 0744872819 | FIX: 0230336037</p>
            </div>

        </div>

    </footer>

</body>

</html>