<?php

require_once('../../vendor/autoload.php');


$planning = [
                [
                'id' => 1,
                'jour' => 'Lundi',
                'moment' => 0,
                'repos' => 1,
                'ouverture'=> '11:00:00.000000',
                'fermeture' => '14:00:00.000000',
                'localisation_id'=> 1
                ],
                [
                'id' => 2,
                'jour' => 'Lundi',
                'moment' => 1,
                'repos' => 1,
                'ouverture'=> '18:00:00.000000',
                'fermeture' => '21:30:00.000000',
                'localisation_id'=> 2
                ],
                [
                'id' => 3,
                'jour' => 'Mardi',
                'moment' => 0,
                'repos' => 0,
                'ouverture'=> '11:00:00.000000',
                'fermeture' => '14:00:00.000000',
                'localisation_id'=> 1
                ],
                [
                'id' => 4,
                'jour' => 'Mardi',
                'moment' => 1,
                'repos' => 0,
                'ouverture'=> '18:00:00.000000',
                'fermeture' => '21:30:00.000000',
                'localisation_id'=> 2
                ],
                [
                'id' => 5,
                'jour' => 'Mercredi',
                'moment' => 0,
                'repos' => 0,
                'ouverture'=> '11:00:00.000000',
                'fermeture' => '14:00:00.000000',
                'localisation_id'=> 1
                ],
                [
                'id' => 6,
                'jour' => 'Mercredi',
                'moment' => 1,
                'repos' => 0,
                'ouverture'=> '18:00:00.000000',
                'fermeture' => '21:30:00.000000',
                'localisation_id'=> 2
                ],
                [
                'id' => 7,
                'jour' => 'Jeudi',
                'moment' => 0,
                'repos' => 0,
                'ouverture'=> '11:00:00.000000',
                'fermeture' => '14:00:00.000000',
                'localisation_id'=> 1
                ],
                [
                'id' => 8,
                'jour' => 'Jeudi',
                'moment' => 1,
                'repos' => 0,
                'ouverture'=> '18:00:00.000000',
                'fermeture' => '21:30:00.000000',
                'localisation_id'=> 2
                ],
                [
                'id' => 9,
                'jour' => 'Vendredi',
                'moment' => 0,
                'repos' => 0,
                'ouverture'=> '11:00:00.000000',
                'fermeture' => '14:00:00.000000',
                'localisation_id'=> 1
                ],
                [
                'id' => 10,
                'jour' => 'Vendredi',
                'moment' => 1,
                'repos' => 0,
                'ouverture'=> '18:00:00.000000',
                'fermeture' => '21:30:00.000000',
                'localisation_id'=> 2
                ],
                [
                'id' => 11,
                'jour' => 'Samedi',
                'moment' => 0,
                'repos' => 0,
                'ouverture'=> '11:00:00.000000',
                'fermeture' => '14:00:00.000000',
                'localisation_id'=> 1
                ],
                [
                'id' => 12,
                'jour' => 'Samedi',
                'moment' => 1,
                'repos' => 0,
                'ouverture'=> '18:00:00.000000',
                'fermeture' => '21:30:00.000000',
                'localisation_id'=> 2
                ],
                [
                'id' => 13,
                'jour' => 'Dimanche',
                'moment' => 0,
                'repos' => 1,
                'ouverture'=> '11:00:00.000000',
                'fermeture' => '14:00:00.000000',
                'localisation_id'=> 1
                ],
                [
                'id' => 14,
                'jour' => 'Dimanche',
                'moment' => 1,
                'repos' => 1,
                'ouverture'=> '18:00:00.000000',
                'fermeture' => '21:30:00.000000',
                'localisation_id'=> 2
                ],
                ];



$create = DB::query('DROP TABLE IF EXISTS planning');
$create = DB::query('CREATE TABLE IF NOT EXISTS planning (
                    id int(11) NOT NULL AUTO_INCREMENT,
                    jour varchar(255) NOT NULL,
                    moment tinyint(1) NOT NULL,
                    repos tinyint(1) NOT NULL,
                    ouverture time(6) NOT NULL,
                    fermeture time(6) NOT NULL,
                    localisation_id varchar(255) NOT NULL,
                    PRIMARY KEY (id)
                    ) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8');




foreach($planning as $day){
    dump($day);

    $add = DB::query('INSERT INTO planning (id, jour, moment, repos, ouverture, fermeture, localisation_id) VALUES (:id, :jour, :moment, :repos, :ouverture, :fermeture, :localisation_id)', $day);
}


