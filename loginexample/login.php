<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <form action="includes/login.inc.php" method="post">
        <input type="text" name="mailuid" placeholder="E-mail or Username"><br><br>
        <input type="password" name="pwd" placeholder=" Password"><br><br>
        <button name="login-submit">Login</button><br>
        <p>Not yet signed up? <a href="signup.php">Sign up</a></p>
    </form>
    

</body>
</html>