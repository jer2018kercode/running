<?php
namespace J\model;
use \J\model\Manager;
use \PDO;

// declaration de la classe enfant
class OutdoorsManager extends Manager 
{
    // montrer toutes les sorties
    public function showOutdoors()
    {
        $db = $this->dbConnect();
        $showAllOutdoors = $db->prepare( 'SELECT * FROM outdoor WHERE race = 0' );
        $showAllOutdoors->execute();

        return $showAllOutdoors;
    }

    // montrer une seule sortie
    public function showOutdoor( $id )
    {
        $db = $this->dbConnect();
        $showOneOutdoor = $db->prepare( 'SELECT * FROM outdoor WHERE id = ?' );
        $showOneOutdoor->execute( array( $id ) );

        return $showOneOutdoor;
    }

    // créer une sortie
    public function createOutdoor( $title, $description, $date /* $id_member */ )
    {
        $db = $this->dbConnect();
        $createOneOutdoor = $db->prepare( 'INSERT INTO outdoor( title, description, date, id_Member ) VALUES( ?, ?, ?, ? )' );
        $createOneOutdoor->execute( array(
            $title,
            $description,
            $date,
            8
        ));

        return $createOneOutdoor;
    }

    // modifier sa sortie
    public function updateOutdoor( $number, $title, $description, $city, $date )
    {
        $db = $this->dbConnect();
        $updateOneOutdoor = $db->prepare( 'UPDATE outdoor SET title = ?, description = ?,
        city = ?, date = ? WHERE id = ?' );
        $updateOneOutdoor->execute( array(
            $title,
            $description,
            $city,
            $date,
            $number
        ));

        return $updateOneOutdoor;
    }

     // supprimer sa sortie
     public function cancelOutdoor( $number )
     {
        $db = $this->dbConnect();
        $cancelOneOutdoor = $db->prepare( 'DELETE FROM outdoor WHERE id = ?' );
        $cancelOneOutdoor->execute( array(
            $number
        ));
 
        return $cancelOneOutdoor;
     }
}