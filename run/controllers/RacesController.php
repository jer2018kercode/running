<?php
namespace J\controllers;

use \Exception;
use \J\models\RacesManager;
use \J\models\CandidateManager;

// gestion des courses officielles
class RacesController
{
    // déclaration des paramètres privés
    private $racesManager;
    private $candidateManager;

    // constructeur
    public function __construct()
    {
        // association des paramètres privés avec les classes des modèles
        $this->racesManager = new RacesManager();
        $this->candidateManager = new CandidateManager();
    }

    // pour montrer une seule course
    public function showRace( $id )
    {
        $candidate = $this->candidateManager->outdoorCandidates( $id );

        $race = $this->racesManager->showRace( $id );

        require 'views/races/race.php';
    }

    // pour afficher le titre des courses
    public function racesTitles()
    {
        $racesTitles = $this->racesManager->showRaces();

        require 'views/indexView.php';
    }

    // pour montrer toutes les courses
    public function showRaces( $filter = NULL )
    {
        if( isset( $filter ) )
        {
            // les courses en fonction du filtre
            $racesView = $this->racesManager->showRacesWithFilter( $filter );
        }
        else
        {
            // toutes les courses
            $racesView = $this->racesManager->showRaces();
        }

        require 'views/races/officialRaces.php';
    }

    // pour créer une course (administrateur)
    public function createRace( $title, $description, $city, $date, $id_member )
    {
        $newRace = $this->racesManager->newRace( $title, $description, $city, $date, $id_member );

        header( 'Location: index.php?action=showRaces' );
    }

    // pour préparer la modification d'une course (administrateur)
    public function initializeRaceUpdate( $id )
    {
        $initialize = $this->racesManager->showRace( $id );

        require 'views/races/raceUpdate.php';
    }

    // pour modifier une course (administrateur)
    public function updateRace( $id_race, $title, $description, $city, $date )
    {
        $update = $this->racesManager->updateRace( $id_race, $title, $description, $city, $date );

        header( 'Location: index.php?action=showRace&id_race=' . $id_race );
    }

    // pour supprimer une course (administrateur)
    public function cancelRace( $id_race )
    {
        $delete = $this->racesManager->deleteRace( $id_race );

        header( 'Location: index.php?action=showRaces' );
    }
} 
