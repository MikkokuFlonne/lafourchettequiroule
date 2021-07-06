<?php

require_once('../../vendor/autoload.php');

$mdp = 'feliciap';


$admin = [
    'id'=> 1,
    'mail'=> 'feliciap@hotmail.fr',
    'password'=> password_hash($mdp, PASSWORD_DEFAULT),
    'name' => 'PORTAL',
    'firstname'=> 'Félicia',
    'is_admin'=> 1,
    'is_subscribed' => 0
];



$create = DB::query('DROP TABLE IF EXISTS user');
$create = DB::query('CREATE TABLE IF NOT EXISTS user (
                     id int(11) NOT NULL AUTO_INCREMENT,
                     mail varchar(255) NOT NULL,
                     password varchar(255) NOT NULL,
                     name varchar(255) NOT NULL,
                     firstname varchar(255) NOT NULL,
                     is_admin tinyint(1) DEFAULT 0,
                     is_subscribed tinyint(1) DEFAULT 0,
                     PRIMARY KEY (id)
                     ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8');






DB::query('INSERT INTO user (id, mail, password, name, firstname, is_admin, is_subscribed) VALUES (:id, :mail, :password, :name, :firstname, :is_admin, :is_subscribed)', $admin);


