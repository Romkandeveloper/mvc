<?php

namespace src\models;

use src\core\Model;

class Conference extends Model
{
    public function getConference($id)
    {
        $params = ['id' => $id];
        $data = $this->db->query('SELECT * FROM conferences WHERE id = :id', $params);
        return $data;
    }

    public function getAllConferences()
    {
        $data = $this->db->query('SELECT name FROM conferences');
        return $data;
    }

    public function createConference()
    {

    }
}

?>