<?php $title = 'Contact';?>
<?php ob_start();?>

<h1>Contact</h1>

<p>Vous rencontrez des difficultés sur notre site ? N'hésitez pas à nous contacter.<br />
Nous ferons en sorte que vous puissiez utiliser ses fonctionnalités le plus simplement possible.</p>

<p>Adresse mail : jerome@toto.gmail.com</p>
<p>Téléphone : 06 43 38 39 ..</p>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>
