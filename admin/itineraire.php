<?php
require_once('../vendor/autoload.php');

$planning = DB::query('SELECT * from planning');

dump($planning);


$jours = $_POST ?? '';

$error = [];

if(!empty($_POST)){
    dump($_POST);
    


    if(!empty($error)){
        $query = DB::postQuery('UPDATE planning
                        SET moment = :moment, repos= :repos, ouverture = :ouverture, fermeture = :fermeture, adresse = :adresse, position = :position, localisation = :localisation  
                        WHERE jour = :jour', $day);
                        
    }
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Update Itinéraire</title>
</head>

<body>


    <form action="" method="POST">



        <fieldset>
            <legend>Lundi</legend>
            <h3>Midi</h3>
            <label for="repos">Repos</label><input type="radio" name="lundi[midi][travail]" id="repos" value=0>
            <label for="travail">Travail</label><input type="radio" name="lundi[midi][travail]" id="travail" value=1>
            <label for="start">Heure d'arrivée</label>
            <input type="time" name="lundi[midi][start]" id="start">

            <label for="end">Heure de fin</label>
            <input type="time" name="lundi[midi][end]" id="end">
            <label for="adresse">Adresse</label>
            <select name="lundi[midi][adresse]" id="adresse">
                <option value="GhIJFK5H4XqPRUAR61G4HoXDF0A">14, rue Henri Pointcarré</option>
                <option value="GhIJm8QgsHKPRUAReekmMQjEF0A">49, rue Henri Pointcarré</option>
            </select>
            <h3>Soir</h3>
            <label for="repos">Repos</label><input type="radio" name="lundi[soir][travail]" id="repos" value=0>
            <label for="travail">Travail</label><input type="radio" name="lundi[soir][travail]" id="travail" value=1>
            <label for="">Heure d'arrivée</label>
            <select name="lundi[soir][start]" id="start">
                <option value="18h">18h</option>
                <option value="19h">19h</option>
            </select>
            <label for="">Heure de fin</label>
            <select name="lundi[soir][end]" id="end">
                <option value="21h30">21h30</option>
                <option value="22h30">22h30</option>
            </select>

            <label for="adresse">Adresse</label>
            <select name="lundi[soir][adresse]" id="adresse">
                <option value="GhIJFK5H4XqPRUAR61G4HoXDF0A">14, rue Henri Pointcarré</option>
                <option value="GhIJm8QgsHKPRUAReekmMQjEF0A">49, rue Henri Pointcarré</option>
            </select>



        </fieldset>



        <button type="submit">Envoyer</button>
    </form>

</body>

</html>