<?php
session_start();
include_once("config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/styles.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="./images/user.ico" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <title>Editare Cont</title>
</head>

<body>
    <header class="edit-background">

        <nav class="main-nav nav">
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

    </header>

    <main>
        <section class="edit-container content-section">
            <h2 class="section-header">Editare Cont</h2>
            <form method="post" action="user_update.php">
                <div class="edit-row">
                    <span class="edit-header edit-column">Nume Curent</span>
                    <span class="edit-header edit-column">Nume Nou</span>
                </div>

                <div class="edit-row">
                
                    <span class="edit-input"><input type='text' name="csurname" class='edit-input-field' value="<?php  if(isset($_SESSION["user"])){ echo $_SESSION["user"]["surname"];} ?>"></span>
                    <span class="edit-input"><input type='text' name="nsurname" class='edit-input-field'></span>
                    <div class="edit-input">
                        <button class="edit-confirm-button" type="submit" name="editsurname" role="button">CONFIRMARE</button>
                    </div>
                </div>

                <div class="edit-row">
                    <span class="edit-header edit-column">Prenume Curent</span>
                    <span class="edit-header edit-column">Prenume Nou</span>
                </div>

                <div class="edit-row">
                    <span class="edit-input"><input type='text' name="cfirstname" class='edit-input-field' value="<?php if(isset($_SESSION["user"])){ echo $_SESSION["user"]["firstname"];} ?>"></span>
                    <span class="edit-input"><input type='text' name="nfirstname" class='edit-input-field'></span>
                    <div class="edit-input">
                        <button class="edit-confirm-button" type="submit" name="editfirstname" role="button">CONFIRMARE</button>
                    </div>
                </div>

                <div class="edit-row">
                    <span class="edit-header edit-column">Adresa Mail Curenta</span>
                    <span class="edit-header edit-column">Adresa Mail Noua</span>
                </div>

                <div class="edit-row">
                    <span class="edit-input"><input type='email' name="cemail" class='edit-input-field' value="<?php  if(isset($_SESSION["user"])){ echo $_SESSION["user"]["email"];} ?>"></span>
                    <span class="edit-input"><input type='email' name="nemail" class='edit-input-field'></span>
                    <div class="edit-input">
                        <button class="edit-confirm-button" type="submit" name="editmail" role="button">CONFIRMARE</button>
                    </div>
                </div>

                <div class="edit-row">
                    <span class="edit-header edit-column">Parola Curenta</span>
                    <span class="edit-header edit-column">Parola Noua</span>
                </div>

                <div class="edit-row">
                    <span class="edit-input"><input type='password' name="cpassword" class='edit-input-field'></span>
                    <span class="edit-input"><input type='password' name="npassword" class='edit-input-field'></span>
                    <div class="edit-input">
                        <button class="edit-confirm-button" type="submit" name="editpassword" role="button">CONFIRMARE</button>
                    </div>
                </div>
            </form>
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
            <div class="contact">
                <h3>CONTACT</h3>
                <p>Bulevardul Marin Sorescu nr. 39-49 Sector 5, BUCURESTI</p>
                <p>Email: gardenarchitect@gmail.com</p>
                <p>Tel: 0744872819 | FIX: 0230336037</p>
            </div>

        </div>

    </footer>
</body>

</html>