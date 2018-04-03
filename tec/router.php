<?php
    namespace tec;
    class router
    {
        public
        function __construct()
        {
            $route = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
            $routing = [
                '/' => ['control' => 'MainpageController', 'action' => 'showmainpage'],
                '/login' => ['control' => 'UserController', 'action' => 'showloginpage'],
                '/registration' => ['control' => 'UserController', 'action' => 'showregpage'],
                '/userpage' => ['control' => 'UserController', 'action' => 'showuserpage'],
                '/loguser' => ['control' => 'UserController', 'action' => 'login'],
                '/reguser' => ['control' => 'UserController', 'action' => 'registration'],
                '/logout' => ['control' => 'UserController', 'action' => 'logout']
            ];
            if(isset($routing[$route]))
            {
                $controller = '\\control\\'.$routing[$route]['control'];
                $controller_obj = new $controller();
                $act = $routing[$route]['action'];
                $controller_obj -> $act();
            }
            else echo $route.' not found';
        }
    }

