<?php
// J défini dans composer.json
namespace J\controllers;

// utilisation de la classer Controller
use \Exception;
use \J\controllers\Controller;
use \J\controllers\ArticlesController;
use \J\controllers\CandidateController;
use \J\controllers\CommentsController;
use \J\controllers\MembersController;
use \J\controllers\OutdoorsController;
use \J\controllers\ProgressionController;
use \J\controllers\RacesController;

class Router
{
    // déclaration d'un paramètre privé
    private $controller;
    private $articlesController;
    private $candidateController;
    private $commentsController;
    private $membersController;
    private $outdoorsController;
    private $progressionController;
    private $racesController;

    // constructeur
    public function __construct()
    {
        // association du paramètre privé avec la classe Controller
        $this->controller = new Controller();
        $this->articlesController = new ArticlesController();
        $this->candidateController = new CandidateController();
        $this->commentsController = new CommentsController();
        $this->membersController = new MembersController();
        $this->outdoorsController = new OutdoorsController();
        $this->progressionController = new ProgressionController();
        $this->racesController = new RacesController();
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
                    $error = '';
                    require 'views/users/registerForm.php';
                }

                // vérifier que tous les champs sont remplis
                elseif( $_GET['action'] == 'register' )
                {
                    $error = '';
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

                        // expressions régulières
                        $regUser = '/^[a-zA-Z0-9]+([_ -]?[a-zA-Z0-9])*$/';
                        $regPass ='/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$^+=!*()@%&]).{8,10}$/'; 

                        if( !preg_match( $regUser, $user ) )
                        {
                            $error = ' Nom d\'utilisateur non valide ';
                        }
            
                        if( !preg_match( $regPass, $psd ) )
                        {
                            $error = $error . '<br />' . ' Mauvais format de mot de passe ';
                        } 

                        if( $error == '')
                        {
                            // pour s'inscrire sur le site
                            $this->membersController->register( $user, $psd, $psdC, $fname, $lname, $mail );

                            require 'views/users/register.php';
                        }
                        else 
                        {
                            require 'views/users/registerForm.php';
                        }  
                    }
                    else
                    {
                        include 'views/users/registerForm.php';
                        throw new Exception( '<p align="center"><font color="red">
                        Veuillez renseigner tous les champs</font></p>' );
                    }  
                }

                // formulaire de connexion
                if( $_GET['action'] == 'loginForm' )
                {
                    require 'views/users/alreadyRegistered.php';
                }

                // lorsque l'utilisateur clique sur Confirmer pour se connecter
                elseif( $_GET['action'] == 'login' ) 
                {
                    // lorsque le username et password sont inscrits
                    if( !empty( $_POST['user'] )
                    && !empty( $_POST['password'] ) ) 
                    {
                        $user = htmlspecialchars( $_POST['user'] );
                        $psd = htmlspecialchars( $_POST['password'] );

                        $this->membersController->connect( $user, $psd );
                    }
                    else 
                    {
                        require 'views/users/alreadyRegistered.php';
                        throw new Exception( '<p align="center"><font color="red">
                        Nous n\'avons pas pu vous identifier</font></p>' ); 
                    }
                }

                // pour se déconnecter
                elseif( $_GET['action'] == 'signout' )
                {
                    session_destroy();

                    header( 'Location: index.php' );
                }

                // préparer l'udpdate de son espace membre
                elseif( $_GET['action'] == 'accountPrepare' )
                {
                    if( isset( $_GET['id_member'] ) && $_GET['id_member'] > 0 )
                    {
                        $id_member = htmlspecialchars( $_GET['id_member'] );

                        $this->membersController->accountPrepare( $id_member );
                    }
                }

                // pour modifier ses infos persos
                elseif( $_GET['action'] == 'accountUpdate' )
                {
                    if( !empty( $_POST['username'] )
                    && !empty( $_POST['password'] )
                    && !empty( $_POST['firstname'] )
                    && !empty( $_POST['lastname'] )
                    && !empty( $_POST['mail'] ) 
                    && isset( $_GET['id_member'] ) && $_GET['id_member'] > 0 ) 
                    {
                        $username = htmlspecialchars( $_POST['username'] );
                        $password = htmlspecialchars( $_POST['password'] );
                        $firstname = htmlspecialchars( $_POST['firstname'] );
                        $lastname = htmlspecialchars( $_POST['lastname'] );
                        $mail = htmlspecialchars( $_POST['mail'] );
                        $id_member = htmlspecialchars( $_GET['id_member'] );

                        $this->membersController->accountUpdate( $username, $password,
                        $firstname, $lastname, $mail, $id_member );
                    }
                }

