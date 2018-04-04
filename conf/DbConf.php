<?php
namespace conf;
class DbConf
{
    private $dbconf;

    function __construct()
{
        $this -> dbconf['name'] = 'blog';
        $this -> dbconf['host'] = 'localhost';
        $this -> dbconf['user'] = 'root';
        $this -> dbconf['pass'] = 'root';
        $this -> dbconf['charset'] = 'utf8';
}
    function getData()
    {
        return $this -> dbconf;
    }
}

