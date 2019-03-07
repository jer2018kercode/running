<?php
namespace J\model;
use \J\model\Manager;
use \PDO;

// declaration de la classe enfant
class CandidateManager extends Manager
{
    // rejoindre une course
    public function joinRace( $number )
    {
        $db = $this->dbConnect();
        $addMemberToRace = $db->prepare( 'UPDATE outdoor SET id_Member = 2 WHERE id = ?' );
        $addMemberToRace->execute( array( 
            $number
        ));

        return $addMemberToRace;
    }

    // rejoindre une sortie
    public function joinOutdoor( $number )
    {
        $db = $this->dbConnect();
        $addMemberToOutdoor = $db->prepare( 'UPDATE outdoor SET id_Member = 7 WHERE id = ?' );
        $addMemberToOutdoor->execute( array( 
            $number
        ));

        return $addMemberToOutdoor;
    }






    // join race
    // public function raceConfirm( $race, $id_member )
    // {
    //     $db = $this->dbConnect();
    //     $raceConfirm = $db->prepare( 'INSERT INTO outdoor( race, id_Member ) VALUES( ?, ? )' );
    //     $raceConfirm->execute( array( 
    //         1,
    //         1
    //     ));

    //     return $raceConfirm;
    // }

    // to join race
    /* public function raceConfirm()
    {
        $db = $this->dbConnect();
        $joinRace = $db->prepare( 'SELECT member.username, member.city FROM member 
        INNER JOIN outdoor ON member.id = outdoor.id' );
        $joinRace->execute();

        return $joinRace; 
    } */

    /* public function raceConfirm()
    {
        $db = $this->dbConnect();
        $joinRace = $db->prepare( 'SELECT member.username, member.city FROM member 
        INNER JOIN outdoor ON member.id = outdoor.id' );
        $joinRace->execute();

        return $joinRace;
    } */
}
