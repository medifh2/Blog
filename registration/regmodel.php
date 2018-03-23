<?php
class modeldb
{
    private $db;

    public
    function __construct() {
        $this -> db = mysqli_connect("localhost", "root", "root", "blog");
    }
    function add_user($login, $pass, $uname, $about, $lvl)
    {

        if (!($this -> db)) echo "error";
        $query = mysqli_query($this -> db, "INSERT INTO `Users` (`Login`, `Password`, `Username`,`About_me`,`accesslvl`)
                                     VALUES ($login, $pass, $uname, $about, $lvl)");
    }
}