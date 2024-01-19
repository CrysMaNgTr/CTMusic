<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTWeb</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">


</head>
<body>
    <section class="main">

        <nav class="navbar navbar-expand navbar-light flex-column flex-md-row bd-navbar" style="background-color: #f3e5f5;">
            <a class="logo"><img src="images/CT-02.png"/></a>

            <ul class="menu mr-auto">

               <li><a onclick="alert('Welcome to CT Web')" href="index.php">HOME</a>
               <li><a href="rehearsal.php">rehearsals</a>
               <li><a href="Aboutme.php">ABOUT ME</a>
               <li><a href="Contact.php">CONTACT</a>
               <li><a href="Web.php">Website Description</a>
               
               <?php
                    if (isset($_SESSION["userName"])) {
                        echo "<li><a href='signup.php'>SIGN UP</a>";
                        echo "<li><a href='includes/logout.inc.php'>LOGOUT</a>";
                    } else {
                        echo "<li><a href='signup.php'>SIGN UP</a>";
                        echo "<li><a href='login.php'>LOG IN</a>";
                    }
               ?>
            </ul>


        </nav>
        <div class="carousel-item active"style="background-color: black;">

            <?php
                if (isset($_SESSION["userName"])) {
                    echo "<h2 class='text-center' style='color:#f3e5f5'>Welcome " . $_SESSION["userName"] . "</h2>";
                    echo "<p class='text-center' style='color:#f3e5f5'> Do you want piano or drum lessons?</p>";
                } else  {
                    echo "<h2 class='text-center' style='color:#f3e5f5'>Welcome Music Lovers</h2>";
                    echo "<p class='text-center' style='color:#f3e5f5'> Do you want piano or drum lessons?<br>
                            Please log in or sign up to create an account to contact me
                          </p>";
                }
            ?>