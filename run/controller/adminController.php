<?php
namespace J\controller;

use \Exception;
use \J\model\MembersManager;
use \J\model\CandidateManager;
use \J\model\OutdoorsManager;
use \J\model\RacesManager;
use \J\model\ProgressionManager;

class AdminController
{
    // déclaration des paramètres privés
    private $adminMembersManager;
    private $adminCandidateManager;
    private $adminOutdoorsManager;
    private $adminRacesManager;
    private $adminProgressionManager;
    
    // constructeur
    public function __construct()
    {
        // association des paramètres privés avec les classes
        $this->adminMembersManager = new MembersManager();
        $this->adminCandidateManager = new CandidateManager();
        $this->adminOutdoorsManager = new OutdoorsManager();
        $this->adminRacesManager = new RacesManager();
        $this->adminProgressionManager = new ProgressionManager();
    }

    public function test()
    {
        if( isset( $_SESSION['username'] ) )
        { 
            echo 'Hello';
        } else 
        { ?>

            <a href="index.php?action=registerForm"><input type="button" class="go" value="S'inscrire"></a>
            <a href="index.php?action=login"><input type="button" class="go" value="Se connnecter"></a>
<?php
        } 
    }
} 
