<?php
    namespace tec;
    class router
    {
        public
        function __construct()
        {
            $route = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
            $routing = [
                '/' => ['control' => 'cmainpage', 'action' => 'showmainpage'],
                '/login' => ['control' => 'cUser', 'action' => 'showloginpage'],
                '/registration' => ['control' => 'cUser', 'action' => 'showregpage'],
                '/userpage' => ['control' => 'cUser', 'action' => 'showuserpage'],
                '/loguser' => ['control' => 'cUser', 'action' => 'login'],
                '/reguser' => ['control' => 'cUser', 'action' => 'registration']
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

