<?php
namespace J\models;
use \J\models\Manager;
use \PDO;

// declaration de la classe enfant
class OutdoorsManager extends Manager 
{
    // montrer toutes les sorties
    public function showOutdoors()
    {
        $db = $this->dbConnect();
        $showAllOutdoors = $db->prepare( 'SELECT outdoor.id, title, description, outdoor.city, outdoor.postcode,
        username, race, DATE_FORMAT( date, \' %d/%m/%Y \' ) AS date FROM outdoor INNER JOIN member ON
        outdoor.id_Member = member.id WHERE race = 0' );
        $showAllOutdoors->execute();

        return $showAllOutdoors;
    }

    // montrer toutes les sorties (filtre)
    public function showOutdoorsWithFilter ($filter )
    {
        $db = $this->dbConnect();
        $outdoorFilter = $db->prepare( 'SELECT * FROM outdoor WHERE city LIKE :filter' );
        $outdoorFilter->execute(array(
            ':filter' => '%' . $filter . '%'
        ));

        return $outdoorFilter;
    }

    // montrer une seule sortie
    public function showOutdoor( $id )
    {
        $db = $this->dbConnect();
        $showOneOutdoor = $db->prepare( 'SELECT outdoor.id, title, description, outdoor.city, outdoor.postcode,
        username, DATE_FORMAT( date, \' %d/%m/%Y \' ) AS date FROM outdoor INNER JOIN member ON
        outdoor.id_Member = member.id WHERE outdoor.id = ?' );
        $showOneOutdoor->execute( array( $id ) );

        $show = $showOneOutdoor->fetch();

        return $show;
    }

    // créer une sortie (admin ou membre créateur)
    public function createOutdoor( $title, $description, $city, $date, $id_member )
    {
        $db = $this->dbConnect();
        $createOneOutdoor = $db->prepare( 'INSERT INTO outdoor( title, description, city, date, id_Member ) VALUES
        ( ?, ?, ?, ?, ? )' );
        $createOneOutdoor->execute( array( $title, $description, $city, $date, $id_member ) );

        return $createOneOutdoor;
    }

    // modifier sa sortie (admin ou membre créateur)
    public function updateOutdoor( $number, $title, $description, $city, $date )
    {
        $db = $this->dbConnect();
        $updateOneOutdoor = $db->prepare( 'UPDATE outdoor SET title = ?, description = ?,
        city = ?, date = ? WHERE id = ?' );
        $updateOneOutdoor->execute( array( $title, $description, $city, $date, $number ) );

        return $updateOneOutdoor;
    }

    // supprimer sa sortie (admin ou membre créateur)
    public function cancelOutdoor( $id_outdoor )
    {
        $db = $this->dbConnect();
        $participate = $db->prepare( 'DELETE FROM participates WHERE id_Outdoor = ?' );
        $participate->execute( array( $id_outdoor ) );

        $cancelOneOutdoor = $db->prepare( 'DELETE FROM outdoor WHERE id = ?' );
        $cancelOneOutdoor->execute( array( $id_outdoor ) );
 
        return $cancelOneOutdoor;
    }
}