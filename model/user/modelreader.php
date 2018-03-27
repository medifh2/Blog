<?php
require_once "modelanon.php";
class modelreader extends modelanonymous
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