                // pour voir une sortie
                elseif( $_GET['action'] == 'showOutdoor' )
                {
                    if( isset( $_GET['id_outdoor'] ) && $_GET['id_outdoor'] > 0 )
                    {
                        $id_outdoor = htmlspecialchars( $_GET['id_outdoor'] );

                        $this->outdoorsController->showOutdoor( $id_outdoor );
                    }
                }

                // pour voir toutes les sorties
                elseif( $_GET['action'] == 'showOutdoors' )
                {
                    if( isset( $_POST['filter'] ) )
                    {
                        $filter = htmlspecialchars( $_POST['filter'] );

                        $this->outdoorsController->showOutdoors( $filter );
                    } 
                    else
                    {
                        $this->outdoorsController->showOutdoors();
                    }
                }

                // pour le formulaire des sorties
                elseif( $_GET['action'] == 'outdoorForm' )
                {
                    require 'views/outdoors/outdoorForm.php';
                }

                // pour rejoindre une sortie
                elseif( $_GET['action'] == 'joinOutdoor' )
                {
                    if( isset( $_SESSION['id'] )
                    && isset( $_GET['id_outdoor'] ) && $_GET['id_outdoor'] > 0 )
                    {
                        $id_member = htmlspecialchars( $_SESSION['id'] );
                        $id_outdoor = htmlspecialchars( $_GET['id_outdoor'] );

                        $this->candidateController->joinOutdoor( $id_member, $id_outdoor );
                    }
                }

                // pour proposer une sortie
                elseif( $_GET['action'] == 'suggestOutdoor' )
                {
                    require 'views/outdoors/suggestOutdoor.php';
                }

                // pour créer une sortie
                elseif( $_GET['action'] == 'createOutdoor' )
                {
                    if( !empty( $_POST['title'] )
                    && !empty( $_POST['description'] )
                    && !empty( $_POST['city'] )
                    && !empty( $_POST['date'] )
                    && isset( $_SESSION['id'] ) )
                    {
                        $title = htmlspecialchars( $_POST['title'] );
                        $description = htmlspecialchars( $_POST['description'] );
                        $city = htmlspecialchars( $_POST['city'] );
                        $date = htmlspecialchars( $_POST['date'] );
                        $id_member = htmlspecialchars( $_SESSION['id'] );

                        $this->outdoorsController->createOutdoor( $title, $description, $city, $date, $id_member );
                    }
                }

                // préparation de l'update de la sortie
                elseif( $_GET['action'] == 'prepareUpdateOutdoor' )
                {
                    if( isset( $_GET['id_outdoor'] ) && $_GET['id_outdoor'] > 0 )
                    {
                        $id_outdoor = htmlspecialchars( $_GET['id_outdoor'] );

                        $this->outdoorsController->prepareUpdate( $id_outdoor );
                    }
                }
                
                // pour modifier sa sortie
                elseif( $_GET['action'] == 'updateOutdoor' )
                {
                    // if( isset( $_SESSION['level'] ) == '1' || isset( $_SESSION['username'] ) )
                    // {
                        if( isset( $_GET['id_outdoor'] ) && $_GET['id_outdoor'] > 0
                        && !empty( $_POST['title'] )
                        && !empty( $_POST['description'] )
                        && !empty( $_POST['city'] )
                        && !empty( $_POST['date'] ) )
                        {
                            $id_outdoor = htmlspecialchars( $_GET['id_outdoor'] );
                            $title = htmlspecialchars( $_POST['title'] );
                            $description = htmlspecialchars( $_POST['description'] );
                            $city = htmlspecialchars( $_POST['city'] );
                            $date = htmlspecialchars( $_POST['date'] );
                            
                            $this->outdoorsController->updateOutdoor( $id_outdoor, $title, $description,
                            $city, $date );
                        }
                    // }
                }

                // pour annuler sa participation
                elseif( $_GET['action'] == 'renounceOutdoor' )
                {
                    if( isset( $_GET['id'] ) && $_GET['id'] > 0 ) 
                    {
                        $this->candidateController->renounceOutdoor( $_GET['id'] );
                    }
                }

                // pour supprimer sa sortie
                elseif( $_GET['action'] == 'cancelOutdoor' )
                {
                    if( isset( $_GET['id_outdoor'] ) && $_GET['id_outdoor'] > 0 ) 
                    {
                        $id_outdoor = htmlspecialchars( $_GET['id_outdoor'] );

                        $this->outdoorsController->cancelOutdoor( $id_outdoor );
                    }
                }

