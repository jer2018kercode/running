<?php
namespace J\controllers;

use \Exception;
use \J\models\CandidateManager;

class CandidateController
{
    // déclaration des paramètres privés
    private $candidateManager;

    // constructeur
    public function __construct()
    {
        // association des paramètres privés avec les classes
        $this->candidateManager = new CandidateManager();
    }

    // pour rejoindre une course officielle
    public function joinRace( $userRace, $id_outdoor )
    {
        $joinRace = $this->candidateManager->joinRace( $userRace, $id_outdoor );

        require 'views/races/raceConfirm.php';
    }

    // pour voir tous les participants d'une sortie
    public function outdoorCandidates( $id_outdoor )
    {
        $candidate = $this->candidateManager->outdoorCandidates( $id_outdoor );

    }

    // pour rejoindre une sortie
    public function joinOutdoor( $userOutdoor, $id_outdoor )
    {
        $joinOutdoor = $this->candidateManager->joinOutdoor( $userOutdoor, $id_outdoor );

        require 'views/outdoors/joinOutdoor.php';
    }

    // pour annuler sa participation à une sortie
    public function renounceOutdoor( $id )
    {
        $renounce = $this->candidateManager->renounceOutdoor( $id );

        require 'views/outdoors/renounceOutdoor.php';
    }
} 
