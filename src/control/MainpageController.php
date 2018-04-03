<?php
namespace control;
use view\View;
class MainpageController {

    function __construct()
    {

    }
    public function showmainpage()
    {
        $viewgen = new View;
        $viewgen -> pagegenerate ('MainpageView.html');
    }
}
// ROUTER in index.php
// autoload !!! (PSR)
// PDO
// MVC
// OOP in PHP
// --ORM in PHP - read about
//namespace csr
