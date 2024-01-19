<?php

if (isset($_POST["submit"])) {

    $email = $_POST["email"];
    $userMessage = $_POST["userMessage"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (notLoggedIn() !== false) {
        header("location: ../Contact.php?error=notLoggedIn");
        exit();
    }

    if (emptyInputContact($email, $userMessage) !== false) {
        header("location: ../Contact.php?error=emptyinput");
        exit();
    }

    if (invalidEmail($email) !== false) {
         header("location: ../Contact.php?error=invalidEmail");
         exit();
    }


    addUserMessage($connection, $userMessage, $email);

} else {
    header("location: ../signup.php");
    exit();
}