<?php
class mdAnon
{
    protected $lvl;

    public
    function __construct()
    {
        $this -> lvl = "anon";
    }

    function get_lvl()
    {
            return $this -> lvl;
    }
}
