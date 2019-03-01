<?php
namespace J\model;
use \J\model\Manager;
use \PDO;

// declaration of child class
class ProgressionManager extends Manager
{
    // member's progression
    public function progression( $id ) 
    {
        $db = $this->dbConnect();
        $prog = $db->prepare( 'SELECT * FROM progression WHERE id = 1' );
        $prog->execute( array( $id ) );

        //$prog->closeCursor();
        return $prog;
    }

}
