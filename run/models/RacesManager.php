<?php
namespace J\models;
use \J\models\Manager;
use \PDO;

// declaration de la classe enfant
class RacesManager extends Manager
{
    // montrer toutes les courses officielles
    public function showRaces()
    {
        $db = $this->dbConnect();
        $showAllRaces = $db->prepare( 'SELECT id, title, description, city, postcode, race,
        id_Member, DATE_FORMAT( date, \' %d/%m/%Y \' ) AS date FROM outdoor WHERE race = 1' );
        $showAllRaces->execute();

        return $showAllRaces;
    }

    // montrer toutes les courses (filtre)
    public function showRacesWithFilter ( $filter )
    {
        $db = $this->dbConnect();
        $raceFilter = $db->prepare( 'SELECT * FROM outdoor WHERE city LIKE :filter' );
        $raceFilter->execute(array(
            ':filter' => '%' . $filter . '%'
        ));

        return $raceFilter;
    }

    // montrer une seule course officielle
    public function showRace( $id )
    {
        $db = $this->dbConnect();
        $showOneRace = $db->prepare( 'SELECT id, title, description, city, postcode, race,
        id_Member, DATE_FORMAT( date, \' %d/%m/%Y \' ) AS date FROM outdoor WHERE id = ?' );
        $showOneRace->execute( array( $id ) );

        $show = $showOneRace->fetch();

        return $show;
    }

    // créer une course (admin)
    public function newRace( $title, $description, $city, $date, $id_member )
    {
        $db = $this->dbConnect();
        $createRace = $db->prepare( 'INSERT INTO outdoor( title, description, city, date, id_Member, race ) VALUES
        ( ?, ?, ?, ?, ?, 1 ) ' );
        $createRace->execute( array( $title, $description, $city, $date, $id_member ) );

        return $createRace;
    }

    // modifier une course (admin)
    public function updateRace( $number, $title, $description, $city, $date )
    {
        $db = $this->dbConnect();
        $updateOneRace = $db->prepare( 'UPDATE outdoor SET title = ?, description = ?,
        city = ?, date = ? WHERE id = ?' );
        $updateOneRace->execute( array( $title, $description, $city, $date, $number ) );

        return $updateOneRace;
    }

    // supprimer une course (admin)
    public function deleteRace( $number )
    {
        $db = $this->dbConnect();
        $participate = $db->prepare( 'DELETE FROM participates WHERE id_Outdoor = ?' );
        $participate->execute( array( $id_outdoor ) );

        $db = $this->dbConnect();
        $deleteOneRace = $db->prepare( 'DELETE FROM outdoor WHERE id = ?' );
        $deleteOneRace->execute( array( $number ) );
  
        return $deleteOneRace;
    }
}
