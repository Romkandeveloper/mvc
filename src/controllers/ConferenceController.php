<?php

namespace src\controllers;

use src\core\Controller;
use src\lib\Db;

class ConferenceController extends Controller
{
    public function listAction()
    {
        $vars = $this->model->getAllConferences();
        echo $vars;
        $this->view->render('Conferences', $vars);
    }


}

?>
