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
    <title>Admin Login</title>
    <link rel="stylesheet" href="./css/styles.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <link rel="shortcut icon" href="./images/user.ico" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

</head>

<body class="account-background">
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


    </header>

    <div class='login-page'>
        <div class="form-box">
            <div class='login-box'>
                <h1>Logare Administrator</h1>
            </div>
            <form id='login' class='input-group-login' action="#" method="POST">
                <input type='text' class='input-field' name="lemail" placeholder='Introduceti Email' required>
                <input type='password' class='input-field' name="lparola" placeholder='Introduceti Parola' required>
                <button type='submit' class='submit-btn admin-btn' name="login">Logare</button>
            </form>

        </div>
    </div>

</body>

</html>

<?php

if (isset($_POST['login'])) {
    $data = $_POST;


    $email = $parola = "";
    $email = $_POST['lemail'];
    $parola = $_POST['lparola'];
    $check_account = $db_handle->runQuery("SELECT * FROM users WHERE email='$email'");
   
    if (!empty($check_account)) {
        foreach ($check_account as $key => $value) {
            echo $check_account[$key]["user_type"];
            if ($check_account[$key]["user_type"] == "admin") {
                if (password_verify($parola, $check_account[$key]["password"])) {

                    $new_product["firstname"] = $check_account[$key]["firstname"];
                    $new_product["surname"] = $check_account[$key]["surname"];
                    $new_product["email"] = $check_account[$key]["email"];
                    $new_product["password"] = $check_account[$key]["password"];

                    if (isset($_SESSION["user"])) {  //if session var already exist
                        unset($_SESSION["user"]); //unset old array item

                    }
                    $_SESSION["user"] = $new_product;

                    header("Location:accountAdministrate.php");
                    exit();
                } else {
                    echo "<script>alert('Parola este gresita!');</script>";
                }
            }
        }
    } else {

        echo "<script>alert('Adresa email inexistenta!');</script>";
    }


    unset($_POST);
}

?>