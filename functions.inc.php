<?php

function emptyInputSignup($name, $email, $userName, $password) {
    $result;
    if (empty($name) || empty($email) || empty($userName) || empty($password)) {
        $result = true;
    } else  {
        $result = false;
    }
    return $result;
}

function invalidUid($userName) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $userName)) {
        $result = true;
    } else  {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else  {
        $result = false;
    }
    return $result;
}

function uidExists($connection, $userName, $email) {
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $userName, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($connection, $name, $email, $userName, $password) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $userName, $email, $userName, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}

function emptyInputLogin($userName, $password) {
    $result;
    if (empty($userName) || empty($password)) {
        $result = true;
    } else  {
        $result = false;
    }
    return $result;
}

function loginUser($connection, $userName, $password) {
    $uidExists = uidExists($connection, $userName, $userName);

    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $passwordHashed = $uidExists["usersPwd"];
    $checkPassword = password_verify($password, $passwordHashed);

    if ($checkPassword === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } else if ($checkPassword === true) {
        session_start();
        $_SESSION["userid"] =  $uidExists["usersId"];
        $_SESSION["userName"] = $uidExists["usersUid"];
        header("location: ../index.php");
        exit();
    }
}

function notLoggedIn() {
    $result;
    session_start();
    if ($_SESSION["userid"]) {
        $result = false;
    } else  {
        $result = true;
    }
    return $result;
}

function emptyInputContact($email, $userMessage) {
    $result;
    if (empty($email) || empty($userMessage)) {
        $result = true;
    } else  {
        $result = false;
    }
    return $result;
}

function addUserMessage($connection, $userMessage, $email) {
    $uidExists = uidExists($connection, $email, $email);

    if ($uidExists === false) {
        header("location: ../Contact.php?error=wrongEmail");
        exit();
    }

    $sql = "UPDATE users SET usersMessage = ? WHERE usersEmail = ?;";
    $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }
    mysqli_stmt_bind_param($stmt, "ss", $userMessage, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../Contact.php?error=none");
    exit();
}