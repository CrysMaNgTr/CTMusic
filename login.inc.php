<?php

if (isset($_POST["submit"])) {

    $userName = $_POST["uid"];
    $password = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($userName, $password) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($connection, $userName, $password);
} else  {
    header("location: ../login.php");
    exit();
}

