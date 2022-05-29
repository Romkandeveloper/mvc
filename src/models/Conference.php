<?php

namespace src\models;

use src\core\Model;
use src\lib\db;

class Conference extends Model
{
    private $id;
    private $title;
    private $country;
    private $date;
    private $latitudo;
    private $longitude;

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getLatitudo()
    {
        return $this->latitudo;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    static function getConference($id)
    {
        $params = ['id' => $id];
        $db = new Db;
        $data = $db->query('SELECT * FROM conferences WHERE id = :id', $params);
        $conference = self::setConferenceModel($data[0]);
        return $conference;
    }

    static function getAllConferences()
    {
        $db = new Db;
        $data = $db->query('SELECT * FROM conferences');
        $models = [];

        foreach ($data as $row)
        {
            $models[] = self::setConferenceModel($row);
        }

        return $models;
    }

    private static function setConferenceModel($row)
    {
        $conference = new Conference();
        $conference->id = $row['id'];
        $conference->title = $row['title'];
        $conference->country = $row['country'];
        $conference->date = $row['date'];
        $conference->latitudo = $row['latitudo'];
        $conference->longitude = $row['longitude'];

        return $conference;
    }
}

?>