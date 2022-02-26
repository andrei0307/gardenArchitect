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
    <title>Cont</title>
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
                <li><a href="adminLogin.php">Logare Administrator</a></li>
                <li><a href="cart.php"><i class='bx bx-cart'></i></a></li>
                <li><a href="account.php"><i class='bx bx-user-pin'></i></a></li>
                <?php if(isset($_SESSION["user"])){ echo '<li><a href="logout.php">Logout</a></li>';} ?>
            </ul>
        </nav>
        <h1 class="shop-name shop-name-large">Garden Architect</h1>


    </header>

    <div id='login-form' class='login-page'>
        <div class="form-box">
            <div class='button-box'>
                <div id='btn'></div>
                <button type='button' onclick='login()' class='toggle-btn'>Logare</button>
                <button type='button' onclick='register()' class='toggle-btn'>Creare Cont</button>
            </div>
            <form id='login' class='input-group-login' action="#" method="POST">
                <input type='text' class='input-field' name="lemail" placeholder='Introduceti Email' required>
                <input type='password' class='input-field' name="lparola" placeholder='Introduceti Parola' required>
                <input type='checkbox' class='check-box'><span class="account-span">Retine Parola</span>
                <button type='submit' class='submit-btn' name="login">Logare</button>
            </form>
            <form id='register' class='input-group-register' action="#" method="POST">
                <input type='text' class='input-field' name="rnume" placeholder='Introduceti Nume' required>
                <input type='text' class='input-field' name="rprenume" placeholder='Introduceti Prenume' required>
                <input type='email' class='input-field' name="remail" placeholder='Introduceti Adresa Email' required>
                <input type='password' class='input-field' name="rparola" placeholder=' Introduceti Parola' required>
                <input type='password' class='input-field' name="rconfirmareparola" placeholder='Confirmati Parola' required>
                <input type='checkbox' class='check-box'><span class="account-span">Am citit si sunt de acord cu termenii si conditiile</span>
                <button type='submit' class='submit-btn' name="register">Creeaza Cont</button>
            </form>
        </div>
    </div>

    <script>
        var x = document.getElementById('login');
        var y = document.getElementById('register');
        var z = document.getElementById('btn');

        function register() {
            x.style.left = '-400px';
            y.style.left = '50px';
            z.style.left = '110px';
        }

        function login() {
            x.style.left = '50px';
            y.style.left = '450px';
            z.style.left = '0px';
        }
    </script>


</body>

</html>


<?php

if (isset($_POST['register'])) {
    $data = $_POST;
   
    if (strlen(trim($data['rparola'])) < 8) {
        echo "<script>alert('Parola trebuie sa contina minim 8 caractere!');</script>";
        exit;
    } else if ($data['rparola'] !== $data['rconfirmareparola']) {
        echo "<script>alert('Parola si confirmare parola diferite');</script>";
    } else if (!filter_var($data['remail'], FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Format email necorespunzator!');</script>";
    } else {

        $nume = $prenume = $email = $parola = $confirmareparola = "";
        $nume = $_POST['rnume'];
        $prenume = $_POST['rprenume'];
        $email = $_POST['remail'];
        $parola = $_POST['rparola'];
        $confirmareparola = $_POST['rconfirmareparola'];
        $user_type="user";
        $hash = password_hash($parola, PASSWORD_DEFAULT);
        $check_email = $db_handle->runQuery("SELECT * FROM users WHERE email='$email'");
        if (!empty($check_email)) {
            echo "<script>alert('Email deja existent!');</script>";
        } else {
            $db_handle->runNoReturnQuery("INSERT INTO users (firstname,surname,email,password,user_type) VALUES ('$prenume','$nume','$email','$hash','$user_type')");
            echo "<script>alert('Contul a fost creat cu succes!');</script>";
        }
    }
    unset($_POST);
}

?>

<?php

if (isset($_POST['login'])) {
    $data = $_POST;
    

    $email = $parola = "";
    $email = $_POST['lemail'];
    $parola = $_POST['lparola'];
    $check_account = $db_handle->runQuery("SELECT * FROM users WHERE email='$email'");

    if (!empty($check_account)) {
        foreach ($check_account as $key => $value) {
            if (password_verify($parola, $check_account[$key]["password"])) {

                $new_product["firstname"] = $check_account[$key]["firstname"]; 
                $new_product["surname"] = $check_account[$key]["surname"];
                $new_product["email"]=$check_account[$key]["email"];
                $new_product["password"]=$check_account[$key]["password"];

                if(isset($_SESSION["user"])){  //if session var already exist
                        unset($_SESSION["user"]); //unset old array item
                               
                }
                $_SESSION["user"] = $new_product; 

                header("Location:index.php");
                exit();
            } else {
                echo "<script>alert('Parola este gresita!');</script>";
            }
        }
    } else {

        echo "<script>alert('Adresa email inexistenta!');</script>";
    }


    unset($_POST);
}

?>