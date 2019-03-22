<?php
namespace J\controllers;

use \Exception;
use \J\models\RacesManager;

class RacesController
{
    // déclaration des paramètres privés
    private $racesManager;

    // constructeur
    public function __construct()
    {
        // association des paramètres privés avec les classes
        $this->racesManager = new RacesManager();
    }

    // pour montrer une seule course
    public function showRace( $id )
    {
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
            $racesView = $this->racesManager->showRacesWithFilter( $filter );
        }
        else
        {
            $racesView = $this->racesManager->showRaces();
        }

        require 'views/races/officialRaces.php';
    }

    // pour créer une course (admin)
    public function createRace( $title, $description, $city, $date, $id_member )
    {
        $newRace = $this->racesManager->newRace( $title, $description, $city, $date, $id_member );

        require 'views/races/raceConfirmed.php';
    }

    // pour préparer la modification (admin)
    public function initializeRaceUpdate( $id )
    {
        $initializeRace = $this->racesManager->showRace( $id );

        require 'views/races/raceUpdate.php';
    }

    // pour modifier une course (admin)
    public function updateRace( $number, $title, $description, $city, $date )
    {
        $update = $this->racesManager->updateRace( $number, $title, $description, $city, $date );

        header( 'Location: index.php?action=showRace&id_race=' . $number );
    }

    // pour supprimer une course (admin)
    public function cancelRace( $number )
    {
        $delete = $this->racesManager->deleteRace( $number );

        require 'views/races/cancelRace.php';
    }
} 
