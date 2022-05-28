<?php

namespace src\controllers;

use src\core\Controller;

class AccountController extends Controller
{
    public function loginAction()
    {
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
