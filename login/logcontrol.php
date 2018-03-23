<?php
    $connect = mysqli_connect("localhost", "root", "root", "blog");
	if (isset($_POST["log"]))
	{
		$login = $_POST["login"];
		$pass = $_POST["password"];
		$query = mysqli_query($connect,"SELECT * FROM users WHERE login = $login") or die (mysqli_error($connect));
		$user = mysqli_fetch_array($query);
		if ($user["password"] === md5($pass)) echo "Hello {$user["username"]} ";
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
