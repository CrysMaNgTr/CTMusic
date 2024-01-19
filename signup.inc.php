<?php

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $userName = $_POST["uid"];
    $password = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($name, $email, $userName, $password) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if (invalidUid($userName) !== false) {
        header("location: ../signup.php?error=invalidUid");
        exit();
    }

    if (invalidEmail($email) !== false) {
         header("location: ../signup.php?error=invalidEmail");
         exit();
    }

    if (uidExists($connection, $userName, $email) !== false) {
         header("location: ../signup.php?error=usernametaken");
         exit();
    }

    createUser($connection, $name, $email, $userName, $password);

} else {
    header("location: ../signup.php");
    exit();
}