<?php
    include_once "../model/modeldb.php";
	if (isset($_POST["log"]))
	{
        $db = 'blog';
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = 'root';
        $dbcharset = 'utf8';
        $connect = new modeldb($db, $dbhost, $dbuser, $dbpass, $dbcharset);
		$login = $_POST["login"];
		$pass = md5($_POST["pass"]);
		if ($user = $connect ->login_user($login, $pass)) echo "Hello {$user["Username"]} ";
		else echo "Wrong password or login";
	}
	($connect);

// ROUTER in index.php
// autoload !!! (PSR)
// PDO
// MVC
// OOP in PHP
// --ORM in PHP - read about



 //
//    class LoginController {
//
//        private $user_model;
//
//        public function __construct()
//        {
//            $user_model = new User();
//        }
//
//        public function getUser()
//        {
//           $user = $this->user_model->getUser($_SESSION['user_id']); // ['user_name' => 'kdjfgg', 'created_at' => '253543']
//
//        }
//    }
