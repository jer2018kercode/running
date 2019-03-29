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
        $comments = $db->prepare( 'SELECT comment.id, content, comment.id_Member, outdoor.id,
        outdoor.id_Member FROM comment INNER JOIN outdoor ON comment.id_Outdoor = outdoor.id' );
        $comments->execute();

        return $comments;
    }

    public function addComment( $content, $id_member, $id_outdoor )
    {
        $db = $this->dbConnect();
        $comments = $db->prepare( 'INSERT INTO comment( content, id_Member, id_Outdoor ) VALUES
        ( ?, ?, ? )' );
        $comments->execute( array( $content, $id_member, $id_outdoor ) );

        $comment = $comments->fetch();
        $comments->closeCursor();
        
        return $comment;
    }
}
