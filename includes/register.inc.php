<?php
    if (isset($_POST['register-submit'])) {

        require 'dbh.inc.php';

        $username = $_POST['name'];
        $address = $_POST['addr'];
        $email = $_POST['mail'];
        $credit = $_POST['cred'];
        $password = $_POST['pwd'];
        $passwordRepead = $_POST['pwd-repeat'];

        if(empty($username) || empty($address) || empty($email) || empty($credit) || empty($password) || empty($passwordRepead)) {
            header("location: ../register.php?error=emptyfields&name=".$username."&mail=".$email."&addr=".$address."&cred=".$credit);
            exit();
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
            header("location: ../register.php?error=invalidmailname");
            exit();
        }
        elseif (!preg_match("/^[a-zA-Z\d\._]+@[a-zA-z\d\._]+\.[a-zA-Z\d\.]{2,}+$/", $email)) {
            header("location: ../register.php?error=invalidmail&name=".$username);
            exit();
        }
        elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            header("location: ../register.php?error=invalidname&mail=".$email);
            exit();
        }

        elseif($password !== $passwordRepead){
            header("location: ../register.php?error=passwordcheck&uid=".$username."&mail=".$email);
            exit();
        }
        else{

            $sql = "SELECT cusName FROM customer WHERE cusName=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../register.php?error=sqlerror");
                exit();
            }else{
                mysqli_stmt_bind_param($stmt, "s", $username);//second parameter = data type that we are passing
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if($resultCheck > 0){
                    header("location: ../register.php?error=usertaken&mail=".$email."&addr=".$address."&cred=".$credit);
                    exit();
                }else{

                    $sql = "INSERT INTO customer (cusName, address, email, ccn, cuspwd) VALUES (?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("location: ../register.php?error=sqlerror");
                        exit();
                    }else{
                        $hashpwd = password_hash($password, PASSWORD_DEFAULT);//hashing the password

                        mysqli_stmt_bind_param($stmt, "sssss", $username, $address, $email, $credit, $hashpwd);//second parameter = data type that we are passing
                        mysqli_stmt_execute($stmt);
                        header("location: ../register.php?register=success");
                        exit();
                    }
                }
            }


        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

    }
    else{
        header("location: ../register.php");
        exit();
    }























 ?>
