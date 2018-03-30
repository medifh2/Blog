<?php
namespace control;
class cmainpage {

    function __construct()
    {

    }
    public function index()
    {
        $test = 'mainpage';
        echo "index";
        return $test;
    }
    public function login()
    {
        $test = 'login';
        return $test;
    }

}
// ROUTER in index.php
// autoload !!! (PSR)
// PDO
// MVC
// OOP in PHP
// --ORM in PHP - read about
//namespace csr