                // pour voir toutes les commentaires
                elseif( $_GET['action'] == 'showComments' )
                {
                    $this->commentsController->showComments();
                }

                // pour accéder au formulaire
                elseif( $_GET['action'] == 'commentsForm' )
                {
                    require 'views/comments/commentsForm.php';
                }

                // pour commenter
                elseif( $_GET['action'] == 'addComment' )
                {
                    $this->commentsController->addComment(
                        $_POST['content'], $_POST['date'], $_SESSION['id']
                    );
                }

                // pour voir une course
                elseif( $_GET['action'] == 'showRace' )
                {
                    if( isset( $_GET['id_race'] ) && $_GET['id_race'] > 0 )
                    {
                        $id_race = htmlspecialchars( $_GET['id_race'] );

                        $this->racesController->showRace( $id_race );
                    }  
                }
                
                // pour voir toutes les courses
                elseif( $_GET['action'] == 'showRaces' )
                {
                    if( isset( $_POST['filter'] ) )
                    {
                        $filter = htmlspecialchars( $_POST['filter'] );

                        $this->racesController->showRaces( $filter );
                    } 
                    else
                    {
                        $this->racesController->showRaces();
                    }
                }

                // pour afficher le titre des courses
                elseif( $_GET['action'] == 'racesTitles' )
                {
                    $this->racesController->racesTitles();
                }

                // pour participer à une course
                elseif( $_GET['action'] == 'raceConfirm' )
                {
                    if( isset( $_GET['id_race'] ) && $_GET['id_race'] > 0
                    && isset( $_SESSION['id'] ) )
                    {
                        $id_race = htmlspecialchars( $_GET['id_race'] );
                        $id_member = htmlspecialchars( $_SESSION['id'] );

                        $this->candidateController->joinRace( $id_race, $id_member );
                    }
                }

                // pour accéder au formulaire de création de course (admin)
                elseif( $_GET['action'] == 'newRaceForm' )
                {
                    require 'views/races/newRaceForm.php';
                }

                // pour créer une course (admin)
                elseif( $_GET['action'] == 'newRace' )
                {
                    if( !empty( $_POST['title'] )
                    && !empty( $_POST['description'] )
                    && !empty( $_POST['city'] )
                    && !empty( $_POST['date'] )
                    && isset( $_SESSION['id'] ) )
                    {
                        $title = htmlspecialchars( $_POST['title'] );
                        $description = htmlspecialchars( $_POST['description'] );
                        $city = htmlspecialchars( $_POST['city'] );
                        $date = htmlspecialchars( $_POST['date'] );
                        $id_member = htmlspecialchars( $_SESSION['id'] );

                        $this->racesController->createRace( $title, $description, $city, $date, $id_member );
                    }
                }

                // préparer l'udpdate de la course (admin)
                elseif( $_GET['action'] == 'initializeRaceUpdate' )
                {
                    if( isset( $_GET['id_race'] ) && $_GET['id_race'] > 0 )
                    {
                        $id_race = htmlspecialchars( $_GET['id_race'] );

                        $this->racesController->initializeRaceUpdate( $id_race );
                    }
                }

                // pour modifier une course (admin)
                elseif( $_GET['action'] == 'updateRace' )
                {
                    if( isset( $_GET['id_race'] ) && $_GET['id_race'] > 0
                    && !empty( $_POST['title'] )
                    && !empty( $_POST['description'] )
                    && !empty( $_POST['city'] )
                    && !empty( $_POST['date'] ) )
                    {
                        $id_race = htmlspecialchars( $_GET['id_race'] );
                        $title = htmlspecialchars( $_POST['title'] );
                        $description = htmlspecialchars( $_POST['description'] );
                        $city = htmlspecialchars( $_POST['city'] );
                        $date = htmlspecialchars( $_POST['date'] );

                        $this->racesController->updateRace( $id_race, $title, $description, $city, $date );
                    }
                }

                // pour supprimer une course (admin)
                elseif( $_GET['action'] == 'cancelRace' )
                {
                    if( isset( $_GET['id_race'] ) && $_GET['id_race'] > 0 ) 
                    {
                        $id_race = htmlspecialchars( $_GET['id_race'] );

                        $this->racesController->cancelRace( $id_race );
                    }
                }

