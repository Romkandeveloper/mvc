<?php

namespace src\lib;

use PDO;

class Db
{
    protected $db;

    public function __construct()
    {
        $dbConfig = require 'src\config\db.php';
        $this->db = new PDO('mysql:host='.$dbConfig['host'].';dbname='.$dbConfig['dbname'], $dbConfig['user'], $dbConfig['password']);
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
        if(!empty($params))
        {
            foreach ($params as $key => $val)
            {
                $stmt->bindValue(':'.$key, $val);
            }
        }
        $stmt->execute();
        return $stmt->fetch();
    }
}

?>