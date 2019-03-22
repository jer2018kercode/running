<?php
namespace J\controllers;

use \Exception;

use \J\models\OutdoorsManager;
use \J\models\RacesManager;

class Controller
{
    // déclaration des paramètres privés
    private $outdoorsManager;
    private $racesManager;
    
    // constructeur
    public function __construct()
    {
        // association des paramètres privés avec les classes
        $this->outdoorsManager = new OutdoorsManager();
        $this->racesManager = new RacesManager();
    }

    // page principale
    public function index()
    {
        $racesIndex = $this->racesManager->showRaces();
        $outdoorsIndex = $this->outdoorsManager->showOutdoors();

        require 'views/indexView.php';
    }

    
}
