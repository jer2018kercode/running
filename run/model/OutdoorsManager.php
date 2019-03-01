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
        $show = $db->prepare( 'SELECT * FROM outdoor WHERE race = 0' );
        $show->execute();

        return $show;
    }

    // join outdoors
    public function joinOutdoor( $title, $id_member )
    {
        $db = $this->dbConnect();
        $join = $db->prepare( 'INSERT INTO outdoor( title, id_Member ) VALUES( ?, ? )' );
        $join->execute( array( 
            $title,
            1
        ));

        return $join;
    }

    // suggest outdoors
    public function suggestOutdoor( $title, $description, $date, $id_member )
    {
        $db = $this->dbConnect();
        $suggest = $db->prepare( 'INSERT INTO race( title, description, date, id_Member ) VALUES( ?, ?, ?, ? )' );
        $suggest->execute( array(
            $title,
            $description,
            $date,
            1
        ));

        return $suggest;
    }
}