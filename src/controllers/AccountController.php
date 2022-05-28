<?php

namespace src\controllers;

use src\core\Controller;
use src\lib\Db;

class AccountController extends Controller
{
    public function loginAction()
    {
        $db = new Db;

        $params = [
          'id' => 2,
        ];

        $data = $db->query('SELECT name FROM users WHERE id = 1', $params);
        $vars = []; //example
        $this->view->render('login',$vars);
    }

    public function registerAction()
    {
        $this->view->layout = 'custom';
        $this->view->render('register');
    }
}

?>
