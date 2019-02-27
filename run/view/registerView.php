<?php $title = 'Registered';?>
<?php ob_start();?>

<?php // db table member used ?>
<?php // <?php while( $registered = $register->fetch() ) 
{
    // secure
    // $user = htmlspecialchars( $registered['username'] );
    // $password = htmlspecialchars( $registered['password'] ); 
    // $confpassword = htmlspecialchars( $registered['confpassword'] ); 
    // $firstname = htmlspecialchars( $registered['firstname'] ); 
    // $lastname = htmlspecialchars( $registered['lastname'] ); 
    // $mail = htmlspecialchars( $registered['mail'] ); 
?>

    <?php // <h1><?= 'Hello' . ' ' . $user . '<br />' . 'How are you doing?' .
    // '<br />' . 'Your account was successfuly created' . ' ' . 'Your password is ...' . ' ' . $password; <h1> ?>

<?php
}
?>
<a href="index.php">Return to home</a>

<?php $content = ob_get_clean();?>
<?php require 'view/template.php';?>