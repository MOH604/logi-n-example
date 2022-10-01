<?php

    if(isset($_POST['login-submit'])){
        require 'dbh.inc.php';

        $mailuid = $_POST['mailuid'];
        $pwd =$_POST['pwd'];

        if(empty($mailuid) || empty($pwd)){
            header('Location: ../login.php?login=empty');
        }
        else{
            $sql = "SELECT * FROM users WHERE User_mail=? OR User_uid=?;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                echo 'SQL error';
            }
            else{
                mysqli_stmt_bind_param($stmt, 'ss', $mailuid, $mailuid);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if($row = mysqli_fetch_assoc($result)){
                    $pwdCheck = password_verify($pwd, $row['User_pwd']);

                    if($pwdCheck == false){
                        header("Location: ../login.php?login=wrongpwd");
                        exit();
                    }
                    elseif($pwdCheck == true){
                        session_start();

                        $_SESSION['Userid'] = $row['User_id'];
                        $_SESSION['Useruid'] = $row['User_uid'];

                        header("Location: ../login.php?login=success");
                        exit();
                    }
                    else{
                        header("Location: ../login.php?login=wrongpwd");
                        exit();
                    }
                }
                else{
                    header("Location: ../login.php?login=nouser");
                    exit();
                }
            }
            
        }

    }
    else{
        header("Location:../login.php");
    }

?>