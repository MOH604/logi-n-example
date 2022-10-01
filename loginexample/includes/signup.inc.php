<?php

if(isset($_POST['signup-submit'])){
    include_once 'dbh.inc.php';

    $first = $_POST['first'];
    $last = $_POST['last'];
    $uid = $_POST['uid'];
    $mail = $_POST['mail'];
    $pwd = $_POST['pwd'];

    $sql = "INSERT INTO users(User_first, User_last, User_uid, User_mail, User_pwd) VALUES(?, ?, ?, ?, ?);";

    if(empty($first) || empty($last) || empty($uid) || empty($mail) || empty($pwd)){
        header("Location:../signup.php?signup=emptyfields&first=$first&last=$last&uid=$uid&mail=$mail");
    }

    elseif(!preg_match('/^[a-zA-Z]*$/',$first) || !preg_match("/^[a-zA-Z]*$/", $last)){
        header("Location:../signup.php?signup=invalidchar&uid=$uid&mail=$mail");
    }

    elseif(!preg_match("/^[a-zA-Z0-9]*$/", $uid)){
        header("Location:../signup.php?signup=invaliduid&first=$first&last=$last&mail=$mail");
    }

    elseif(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
        header("Location:../signup.php?signup=invalidemail&first=$first&last=$last&uid=$uid");
    }

    else{
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "SQL error!";
        }
        else{
           $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, 'sssss', $first, $last, $uid, $mail, $hashedPwd);
            mysqli_stmt_execute($stmt);

            header("Location:../login.php?signup=success");
        }


    }

}
else{
    header("Location:../signup.php");
}