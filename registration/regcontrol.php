<?php
    $host = '127.0.0.1';
    $db   = 'test';
    $user = 'root';
    $pass = '';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $opt);

    include_once "regmodel.php";
	$connect = mysqli_connect("localhost", "root", "root", "blog");
	if (!$connect) echo "error";

	{
		$pass = $_POST["password"];
		$r_pass = $_POST["r_password"];
		if ($pass !== $r_pass) die("Passwords do not match!");
		$login = $_POST["login"];
		$uname = $_POST["username"];	
		$about = $_POST["about_me"];
		$pass = md5($pass);
		$lvl = "reader";
		// Use PDO!
        $query =mysqli_query($connect,"INSERT INTO `Users` (`Login`, `Password`, `Username`,`About_me`,`accesslvl`) 
		VALUES ($login, $pass, $uname, $about, $lvl)")
		or die (mysqli_error($connect));
        echo ("HELLO".$uname);

	}
	if (isset($_POST["reg"]))
	($connect);

