<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <link href="../styles/styles.css" rel="stylesheet" media="all">
    <title>Blog</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>
<body>
<nav>
    <div class="menu">
        <nav><a  href="../index.php"> Blog feed </a> | <a href="../userpage/userpageview.php"> My blog </a> |
            <a href="../registration/regview.php">Registration</a> | <a href="../login/logview.php">Login</a></nav>
    </div>
</nav>
</body>
</html>

<form method = "post" action = "regcontrol.php">
    <input type = "text" name = "login" placeholder="Login" required/><br>
    <input type = "text" name = "username" placeholder="Username"  required/><br>
    <input type = "password" name = "pass" placeholder="Password"  required/><br>
    <input type = "password" name = "r_pass" placeholder="Repeat password"  required/><br>
    <input type = "text" name = "about_me" placeholder="About me" /><br>
    <input type = "submit" name = "reg" value = "Registration"/><br>
</form>