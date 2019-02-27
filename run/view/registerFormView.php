<?php $title = 'RegisterForm';?>
<?php ob_start();?>

<h2>New on our website?</h2>
<?php // register form for new users --registerView ?>
<form action="index.php?action=register" method="post">
    <div class="register">
        <label for="username">Username</label>
            <input type="text" id="username" name="username">

        <label for="password">Password</label>
            <input type="password" id="password" name="password">

        <label for="password">Confirm Password</label>
            <input type="password" id="confpassword" name="confpassword">

        <label for="firstname">First Name</label>
            <input type="text" id="firstname" name="firstname">

        <label for="lastname">Last Name</label>
            <input type="text" id="lastname" name="lastname">

        <label for="mail">Mail adress</label>
            <input type="text" id="mail" name="mail">
    </div>

    <div class="register">
        <input type="submit" value="Confirm">
    </div>
</form>

<a href="index.php">Return to home</a><br />

<?php // --loginView ?>
<a href="index.php?action=login">Already registered?</a>

<?php $content = ob_get_clean();?>
<?php require 'view/template.php';?>