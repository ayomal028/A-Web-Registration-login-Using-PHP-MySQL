<?php

    if(isset($_POST['Login-submit'])){

        require 'dbh.inc.php';

        $crednumber = $_POST['credccn'];
        $password = $_POST['pwd'];

        if(empty($crednumber) || empty($password)){
            header("location: ../index.php?error=emptyfields");
            exit();
        }else {
            $sql = "SELECT * FROM customer WHERE ccn=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("location: ../index.php?error=sqlerror");
                exit();

            }else{
                mysqli_stmt_bind_param($stmt, "s", $crednumber);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if ($row = mysqli_fetch_assoc($result)) {
                    $pwdcheck = password_verify($password, $row['cuspwd']); 
                    if ($pwdcheck == false) {
                        header("location: ../index.php?error=wrongpwd");
                        exit();
                    }
                    else if($pwdcheck == true){
                        session_start();
                        $_SESSION['userId'] = $row['name'];
                        $_SESSION['userccn'] = $row['ccn'];

                        header("location: ../index.php?login=success");
                        exit();

                    }else {
                        header("location: ../index.php?error=wrongpwd");
                        exit();
                    }
                }else {
                    header("location: ../index.php?error=nouser");
                    exit();
                }
            }
        }

    }else{
        header("location: ../index.php");
        exit();
    }
















 ?>
