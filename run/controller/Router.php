<?php
// J défini dans composer.json
namespace J\controller;

// utilisation de la classer Controller
use \Exception;
use \J\controller\Controller;
use \J\controller\AdminController;

class Router
{
    // déclaration d'un paramètre privé
    private $controller;
    private $adminController;

    // constructeur
    public function __construct()
    {
        // association du paramètre privé avec la classe Controller
        $this->controller = new Controller();
        $this->adminController = new AdminController();
    }

    public function app()
    {
        try 
        { 
            // en cas d'action
            if( isset( $_GET['action'] ) ) 
            {
                // formulaire d'inscription
                if( $_GET['action'] == 'registerForm' )
                {
                    require 'views/users/registerForm.php';
                }

                // pour s'inscrire sur le site
                elseif( $_GET['action'] == 'register' )
                {
                    if( !empty( $_POST['username'] ) 
                    && !empty( $_POST['password'] ) 
                    && !empty( $_POST['confpassword'] ) 
                    && !empty( $_POST['firstname'] ) 
                    && !empty( $_POST['lastname'] ) 
                    && !empty( $_POST['mail'] ) ) 
                    {
                        // sécurisation 
                        $user = htmlspecialchars( $_POST['username'] );
                        $psd = htmlspecialchars( $_POST['password'] );
                        $psdC = htmlspecialchars( $_POST['confpassword'] );
                        $fname = htmlspecialchars( $_POST['firstname'] );
                        $lname = htmlspecialchars( $_POST['lastname'] );
                        $mail = htmlspecialchars( $_POST['mail'] );

                        $this->controller->register( $user, $psd, $psdC, $fname, $lname, $mail );
                    }
                    else
                    {
                        throw new Exception( 'Veuillez renseigner tous les champs' );
                    }  
                }

                // lorsque l'utilisateur clique sur Confirmer pour se connecter
                elseif( $_GET['action'] == 'login' ) 
                {
                    // lorsque le username et password sont inscrits
                    if( !empty( $_POST['user'] ) && !empty( $_POST['password'] ) ) 
                    {
                        $user = htmlspecialchars( $_POST['user'] );
                        $psd = htmlspecialchars( $_POST['password'] );

                        $this->controller->connect( $user, $psd );
                    }
                    else 
                    {
                        // pour aller de la page d'inscription à celle de connexion
                        require 'views/users/alreadyRegistered.php';   
                    }
                }

                // pour se déconnecter
                elseif( $_GET['action'] == 'signout' )
                {
                    require 'views/users/signout.php';
                }

                // pour voir une sortie
                elseif( $_GET['action'] == 'showOutdoor' )
                {
                    if( isset( $_GET['id'] ) && $_GET['id'] > 0 )
                    {
                        $id = htmlspecialchars( $_GET['id'] );

                        $this->controller->showOutdoor( $id );
                    }
                }

                // pour voir les sorties
                elseif( $_GET['action'] == 'showOutdoors' )
                {
                    $this->controller->showOutdoors();
                }

                // pour voir le suivi particulier
                elseif( $_GET['action'] == 'showProgression' )
                {
                    if( isset( $_GET['id'] ) && $_GET['id'] > 0 )
                    {
                        $id = htmlspecialchars( $_GET['id'] );

                        $this->controller->showProgression( $id );
                    }
                }

                // pour voir le suivi particulier
                elseif( $_GET['action'] == 'showProgressionRedirect' )
                {
                    if( isset( $_GET['id'] ) && $_GET['id'] > 0 )
                    {
                        $id = htmlspecialchars( $_GET['id'] );

                        $this->controller->showProgressionRedirect( $id );
                    }
                }

                // pour voir une course
                elseif( $_GET['action'] == 'showRace' )
                {
                    if( isset( $_GET['id'] ) && $_GET['id'] > 0 )
                    {
                        $id = htmlspecialchars( $_GET['id'] );

                        $this->controller->showRace( $id );
                    }
                    
                }
                
                // pour voir toutes les courses
                elseif( $_GET['action'] == 'showRaces' )
                {
                    $this->controller->showRaces();
                }

                // pour avoir des infos supplémentaires sur les courses
                elseif( $_GET['action'] == 'racesDetails' )
                {
                    $this->controller->racesDetails();
                }

                // pour participer à une course
                elseif( $_GET['action'] == 'raceConfirm' )
                {
                    if( isset( $_GET['id'] ) && $_GET['id'] > 0 )
                    {
                        $id = htmlspecialchars( $_GET['id'] );

                        $this->controller->joinRace( $id );
                    }
                }

                // pour voir les articles santé
                elseif( $_GET['action'] == 'showHealth' )
                {
                    require 'views/navbar/health.php';
                }

                // pour accéder à la page contact
                elseif( $_GET['action'] == 'showContact' )
                {
                    require 'views/navbar/contact.php';
                }

                // pour le formulaire des sorties
                elseif( $_GET['action'] == 'outdoorForm' )
                {
                    require 'views/outdoors/outdoorForm.php';
                }

                // pour rejoindre une sortie
                elseif( $_GET['action'] == 'joinOutdoor' )
                {
                    if( isset( $_GET['id'] ) && $_GET['id'] > 0 )
                    {
                        $id = htmlspecialchars( $_GET['id'] );

                        $this->controller->joinOutdoor( $id );
                    }
                }

                // pour proposer une sortie
                elseif( $_GET['action'] == 'suggestOutdoor' )
                {
                    $this->controller->suggestOutdoor();
                }

                // pour créer une sortie
                elseif( $_GET['action'] == 'createdOutdoor' )
                {
                    $this->controller->createOutdoor( $_POST['title'], $_POST['description'],
                    $_POST['date'] /*, $_GET['id_Member']*/ );
                }

                // prepare update
                elseif( $_GET['action'] == 'prepareUpdateOutdoor' )
                {
                    if( isset( $_GET['id'] ) && $_GET['id'] > 0 )
                    {
                        $id = htmlspecialchars( $_GET['id'] );

                        $this->controller->prepareUpdate( $id );
                    }
                }

                // pour modifier sa sortie
                elseif( $_GET['action'] == 'updateOutdoor' )
                {
                    if( isset( $_GET['id'] ) && $_GET['id'] > 0 )
                    {
                        $id = htmlspecialchars( $_GET['id'] );

                        $this->controller->updateOutdoor( $id, $_POST['title'], $_POST['description'], 
                        $_POST['city'], $_POST['date'] );
                    }
                }

                // pour supprimer sa sortie
                elseif( $_GET['action'] == 'cancelOutdoor' )
                {
                    if( isset( $_GET['id'] ) && $_GET['id'] > 0 ) 
                    {
                        $id = htmlspecialchars( $_GET['id'] );

                        $this->controller->cancelOutdoor( $id );
                    }
                }
            } 

            else 
            {
                // pour voir les courses et sorties en accueil
                $this->controller->index();
            }
        }                
   
        // en cas d'erreur
        catch ( Exception $e ) {
            die( $error = $e->getMessage() );

            // appel au fichier erreurs
            require 'views/errors.php';
        }
    }
}