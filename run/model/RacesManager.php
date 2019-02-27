<?php
namespace J\model;
use \J\model\Manager;
use \PDO;

// declaration of a child class
class RacesManager extends Manager
{
    // the races
    public function showRace()
    {
        $db = $this->dbConnect();
        $showRaces = $db->prepare('SELECT * FROM race');
        $showRaces->execute();

        return $showRaces;
    }
}
