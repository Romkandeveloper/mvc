<?php

namespace src\models;

use src\core\Model;

class Account extends Model
{
    public function getNews()
    {
        //query
        $params = [
            'id' => 2,
        ];
        $data = $this->db->query('SELECT name FROM conferences WHERE id = :id ', $params);
        return $data;
    }
}

?>