                // pour voir le suivi particulier
                elseif( $_GET['action'] == 'showProgression' )
                {
                    if( isset( $_GET['id_member'] ) && $_GET['id_member'] > 0 )
                    {
                        $id_member = htmlspecialchars( $_GET['id_member'] );

                        $this->progressionController->showProgression( $id_member );
                    }
                }

                // pour enregistrer ses données
                elseif( $_GET['action'] == 'progressionSave' )
                {
                    if( !empty( $_POST['distance'] )
                    && !empty( $_POST['time'] )
                    && isset( $_SESSION['id'] ) )
                    {
                        $distance = htmlspecialchars( $_POST['distance'] );
                        $time = htmlspecialchars( $_POST['time'] );
                        $id_member = htmlspecialchars( $_SESSION['id'] );

                        $this->progressionController->progressionSave( $distance, $time, $id_member );
                    }
                }

                // pour supprimer une ligne de ses données
                elseif( $_GET['action'] == 'deleteProg' )
                {
                    if( isset( $_GET['id_progression'] ) && $_GET['id_progression'] > 0 ) 
                    {
                        $id_progression = htmlspecialchars( $_GET['id_progression'] );

                        $this->progressionController->deleteProg( $id_progression );
                    }
                }

                // pour voir les articles santé
                elseif( $_GET['action'] == 'showHealth' )
                {
                    $this->articlesController->showArticles();
                }

                // pour voir un article santé
                elseif( $_GET['action'] == 'showArticle' )
                {
                    if( isset( $_GET['id_article'] ) && $_GET['id_article'] > 0 )
                    {
                        $id_article = htmlspecialchars( $_GET['id_article'] );

                        $this->articlesController->showArticle( $id_article );
                    }  
                }

                // pour accéder au formulaire de publication (admin)
                elseif( $_GET['action'] == 'articleForm' )
                {
                    require 'views/health/healthForm.php';
                }

                // pour publier un article santé (admin)
                elseif( $_GET['action'] == 'publishArticle' )
                {
                    if( !empty( $_POST['title'] )
                    && !empty( $_POST['description'] )
                    && !empty( $_POST['date'] )
                    && isset( $_SESSION['id'] ) )
                    {
                        $title = htmlspecialchars( $_POST['title'] );
                        $description = htmlspecialchars( $_POST['description'] );
                        $date = htmlspecialchars( $_POST['date'] );
                        $id_member = htmlspecialchars( $_SESSION['id'] );

                        $this->articlesController->newArticle( $title, $description, $date, $id_member );
                    }
                }

                // préparer la modification d'un article
                elseif( $_GET['action'] == 'changeArticleForm' )
                {
                    if( isset( $_GET['id_article'] ) && $_GET['id_article'] > 0 )
                    {
                        $id_article = htmlspecialchars( $_GET['id_article'] );

                        $this->articlesController->changeArticleForm( $id_article );
                    }
                }

                // pour modifier un article
                elseif( $_GET['action'] == 'updateArticle' )
                {
                    if( !empty( $_POST['title'] )
                    && !empty( $_POST['description'] )
                    && !empty( $_POST['date'] )
                    && isset( $_GET['id_article'] ) && $_GET['id_article'] > 0 )
                    {
                        $title = htmlspecialchars( $_POST['title'] );
                        $description = htmlspecialchars( $_POST['description'] );
                        $date = htmlspecialchars( $_POST['date'] );
                        $id_article = htmlspecialchars( $_GET['id_article'] );

                        $this->articlesController->updateArticle( $title, $description, $date, $id_article );
                    }
                }

                // pour supprimer une article (admin)
                elseif( $_GET['action'] == 'cancelArticle' )
                {
                    if( isset( $_GET['id_article'] ) && $_GET['id_article'] > 0 ) 
                    {
                        $id_article = htmlspecialchars( $_GET['id_article'] );

                        $this->articlesController->cancelArticle( $id_article );
                    }
                }

                // pour accéder à la page contact
                elseif( $_GET['action'] == 'showContact' )
                {
                    require 'views/contact/contact.php';
                }

                // pour contacter
                elseif( $_GET['action'] == 'contactUs' )
                {
                    require 'views/contact/contactUs.php';
                }

                // pour accéder à son profil
                elseif( $_GET['action'] == 'showArea' )
                {
                    if( isset( $_GET['id_member'] ) && $_GET['id_member'] > 0 )
                    {
                        $id_member = htmlspecialchars( $_GET['id_member'] );

                        $this->membersController->private( $id_member );
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