<?php
    require "header.php";
 ?>

    <main>
        <link rel="stylesheet" href="styles2.css">

                <?php
                    if (isset($_SESSION['userccn'])) {
                        echo '<h1 class="login-status">You are logged in!</h1>';
                ?>
                    <div class="wrapper">
                        <form action="process/ccninfo.php" method="post">
                            <legend><span class="number"></span>Select month</legend>
                            <select id="Month" name="month">
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select><br><br>
                            <input type="text" name="tpmonth" placeholder="Total purchases within the month(Rs.)">
                            <legend><span class="number"></span>Select settlement date</legend>
                            <input type="date" name="settledate">
                            <br><br>
                            <button type="submit" name="submit-settle" value="Check">Submit</button>

                        </form>
                        <form class="" action="previous.php" method="post">
                            <button type="submit" name="showbill">show</button>
                        </form>

                        <?php
                            error_reporting (E_ALL ^ E_NOTICE);
                            if ($_GET['creditinfoAdded'] == "success") {
                                echo '<p class = "addcreditInfo"> Details added successfully! </p>';
                            }
                        ?>

                    </div>
                <?php
                    }else {
                        echo '<h1 class="login-statue">You are logged out!</h1>';
                    }
                 ?>

    </main>

<?php
    require "footer.php";
 ?>
