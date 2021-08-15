<?php
    session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name=viewport content="width=device-width, initial-scale=1">
        <meta name="description" content="this is an example of a meta description. this will often show up in search results">
        <link rel="stylesheet" href="styles.css">
        <title></title>
    </head>
    <body>


    <header>
        <div id="container">
        <div id="nav-header-main">
            <ul>
            
                <li><a href="index.php">Home</a></li>
                <li><a href="register.php">Register</a></li>

            </ul>
        </div>
        <div id="login">
            <?php
                if (isset($_SESSION['userccn'])) {
                    echo '<form action="includes/logout.inc.php" method="post">
                        <button type="submit" name="Logout-submit" id="btn">Logout</button>
                        </form>';
                }else {
                    echo '<form  action="includes/login.inc.php" method="post">
                        <label id="lbl">Username: <input type="text" id="inpt" name="credccn" placeholder="Credit Card Number"></label>
                        <label id="lbl">Password: <input type="password" id="inpt" name="pwd" placeholder="Password"></label>
                        <button type="submit" name="Login-submit" id="btn">Login</button>
                    </form>';

                }
            ?>
        </div>
    </div>
    </header>
