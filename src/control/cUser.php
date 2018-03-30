<?php
namespace control;
require '../view/vlog.php';
class cUser {

    public function showloginpage()
    {
        $f = fopen('vlog.php', "rt") or die("Ошибка!");
        $loginpage = file_get_contents($f);
        echo $loginpage;
    }

}
// ROUTER in index.php
// autoload !!! (PSR)
// PDO
// MVC
// OOP in PHP
// --ORM in PHP - read about
//namespace csr
