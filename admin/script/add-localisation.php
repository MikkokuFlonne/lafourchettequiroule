<?php

require_once('../../vendor/autoload.php');


$localisations = [
                [
                'id' => 1,
                'adresse' => '14 rue Henri Pointcarré, 83 000 Toulon',
                'place_id' => 'GhIJFK5H4XqPRUAR61G4HoXDF0A',
                'nom' => 'Eglise Pie X'],
                [
                'id' => 2,
                'adresse' => '49 rue Henri Pointcarré, 83 000 Toulon',
                'place_id' => 'GhIJm8QgsHKPRUAReekmMQjEF0A',
                'nom' => 'Eglise Pie X']
                ];



$create = DB::query('DROP TABLE IF EXISTS localisation');
$create = DB::query('CREATE TABLE IF NOT EXISTS localisation (
                     id int(11) NOT NULL AUTO_INCREMENT,
                     adresse varchar(255) NOT NULL,
                     place_id varchar(255) NOT NULL,
                     nom varchar(255) NOT NULL,
                     PRIMARY KEY (id)
                     ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8');




foreach($localisations as $localisation){

    $add = DB::query('INSERT INTO localisation (id, adresse, place_id, nom) VALUES (:id, :adresse, :place_id, :nom)', $localisation);
}


