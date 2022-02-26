<?php
session_start();
include_once("config.php");
require_once("dbcontroller.php");
$db_handle = new DBController();

if (isset($_SESSION["user"])) {
    $email_check = $_SESSION["user"]["email"];
    if (isset($_POST["editsurname"])) {
        $_SESSION["user"]["surname"] = $_POST["nsurname"];
        $temp = $_POST["nsurname"];
        $db_handle->runNoReturnQuery("UPDATE users SET surname='$temp' WHERE email='$email_check'");
    }
    if (isset($_POST["editfirstname"])) {
        $_SESSION["user"]["firstname"] = $_POST["nfirstname"];
        $temp = $_POST["nfirstname"];
        $db_handle->runNoReturnQuery("UPDATE users SET firstname='$temp' WHERE email='$email_check'");
    }
    if (isset($_POST["editmail"])) {
        $_SESSION["user"]["email"] = $_POST["nemail"];
        $temp = $_POST["nemail"];
        $db_handle->runNoReturnQuery("UPDATE users SET email='$temp' WHERE email='$email_check'");
    }
    if (isset($_POST["editpassword"])) {
        if (password_verify($_POST["npassword"], $_SESSION["user"]["password"])) {

            $_SESSION["user"]["password"] = password_hash($_POST["npassword"], PASSWORD_DEFAULT);
            $temp = $_SESSION["user"]["password"];
            $db_handle->runNoReturnQuery("UPDATE users SET password='$temp' WHERE email='$email_check'");
        }
    }
}


header('Location:editProfile.php');
