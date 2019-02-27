<?php $title = 'Already registered?';?>
<?php ob_start();?>

<?php // login form for user ?>

<h1>Please sign in just bellow!</h1>

<form action="index.php?action=login" method="post">
    <div class="log_reg">
        <label for="user"></label>
            <input type="text" placeholder="username" id="user" name="user">

        <label for="password" ></label>
            <input type="password" placeholder="password" id="password" name="password">
    </div>
    <div class="log_reg">
        <input type="submit" class="confirm_reg" value="Confirm">
    </div>
</form>

<?php $content = ob_get_clean();?>
<?php require 'view/template.php';?>