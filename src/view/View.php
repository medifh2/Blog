<?php
namespace view;
class View
{
    public function pagegenerate ($file)
    {
        include 'styles/styles.php';
        include 'vtop.php';
        include $file;
    }
}