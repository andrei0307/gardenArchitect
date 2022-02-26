<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Flori</title>

    <link rel="shortcut icon" href="./images/list.ico" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

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
        <div class="descriere">Unei gradini care inspira o adiere romantica nu trebuie sa-i
            lipseasca florile cele mai apreciate datorita aspectului lor frumos si a culorilor,
            si anume trandafirii.Magazinul nostru online iti ofera o gama bogata de soiuri de
            trandafiri. Alege soiurile cele mai fascinante si transforma-ti gradina intr-o
            adevarata oaza impodobita de trandafiri viu colorati. Ce zici de o gradina care te va
            fascina prin frumusetea ei, care iti va oferi foloase datorita rodului plantelor pe care
            le-ai sadit in interiorul acesteia. Nu-i asa ca este minunat?Avem flori pentru orice tip de
            gradina, pentru orice anotimp.<br>
            Daca iti doresti ca gradina ta sa capete farmec si culoare de indata ce s-au topit
            zapezile, iti punem la dispozitie bulbi de ghiocei, zambile, narcise si lalele, etc.
            Aceste flori de primavara timpurie pot da tonul unui spectacol superb care se va
            desfasura intreg anul daca ai avut grija sa plantezi langa ele perene care vor iesi
            mai tarziu si care vor inflori catre sfarsitul primaverii, in decursul verii si
            toamna.</div>
    </header>

    <main>
        <section class="section">

            <div class="product-group container">
                <?php
                $product_array = $db_handle->runQuery("SELECT * FROM products WHERE type='flower'");
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