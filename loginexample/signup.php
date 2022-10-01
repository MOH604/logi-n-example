<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <form action="includes/signup.inc.php" method="post">

        <?php
            if(isset($_GET['first'])){
                $first = $_GET['first'];
                echo '<input type="text" name="first" placeholder="First Name" value="'.$first.'"><br><br>';
            }
            else{
                echo'<input type="text" name="first" placeholder="First Name"><br><br>';
            }

        ?>

        <?php
            if(isset($_GET['last'])){
                $last = $_GET['last'];
                echo'<input type="text" name="last" placeholder="Last Name" value="'.$last.'"><br><br>';            
            }
            else{
                echo'<input type="text" name="last" placeholder="Last Name"><br><br>';
            }
        ?>

        <?php
            if(isset($_GET['uid'])){
                $uid = $_GET['uid'];
                echo'<input type="text" name="uid" placeholder="Username" value="'.$uid.'"><br><br>';            
            }
            else{
                echo'<input type="text" name="uid" placeholder="Username"><br><br>';
            }
        ?>

        <?php
            if(isset($_GET['mail'])){
                $email = $_GET['mail'];
                echo'<input type="text" name="mail" placeholder="Email" value="'.$email.'"><br><br>';            
            }
            else{
                echo'<input type="text" name="mail" placeholder="Email"><br><br>';
            }
        ?>
        
        <input type="password" name="pwd" placeholder="Password"><br><br>
        <button name="signup-submit">Sign Up</button><br><br>

        <?php

            $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if(strpos($fullUrl, "signup=emptyfields")){
                echo "<p class='error'>You did not fill all the fields!<p>";
                exit();
            }

            elseif(strpos($fullUrl, "signup=invalidchar")){
                echo "<p class='error'>Invalid character!<p>";
                exit();
            }

            elseif(strpos($fullUrl, "signup=invaliduid")){
                echo "<p class='error'>Invalid Username!<p>";
                exit();
            }

            elseif(strpos($fullUrl, "signup=invalidemail")){
                echo "<p class='error'>Invalid E-mail!<p>";
                exit();
            }

            elseif(strpos($fullUrl, "signup=success")){
                echo "<p class='success'>Signup Successfull!<p>";
                exit();
            }
            
        ?>
        <h4>Already Signed Up?<a href="login.php">Login</a></h4>

    </form>

</body>
</html>