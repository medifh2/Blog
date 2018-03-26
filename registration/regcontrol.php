<?php
    include_once "../model/modeldb.php";
    $db = 'blog';
    $host = 'localhost';
    $user = 'root';
    $pass = 'root';
    $charset = 'utf8';
	$connect = new modeldb($db, $host, $user, $pass, $charset);
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
		$connect ->add_user($user);
        echo ("HELLO ".$user['name'].'!');
	}
	if (isset($_POST["reg"]))
	($connect);

