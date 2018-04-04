<?php
namespace control;
use view\View;
use model\DbModel;
use model\ReaderModel;
use model\WriterModel;
use model\AdminModel;
use conf\DbConf;
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
            $viewgen = new View;
            $dbconf = new DbConf;
            $connect = new DbModel($dbconf);
            $login = $_POST["login"];
            $pass = md5($_POST["pass"]);
            if ($userdate = $connect -> login_user($login, $pass)) {

                switch ($userdate['accesslvl']) {
                    case 'reader' : $user = new ReaderModel($userdate['Login'], $userdate['Password'], $userdate['Username'], $userdate['About_me']); break;
                    case 'writer' : $user = new WriterModel($userdate['Login'], $userdate['Password'], $userdate['Username'], $userdate['About_me']); break;
                    case 'admin' : $user = new AdminModel($userdate['Login'], $userdate['Password'], $userdate['Username'], $userdate['About_me']); break;
                }
            }
            else echo "Wrong password or login";
        }
        ($connect);
        $_SESSION['is_login'] = 1;
        $_SESSION['user'] = $user;
        $_SESSION['Userdata'] = $user -> allData();
        print_r($_SESSION['Userdata']);
        $viewgen -> pagegenerate ('MainpageView.html');

    }
    public function registration()
    {
        $viewgen = new View;
        $dbconf = new DbConf;
        $connect = new DbModel($dbconf);
        {
            $_POST["pass"] = str_replace(' ','',$_POST["pass"]);
            $_POST["r_pass"] = str_replace(' ','',$_POST["r_pass"]);
            $_POST["login"] = str_replace(' ','',$_POST["login"]);
            $_POST["username"] = str_replace(' ','',$_POST["username"]);
            $pass = $_POST["pass"];
            $r_pass = $_POST["r_pass"];
            if (!$pass || !$_POST["login"] || !$_POST["username"] || ($pass !== $r_pass))
            {
                $viewgen -> pagegenerate ('RegView.html');
                print_r($_POST["username"]);
                die ("incorrect data!");
            }
            $pass = md5($pass);
            $user =
                [
                    'login' => $_POST["login"],
                    'pass' =>$pass,
                    'username' => $_POST["username"],
                    'about_me' => $_POST["about_me"],
                    'lvl' => 'reader'
                ];
            if ($connect -> add_user($user))
            {
                $user = new ReaderModel($user['login'], $user['pass'], $user['username'], $user['about_me']);
                $_SESSION['is_login'] = 1;
                $_SESSION['user'] = $user;
                $_SESSION['Userdata'] = $user -> allData();
                $viewgen -> pagegenerate ('MainpageView.html');
            }
            else {
                $viewgen -> pagegenerate ('RegView.html');
                die ("A User with such data is already registered!");
            }
        }
    }
}
