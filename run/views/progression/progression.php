<?php $title = 'Suivi personnalisé'; ?>
<?php ob_start(); ?>

<div id="container"></div>

<form action="index.php?action=progressionSave" method="post">
    <div class="prog">
        <label for="distance"></label>
            <input type="text" id="distance" placeholder="Distance parcourue" name="distance">
        <select>
            <option>km</option>
        </select>
        <label for="time"></label>
            <input type="text" id="time" placeholder="Temps" name="time">
        <select>
            <option>minutes</option>
            <option>heure</option>
        </select>
            <input type="submit" id="progView" value="Enregistrer">
</form>

    <!-- <div id="ajax">
        <input id="show" type="button" onclick="ajax()" class="button">test</button>
    </div> -->

<!-- <script>
    // objet XML
    var myRequest = new XMLHttpRequest();
    // 2. open the request and pass the HTTP method name and the resource as parameters
    myRequest.open( 'GET', 'views/progression/speed.php' );
    // 3. write a function that runs anytime the state of the AJAX request changes
    myRequest.onreadystatechange = function ()
    { 
    // 4. check if the request has a readyState of 4, which indicates the server has responded (complete)
        if( myRequest.readyState === 4 )
        {
        // 5. insert the text sent by the server into the HTML of the 'ajax-content'
        document.getElementById( 'ajax' ).innerHTML = myRequest.responseText;
        }
    };

    function ajax()
    {
        myRequest.send();
        document.getElementById( 'show' ).style.display = 'none';
    }
</script> -->

<!-- <script>"public/js/speed.js"</script> -->

<?php for( $i = 0; $i <= 0; $i++ ) { ?><?php } ?>

<div id="prog">
    <table>
        <tr>
            <th style="background-color: maroon">&nbsp;</th>
            <th>Distance parcourue</th>
            <th>Temps de course</th>
            <th>Vitesse</th>
            <!-- <th style="background-color: maroon">&nbsp;</th> -->
        </tr>
    </table>

<?php
foreach( $progressions as $prog )
{
    if( $prog['time'] != null && $prog['distance'] != null )
    {
        $result_hour = htmlspecialchars( $prog['time'] ) / 60;
        $result_temps = $prog['distance'] / $result_hour;
        $result_hour2 = round( $result_hour, 2 );
        $result_temps2 = round( $result_temps, 2 ); ?>
        <table>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= htmlspecialchars( $prog['distance'] ); ?> km</td>
                <td><?= $result_hour2 ?> h</td>
                <td><?= $result_temps2 ?> km/h</td>
                <!-- <td><a href="index.php?action=deleteProg&id_progression<?php //<?= $prog['id'] ?> ?>">Supprimer</a>      
                </td> -->
            </tr>
        </table>   
<?php
    }
} ?>
</div>

<script>
Highcharts.chart('container', {
  title: {
    text: 'Mon graph de course'
},
  series: [{
    name: 'Distance',
    data: <?= json_encode( $distances ) ?>
  },
  {
    name: 'Temps',
    data: <?= json_encode( $times ) ?>
  }]
});
</script>

<?php $content = ob_get_clean(); ?>
<?php require 'views/template.php'; ?>