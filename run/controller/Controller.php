<?php
namespace J\controller;

// need of member and race classes
use \Exception;
use \J\model\MembersManager;
use \J\model\RacesManager;
use \J\model\ProgressionManager;

class Controller
{
    // declaration of private parameters
    private $membersManager;
    private $racesManager;
    private $progressionManager;

    // constructor
    public function __construct()
    {
        // association of the private paramaters with the manager classes
        $this->membersManager = new MembersManager();
        $this->racesManager = new RacesManager();
        $this->progressionManager = new ProgressionManager();
    }

    // index page
    public function index()
    {
        require 'view/indexView.php';
    }

    // to connect to member area
    public function connect( $username, $password )
    {
        // étape 1 = récupérer mdp formulaire inscrit par l'utilisateur
        $dbUser = $this->membersManager->verify( $username );

        $dbPass = $dbUser['password'];
        $id;

        // étape 2 = comparer mdp formulaire et bdd
        if( password_verify( $password, $dbPass ) ) 
        {
            $_SESSION['username'] = $username;
            // $_SESSION['id'] = $id;
            require 'view/loginView.php';
        } 
        else 
        {
            throw new Exception( 'Error, unvalid username or password...' );
        }
    }

    // to go from register to sign in form
    public function already()
    {
        require 'view/alreadyRegisteredView.php';
    }

    // to see register form
    public function registerForm()
    {
        require 'view/registerFormView.php';
    }

    // to create new account
    public function register( $username, $password, $confpassword,
        $firstname, $lastname, $mail ) 
        {
        if( $password != $confpassword ) 
        {
            throw new Exception( 'Not same passwords' );
        }

        $pass = password_hash( $password, PASSWORD_DEFAULT );

        // call to member db -> insert
        $register = $this->membersManager->registering( $username, $pass, $firstname, $lastname, $mail );

        require 'view/registerView.php';
    }

    // navbar 'Suivi'
    public function showProgression()
    {
        $progression = $this->progressionManager->progression( $id_member );

        require 'view/progressionView.php';
    }

    public function showProgressionRedirect( $id_member )
    {
        $progressionR = $this->progressionManager->progression( $id_member );

        require 'view/progressionView.php';
    }

    // to show all the races
    public function showRaces()
    {
        // call to race db
        $race = $this->racesManager->showRace();

        require 'view/racesView.php';
    }

    public function racesInfos()
    {
        $racesInfos = $this->racesManager->showRace();
        require 'view/racesInfos.php';
    }

    // navbar 'Running'
    public function showRunning()
    {
        require 'view/runningView.php';
    }

    // navbar 'Santé'
    public function showHealth()
    {
        require 'view/healthView.php';
    }

    // navbar 'Contact'
    public function showContact()
    {
        require 'view/contactView.php';
    }
}
