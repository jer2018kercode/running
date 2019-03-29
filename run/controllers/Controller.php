<?php
namespace J\controllers;

use \Exception;

use \J\models\OutdoorsManager;
use \J\models\RacesManager;

// gestion des courses et sortie en page d'accueil
class Controller
{
    // déclaration des paramètres privés de courses et de sorties
    private $outdoorsManager;
    private $racesManager;
    
    // constructeur
    public function __construct()
    {
        // association des paramètres privés avec les classes des modèles courses et sorties
        $this->outdoorsManager = new OutdoorsManager();
        $this->racesManager = new RacesManager();
    }

    // pour afficher les courses et les sorties sur la page principale
    public function index()
    {
        // les courses
        $racesIndex = $this->racesManager->showRaces();

        // les sorties
        $outdoorsIndex = $this->outdoorsManager->showOutdoors();

        require 'views/indexView.php';
    }
}
