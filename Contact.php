<?php
    include_once 'header.php';
?>

<div class ="About" style ="width:70%; height:80%; background-color:; margin:0 auto; text-align:left">
                <br><h3 class="text-center" style="color:#f3e5f5">Contact Me</h3></br>
                <p class="text-center" style="color:#f3e5f5">If you are interested in lessons, 
                or if you just want to share your opinions about me,
                <br>my performances, or music in general, 
                please feel free to send me a comment!</br></p>
                
                <form action="includes/contact.inc.php" method="post" class="contact">
                    Email: <input type="text" name="email" placeholder="Your E-mail"/><br></br>
                    Message: <textarea type="text" name="userMessage"  placeholder="Please login/create an account first"></textarea><br>
                    <button class="main-btn contact-btn" type="submit" name="submit">Submit</button></br>
                </form>
                <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "notLoggedIn") {
                            echo "<p class='text-center'>Please Login!</p>";
                        } else if ($_GET["error"] == "emptyinput") {
                            echo "<p class='text-center'>Fill in all fields!</p>";
                        } else if ($_GET["error"] == "none") {
                            echo "<p class='text-center'>You have successfully submitted your message!</p>";
                        } else if ($_GET["error"] == "invalidEmail") {
                            echo "<p class='text-center'>Please enter a valid Email (example@email.com)!</p>";
                        } else if ($_GET["error"] == "wrongEmail") {
                            echo "<p class='text-center'>This email doesn't exist, Please try again!</p>";
                        }
                    }
                ?>
            </div>

<?php
    include_once 'footer.php';
?>
