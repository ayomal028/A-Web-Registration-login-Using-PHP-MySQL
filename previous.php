<?php

require 'includes/dbh.inc.php';
session_start();
$ccn = $_SESSION['userccn'];

$sql = "SELECT * FROM creditcard_bill WHERE ccn = '$ccn';";

	$result = mysqli_query($conn, $sql);
	$rows = mysqli_num_rows($result);

 ?>

    <?php
    if($rows > 0){

     ?>
        <table class="table" border="1">
             <thead>
                <th></th>
                 <th>Interest(Rs)</th>
                 <th>Amount(Rs)</th>
            </thead>
                <tbody>
                <?php
                $day = 1;
                $gross = null;
                 while($res_rows = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>Day {$day}</td>";
                    echo "<td>".$res_rows['interest']."</td>";
                    echo "<td>".$res_rows['purchAmount']."</td>";
                    echo "</tr>";
                    $gross+=$res_rows['purchAmount'];
                    $day++;
                }
                    echo "<tr>";
                    echo "<td>Net total</td>";
                    echo "<td></td>";
                    echo "<td>".$gross."</td>";
                    echo "</tr>"
                ?>
                </tbody>
        </table>

    <?php
    }else {
        echo "No data found";
    }

    ?>













































 <?php
     require "footer.php";

  ?>
