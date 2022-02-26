<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$current_url = urlencode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ornamente Gradina</title>

    <link rel="shortcut icon" href="./images/list.ico" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <header class="flowers-background">
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
        <div class="descriere">De mult visezi ca spatiul de care dispui sa se transforme intr-o 
            gradina superba demna de privit si de admirat prin care sa te poti plimba in voie 
            visand la lucruri placute? Visezi la o gradina in stil oriental, o gradina japoneza 
            sau esti o persoana romantica care prefera gradinile in stil englezesc? Ai nevoie de 
            mai mult oxigen in curtea casei tale si esti indragostit de peisajele montane, 
            dorindu-ti o gradina de tip stancarie sau in stil alpin? Oricare ti-ar fi dorintele, 
            echipa GardenExpert te ajuta cu tot ceea ce tine de amenajarea unui spatiu verde, a 
            unei gradini sau chiar a unui parc. Pe langa oferta impresionanta de plante ornamentale 
            pe care ti le punem la dispozitie, iti venim in ajutor si cu mobilier de gradina, pergole, 
            fantani, sisteme de irigat, pavaje si orice altceva ti-ai putea dori pentru gradina ta de vis.
            Iti venim in ajutor cu servicii si produse de calitate in proiectarea si amenajarea de
             gradini si spatii verzi. Echipa GardenExpert iti va oferi posibilitatea de a-ti indeplini 
             visul mult dorit. Tu doar dezvaluie-ne dorintele tale iar noi ne vom ocupa de restul. 
             Lasa grija in seamna noastra!</div>
    </header>

    <main>
        <section class="section">
         
        <div class="product-group container">
                <?php
                $product_array = $db_handle->runQuery("SELECT * FROM products WHERE type='ornaments'");
                if (!empty($product_array)) {
                    foreach ($product_array as $key => $value) {
                ?>
                        <div class="product">
                            <form method="post" action="cart_update.php">
                                <div class="product-header">
                                    <img src="<?php echo $product_array[$key]["image"]; ?>" alt="">
                                    <ul class="btn-set">

                                        <button type="submit" class="list-btn">Adauga in cos</button>
                                    </ul>
                                </div>

                                <div class="product-footer">
                                    <h3><?php echo $product_array[$key]["name"]; ?></h3>
                                    <h4 class="price"><?php echo $product_array[$key]["price"] . " RON"; ?></h4>
                                </div>

                                <input type="hidden" name="id" value="<?php echo $product_array[$key]["id"]; ?>" />
                                <input type="hidden" name="type" value="add" />
                                <input type="hidden" name="return_url" value="<?php echo $current_url; ?>" />
                            </form>
                        </div>
                <?php
                    }
                }
                ?>
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