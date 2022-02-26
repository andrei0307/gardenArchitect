<?php
session_start();
require_once("dbcontroller.php");
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

    <link rel="shortcut icon" href="./images/shopping.ico" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">


    <title>Cos Cumparaturi</title>
</head>

<body>
    <header class="cart-background">

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
        <section class="cart-container content-section">
            <h2 class="section-header">COS CUMPARATURI</h2>

            <form method="post" action="cart_update.php">
                <button class="btn-cos" type="submit">Update cos cumparaturi</button>

                <div class="cart-row">
                    <span class="cart-item cart-header cart-column">PRODUS</span>
                    <span class="cart-price cart-header cart-column">PRET</span>
                    <span class="cart-quantity cart-header cart-column">CANTITATE</span>
                </div>
                <?php
                $total = 0;
                if (isset($_SESSION["cart_products"])&&isset($_SESSION["user"])) {
                    
                    $order_list = "";
                    foreach ($_SESSION["cart_products"] as $cart_itm) {
                        $product_name = $cart_itm["name"];
                        $product_price = $cart_itm["price"];
                        $product_image = $cart_itm["image"];
                        $product_qty = $cart_itm["quantity"];
                        $product_id = $cart_itm["id"];
                        $subtotal = ($product_price * $product_qty);
                        $total = ($total + $subtotal);
                        $order_list .= " ";
                        $order_list .= $product_name;
                        $order_list .= " ";
                        $order_list .= $product_qty;
                        $order_list .= ";";
                ?>
                        <div class="cart-row">
                            <div class="cart-item cart-column">
                                <img class="cart-item-image" src="<?php echo $product_image; ?>" width="100" height="100">
                                <span class="cart-item-title"><?php echo $product_name; ?></span>
                            </div>
                            <span class="cart-price cart-column"><?php echo $subtotal . " RON"; ?></span>
                            <div class="cart-quantity cart-column">

                                <?php echo '<input class="cart-quantity-input" type="text" size="2" maxlength="2" name="product_qty[' . $product_id . ']" value="' . $product_qty . '" /></td>'; ?>
                                <?php echo '<button class="cart-remove-button" type="submit" name="remove_code[]" value="' . $product_id . '" role="button">STERGE</button>'; ?>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>

                <input type="hidden" name="return_url" value="<?php
                                                                $current_url = urlencode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
                                                                echo $current_url; ?>" />

                <div class="cart-total">
                    <strong class="cart-total-title">Total</strong>
                    <span class="cart-total-price"><?php echo $total . " RON"; ?></span>
                </div>
            </form>
            <form method="post" action="#">
                <button class="btn-purchase" role="button" name="order">FINALIZEAZA COMANDA</button>
            </form>


            </div>
        </section>
    </main>
    <?php
    if (isset($_POST["order"])) {
        if (isset($_SESSION["user"])) {
            if (isset($_SESSION["cart_products"])) {
                $order_email=$_SESSION["user"]["email"];
                $db_handle->runNoReturnQuery("INSERT INTO orders (email,orderlist,price) VALUES ('$order_email','$order_list','$total')"); 
                unset($_SESSION["cart_products"]);
                echo "<script>alert('Comanda a fost plasata cu succes!');</script>";
                header('Location:cart.php');
            }
        }
    }

    ?>

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