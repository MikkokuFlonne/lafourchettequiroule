<?php

$style = './assets/style/itineraire/itineraire.css';
$title = 'Itinéraire';

require_once './partials/header.php';


$midis = DB::query('SELECT * from planning 
                    INNER JOIN localisation ON localisation.id = planning.localisation_id  
                    WHERE moment = true');

$soirs = DB::query('SELECT * from planning 
                    INNER JOIN localisation ON localisation.id = planning.localisation_id  
                    WHERE moment = false');

?>
<section class="itineraire">

    <table>

        <tr class="midi">

            <?php foreach ($midis as $midi) { 
                                
                ?>
                <td>
                    <h1><?= ucfirst($midi->jour) ?></h1>
                    <?php
                        if($midi->repos == true){
                            
                        }else{?>

                            <h3><?= $midi->nom ?></h3>
                            <p class="adresse"><?= $midi->adresse ?></p>
                            <p class="heure"><?= heureFormat($midi->ouverture). '/' . heureFormat($midi->fermeture)?></p>

                        <?php } ?>
                </td>

            <?php }

            ?>

        </tr>
        <tr class="soir">

            <?php foreach ($soirs as $soir) { ?>
                <td>
                <?php
                        if($soir->repos == true){
                            
                        }else{?>

                            <h3><?= $midi->nom?></h3>
                            <p class="adresse"><?= $soir->adresse ?></p>
                            <p class="heure"><?= heureFormat($soir->ouverture). '/' . heureFormat($soir->fermeture) ?></p>

                        <?php } ?>
                </td>

            <?php }

            ?>
        </tr>

    </table>


</section>

<?php
require_once './partials/footer.php';


?>