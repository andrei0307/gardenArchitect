<?php
session_start();
include_once("config.php");
require_once("dbcontroller.php");
$db_handle = new DBController();

if (isset($_SESSION["user"])) {
    unset($_SESSION["user"]);
}

header('Location:account.php');

?>
