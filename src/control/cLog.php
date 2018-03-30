<?php
    function __autoload($classname) {
        $filename = "../model/". $classname .".php";
        include_once($filename);
    }
	if (isset($_POST["log"]))
	{
        $db = 'blog';
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = 'root';
        $dbcharset = 'utf8';
        $connect = new mdb($db, $dbhost, $dbuser, $dbpass, $dbcharset);
		$login = $_POST["login"];
		$pass = md5($_POST["pass"]);
		if ($userdate = $connect ->login_user($login, $pass)) {
            switch ($userdate['accesslvl']) {
                case 'reader' : $user = new mReader($userdate['Login'], $userdate['Password'], $userdate['Username'], $userdate['About_me']); break;
                case 'writer' : $user = new mWriter($userdate['Login'], $userdate['Password'], $userdate['Username'], $userdate['About_me']); break;
                case 'admin' : $user = new mAdmin($userdate['Login'], $userdate['Password'], $userdate['Username'], $userdate['About_me']); break;
         }

            echo "Hello {$user["Username"]} ";
        }
		else echo "Wrong password or login";
	}
	($connect);
    echo "<a href='../../index.php'>Go back to main page</a>";

// ROUTER in index.php
// autoload !!! (PSR)
// PDO
// MVC
// OOP in PHP
// --ORM in PHP - read about

    //class LoginController {

   //     private $user_model;

    //    public function __construct()
    //    {
    //        $user = new User();
    //    }

    //    public function getUser()
    //    {
      //     $user = $this->user_model->getUser($_SESSION['user_id']); // ['user_name' => 'kdjfgg', 'created_at' => '253543']

     //   }
    //}
