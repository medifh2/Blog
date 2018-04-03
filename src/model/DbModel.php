<?php
namespace model;
use PDO;
class DbModel
{
    private $dsn, $opt, $pdo;

    function __construct($db, $host, $user, $pass, $charset)
    {
        $this -> dsn = "mysql:host = $host; db = $db; charset = $charset";
        $this -> opt =
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $this -> pdo = new PDO($this -> dsn, $user, $pass, $this -> opt);
    }

    function add_user($user)
    {
        if (!($this -> pdo)) echo "error";
        $st1 = ($this -> pdo) -> prepare ('SELECT Login FROM blog.Users WHERE ((Login = :login) OR (Username = :username))');
        $st1 -> bindParam(':login', $user['login']);
        $st1 -> bindParam(':username', $user['name']);
        $st1 -> execute();
        $res = $st1 -> fetchAll();
        if ($res) { return 0;}
        else {
            $st = ($this->pdo)->prepare("INSERT INTO blog.Users 
            (Login, Password, Username, About_me, accesslvl) 
            VALUES (:login, :pass, :uname, :about, :lvl)");
            $st->bindParam(':uname', $user['name']);
            $st->bindParam(':login', $user['login']);
            $st->bindParam(':pass', $user['pass']);
            $st->bindParam(':about', $user['about']);
            $st->bindParam(':lvl', $user['lvl']);
            $st->execute();
            return 1;
        }
    }

    function login_user($login, $pass)
    {
        $st = ($this -> pdo) -> prepare ('SELECT * FROM blog.Users WHERE ((Login = :login) AND (Password = :pass))');
        $st -> bindParam(':login', $login);
        $st -> bindParam(':pass', $pass);
        $st -> execute();
        $res = $st -> fetchAll();
        echo ($res['0']['Username']);
        return $res;
    }
}