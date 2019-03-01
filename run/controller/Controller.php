<?php
namespace J\controller;

// need of member and race classes
use \Exception;
use \J\model\MembersManager;
use \J\model\OutdoorsManager;
use \J\model\ProgressionManager;
use \J\model\RacesManager;
use \J\model\CandidateManager;

class Controller
{
    // declaration of private parameters
    private $membersManager;
    private $outdoorsManager;
    private $progressionManager;
    private $racesManager;
    private $candidateManager;
    // constructor
    public function __construct()
    {
        // association of the private paramaters with the manager classes
        $this->membersManager = new MembersManager();
        $this->outdoorsManager = new OutdoorsManager();
        $this->progressionManager = new ProgressionManager();
        $this->racesManager = new RacesManager();
        $this->candidateManager = new CandidateManager();
    }

    // to connect to member area
    public function connect( $username, $password )
    {
        // collect username and password written by user
        $dbUser = $this->membersManager->check( $username );

        $dbPass = $dbUser['password'];

        // compare password of form with bdd
        if( password_verify( $password, $dbPass ) ) 
        {
            // stock username in session
            $_SESSION['username'] = $username;
            // $_SESSION['id'] = $id;

            require 'views/users/login.php';
        } 

        else 
        {
            throw new Exception( 'Votre nom d\'utilisateur ou votre mot de passe est invalide' );
        }
    }

    // to create new account
    public function register( $username, $password, $confpassword,
        $firstname, $lastname, $mail ) 
    {
        // to check that 2 passwords are same
        if( $password != $confpassword ) 
        {
            throw new Exception( 'Les mots de passes inscrits ne coincident pas' );
        }

        // to hash password
        $pass = password_hash( $password, PASSWORD_DEFAULT );

        // call to member db -> insert
        $register = $this->membersManager->registerMember( $username, $pass, $firstname, $lastname, $mail );

        require 'views/users/register.php';
    }

    // navbar 'Suivi'
    public function showProgression( $id_member )
    {
        $progression = $this->progressionManager->progression( $id_member );

        require 'views/progression/progression.php';
    }

    public function showProgressionRedirect( $id )
    {
        $progression_ = $this->progressionManager->progression( $id );

        require 'views/users/login.php';
    }

    // to show one race
    public function showRace( $id )
    {
        // call to race db
        $raceView = $this->racesManager->showRace( $id );

        require 'views/races/race.php';
    }

    // to show all races
    public function showRaces()
    {
        // call to race db
        $racesView = $this->racesManager->showRaces();

        require 'views/indexView.php';
    }

    // to have more details on races
    public function racesDetails()
    {
        $racesDetails = $this->racesManager->showRaces();

        require 'views/races/races.php';
    }

    // navbar 'Entrainements à plusieurs'
    public function showOutdoors()
    {
        $outdoorsView = $this->outdoorsManager->showOutdoors();

        require 'views/outdoors/showOutdoors.php';
    }

    // to participate to outdoor
    public function joinOutdoor( $title, $id_member )
    {
        $joinOutdoor = $this->outdoorsManager->joinOutdoor( $title, $id_member );

        require 'views/outdoors/joinOutdoor.php';
    }

    // to suggest outdoor
    public function suggestOutdoor()
    {
        // $suggest = $this->outdoorsManager->suggestOutdoor();

        require 'views/outdoors/suggestOutdoor.php';
    }

    public function outdoorConfirmed( $title, $description, $date, $id_member )
    {
        $suggest = $this->outdoorsManager->suggestOutdoor( $title, $description, $date, $id_member );

        require 'views/outdoors/outdoorConfirmed.php';
    }
    
    // confirmed race
    public function raceConfirmed( $id, $id_member )
    {
        // call to race db
        $raceConfirm = $this->racesManager->raceConfirm( $id, $id_member );

        require 'views/races/raceConfirmed.php';
    }

    // main page
    public function index()
    {
        $index = $this->racesManager->showRaces();

        require 'views/indexView.php';
    }
}
