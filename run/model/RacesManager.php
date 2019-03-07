<?php
namespace J\model;
use \J\model\Manager;
use \PDO;

// declaration de la classe enfant
class RacesManager extends Manager
{
    // montrer toutes les courses officielles
    public function showRaces()
    {
        $db = $this->dbConnect();
        $showAllRaces = $db->prepare( 'SELECT * FROM outdoor WHERE race = 1' );
        $showAllRaces->execute();

        return $showAllRaces;
    }

    // montrer une seule course officielle
    public function showRace( $id )
    {
        $db = $this->dbConnect();
        $showOneRace = $db->prepare( 'SELECT * FROM outdoor WHERE id = ?' );
        $showOneRace->execute( array( $id ) );

        return $showOneRace;
    }
}
