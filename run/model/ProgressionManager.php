<?php
namespace J\model;
use \J\model\Manager;
use \PDO;

// declaration de la classe enfant
class ProgressionManager extends Manager
{
    // suivi de la progession d'un utilisateur
    public function progression( $number ) 
    {
        $db = $this->dbConnect();
        $memberProgression = $db->prepare( 'SELECT * FROM progression WHERE id_Member = ?' );
        $memberProgression->execute( array(
            $number
        ));

        //$prog->closeCursor();
        return $memberProgression;
    }
}
