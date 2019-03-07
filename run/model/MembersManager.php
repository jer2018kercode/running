<?php
namespace J\model;
use \J\model\Manager;
use \PDO;

// declaration de la classe enfant
class MembersManager extends Manager
{
    // nouveau membre dans la bdd
    public function registerMember( $username, $password, $firstname, $lastname, $mail )
    {
        $db = $this->dbConnect();
        $register = $db->prepare( 'INSERT INTO member( username, password, firstname, lastname, mail ) VALUES( ?, ?, ?, ?, ? )' );
        $register->execute( array(
            $username,
            $password,
            $firstname,
            $lastname,
            $mail
        ));

        return $register;
    }

    // connection d'un membre inscrit
    public function connect( $username )
    {
        $db = $this->dbConnect();
        $connect = $db->prepare( 'SELECT * FROM member WHERE username = ?' );
        $connect->execute( array( $username ) );

        $userConnect = $connect->fetch();
        $connect->closeCursor();
        
        return $userConnect;
    }
}
