<?php
session_start();
require 'includes/dbh.inc.php';

$ccn = $_SESSION['userccn'];

$sql = "SELECT * FROM creditcard_bill WHERE ccn = $ccn ORDER BY month DESC LIMIT 1;";
$result = mysqli_query($conn, $sql);
$result_set = mysqli_fetch_assoc($result);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>

        <table class="tablE" border="1">
				<tr>
					<td>Purchases within the month </td>
					<td><?php echo $result_set['purchAmount']; ?></td>
				</tr>
				<tr>
					<td>Amount to be paid before 15th</td>
					<td><?php echo $result_set['minpay']; ?></td>
				</tr>
				<tr>
					<td>Settlement date </td>
					<td><?php echo $result_set['dateSettle']; ?></td>
				</tr>
				<tr>
					<td>Number of days late </td>
					<td><?php echo $result_set['delay']; ?></td>
				</tr>
			</table>

    </body>
</html>
