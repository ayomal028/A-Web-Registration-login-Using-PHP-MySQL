<?php
    require "header.php";

 ?>

    <main>
        <link rel="stylesheet" href="styles2.css">

            <div class="error">
                <?php
                error_reporting (E_ALL ^ E_NOTICE);
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyfields") {
                            echo '<p class = "registrationError"> Fill in all fields! </p>';
                        }
                        elseif ($_GET["error"] == "invalidmailname") {
                            echo '<p class = "registrationError"> Invalid username and e-mail! </p>';
                        }
                        elseif ($_GET["error"] == "invalidname") {
                            echo '<p class = "registrationError"> Invalid username! </p>';
                        }
                        elseif ($_GET["error"] == "invalidmail") {
                            echo '<p class = "registrationError"> Invalid e-mail! </p>';
                        }

                        elseif ($_GET["error"] == "passwordcheck") {
                            echo '<p class = "registrationError"> Your passowords do not match! </p>';
                        }
                        elseif ($_GET["error"] == "usertaken") {
                            echo '<p class = "registrationError"> username already taken! </p>';
                        }
                    }
                    else if ($_GET["register"] == "success") {
                        echo '<p class = "registrationSuccess"> Resgistration Successfull! </p>';
                    }
                 ?>
            </div>

        <div class="wrapper">
            <h1>Customer Registration</h1>
                <fieldset>
                <legend><span class="number">1</span>Customer Information</legend>
                <form class="reg" action="includes/register.inc.php" method="POST">
                    <input type="text" name="name" placeholder="UserName"><br>
                    <input type="text" name="addr" placeholder="User-Address"><br>
                    <input type="text" name="mail" placeholder="E-mail"><br>
                </fieldset>
                <fieldset>
                    <legend><span class="number">2</span>Credit Card Information</legend>
                    <input type="text" name="cred" placeholder="Credit Card Number"><br>
                </fieldset>
                <fieldset>
                    <legend><span class="number">3</span>Security</legend>
                    <input type="Password" name="pwd" placeholder="Password"><br>
                    <input type="Password" name="pwd-repeat" placeholder="Repeat Password"><br>
                </fieldset>
                    <button type="submit" name="register-submit">Register</button>
                </form>
            </section>
        </div>
    </main>

<?php
    require "footer.php";

 ?>
