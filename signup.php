<?php
    include_once 'header.php';
?>

            <div class ="About" style ="width:70%; height:80%; background-color:; margin:0 auto; text-align:left">
                <h3 class="text-center" style="color:#f3e5f5">Sign Up</h3>

                <form action="includes/signup.inc.php" method="post" class="contact">
                    Name: <input type="text" name="name" placeholder="Your Full Name"/>
                    Email: <input type="text" name="email" placeholder="Your E-mail"/>
                    Username: <input type="text" name="uid" placeholder="Your Username"/>
                    Password: <input type="password" name="password" placeholder="Your Password"/><br>
                    <button class="main-btn contact-btn" type="submit" name="submit">Sign up</button></br>
                </form>
                <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyinput") {
                            echo "<p class='text-center'>Please fill in all fields!</p>";
                        } else if ($_GET["error"] == "invalidUid") {
                            echo "<p class='text-center'>Please enter a valid UserName!</p>";
                        } else if ($_GET["error"] == "invalidEmail") {
                            echo "<p class='text-center'>Please enter a valid Email!</p>";
                        } else if ($_GET["error"] == "usernametaken") {
                            echo "<p class='text-center'>Please enter a different Username!</p>";
                        } else if ($_GET["error"] == "stmtfailed") {
                            echo "<p class='text-center'>Something went wrong, try again!</p>";
                        } else if ($_GET["error"] == "none") {
                            echo "<p class='text-center'>You have signed up!</p>";
                        }
                    }
                ?>
            </div>

<?php
    include_once 'footer.php';
?>