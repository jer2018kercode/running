<?php
namespace J\controllers;

use \Exception;
use \J\models\MembersManager;

class MembersController
{
    // déclaration des paramètres privés
    private $membersManager;

    // constructeur
    public function __construct()
    {
        // association des paramètres privés avec les classes
        $this->membersManager = new MembersManager();
    }

    // pour créer un nouveau compte
    public function register( $username, $password, $confpassword,
        $firstname, $lastname, $mail ) 
    {
        // pour vérifier que les mots de passe coïncident bien
        if( $password != $confpassword ) 
        {
            include 'views/users/registerForm.php';
            throw new Exception( 'Les mots de passe inscrits ne coincident pas' );
        }

        // pour hasher le mot de passe
        $pass = password_hash( $password, PASSWORD_DEFAULT );

        $register = $this->membersManager->registerMember( $username, $pass, $firstname, $lastname, $mail );
        $_SESSION['username'] = $username;

        require 'views/users/register.php';
    }

    // pour se connecter à son espace membre 
    public function connect( $username, $password )
    {
        // récupérer l'username et le password saisis par l'utilisateur
        $dbUser = $this->membersManager->connect( $username );

        $dbPass = $dbUser['password'];

        // comparer le mot de passe du formulaire et de la bdd
        if( password_verify( $password, $dbPass ) ) 
        {
            // stocker l'username dans une session
            $_SESSION['username'] = $dbUser['username'];
            $_SESSION['id'] = $dbUser['id'];
            $_SESSION['level'] = $dbUser['level'];

            require 'views/users/login.php';
        } 
        else 
        {
            include 'views/users/alreadyRegistered.php';
            throw new Exception( '<p align="center"><font color="red">
            Nous n\'avons pas pu vous identifier</font></p>' );
        }
    }

    // pour accéder à son espace personnel
    public function private( $username )
    {
        $space = $this->membersManager->private( $username );

        require 'views/users/myArea.php';
    }

    // pour préparer la modification de ses données
    public function accountPrepare( $username )
    {
        $prepare = $this->membersManager->private( $username );

        require 'views/users/myAreaForm.php';
    }

    // pour modifier ses données persos
    public function accountUpdate( $username, $password, $firstname, $lastname, $mail, $id_member )
    {
        $update = $this->membersManager->accountUpdate( $username, $password, $firstname,
        $lastname, $mail, $id_member );

        header( 'Location: index.php?action=accountPrepare&id_member=' . $id_member );
    }
}