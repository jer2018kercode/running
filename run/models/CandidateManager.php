<?php
namespace J\models;
use \J\models\Manager;
use \PDO;

// declaration de la classe enfant
class CandidateManager extends Manager
{
    // rejoindre une course
    public function joinRace( $id_race, $id_member )
    {
        $db = $this->dbConnect();
        $addMemberToRace = $db->prepare( 'INSERT INTO participates( id_Member, id_Outdoor ) VALUES( ?, ? )' );
        $addMemberToRace->execute( array( $id_member, $id_race ) );

        return $addMemberToRace;
    }

    // voir tous les participants d'une sortie
    public function outdoorCandidates( $id_outdoor )
    {
        $db = $this->dbConnect();
        $candidates = $db->prepare( 'SELECT username FROM member INNER JOIN participates ON
        member.id = participates.id_Member WHERE id_Outdoor = ?' );
        $candidates->execute( array( $id_outdoor ) );
        
        return $candidates;
    }

    // rejoindre une sortie
    public function joinOutdoor( $id_member, $id_outdoor )
    {
        $db = $this->dbConnect();
        $addMemberToOutdoor = $db->prepare( 'INSERT  INTO participates( id_Member, id_Outdoor ) VALUES( ?, ? )' );
        $addMemberToOutdoor->execute( array( $id_member, $id_outdoor ) );

        return $addMemberToOutdoor;
    }

    // supprimer sa participation
    public function renounceOutdoor( $id_outdoor )
    {
        $db = $this->dbConnect();
        $renounceOutdoor = $db->prepare( 'DELETE FROM participates WHERE id_Member = ? AND id_Outdoor = ?' );
        $renounceOutdoor->execute( array( $_SESSION['id'], $id_outdoor ) );
        
        return $renounceOutdoor;
    }

    // supprimer sa participation
    public function renounceRace( $id_race )
    {
        $db = $this->dbConnect();
        $renounceRace = $db->prepare( 'DELETE FROM participates WHERE id_Member = ? AND id_Outdoor = ?' );
        $renounceRace->execute( array( $_SESSION['id'], $id_race ) );
        
        return $renounceRace;
    }
}
