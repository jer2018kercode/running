<?php $title = 'Infos courses';?>
<?php ob_start();?>

<form action="index.php?action=raceConfirmed" method="post">
    <div class="confirm">
        <label for="id">Id</label>
            <input type="text" id="id" name="id">

        <label for="id_member">Id_Member</label>
            <input type="text" id="id_member" name="id_member">
    </div>
    <div class="confirm">
        <input type="submit" value="Confirmer">
    </div>
</form>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>