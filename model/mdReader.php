<?php
require_once "mdAnon.php";
class mdReader extends mdAnon
{
protected $login, $pass, $username, $about;

    public
    function __construct($login, $pass, $username, $about)
    {
        $this -> login = $login;
        $this -> pass = $pass;
        $this -> username = $username;
        $this -> about = $about;
        $this -> lvl = "reader";
    }

}