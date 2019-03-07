<?php
namespace J\controller;

use \Exception;
use \J\model\MembersManager;
use \J\model\CandidateManager;
use \J\model\OutdoorsManager;
use \J\model\RacesManager;
use \J\model\ProgressionManager;

class Controller
{
    // déclaration des paramètres privés
    private $membersManager;
    private $candidateManager;
    private $outdoorsManager;
    private $racesManager;
    private $progressionManager;
    
    // constructeur
    public function __construct()
    {
        // association des paramètres privés avec les classes
        $this->membersManager = new MembersManager();
        $this->candidateManager = new CandidateManager();
        $this->outdoorsManager = new OutdoorsManager();
        $this->racesManager = new RacesManager();
        $this->progressionManager = new ProgressionManager();
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
            $_SESSION['username'] = $username;
            // $_SESSION['id'] = $id;

            require 'views/users/login.php';
        } 
        else 
        {
            throw new Exception( 'Votre nom d\'utilisateur ou votre mot de passe est invalide' );
        }
    }

    // pour créer un nouveau compte
    public function register( $username, $password, $confpassword,
        $firstname, $lastname, $mail ) 
    {
        // pour vérifier que les mots de passes coïncident bien
        if( $password != $confpassword ) 
        {
            throw new Exception( 'Les mots de passes inscrits ne coincident pas' );
        }

        // pour hasher le mot de passe
        $pass = password_hash( $password, PASSWORD_DEFAULT );

        $register = $this->membersManager->registerMember( $username, $pass, $firstname, $lastname, $mail );
        $_SESSION['username'] = $username;

        require 'views/users/register.php';
    }

    // navbar 'Suivi'
    public function showProgression( $number )
    {
        $progression = $this->progressionManager->progression( $number );

        require 'views/navbar/progression.php';
    }

    public function showProgressionRedirect( $id )
    {
        $progression_ = $this->progressionManager->progression( $id );

        require 'views/users/login.php';
    }

    // pour montrer une seule course
    public function showRace( $id )
    {
        $raceView = $this->racesManager->showRace( $id );

        require 'views/races/race.php';
    }

    // pour montrer toutes les courses
    public function showRaces()
    {
        $racesView = $this->racesManager->showRaces();

        require 'views/indexView.php';
    }

    // pour avoir plus de détails sur les courses
    public function racesDetails()
    {
        $racesDetails = $this->racesManager->showRaces();

        require 'views/navbar/officialRaces.php';
    }

    // navbar 'Entrainements à plusieurs'
    public function showOutdoors()
    {
        $outdoorsView = $this->outdoorsManager->showOutdoors();

        require 'views/navbar/groupOutdoors.php';
    }

    // pour voir une sortie
    public function showOutdoor( $id )
    {
        $outdoorView = $this->outdoorsManager->showOutdoor( $id );

        require 'views/outdoors/outdoor.php';
    }

    // pour rejoindre une sortie
    public function joinOutdoor( $number )
    {
        $joinOutdoor = $this->candidateManager->joinOutdoor( $number );

        require 'views/outdoors/joinOutdoor.php';
    }

    // pour proposer une sortie
    public function suggestOutdoor()
    {
        // $suggest = $this->outdoorsManager->suggestOutdoor();

        require 'views/outdoors/suggestOutdoor.php';
    }

    // pour créer une sortie
    public function createOutdoor( $title, $description, $date /* $id_member */ )
    {
        $suggest = $this->outdoorsManager->createOutdoor( $title, $description, $date /* $id_member */ );

        require 'views/outdoors/outdoorConfirmed.php';
    }

    // pour préparer l'update de la sortie
    public function prepareUpdate( $id )
    {
        $prepareUpdate = $this->outdoorsManager->showOutdoor( $id );

        require 'views/outdoors/updateOutdoor.php';
    }

    // pour modifier sa sortie
    public function updateOutdoor( $number, $title, $description, $city, $date )
    {
        $update = $this->outdoorsManager->updateOutdoor( $number, $title, $description, $city, $date );

        header('Location: index.php?action=showOutdoor&id=' . $number );
    }

    // pour annuler sa sortie
    public function cancelOutdoor( $number )
    {
        $cancel = $this->outdoorsManager->cancelOutdoor( $number );

        require 'views/outdoors/cancelOutdoor.php';
    }
    
    // pour rejoindre une course officielle
    public function joinRace( $number )
    {
        $joinRace = $this->candidateManager->joinRace( $number );

        require 'views/races/raceConfirm.php';
    }

    // page principale
    public function index()
    {
        $racesIndex = $this->racesManager->showRaces();

        $outdoorsIndex = $this->outdoorsManager->showOutdoors();

        require 'views/indexView.php';
    }
}
