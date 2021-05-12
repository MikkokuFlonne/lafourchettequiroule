<?php

require __DIR__.'/../config/config.php';
require __DIR__.'/../config/DB.php';
require __DIR__.'/../config/functions.php';


spl_autoload_register(function ($class) {

    $class = str_replace('\\', '/', $class);

    require $class.'.php';
    
});

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Fourchette qui Roule | <?php
        if(isset($title)){
            echo $title;
        } 
    
    $title?></title>
    <link rel="stylesheet" href="./assets/style/style.css">
    <?php
    if(isset($style)){
        echo '<link rel="stylesheet" href="'.$style.'">';
    } 
    ?>
</head>

<body>

    <div class="container">

        <header>
            <nav>
                <ul>
                    <a href="">
                        <li>Menu</li>
                    </a>
                    <a href="">
                        <li>Photos</li>
                    </a>
                    <a href="">
                        <li>La Fourchette qui Roule</li>
                    </a>
                    <a href="">
                        <li>Itinéraire</li>
                    </a>
                    <a href="">
                        <li>Contact</li>
                    </a>
                </ul>
            </nav>

            <div class="social-media">

                <div>
                    <a href="https://twitter.com/fourchetteroule" target="_blank">
                        <div class="icon twitter">
                            <div class="tooltip">Twitter</div>
                            <span><i class="fab fa-twitter"></i></span>
                        </div>
                    </a>
                </div>

                <div>
                    <a href="https://www.facebook.com/lafourchettequiroule/" target="_blank">
                        <div class="icon facebook">
                            <div class="tooltip">Facebook</div>
                            <span><i class="fab fa-facebook-f"></i></span>
                        </div>
                    </a>
                </div>

                <div>
                    <a href="https://www.tiktok.com/@lafourchettequiroule?lang=fr" target="_blank">
                        <div class="icon tiktok">
                            <div class="tooltip">TikTok</div>
                            <span><i class="fab fa-tiktok"></i></span>
                        </div>
                    </a>
                </div>

                <div>
                    <a href="https://www.instagram.com/lafourchettequirouletoulon/" target="_blank">
                        <div class="icon instagram">
                            <div class="tooltip">Instagram</div>
                            <span><i class="fab fa-instagram"></i></span>
                        </div>
                    </a>
                </div>
            </div>

        </header>
