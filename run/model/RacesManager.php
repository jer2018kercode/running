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
        $showRace = $db->prepare( 'SELECT * FROM outdoor WHERE id = ?' );
        $showRace->execute( array( $id ) );

        return $showRace;
    }

    // show races
    public function showRaces()
    {
        $db = $this->dbConnect();
        $showRaces = $db->prepare( 'SELECT * FROM outdoor WHERE race = 1' );
        $showRaces->execute();

        return $showRaces;
    }

    // to join race
    public function raceConfirm()
    {
        $db = $this->dbConnect();
        $joinRace = $db->prepare( 'SELECT ' );
        $joinRace->execute( array(
            3,
            2
        ));

        return $joinRace;
    }
}
