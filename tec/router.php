<?php
    namespace tec;
    use view\View;
    class router
    {
        public
        function __construct()
        {
            $route = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
            $routing = [
                '/' => ['control' => 'MainpageController', 'action' => 'showMainPage'],
                '/login' => ['control' => 'UserController', 'action' => 'showLoginPage'],
                '/registration' => ['control' => 'UserController', 'action' => 'showRegPage'],
                '/userpage' => ['control' => 'UserController', 'action' => 'showUserPage'],
                '/loguser' => ['control' => 'UserController', 'action' => 'login'],
                '/reguser' => ['control' => 'UserController', 'action' => 'registration'],
                '/edituser' => ['control' => 'UserController', 'action' => 'editUserData'],
                '/logout' => ['control' => 'UserController', 'action' => 'logout'],
                '/changeabout' => ['control' => 'UserController', 'action' => 'changeAbout'],
                '/settings' => ['control' => 'UserController', 'action' => 'showSettings']
            ];
            if(isset($routing[$route]))
            {
                $controller = '\\control\\'.$routing[$route]['control'];
                $controller_obj = new $controller();
                $act = $routing[$route]['action'];
                $controller_obj -> $act();
            }
            else {
                $viewgen = new View;
                $viewgen -> pagegenerate ('Error404View.html');
            }
        }
    }

