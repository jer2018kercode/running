<?php
namespace J\model;
use \J\model\Manager;
use \PDO;

// declaration of child class
class MembersManager extends Manager
{
    // new member in db
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

    // check that username and password are correct
    public function check( $username )
    {
        $db = $this->dbConnect();
        $verify = $db->prepare( 'SELECT * FROM member WHERE username = ?' );
        $verify->execute( array( $username ) );

        $user = $verify->fetch();
        $verify->closeCursor();
        
        return $user;
    }
}
