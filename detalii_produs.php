<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
?>

<!DOCTYPE html>
<html lang="en">

<html>
    <head>
        <title>product detais</title>

        <link rel="shortcut icon" href="./images/list.ico" type="image/x-icon">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="./css/add_to_cart.css">
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
                    <li><a href="list.php"></a>main page</li>
                </ul>
            </nav>
            <h1 class="shop-name shop-name-large">Garden Architect</h1>

        </header>
        <main>
            <div class="container">
                <div class="cover"></div>
                <div class="content">
                    <div class="nav">
                        <span class="logo">CRIN</span>
                        <span><i class='fab fa-sistrix' style='font-size:24px'></i></span>
                    </div>
                    <div class="content-body">
                        <div class="black-label">
                            <span class="title"><b>Crin Miss Feya</b></span>
                            <p><t>&emsp;&emsp; Crinul Miss Feya este o plantă perenă, de gradină, cu o rezistență medie la frigul iernii. Altfel spus, bulbii de crini nu trebuie scoși 
                                din pământ toamna, înainte de îngheț.
                                Crinul face parte din categoria plantelor tradiționale românești, fiind prezentă în grădini de peste 100 de ani. Pentru a 
                                înflori bogat trebuie să stea în zonele însorite sau semiumbrite. Nu vor înflori complet în zonele umbrite.
                                </p>
                                <p>&emsp;&emsp;Bulbul de Crin Miss Feya va crea o tijă cu flori în primul an, iar în anii următori se va înmulți ajungând la 7 - 8 tije cu flori roșii.  
                                    Crinul Miss Feya se potrivește perfect în stratul de flori împreună cu alte plante, se pretează chiar și pentru flori tăiate.
                                    Plantați bulbii de Crin Miss Feya toamna, la o adâncime de 12-15 cm pentru că bulbii de crin pot fi destul de mari.
                                    În funcție de vreme, crinii vor înflori în perioada iunie - august. </p>
                        
                                    <div class="prix">
                                        <span><b>5.99 RON</b></span>
                                        <span class="crt">                            
                                            <form method="post" action="cart_update.php">
                                                <div class="product-header">
                                                    <ul class="btn-set">
                                                        <button type="submit" class="list-btn">Adauga in cos</button>
                                                    </ul>
                                                </div>

                                                <input type="hidden" name="id" value="1" />
                                                <input type="hidden" name="type" value="add" />
                                                <input type="hidden" name="return_url" value="<?php echo $current_url; ?>" />
                                            </form>
                                        </span>
                                    </div>
                        </div>
                    </div>   
                </div>
            </div>
        </main>
        <footer class="main-footer">

            <div class="footer-container main-footer-container">
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