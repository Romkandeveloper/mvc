<?php

namespace src\models;

use src\core\Model;

class Conference extends Model
{
    public function getConference($id)
    {
        $params = ['id' => $id];
        $data = $this->db->query('SELECT * FROM conference WHERE id = :id', $params);
        return $data;
    }

    public function getAllConferences()
    {
        $data = $this->db->query('SELECT title, date FROM conferences');
        return $data;
    }

    public function createConference()
    {

    }
}

?>