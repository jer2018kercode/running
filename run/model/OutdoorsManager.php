<?php
namespace J\model;
use \J\model\Manager;
use \PDO;

// declaration of child class
class OutdoorsManager extends Manager 
{
    // show outdoors
    public function showOutdoors()
    {
        $db = $this->dbConnect();
        $show = $db->prepare( 'SELECT * FROM race WHERE outdoor = 1' );
        $show->execute();

        return $show;
    }

    // join outdoors
    public function joinOutdoor( $id_member )
    {
        $db = $this->dbConnect();
        $join = $db->prepare( 'INSERT INTO race( id_Member ) VALUES( ? )' );
        $join->execute( array( 
            1
        ));

        return $join;
    }

    // suggest outdoors
    public function suggestOutdoor( $title, $id_member )
    {
        $db = $this->dbConnect();
        $suggest = $db->prepare( 'INSERT INTO race( title, id_Member ) VALUES( ?, ? )' );
        $suggest->execute( array(
            $title,
            1
        ));

        return $suggest;
    }
}