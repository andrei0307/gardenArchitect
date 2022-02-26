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

    <link rel="stylesheet" href="./css/styles.css?v=<?php echo time(); ?>">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="./images/user.ico" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <title>Administrare Conturi</title>
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
            <h2 class="section-header">Administrare Conturi</h2>

            <div class="edit-row">
                <span class="edit-header admin-column">Nume</span>
                <span class="edit-header admin-column">Prenume</span>
                <span class="edit-header admin-column">Email</span>

            </div>
            <?php
            $product_array = $db_handle->runQuery("SELECT * FROM users");
            if (!empty($product_array)) {
                foreach ($product_array as $key => $value) {
            ?>
                    <form method="post" action="#">
                        <div class="edit-row">
                            <span class="admin-column"><input type='text' name="csurname" class='account-input-field' value="<?php echo $product_array[$key]["surname"]; ?>"></span>
                            <span class="admin-column"><input type='text' name="cfirstname" class='account-input-field' value="<?php echo $product_array[$key]["firstname"]; ?>"></span>
                            <span class="admin-column"><input type='text' name="cemail" class='account-input-field' value="<?php echo $product_array[$key]["email"]; ?>"></span>

                            <div class="admin-input">
                                <button class="admin-delete-button" type="submit" name="deleteaccount">STERGERE CONT</button>
                            </div>
                        </div>
                    </form>
            <?php
                }
            }
            ?>

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

<?php
if(isset($_POST["deleteaccount"])){
    $email_check=$_POST["cemail"];
    $db_handle->runNoReturnQuery("DELETE FROM users WHERE email='$email_check'");
   
}


?>