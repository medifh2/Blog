<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Blog</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styles/styles.css">
    </head>
    <body>
        <form action = "registration/regview.php">
            <input type = "submit" name = "submit" value = "Registration"/><br>
        </form>
        <form action = "login/logview.php">
            <input type = "submit" name = "submit" value = "Login"/><br>
        </form>
    </body>
</html>
