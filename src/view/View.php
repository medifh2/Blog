<?php
namespace view;
class View
{
    public function pagegenerate ($file)
    {
            if ($_SESSION['is_login']) {
                include 'UtopView.html';
            }
        else include 'TopView.html';
        include $file;
    }
}