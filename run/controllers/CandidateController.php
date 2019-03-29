<?php
namespace J\controllers;

use \Exception;
use \J\models\CandidateManager;

// gestion des participants aux courses et/ou aux sorties
class CandidateController
{
    // déclaration d'un paramètre privé
    private $candidateManager;

    // constructeur
    public function __construct()
    {
        // association du paramètre privé avec la classe du modèle
        $this->candidateManager = new CandidateManager();
    }

    // pour rejoindre une course officielle
    public function joinRace( $id_race, $id_member )
    {
        $joinRace = $this->candidateManager->joinRace( $id_race, $id_member );

        header( 'Location: index.php?action=showRace&id_race=' . $id_race );
    }

    // pour rejoindre une sortie
    public function joinOutdoor( $id_member, $id_outdoor )
    {
        $joinOutdoor = $this->candidateManager->joinOutdoor( $id_member, $id_outdoor );

        header( 'Location: index.php?action=showOutdoor&id_outdoor=' . $id_outdoor );
    }

    // pour annuler sa participation à une sortie
    public function renounceOutdoor( $id_outdoor )
    {
        $renounceOutdoor = $this->candidateManager->renounceOutdoor( $id_outdoor );

        header( 'Location: index.php?action=showOutdoor&id_outdoor=' . $id_outdoor );
    }

    // pour annuler sa participation à une course
    public function renounceRace( $id_race )
    {
        $renounceRace = $this->candidateManager->renounceRace( $id_race );

        header( 'Location: index.php?action=showRace&id_race=' . $id_race );
    }
} 
