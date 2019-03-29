<?php
namespace J\models;
use \J\models\Manager;
use \PDO;

// declaration de la classe enfant
class ProgressionManager extends Manager
{
    // progession d'un utilisateur
    public function progression( $id_member ) 
    {
        $db = $this->dbConnect();
        $memberProgression = $db->prepare( 'SELECT id, distance, time, id_Member FROM
        progression WHERE id_Member = ?' );
        $memberProgression->execute( array( $id_member ) );

        return $memberProgression;
    }

    // calcul de la progession d'un utilisateur
    public function progressionSum( $id_member ) 
    {
        $db = $this->dbConnect();
        $memberProgressionSum = $db->prepare( 'SELECT sum(distance) as totalDistance,
        sum(time) as totalTime FROM progression WHERE id_Member = ?' );
        $memberProgressionSum->execute( array( $id_member ) );
    }

    // insérer les données dans la bdd
    public function progressionSave( $distance, $time, $id_member ) 
    {
        $db = $this->dbConnect();
        $save = $db->prepare( 'INSERT INTO progression( distance, time, id_Member ) VALUES( ?, ?, ? )' );
        $save->execute( array( $distance, $time, $id_member ) );

        return $save;
    }

    // supprimer une course (administrateur)
    public function deleteProg( $id_progression )
    {
        $db = $this->dbConnect();
        $deleteOneProg = $db->prepare( 'DELETE FROM progression WHERE id = ?' );
        $deleteOneProg->execute( array( $id_progression ) );
  
        return $deleteOneProg;
    }
}
