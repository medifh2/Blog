<?php
    session_start();
    if (!isset($_SESSION['is_login'])) $_SESSION['is_login'] = 0;
    require_once 'loader.php';
    use tec\router;
    $router = new router;

