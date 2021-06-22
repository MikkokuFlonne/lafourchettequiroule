<?php

$style = './assets/itineraire.css';
$title = 'Update Itinéraire';

require_once('./partials/header.php');

$planning = DB::query('SELECT * from planning 
                       INNER JOIN localisation ON localisation.id = planning.localisation_id ');

$localisations = DB::query(('SELECT * from localisation'));

$jours = $_POST ?? '';

$error = [];

if (!empty($_POST)) {


    foreach ($jours as $name => $jour) {
        foreach ($jour as $moment => $infos) {
            foreach ($infos as $index => $info) {

                if ($index == 'ouverture' || $index == 'fermeture') {

                    if (!strtotime($info)) {

                        $error += [$name => [$moment => [$index => 'L\'heure indiquée n\'est pas valide']]];
                    }
                    if(strtotime($infos['ouverture']) >= strtotime($infos['fermeture'])){
                        $error += [$name => [$moment => [$index => 'Les horaires d\'ouverture et de fermeture indiqués ne correspondent pas']]];

                    }
                }

                if ($index == 'localisation_id') {

                    $loc = false;

                    foreach ($localisations as $localisation) {
                        if ($localisation->id == $info) {
                            $loc = true;
                        }
                    }
                    if ($loc !== true) {
                        $error += [$name => [$moment => [$index => 'La localisation indiquée n\'est pas valide']]];
                    }
                }
                if ($index == 'repos') {
                    if (filter_var($info, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) === null) {
                        $error += [$name => [$moment => [$index => 'Le truc indiquée n\'est pas valide']]];
                    }
                }
            }
        }
    }
    dump($error);

    if (empty($error)) {

        foreach ($jours as $name => $jour) {
            $day = ['jour' => $name];
            foreach ($jour as $moment => $infos) {
                if ($moment == 'Midi') {
                    $day += ['moment' => 0];
                } else if ($moment == 'Soir') {
                    $day += ['moment' => 1];
                }
                foreach ($infos as $index => $info) {
                    $info = htmlspecialchars($info);
                    $day += [$index => $info];
                }
            }

            DB::postQuery('UPDATE planning
                        SET repos= :repos, ouverture = :ouverture, fermeture = :fermeture, localisation_id = :localisation_id  
                        WHERE jour = :jour AND moment = :moment', $day);
        }
        //header('Location: itineraire.php?sucess');
    }
}




?>


<section class="planning">
    <form action="" method="POST">

        <table>
            <tr>
                <th>Jour</th>
                <th>Période</th>
                <th>Adresse</th>
                <th>Ouverture</th>
                <th>Fermeture</th>
                <th>Jour travaillé</th>
            </tr>

            <?php
            $jour = '';
            $moment = '';
            foreach ($planning as $day) {
            ?>

                <tr>
                    <?php if ($day->jour != $jour) {

                        $jour = $day->jour;
                        echo '<td rowspan="2">' . $jour . '</td>';
                    }

                    if ($day->moment == 0) {
                        $moment = 'Midi';
                    } else {
                        $moment = 'Soir';
                    }
                    ?>

                    <td><?= $moment ?></td>
                    <td><select name="<?= $jour . '[' . $moment . ']' ?>[localisation_id]" id="">
                            <?php
                            foreach ($localisations as $localisation) { ?>
                                <option value="<?= $localisation->id ?>" <?php if ($day->localisation_id == $localisation->id) {
                                                                                echo 'selected';
                                                                            }
                                                                            ?>><?= $localisation->adresse ?></option>
                            <?php }
                            ?>
                        </select>
                        <?php if (isset($error[$jour][$moment]['localisation_id'])) {
                            echo '<p>' . $error[$jour][$moment]['localisation_id'] . '</p>';
                        } ?>
                    </td>
                    <td> <input type="datetime" name="<?= $jour . '[' . $moment . ']' ?>[ouverture]" id="ouverture" value="<?php
                                                                                                                            if (!empty($_POST)) {
                                                                                                                                echo $_POST[$jour][$moment]['ouverture'];
                                                                                                                            } else {
                                                                                                                                echo date('H:i', strtotime($day->ouverture));
                                                                                                                            } ?>">
                        <?php if (isset($error[$jour][$moment]['ouverture'])) {
                            echo '<p>' . $error[$jour][$moment]['ouverture'] . '</p>';
                        } ?>
                    </td>
                    <td> <input type="datetime" name="<?= $jour . '[' . $moment . ']' ?>[fermeture]" id="fermeture" value="<?php
                                                                                                                            if (!empty($_POST)) {
                                                                                                                                echo $_POST[$jour][$moment]['fermeture'];
                                                                                                                            } else {
                                                                                                                                echo date('H:i', strtotime($day->fermeture));
                                                                                                                            } ?>">
                        <?php if (isset($error[$jour][$moment]['fermeture'])) {
                            echo '<p>' . $error[$jour][$moment]['fermeture'] . '</p>';
                        } ?>
                    </td>
                    <td>
                        <label for="<?= $jour . '[' . $moment . ']' ?>[repos]">Travail</label><input type="radio" name="<?= $jour . '[' . $moment . ']' ?>[repos]" id="" value="0" <?php
                                                                                                                                                                                    if ($day->repos == 0) {
                                                                                                                                                                                        echo 'checked';
                                                                                                                                                                                    } ?>>
                        <label for="<?= $jour . '[' . $moment . ']' ?>[repos]">Repos</label><input type="radio" name="<?= $jour . '[' . $moment . ']' ?>[repos]" id="" value="1" <?php
                                                                                                                                                                                    if ($day->repos == 1) {
                                                                                                                                                                                        echo 'checked';
                                                                                                                                                                                    } ?>>
                        <?php if (isset($error[$jour][$moment]['repos'])) {
                            echo '<p>' . $error[$jour][$moment]['repos'] . '</p>';
                        } ?>
                    </td>
                </tr>

            <?php }

            ?>

        </table>



        <button type="submit">Mettre à jour le planning</button>
    </form>

</section>



<?php

require_once './partials/footer.php'
?>