<?php
namespace J\controllers;

use \Exception;
use \J\models\ProgressionManager;

class ProgressionController
{
    // déclaration des paramètres privés
    private $progressionManager;

    // constructeur
    public function __construct()
    {
        // association des paramètres privés avec les classes
        $this->progressionManager = new ProgressionManager();
    }

    // tableau de progression
    public function showProgression( $id_member )
    {
        $progression = $this->progressionManager->progression( $id_member );
        $progressionSum = $this->progressionManager->progressionSum( $id_member );

        require 'views/progression/progression.php';
    }

    // sauvegarder les données persos
    public function progressionSave( $distance, $time, $id_member )
    {
        $save = $this->progressionManager->progressionSave( $distance, $time, $id_member );

        header( 'Location: index.php?action=showProgression&id_member=' . $id_member );
    }

    // pour supprimer une progression
    public function deleteProg( $id_progression )
    {
        $delete = $this->progressionManager->deleteProg( $id_progression );

        require 'views/progression/progression.php';
    }
} 
