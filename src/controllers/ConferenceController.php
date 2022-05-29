<?php

namespace src\controllers;

use src\core\Controller;
use src\core\Model;
use src\lib\Db;
use src\models\Conference;

class ConferenceController extends Controller
{
    public function listAction()
    {
        $conferences = Conference::getAllConferences();
        $this->view->render('Conferences', $conferences);
    }
}

?>
