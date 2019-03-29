<?php
namespace J\controllers;

use \Exception;
use \J\models\CommentsManager;

// gestion des commentaires sur une sortie
class CommentsController
{
    // déclaration du paramètre privé
    private $commentsManager;

    // constructeur
    public function __construct()
    {
        // association du paramètre privé avec la classe du modèle
        $this->commentsManager = new CommentsManager();
    }

    // pour afficher tous les commentaires
    public function showComments()
    {
        $comments = $this->commentsManager->showComments();

        require 'views/comments/comment.php';
    }

    // pour ajouter un commentaire
    public function addComment( $content, $id_member, $id_outdoor )
    {
        $comment = $this->commentsManager->addComment( $content, $id_member, $id_outdoor );

        require 'views/comments/commentsForm.php';
    }
   
} 
