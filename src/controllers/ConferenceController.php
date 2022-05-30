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

    public function indexAction()
    {
        $conferenceId = $_GET['id'];
        $conference = Conference::getConference($conferenceId);
        $this->view->render('Conferences | '.$conference->getTitle() ,$conference);
    }

    public function createViewAction()
    {
        $this->view->render('Conferences | Create');
    }

    public function createConferenceAction()
    {
        $data = $_POST;
        $conference = Conference::createConference($data);
        $this->view->redirect('/');
    }

    public function deleteConferenceAction()
    {
        $conferenceId = $_POST['id'];
        Conference::deleteConference($conferenceId);
        $this->view->redirect('/');
    }
}

?>
