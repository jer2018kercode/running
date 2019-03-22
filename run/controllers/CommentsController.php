<?php
namespace J\controllers;

use \Exception;
use \J\models\CommentsManager;

class CommentsController
{
    // déclaration des paramètres privés
    private $commentsManager;

    // constructeur
    public function __construct()
    {
        // association des paramètres privés avec les classes
        $this->commentsManager = new CommentsManager();
    }

    public function showComments()
    {
        $comments = $this->commentsManager->showComments();

        require 'views/comments/comment.php';
    }

    public function addComment( $content, $date, $id_member )
    {
        $comment = $this->commentsManager->addComment( $content, $date, $id_member );

        require 'views/comments/commentsConfirm.php';
    }
   
} 
