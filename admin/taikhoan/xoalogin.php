<?php
session_start();
ob_start();
if (isset($_SESSION['username'])) {

    unset($_SESSION["username"]);
    header('Location:login.php');
}
