<?php
namespace control;
use view\View;
use model\DbModel;
use model\ReaderModel;
use model\WriterModel;
use model\AdminModel;
class UserController {

    public function showloginpage()
    {
        $viewgen = new View;
        $viewgen -> pagegenerate ('LogView.html');
    }

    public function showregpage()
    {
        $viewgen = new View;
        $viewgen -> pagegenerate ('RegView.html');
    }

    public function showuserpage()
    {
        $viewgen = new View;
        $viewgen -> pagegenerate ('UserpageView.html');
    }

    public function logout()
    {
        $_SESSION['is_login'] = 0;
        $viewgen = new View;
        $viewgen -> pagegenerate ('MainpageView.html');
    }

    public function login()
    {
        if (isset($_POST["log"]))
        {
            $db = 'blog';
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = 'root';
            $dbcharset = 'utf8';
            $connect = new DbModel($db, $dbhost, $dbuser, $dbpass, $dbcharset);
            $login = $_POST["login"];
            $pass = md5($_POST["pass"]);
            if ($userdate = $connect -> login_user($login, $pass)) {
                switch ($userdate['accesslvl']) {
                    case 'reader' : $user = new ReaderModel($userdate['Login'], $userdate['Password'], $userdate['Username'], $userdate['About_me']); break;
                    case 'writer' : $user = new WriterModel($userdate['Login'], $userdate['Password'], $userdate['Username'], $userdate['About_me']); break;
                    case 'admin' : $user = new AdminModel($userdate['Login'], $userdate['Password'], $userdate['Username'], $userdate['About_me']); break;
                }
                echo "Hello {$user["Username"]} ";
            }
            else echo "Wrong password or login";
        }
        ($connect);
        $_SESSION['is_login'] = 1;
        $_SESSION['userdate'] = $userdate[0];
        $viewgen = new View;
        $viewgen -> pagegenerate ('vmainpage.html');

    }
    public function registration()
    {
        $viewgen = new View;
        $db = 'blog';
        $host = 'localhost';
        $user = 'root';
        $pass = 'root';
        $charset = 'utf8';
        $connect = new DbModel($db, $host, $user, $pass, $charset);
        {
            str_replace(' ','',$_POST["pass"]);
            str_replace(' ','',$_POST["r_pass"]);
            str_replace(' ','',$_POST["login"]);
            str_replace(' ','',$_POST["username"]);
            $pass = $_POST["pass"];
            $r_pass = $_POST["r_pass"];

            if (($pass == " ")||($_POST["login"] == " ")||($_POST["username"] == " ")||($pass !== $r_pass))
            {
                $viewgen -> pagegenerate ('vreg.php');
                die ("incorrect data!");
            }
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
                $logineduser = new ReaderModel($user['login'], $user['pass'], $user['username'], $user['about_me']);
                echo ("HELLO ".$user['name'].'!');
            }
            else {
                $viewgen -> pagegenerate ('vreg.php');
                die ("A User with such data is already registered!");
            }
        }
        if (isset($_POST["reg"]))
            ($connect);
        $viewgen -> pagegenerate ('vmainpage.html');
    }
}
