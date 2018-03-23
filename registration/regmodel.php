<?php
class modeldb
{
    private $dsn, $opt, $pdo;

    public
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
        $st = $this -> pdo -> prepare ('INSERT INTO ? VALUES (?, ?, ?, ?, ?)');
        $st -> execute(array('Users', $user));
        //$st = "INSERT INTO ? SET ?";
        //$st = $this -> pdo -> prepare($st);
        //$st->execute('users', $user);
        //$st = "INSERT INTO Users (Login, Password, Username, About_me, accesslvl)
        //VALUES (:login, :pass, :uname, :about, :lvl)";
        //$query = $this -> pdo ->prepare($st);
        //$query->execute( array
        //(
        //    ':login' => $user['login'],
        //    ':pass' => $user['pass'],
        //    ':uname' => $user['name'],
        //    ':about' => $user['about'],
        //    ':lvl' => $user['lvl']
        //));
    }
}