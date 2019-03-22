<?php $title = 'Page d\'accueil'; ?>
<?php ob_start(); ?>

<?php // photo ?>
<div id="slider">
    <img id="monImage" src="public/images/nike.jpg" alt="images" />
</div>

<div id="slider">
    <img id="monImage" src="" alt="" txt="" height="80" width="150">
    <button id="left" class="slider__btn slider__btn--left" onclick="turnLeft()"></button>
    <button id="right" class="slider__btn slider__btn--right" onclick="turnRight()"></button>
</div>

    <a href="index.php?action=showRaces"><p id="blue">Les Courses</p></a>
    <a href="index.php?action=showOutdoors"><p id="tan">Les Sorties</p></a>

<div id="flex">
    <section class="indexR">
        <?php // afficher les courses en page d'accueil
        while( $race = $racesIndex->fetch() ) 
        {
        ?>
            <table style="border-collapse: separate; border-spacing: 0.1px;">
                <tr>
                    <th><?= htmlspecialchars( $race['date'] ); ?></th>
                </tr>
                <tr>
                    <td><a href="index.php?action=showRace&id_race=<?=
                    $race['id'] ?>"><strong>
                    <?= htmlspecialchars( $race['title'] ); ?></strong></a></td>
                </tr>
            </table> 
        <?php
        }
            $racesIndex->closeCursor();
        ?>
    </section>

    <section class="indexO">
        <?php // afficher les sorties en page d'accueil
        while( $outdoor = $outdoorsIndex->fetch() ) 
        {
        ?>
            <table style="border-collapse: separate; border-spacing: 0.1px;">
                <tr>
                    <th><?= htmlspecialchars( $outdoor['date'] ); ?></th>
                </tr>
                <tr>
                    <td><a href="index.php?action=showOutdoor&id_outdoor=<?=
                    $outdoor['id'] ?>"><strong>
                    <?= htmlspecialchars( $outdoor['title'] ); ?></strong></a></td>
                </tr>
            </table>
        <?php
        }
            $outdoorsIndex->closeCursor();
        ?>
    </section>
</div>

<script src="public/js/slider.js"></script>

<?php $content = ob_get_clean(); ?>
<?php require 'views/template.php'; ?>