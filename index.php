<?php
    session_start();
    require_once 'loader.php';
    use tec\router;
    $router = new router;
    echo "<a href='src/view/vmainpage.php'>Go back to main page</a>";

