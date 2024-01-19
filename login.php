<?php
    include_once 'header.php';
?>

    <img class="d-block w-100" src="images/IMG6.jpg" alt="First slide">

            <div class ="About" style ="width:70%; height:80%; background-color:; margin:0 auto; text-align:left">
                <h3 class="text-center" style="color:#f3e5f5">Login</h3>

                <form action="includes/login.inc.php" method="post" class="contact">
                    Username: <input type="text" name="uid" placeholder="Your Username"/>
                    Password: <input type="password" name="password" placeholder="Your Password"/>
                    <button class="main-btn contact-btn" type="submit" name="submit">Login</button>

                

                </form>
                <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyinput") {
                            echo "<p class='text-center'>Fill in all fileds!</p>";
                        } else if ($_GET["error"] == "wronglogin") {
                            echo "<p class='text-center'>Incorrect login, Please try again!</p>";
                        }
                    }
                ?>
            </div>

<?php
    include_once 'footer.php';
?>