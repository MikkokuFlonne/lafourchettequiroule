<?php

require __DIR__ . '/../config/config.php';
require __DIR__ . '/../config/DB.php';
require __DIR__ . '/../config/functions.php';
require_once __DIR__ . '../../../vendor/autoload.php';

$title = 'Connexion';
session_start();

$email = $_POST['connexion']['email'] ?? '';
$mdp = $_POST['connexion']['mdp'] ?? '';

$mail = $_POST['inscription']['email'] ?? '';
$name = $_POST['inscription']['name'] ?? '';
$firstname = $_POST['inscription']['firstname'] ?? '';
$password = $_POST['inscription']['password'] ?? '';
$passwordverif = $_POST['inscription']['passwordverif'] ?? '';


$errors = [];

$mail = htmlspecialchars($mail);
$name = htmlspecialchars($name);
$firstname = htmlspecialchars($firstname);
$hash = password_hash($password , PASSWORD_DEFAULT);


if (!empty($_POST)) {
    
    
    if(!empty($_POST['connexion'])){

        // On va vérifier que l'utilisateur existe et que le mot de passe saisi
        // correspond au hash de la BDD
        $query = DB::query('SELECT * FROM user WHERE mail = :mail', ['mail' => $email]);
        if ($query && password_verify($mdp, $query[0]->password)) {
            // On est connecté
            $_SESSION['user'] = $query[0];
            header('Location: index.php');
        } else {
            $errors += ['connexion'=>'Email ou mot de passe incorrect'];
        }
    }

    if(!empty($_POST['inscription'])){

        // On vérifie que le mail ne soit pas déjà présent dans la BDD
        $query = DB::query('SELECT * FROM user WHERE mail = :mail', ['mail' => $mail]);

        if(empty($query)){
            if (false === filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $errors['inscription']['email'] = 'L\'email n\'est pas valide';
            }

            if(strlen($firstname)<= 2){
                $errors['inscription']['firstname'] = "Le prénom n'est pas correct";
            }

            if(strlen($name)<= 2){
                $errors['inscription']['name'] = "Le nom n'est pas correct";
            }
            if(strlen($password) <= 6){
                $errors['inscription']['password'] = "Le mot de passe doit être composé d'au moins 7 caractères";
            }

            if($password !== $passwordverif){
                $errors['inscription']['passwordverif'] = "Les mots de passe ne correspondent pas";
            }
            
        }else{
            $errors += ['inscription'=> ['email' => 'Cet email est déjà utilisé']];
        }

        if(empty($errors)){
            DB::postQuery('INSERT INTO user (mail, name, firstname, password) VALUES (:mail, :name, :firstname, :password)', ['mail'=> $mail, 'name' => $name, 'firstname' => $firstname, 'password' => $hash]);

            header('Location: index.php');
            
        }

    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Fourchette qui Roule | <?php
                                        if (isset($title)) {
                                            echo $title;
                                        }

                                        $title ?></title>
    <link rel="stylesheet" href="./assets/style/style.css">
    <?php
    if (isset($style)) {
        echo '<link rel="stylesheet" href="' . $style . '">';
    }
    ?>
</head>

<body>

    <div class="container">

        <header>
            <div class="main-header">
                <div class="logo">
                    <a href="index.php">
                        <figure>
                            <img src="https://www.lafourchettequiroule.com/La_Fourchette_Qui_Roule/WELCOME_files/la%20fourchette%20qui%20roule%20complet.png" alt="">
                        </figure>
                    </a>
                </div>
                <nav>
                    <?php if (isset($_SESSION['user'])) { ?>
                        <div class="user" id="user">
                            <span><i class="fa fa-user" aria-hidden="true"></i> Bienvenue <?= $_SESSION['user']->firstname ?></span>
                            <div id="menu-user">
                                <ul>
                                    <?php if (isAdmin()) { ?>
                                        <li>
                                            <a href="../admin/dashboard.php"><i class="fas fa-user-cog"></i> Panneau d'administration</a>
                                        </li>
                                    <?php } ?>
                                    <li>
                                        <a href="./user.php"><i class="fa fa-user"></i> Gérer mon compte</a>
                                    </li>
                                    <li>
                                        <a href="./logout.php"><i class="fas fa-power-off"></i> Déconnexion</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div id="popup" class="popup">
                            <span>Connexion</span>
                        </div>
                    <?php } ?>

                    <ul>
                        <a href="menu.php">
                            <li>Menu</li>
                        </a>
                        <a href="gallery.php">
                            <li>Photos</li>
                        </a>
                        <a href="itineraire.php">
                            <li>Itinéraire</li>
                        </a>
                        <a href="contact.php">
                            <li>Contact</li>
                        </a>
                        <a href="abonnement.php">
                            <li>Abonnement</li>
                        </a>
                    </ul>
                </nav>


            </div>

            <?php if (!isset($_SESSION['user'])) { ?>

            <div class="compte" id="compte" style="<?php if(!empty($_POST)){
                        echo 'display: flex';
                    }else{
                        echo 'display: none';
                    }?>">
                <ul>
                    <li id="tab-connexion" style="<?php if(!empty($_POST['connexion']) || empty($_POST['inscription'])){
                        echo 'background-color: brown';
                    }else{
                        echo 'background-color: rgb(119, 43, 43); box-shadow: inset -5px -5px 10px -4px black';
                    }?>
                ">
                        Déjà un compte ?
                    </li>
                    <li id="tab-inscription" style="<?php if(!empty($_POST['inscription'])){
                        echo 'background-color: brown';
                    }else{
                        echo 'background-color: rgb(119, 43, 43); box-shadow: inset 5px -5px 10px -4px black';
                    }?>
                    ">
                        Nouveau ?
                    </li>
                </ul>
                <div id="connexion" class="connexion" style=" display: <?php if(!empty($_POST['connexion']) || empty($_POST)){
                        echo 'flex';
                    }else{
                        echo 'none';
                    }?>
                " >
                    <h3>Connexion</h3>
                    <form action="" method="POST">
                        <label for="connexion[email]">Email : </label><input type="text" name="connexion[email]" value="<?= $email ?>">
                        <label for="connexion[mdp]">Mot de passe : </label><input type="password" name="connexion[mdp]" id="mdp">
                        <?php 
                            if(!empty($errors['connexion'])){
                                echo' <p>'.$errors['connexion'].'</p>';
                            }
                        ?>
                        
                        <button type="submit">Se connecter</button>
                    </form>


                </div>
                <div id="inscription" class="inscription" style=" display: <?php if(!empty($_POST['inscription'])){
                        echo 'flex';
                    }else{
                        echo 'none';
                    }?>
                " >
                    <h3>Inscription</h3>
                    <form action="" method="POST">
                        <label for="name">Nom : </label><input type="text" name="inscription[name]" value="<?= $name ?>">
                        <?php 
                            if(!empty($errors['inscription']['name'])){
                                echo' <p>'.$errors['inscription']['name'].'</p>';
                            }
                        ?>
                        <label for="firstname">Prénom : </label><input type="text" name="inscription[firstname]" value="<?= $firstname ?>">
                        <?php 
                            if(!empty($errors['inscription']['firstname'])){
                                echo' <p>'.$errors['inscription']['firstname'].'</p>';
                            }
                        ?>                        
                        <label for="email">Email : </label><input type="text" name="inscription[email]" value="<?= $mail ?>">
                        <?php 
                            if(!empty($errors['inscription']['mail'])){
                                echo' <p>'.$errors['inscription']['email'].'</p>';
                            }
                        ?>
                        <label for="password">Mot de passe : </label><input type="password" name="inscription[password]" id="password">
                        <?php 
                            if(!empty($errors['inscription']['password'])){
                                echo' <p>'.$errors['inscription']['password'].'</p>';
                            }
                        ?>
                        <label for="passwordverif">Vérification du mot de passe : </label><input type="password" name="inscription[passwordverif]" id="password">
                        <?php 
                            if(!empty($errors['inscription']['passwordverif'])){
                                echo' <p>'.$errors['inscription']['passwordverif'].'</p>';
                            }
                        ?>
                        <button type="submit">S'inscrire</button>
                    </form>
                </div>
            <span id="close-popup">X</span>
            </div>

            <?php
            }?>

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