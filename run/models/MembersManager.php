<?php
namespace J\models;
use \J\models\Manager;
use \PDO;

// declaration de la classe enfant
class MembersManager extends Manager
{
    // nouveau membre dans la bdd
    public function registerMember( $username, $password, $firstname, $lastname, $mail )
    {
        $db = $this->dbConnect();
        $register = $db->prepare( 'INSERT INTO member( username, password, firstname, lastname, mail ) VALUES
        ( ?, ?, ?, ?, ? )' );
        $register->execute( array( $username, $password, $firstname, $lastname, $mail ) );

        return $register;
    }

    // connection d'un membre inscrit
    public function connect( $username )
    {
        $db = $this->dbConnect();
        $connect = $db->prepare( 'SELECT id, username, password, firstname, lastname, mail, cellphone,
        city, postcode, level FROM member WHERE username = ?' );
        $connect->execute( array( $username ) );

        $userConnect = $connect->fetch();
        $connect->closeCursor();
        
        return $userConnect;
    }

    // pour l'espace perso en fonction de l'id
    public function private( $username )
    {
        $db = $this->dbConnect();
        $private = $db->prepare( 'SELECT id, username, password, firstname, lastname, mail, cellphone,
        city, postcode, level FROM member WHERE id = ?' );
        $private->execute( array( $username ) );
        
        return $private;
    }

    public function accountUpdate( $username, $password, $firstname, $lastname, $mail, $id_member )
    {
        $db = $this->dbConnect();
        $update = $db->prepare( 'UPDATE member SET username = ?, password = ?,
        firstname = ?, lastname = ?, mail = ? WHERE id = ?' );
        $update->execute( array( $username, $password, $firstname, $lastname, $mail, $id_member ) );
        
        return $update;
    }
}
