<?php
namespace J\model;
use \J\model\Manager;
use \PDO;

// declaration of child class
class ProgressionManager extends Manager
{
    // member's progression
    public function progression( $id_member ) 
    {
        $db = $this->dbConnect();
        $prog = $db->prepare( 'SELECT * FROM progression WHERE id_Member = ?' );
        $prog->execute( array( $id_member ) );

        $prog->closeCursor();
        return $prog;
    }

}
