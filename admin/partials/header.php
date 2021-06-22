<?php
require_once('../vendor/autoload.php');

require('../public/config/functions.php');



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin | <?php
                    if (isset($title)) {
                        echo $title;
                    }

                    $title ?></title>
    <link rel="stylesheet" href="./assets/style.css">
    <?php
    if (isset($style)) {
        echo '<link rel="stylesheet" href="' . $style . '">';
    }
    ?>
</head>

<body>

    <div class="container">

        <header>
            <h1>Panneau Admin</h1>
        </header>