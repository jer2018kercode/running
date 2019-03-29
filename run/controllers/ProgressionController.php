<?php
namespace J\controllers;

use \Exception;
use \J\models\ProgressionManager;

// gestion du suivi personnel d'un utilisateur
class ProgressionController
{
    // déclaration du paramètre privé
    private $progressionManager;

    // constructeur
    public function __construct()
    {
        // association du paramètre privé avec la classe du modèle
        $this->progressionManager = new ProgressionManager();
    }

    // pour le tableau de progression
    public function showProgression( $id_member )
    {
        $progressions = $this->progressionManager->progression( $id_member )->fetchAll();

        // le calcul de la vitesse en fonction de la distance et du temps
        $progressionSum = $this->progressionManager->progressionSum( $id_member );

        $times = [];
        $distances = [];

        foreach( $progressions as $prog ) {
            array_push( $distances, intval( $prog['distance'] ) );
            array_push( $times, intval( $prog['time'] ) );
        }

        require 'views/progression/progression.php';
    }

    // pour sauvegarder les données personnelles
    public function progressionSave( $distance, $time, $id_member )
    {
        $save = $this->progressionManager->progressionSave( $distance, $time, $id_member );

        header( 'Location: index.php?action=showProgression&id_member=' . $id_member );
    }

    // pour supprimer une ligne de progression
    public function deleteProg( $id_progression )
    {
        $delete = $this->progressionManager->deleteProg( $id_progression );

        require 'views/progression/progression.php';
    }
} 
