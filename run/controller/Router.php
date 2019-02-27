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
                    $this->controller->registerForm();
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
                        $this->controller->already();   
                    }
                }
                
                // when user wants to see all the races
                elseif( $_GET['action'] == 'showRaces' )
                {
                    $this->controller->showRaces();
                }

                elseif( $_GET['action'] == 'racesInfos' )
                {
                    $this->controller->racesInfos();
                }

                // when user wants to see his progression
                elseif( $_GET['action'] == 'showProgression' )
                {
                    $this->controller->showProgression();
                }

                // to go from logged page to progression page
                elseif( $_GET['action'] == 'showProgressionRedirect' )
                {
                    $this->controller->showProgressionRedirect( $id_member );
                }
                
                // when user wants to see the outdoor runnings
                elseif( $_GET['action'] == 'showRunning' )
                {
                    $this->controller->showRunning();
                }

                // when user wants to see health articles
                elseif( $_GET['action'] == 'showHealth' )
                {
                    $this->controller->showHealth();
                }

                // when user wants to contact
                elseif( $_GET['action'] == 'showContact' )
                {
                    $this->controller->showContact();
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
            require 'view/errorView.php';
        }
    }
}