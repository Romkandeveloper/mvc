<?php

namespace src\core;

class View
{
    public $path;
    public $route;
    public $layout = 'default';

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
    }

    public function render($title, $vars = [])
    {
        extract($vars);
        if(file_exists('src/views/'.$this->path.'.php'))
        {
            ob_start();
            require 'src/views/'.$this->path.'.php';
            $content = ob_get_clean();

            if(file_exists('src/views/layouts/'.$this->layout.'.php'))
            {
                require 'src/views/layouts/'.$this->layout.'.php';
            }
            else
            {
                self::errorCode(404);
            }
        }
        else
        {
            self::errorCode(404);
        }

    }

    //should replace
    public function redirect($url)
    {
        header('location: '.$url);
        exit;
    }

    public static function errorCode($code)
    {
        $path = 'src/views/errors/'.$code.'.php';
        if(file_exists($path))
        {
            http_response_code($code);
            require 'src/views/errors/'.$code.'.php';
        }
        exit;
    }
}

?>
