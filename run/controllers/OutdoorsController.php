<?php
namespace J\controllers;

use \Exception;
use \J\models\OutdoorsManager;
use \J\models\CandidateManager;

class OutdoorsController
{
    // déclaration des paramètres privés
    private $outdoorsManager;
    private $candidateManager;

    // constructeur
    public function __construct()
    {
        // association des paramètres privés avec les classes
        $this->outdoorsManager = new OutdoorsManager();
        $this->candidateManager = new CandidateManager();
    }

    // pour afficher toutes les sorties
    public function showOutdoors( $filter = NULL )
    {
        if( isset( $filter ) )
        {
            $outdoorsView = $this->outdoorsManager->showOutdoorsWithFilter( $filter );
        }
        else
        {
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
        $candidates = $this->candidateManager->outdoorCandidates( $id );
        $outdoor = $this->outdoorsManager->showOutdoor( $id );

        require 'views/outdoors/outdoor.php';
    }

    // pour créer une sortie
    public function createOutdoor( $title, $description, $city, $date, $id_member )
    {
        $suggest = $this->outdoorsManager->createOutdoor( $title, $description, $city, $date, $id_member );

        require 'views/outdoors/outdoorConfirmed.php';
    }

    // pour préparer l'update de sa sortie
    public function prepareUpdate( $id )
    {
        $prepareUpdate = $this->outdoorsManager->showOutdoor( $id );

        require 'views/outdoors/updateOutdoor.php';
    }

    // pour modifier sa sortie
    public function updateOutdoor( $number, $title, $description, $city, $date )
    {
        $update = $this->outdoorsManager->updateOutdoor( $number, $title, $description, $city, $date );

        header( 'Location: index.php?action=showOutdoor&id_outdoor=' . $number );
    }

    // pour annuler sa sortie
    public function cancelOutdoor( $id_outdoor )
    {
        $cancel = $this->outdoorsManager->cancelOutdoor( $id_outdoor );

        require 'views/outdoors/cancelOutdoor.php';
    }
}
