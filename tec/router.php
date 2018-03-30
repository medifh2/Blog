<?php
    namespace tec;
    class router
    {
        public
        function __construct()
        {
            $route = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
            $routing = [
                '/' => ['control' => 'cmainpage', 'action' => 'index'],
                '/login' => ['control' => 'cUser', 'action' => 'showloginpage']
            ];
            if(isset($routing[$route]))
            {
                $controller = '\\control\\'.$routing[$route]['control'];
                $controller_obj = new $controller();
                $act = $routing[$route]['action'];
                $controller_obj -> $act();
            }
            else echo 'page not found';
        }
    }

