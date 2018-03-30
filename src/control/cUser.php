<?php
namespace control;

class cUser {

    public function showloginpage()
    {
        include __DIR__.'/../view/vlog.php';
    }

    public function showregpage()
    {
        include __DIR__.'/../view/vreg.php';
    }

    public function showuserpage()
    {
        include __DIR__.'/../view/vuserpage.php';
    }
}
// ROUTER in index.php
// autoload !!! (PSR)
// PDO
// MVC
// OOP in PHP
// --ORM in PHP - read about
//namespace csr
