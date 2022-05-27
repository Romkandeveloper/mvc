<?php

    namespace src\core;

    class Router
    {
        protected $routes = [];
        protected $params = [];

        public function __construct()
        {
            $routes = require 'src/config/routes.php';
            //debug($arr);
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
            $url = trim($_SERVER['REQUEST_URI'], '/');
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
                echo 'Route was found';
            } else {
                echo 'Route was not found';
            }
        }

    }

?>