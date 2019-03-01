<?php
namespace J\model;
use \J\model\Manager;
use \PDO;

// declaration of a child class
class RacesManager extends Manager
{
    // show one race
    public function showRace( $id )
    {
        $db = $this->dbConnect();
        $showRace = $db->prepare('SELECT * FROM race WHERE id = ?');
        $showRace->execute( array( $id ) );

        return $showRace;
    }

    // show races
    public function showRaces()
    {
        $db = $this->dbConnect();
        $showRaces = $db->prepare('SELECT * FROM race WHERE outdoor = 0');
        $showRaces->execute();

        return $showRaces;
    }

    // join races
    public function joinRace( $title, $city, $outdoor )
    {
        $db = $this->dbConnect();
        $joinRace = $db->prepare( 'INSERT INTO race( title, city, outdoor, id_Member) values( ?, ?, ?, ? )' );
        $joinRace->execute(array( 
            $title,
            $city,
            $outdoor,
            1
        ));

        return $joinRace;
    }
}
