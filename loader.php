<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);

spl_autoload_register (function ($class)
        {
            echo "nya";
            $arr = explode('\\', $class);
            switch ($arr[0])
            {
                case 'view': {$pre = 'src/'; break;}
                case 'control': {$pre = 'src/'; break;}
                case 'model': {$pre = 'src/'; break;}
                case 'tec': {$pre = ''; break;}
                default: $pre = '';
            }
            $path = __DIR__ . '/' .$pre. str_replace('\\', '/', $class) . '.php';

            if (is_file($path))
            {
                require $path;
                return;
            }
            throw new \LogicException(sprintf('Class "%s" not found in "%s"', $class, $path));
        });
