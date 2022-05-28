<?php

namespace src\controllers;

use src\core\Controller;
use src\lib\Db;

class AccountController extends Controller
{
    public function loginAction()
    {
        $vars = $this->model->getNews();
        $this->view->render('login',$vars);
    }

    public function registerAction()
    {
        $this->view->layout = 'custom';
        $this->view->render('register');
    }
}

?>
