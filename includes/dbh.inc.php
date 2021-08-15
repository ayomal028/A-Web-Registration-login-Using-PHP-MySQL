<?php

    $servername = "localhost:3306";
    $DBusername = "root";
    $Dbpassword = "";
    $DBname = "creditcardbills";

    $conn = mysqli_connect($servername,$DBusername,$Dbpassword,$DBname);

    if(!$conn){
        die("connection faild: " . mysqli_connect_error());
    }













 ?>
