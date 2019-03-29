<?php
namespace J\controllers;

use \Exception;
use \J\models\MembersManager;

// gestion des utilisateurs
class MembersController
{
    // déclaration du paramètre privé
    private $membersManager;

    // constructeur
    public function __construct()
    {
        // association du paramètre privé avec la classe du modèle
        $this->membersManager = new MembersManager();
    }

    // pour créer un nouveau compte
    public function register( $username, $password, $confpassword,
        $firstname, $lastname, $mail ) 
    {
        // pour vérifier que les mots de passe coïncident bien entre eux
        if( $password != $confpassword ) 
        {
            // la vue du formulaire d'inscription
            include 'views/users/registerForm.php';

            // message d'erreur lorsque les mots de passes inscrits ne sont pas les mêmes
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
        // récupérer dans la table member de la bdd
        $dbCatch = $this->membersManager->connect( $username );

        // récupérer le mot de passe 
        $dbPass = $dbCatch['password'];

        // comparer le mot de passe du formulaire avec celui de la bdd
        if( password_verify( $password, $dbPass ) ) 
        {
            // stocker dans une session
            $_SESSION['username'] = $dbCatch['username'];
            $_SESSION['id'] = $dbCatch['id'];
            $_SESSION['level'] = $dbCatch['level'];

            header( 'Location: index.php' );
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

    // pour modifier ses données personnelles
    public function accountUpdate( $username, $password, $firstname, $lastname, $mail, $id_member )
    {
        // pour hasher son mot de passe qu'on modifie
        $passChange = password_hash( $password, PASSWORD_DEFAULT );

        $update = $this->membersManager->accountUpdate( $username, $passChange, $firstname,
        $lastname, $mail, $id_member );

        header( 'Location: index.php?action=accountPrepare&id_member=' . $id_member );
    }
}