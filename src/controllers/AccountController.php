<?php

namespace src\controllers;

use src\core\Controller;

class AccountController extends Controller
{

    public function loginAction()
    {
        $this->view->render('Hi');
    }

    public function registerAction()
    {
        echo 'Страница регистрации';
    }
}

?>
