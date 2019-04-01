<?php
// J défini dans composer.json
namespace J\controllers;

// utilisation des exceptions
use \Exception;

// utilisation des controllers
use \J\controllers\Controller;
use \J\controllers\ArticlesController;
use \J\controllers\CandidateController;
use \J\controllers\MembersController;
use \J\controllers\OutdoorsController;
use \J\controllers\ProgressionController;
use \J\controllers\RacesController;

class Router
{
    // déclaration des paramètres privés
    private $controller;
    private $articlesController;
    private $candidateController;
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
                // le formulaire d'inscription
                if( $_GET['action'] == 'registerForm' )
                {
                    $error = '';
                    require 'views/users/registerForm.php';
                }

                // l'inscription
                elseif( $_GET['action'] == 'register' )
                {
                    $error = '';
                    // s'assurer que tous les champs sont remplis
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
                        $regUser = '/^[a-z0-9_-]{3,15}$/';
                        $regPass ='/^(?=.*[A-Z])(?=.*\d).+$/'; 

                        if( !preg_match( $regUser, $user ) )
                        {
                            // message d'indication pour le nom d'utilisateur
                            $error = '<p align="center"><font color="red">Nom d\'utilisateur non valide.
                            Votre nom d\'utilisateur doit faire entre 3 et 15 caractères.</font></p>';
                        }
            
                        if( !preg_match( $regPass, $psd ) )
                        {
                            // message d'indication pour le MDP
                            $error = $error . '<br />' . '<p align="center"><font color="red"> Mauvais format
                            de mot de passe. Votre mot de passe doit contenir au moins un caractère majuscule
                            et un caractère digital.</font></p>';
                        } 

                        if( $error == '')
                        {
                            // s'inscrire sur le site
                            $this->membersController->register( $user, $psd, $psdC, $fname, $lname, $mail );

                            require 'views/users/register.php';
                        }
                        else 
                        {
                            // la vue avec le formulaire
                            require 'views/users/registerForm.php';
                        }  
                    }
                    else
                    {
                        include 'views/users/registerForm.php';

                        // message pour indiquer à l'utilisateur que l'inscription a échouée
                        throw new Exception( '<p align="center"><font color="red">
                        Veuillez renseigner tous les champs</font></p>' );
                    }  
                }

                // le formulaire de connexion
                if( $_GET['action'] == 'loginForm' )
                {
                    require 'views/users/alreadyRegistered.php';
                }

                // la connexion
                elseif( $_GET['action'] == 'login' ) 
                {
                    // lorsque le nom d'utilisateur et le MDP sont renseignés
                    if( !empty( $_POST['user'] )
                    && !empty( $_POST['password'] ) ) 
                    {
                        $user = htmlspecialchars( $_POST['user'] );
                        $psd = htmlspecialchars( $_POST['password'] );

                        // se connecter sur le site
                        $this->membersController->connect( $user, $psd );
                    }
                    else 
                    {
                        require 'views/users/alreadyRegistered.php';

                        // message pour indiquer à l'utilisateur que la connexion a échouée
                        throw new Exception( '<p align="center"><font color="red">
                        Nous n\'avons pas pu vous identifier</font></p>' ); 
                    }
                }

                // pour se déconnecter
                elseif( $_GET['action'] == 'signout' && isset( $_SESSION['id'] ) )
                {
                    // détruire la session
                    session_destroy();

                    // retour à la page d'accueil
                    header( 'Location: index.php' );
                }

                // pour préparer la modification de son espace membre
                elseif( $_GET['action'] == 'accountPrepare' && isset( $_SESSION['id'] ) )
                {
                    if( isset( $_GET['id_member'] ) && $_GET['id_member'] > 0 )
                    {
                        $id_member = htmlspecialchars( $_GET['id_member'] );

                        $this->membersController->accountPrepare( $id_member );
                    }
                }

                // pour modifier ses informations personnelles
                elseif( $_GET['action'] == 'accountUpdate' && isset( $_SESSION['id'] ) )
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

