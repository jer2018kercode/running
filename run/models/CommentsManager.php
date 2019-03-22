<?php
namespace J\models;
use \J\models\Manager;
use \PDO;

// declaration de la classe enfant
class CommentsManager extends Manager
{
    public function showComments()
    {
        $db = $this->dbConnect();
        $comments = $db->prepare( 'SELECT * FROM comment INNER JOIN outdoor ON comment.id_Outdoor = outdoor.id' );
        $comments->execute();

        return $comments;
    }

    public function addComment( $content, $date, $id_member )
    {
        $db = $this->dbConnect();
        $comments = $db->prepare( 'INSERT INTO comment( content, date, id_Member, id_Outdoor ) VALUES
        ( ?, ?, ?, ? )' );
        $comments->execute( array( $content, $date, $id_member ) );
    }
}
