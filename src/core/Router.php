<?php

    namespace src\core;

    class Router
    {
        protected $routes = [];
        protected $params = [];

        public function __construct()
        {
            $routes = require 'src/config/routes.php';
            foreach ($routes as $route => $params)
            {
                $this->add($route, $params);
            }
        }

        public function add($route, $params)
        {
            $route = '#^'.$route.'$#';
            $this->routes[$route] = $params;
        }

        public function match()
        {
            $url = $_SERVER['REQUEST_URI'];
            $url = substr($url, 0, strrpos($url, '?'));
            $url = trim($url, '/');
            foreach ($this->routes as $route => $params)
            {
                if(preg_match($route, $url, $matches))
                {
                    $this->params = $params;
                    return true;
                }
            }
            return false;
        }

        public function run()
        {
            if($this->match())
            {
                $path = 'src\controllers\\'.ucfirst($this->params['controller']).'Controller';
                if(class_exists($path))
                {
                    $action = $this->params['action'].'Action';
                    if(method_exists($path, $action))
                    {
                        $controller = new $path($this->params);
                        $controller->$action();
                    }
                    else
                    {
                        View::errorCode(404);
                    }
                }
                else
                {
                    View::errorCode(404);
                }
            }
            else
            {
                View::errorCode(404);
            }
        }
    }

?>