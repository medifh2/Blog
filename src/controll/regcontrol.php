<?php
    function __autoload($classname) {
        $filename = "../model/". $classname .".php";
        include_once($filename);
    }
    $db = 'blog';
    $host = 'localhost';
    $user = 'root';
    $pass = 'root';
    $charset = 'utf8';
	$connect = new mddb($db, $host, $user, $pass, $charset);
	{
		$pass = $_POST["pass"];
		$r_pass = $_POST["r_pass"];
		if ($pass !== $r_pass) die("Passwords do not match!");
		$pass = md5($pass);
		$user =
        [
            'login' => $_POST["login"],
            'pass' =>$pass,
            'name' => $_POST["username"],
            'about' => $_POST["about_me"],
            'lvl' => 'reader'
        ];
		if ($connect ->add_user($user))
        {
            $logineduser = new mdReader($user['login'], $user['pass'], $user['username'], $user['about_me']);
            echo ("HELLO ".$user['name'].'!');
        }
	}
	if (isset($_POST["reg"]))
	($connect);
    echo "<a href='../../index.php'>Go back to main page</a>";
