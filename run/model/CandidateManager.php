<?php
namespace J\model;
use \J\model\Manager;
use \PDO;

// declaration of a child class
class CandidateManager extends Manager
{
    // to join race
    public function raceConfirm( $id, $id_member )
    {
        $db = $this->dbConnect();
        $joinRace = $db->prepare('INSERT INTO participates_to( id, id_Member ) values( ?, ? )');
        $joinRace->execute(array(
            3,
            2
        ));

        return $joinRace;
    }
}
