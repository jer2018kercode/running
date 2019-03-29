<?php
namespace J\controllers;

use \Exception;
use \J\models\OutdoorsManager;
use \J\models\CandidateManager;

// gestion des sorties
class OutdoorsController
{
    // déclaration des paramètres privés
    private $outdoorsManager;
    private $candidateManager;

    // constructeur
    public function __construct()
    {
        // association des paramètres privés avec les classes des modèles
        $this->outdoorsManager = new OutdoorsManager();
        $this->candidateManager = new CandidateManager();
    }

    // pour afficher toutes les sorties
    public function showOutdoors( $filter = NULL )
    {
        if( isset( $filter ) )
        {
            // les sorties en fonction du filtre
            $outdoorsView = $this->outdoorsManager->showOutdoorsWithFilter( $filter );
        }
        else
        {
            // toutes les sorties
            $outdoorsView = $this->outdoorsManager->showOutdoors();
        }

        require 'views/outdoors/groupOutdoors.php';
    }

    // pour afficher le titre des sorties
    public function outdoorsTitles()
    {
        $outdoorsTitles = $this->outdoorsManager->showOutdoors();

        require 'views/outdoors/groupOutdoors.php';
    }

    // pour voir une seule sortie
    public function showOutdoor( $id )
    {
        // tous les participants à une sortie
        $candidates = $this->candidateManager->outdoorCandidates( $id );

        // une sortie
        $outdoor = $this->outdoorsManager->showOutdoor( $id );

        $id_Member = $outdoor['id_Member'];

        require 'views/outdoors/outdoor.php';
    }

    // pour créer une sortie
    public function createOutdoor( $title, $description, $city, $date, $id_member )
    {
        $suggest = $this->outdoorsManager->createOutdoor( $title, $description, $city, $date, $id_member );

        header( 'Location: index.php?action=showOutdoors' );
    }

    // pour préparer l'update de sa sortie
    public function prepareUpdate( $id )
    {
        $prepareUpdate = $this->outdoorsManager->showOutdoor( $id );

        require 'views/outdoors/updateOutdoor.php';
    }

    // pour modifier sa sortie
    public function updateOutdoor( $id_outdoor, $title, $description, $city, $date )
    {
        $update = $this->outdoorsManager->updateOutdoor( $id_outdoor, $title, $description, $city, $date );

        // pour afficher la sortie avec les modifications apportées
        header( 'Location: index.php?action=showOutdoor&id_outdoor=' . $id_outdoor );
    }

    // pour annuler sa sortie
    public function cancelOutdoor( $id_outdoor )
    {
        $cancel = $this->outdoorsManager->cancelOutdoor( $id_outdoor );

        header( 'Location: index.php?action=showOutdoors' );
    }
}
