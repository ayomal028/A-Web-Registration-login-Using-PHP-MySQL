<?php
    if (isset($_POST['submit-settle'])) {
        require '../includes/dbh.inc.php';
        session_start();

        $datesettle = $_POST['settledate'];
        $month = $_POST['month'];
        $purchases = $_POST['tpmonth'];
        $year = date("Y");
        $date_payed = explode("-", $datesettle);
        $day = end($date_payed);
        $date = date("Y-M-d");

        $minimum = $purchases * 0.3;

        if($day > 15){
            $delay = $day - 15;
            $interest = pow(1.01,$delay);
            $totalpay = $minimum * $interest;
        }else {
            $interest = 0;
            $delay = 0;
            $totalpay = $minimum;

        }

        $ccn = $_SESSION['userccn'];
        $sql = "INSERT INTO creditcard_bill(ccn, year, month, purchAmount, minpay, interest, dateSettle, delay, paidAmount) VALUES ('$ccn', '$year', '$month', '$purchases', '$minimum', '$interest', '$datesettle', '$delay', '$totalpay');";

        $result = mysqli_query($conn, $sql);
        if(!$result){
            header("location: ../index.php?error=sqlerror");
            exit();
        }else{
            header("location: ../current.php?success=submitsucess");
            exit();
        }
    }
?>