                // pour voir une seule sortie
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
                    // si l'utilisateur renseigne la barre de recherche...
                    if( isset( $_POST['filter'] ) )
                    {
                        $filter = htmlspecialchars( $_POST['filter'] );

                        // on affiche la ou les sortie(s) en lien avec la demande
                        $this->outdoorsController->showOutdoors( $filter );
                    } 
                    // ...sinon 
                    else
                    {
                        // on affiche toutes les sorties
                        $this->outdoorsController->showOutdoors();
                    }
                }

                // pour rejoindre une sortie
                elseif( $_GET['action'] == 'joinOutdoor' && isset( $_SESSION['id'] ) )
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
                elseif( $_GET['action'] == 'suggestOutdoor' && isset( $_SESSION['id'] ) )
                {
                    // la vue du formulaire de création de sortie
                    require 'views/outdoors/suggestOutdoor.php';
                }

                // pour créer une sortie
                elseif( $_GET['action'] == 'createOutdoor' && isset( $_SESSION['id'] ) )
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

                // pour préparer la mise à jour de la sortie
                elseif( $_GET['action'] == 'prepareUpdateOutdoor' && isset( $_SESSION['id'] ) )
                {
                    if( isset( $_GET['id_outdoor'] ) && $_GET['id_outdoor'] > 0 )
                    {
                        $id_outdoor = htmlspecialchars( $_GET['id_outdoor'] );

                        $this->outdoorsController->prepareUpdate( $id_outdoor );
                    }
                }
                
                // pour modifier sa sortie
                elseif( $_GET['action'] == 'updateOutdoor' && isset( $_SESSION['id'] ) )
                {
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
                }

                // pour annuler sa participation à une sortie
                elseif( $_GET['action'] == 'renounceOutdoor' && isset( $_SESSION['id'] ) )
                {
                    if( isset( $_GET['id_outdoor'] ) && $_GET['id_outdoor'] > 0 ) 
                    {
                        $id_outdoor = htmlspecialchars( $_GET['id_outdoor'] );

                        $this->candidateController->renounceOutdoor( $id_outdoor );
                    }
                }

                // pour supprimer sa sortie
                elseif( $_GET['action'] == 'cancelOutdoor' && isset( $_SESSION['id'] ) )
                {
                    if( isset( $_GET['id_outdoor'] ) && $_GET['id_outdoor'] > 0 ) 
                    {
                        $id_outdoor = htmlspecialchars( $_GET['id_outdoor'] );

                        $this->outdoorsController->cancelOutdoor( $id_outdoor );
                    }
                }

                // pour voir une seule course
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
                    // si l'utilisateur renseigne la barre de recherche...
                    if( isset( $_POST['filter'] ) )
                    {
                        $filter = htmlspecialchars( $_POST['filter'] );

                        // on affiche la ou les course(s) en fonction de la demande
                        $this->racesController->showRaces( $filter );
                    } 
                    else
                    {
                        // ...sinon on affiche toutes les courses
                        $this->racesController->showRaces();
                    }
                }

                // pour afficher le titre des courses
                elseif( $_GET['action'] == 'racesTitles' )
                {
                    $this->racesController->racesTitles();
                }

                // pour participer à une course
                elseif( $_GET['action'] == 'raceConfirm' && isset( $_SESSION['id'] ) )
                {
                    if( isset( $_GET['id_race'] ) && $_GET['id_race'] > 0
                    && isset( $_SESSION['id'] ) )
                    {
                        $id_race = htmlspecialchars( $_GET['id_race'] );
                        $id_member = htmlspecialchars( $_SESSION['id'] );

                        $this->candidateController->joinRace( $id_race, $id_member );
                    }
                }

                // pour accéder au formulaire de création de course (administrateur)
                elseif( $_GET['action'] == 'newRaceForm' && isset( $_SESSION['level'] )
                && $_SESSION['level'] == 1 )
                {
                    require 'views/races/newRaceForm.php';
                }

                // pour créer une course (administrateur)
                elseif( $_GET['action'] == 'newRace' && isset( $_SESSION['level'] )
                && $_SESSION['level'] == 1 )
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

                // pour préparer la mise à jour de la course (administrateur)
                elseif( $_GET['action'] == 'initializeRaceUpdate' && isset( $_SESSION['level'] )
                && $_SESSION['level'] == 1 )
                {
                    if( isset( $_GET['id_race'] ) && $_GET['id_race'] > 0 )
                    {
                        $id = htmlspecialchars( $_GET['id_race'] );

                        $this->racesController->initializeRaceUpdate( $id );
                    }
                }

                // pour modifier une course (administrateur)
                elseif( $_GET['action'] == 'updateRace' && isset( $_SESSION['level'] )
                && $_SESSION['level'] == 1 )
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

                // pour annuler sa participation à une course
                elseif( $_GET['action'] == 'renounceRace' && isset( $_SESSION['id'] ) )
                {
                    if( isset( $_GET['id_race'] ) && $_GET['id_race'] > 0 ) 
                    {
                        $id_race = htmlspecialchars( $_GET['id_race'] );
                        
                        $this->candidateController->renounceRace( $id_race );
                    }
                }

                // pour supprimer une course (administrateur)
                elseif( $_GET['action'] == 'cancelRace' && isset( $_SESSION['id'] ) )
                {
                    if( isset( $_GET['id_race'] ) && $_GET['id_race'] > 0 ) 
                    {
                        $id_race = htmlspecialchars( $_GET['id_race'] );

                        $this->racesController->cancelRace( $id_race );
                    }
                }

                // pour voir son suivi particulier
                elseif( $_GET['action'] == 'showProgression' && isset( $_SESSION['id'] ) )
                {
                    if( isset( $_GET['id_member'] ) && $_GET['id_member'] > 0 )
                    {
                        $id_member = htmlspecialchars( $_GET['id_member'] );

                        $this->progressionController->showProgression( $id_member );
                    }
                }

                // pour enregistrer ses données
                elseif( $_GET['action'] == 'progressionSave' && isset( $_SESSION['id'] ) )
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
                elseif( $_GET['action'] == 'deleteProg' && isset( $_SESSION['id'] ) )
                {
                    if( isset( $_GET['id_progression'] ) && $_GET['id_progression'] > 0 ) 
                    {
                        $id_progression = htmlspecialchars( $_GET['id_progression'] );

                        $this->progressionController->deleteProg( $id_progression );
                    }
                }

                // pour voir tous les articles santé
                elseif( $_GET['action'] == 'showHealth' )
                {
                    $this->articlesController->showArticles();
                }

                // pour voir un seul article santé
                elseif( $_GET['action'] == 'showArticle' )
                {
                    if( isset( $_GET['id_article'] ) && $_GET['id_article'] > 0 )
                    {
                        $id_article = htmlspecialchars( $_GET['id_article'] );

                        $this->articlesController->showArticle( $id_article );
                    }  
                }

                // pour accéder au formulaire de publication d'article (administrateur)
                elseif( $_GET['action'] == 'articleForm' && isset( $_SESSION['level'] )
                && $_SESSION['level'] == 1 )
                {
                    require 'views/health/healthForm.php';
                }

                // pour publier un article santé (administrateur)
                elseif( $_GET['action'] == 'publishArticle' && isset( $_SESSION['level'] )
                && $_SESSION['level'] == 1 )
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

                // pour préparer la modification d'un article (administrateur)
                elseif( $_GET['action'] == 'changeArticleForm' && isset( $_SESSION['level'] )
                && $_SESSION['level'] == 1 )
                {
                    if( isset( $_GET['id_article'] ) && $_GET['id_article'] > 0 )
                    {
                        $id_article = htmlspecialchars( $_GET['id_article'] );

                        $this->articlesController->changeArticleForm( $id_article );
                    }
                }

                // pour modifier un article (administrateur)
                elseif( $_GET['action'] == 'updateArticle' && isset( $_SESSION['level'] )
                && $_SESSION['level'] == 1 )
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

                // pour supprimer un article (administrateur)
                elseif( $_GET['action'] == 'cancelArticle' && isset( $_SESSION['level'] )
                && $_SESSION['level'] == 1 )
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

                // pour nous contacter
                elseif( $_GET['action'] == 'contactUs' )
                {
                    require 'views/contact/contactUs.php';
                }

                // pour accéder à son profil personnel
                elseif( $_GET['action'] == 'showArea' && isset( $_SESSION['id'] ) )
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
        catch ( Exception $e )
        {
            die( $error = $e->getMessage() );

            // appel au fichier erreurs
            require 'views/errors.php';
        }
    }
}