<?php
// name 'J' defined in composer.json
namespace J\controller;

// need of controller class
use \Exception;
use \J\controller\Controller;

class Router
{
    // declaration of a private parameter
    private $controller;

    // constructor
    public function __construct()
    {
        // association of private paramater with controller class
        $this->controller = new Controller();
    }

    public function app()
    {
        try 
        { 
            // when there is an action on the website
            if( isset( $_GET['action'] ) ) 
            {
                // to show register form
                if( $_GET['action'] == 'registerForm' )
                {
                    require 'views/users/registerForm.php';
                }

                elseif( $_GET['action'] == 'register' )
                {
                    $this->controller->register( $_POST['username'], $_POST['password'], $_POST['confpassword'],
                    $_POST['firstname'], $_POST['lastname'], $_POST['mail'] );
                }

                // when user clicks on 'confirm' button to log in
                elseif( $_GET['action'] == 'login' ) 
                {
                    // if user writes his username and his password..
                    if( !empty( $_POST['user'] ) && !empty( $_POST['password'] ) ) 
                    {
                        $this->controller->connect( $_POST['user'], $_POST['password'] );
                    }

                    else 
                    {
                        // to go from register to sign in form
                        require 'views/users/alreadyRegistered.php';   
                    }
                }

                // when user wants to see the outdoor trainings
                elseif( $_GET['action'] == 'showOutdoors' )
                {
                    $this->controller->showOutdoors();
                }

                // when user wants to see his progression
                elseif( $_GET['action'] == 'showProgression' )
                {
                    $this->controller->showProgression( $_GET['id'] );
                }

                // when user wants to see his progression
                elseif( $_GET['action'] == 'showProgressionRedirect' )
                {
                    $this->controller->showProgressionRedirect( $_GET['id'] );
                }

                // when user wants to see one race
                elseif( $_GET['action'] == 'showRace' )
                {
                    $this->controller->showRace( $_GET['id'] );
                }
                
                // when user wants to see all the races
                elseif( $_GET['action'] == 'showRaces' )
                {
                    $this->controller->showRaces();
                }

                elseif( $_GET['action'] == 'racesDetails' )
                {
                    $this->controller->racesDetails();
                }

                // when user wants to join race
                elseif( $_GET['action'] == 'joinRace' )
                {
                    $this->controller->joinRace();
                }

                // when user wants to see health articles
                elseif( $_GET['action'] == 'showHealth' )
                {
                    require 'views/navbar/health.php';
                }

                // when user wants to contact
                elseif( $_GET['action'] == 'showContact' )
                {
                    require 'views/navbar/contact.php';
                }

                // to have the register form
                elseif( $_GET['action'] == 'outdoorForm')
                {
                    require 'views/outdoors/outdoorForm.php';
                }

                // when user wants to participate to outdoor
                elseif( $_GET['action'] == 'joinOutdoor')
                {
                    $this->controller->joinOutdoor( $_GET['id_Member'] );
                }

                // when user wants to propose an outdoor
                elseif( $_GET['action'] == 'suggestOutdoor')
                {
                    $this->controller->suggestOutdoor();
                }

                // when outdoor creation is confirmed
                elseif( $_GET['action'] == 'outdoorConfirmed')
                {
                    $this->controller->outdoorConfirmed( $_POST['title'], $_GET['id_Member'] );
                }
            } 

            else 
            {
                // to see the races list when there is no action
                $this->controller->index();
            }
        }                
   
        // in case of error
        catch ( Exception $e ) {
            die( $error = $e->getMessage() );

            // call to the error file
            require 'views/errors.php';
        }
    }
}