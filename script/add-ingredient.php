<?php

require __DIR__.'../../public/config/DB.php';

DB::postQuery('SET FOREIGN_KEY_CHECKS = 0');
DB::postQuery('TRUNCATE TABLE ingredient');
DB::postQuery('SET FOREIGN_KEY_CHECKS = 1');

$ingredients = [
    ['ingredient'=> 'Boeuf haché du jour', 'type'=> 'viande'],
    ['ingredient'=> 'Double Steak', 'type'=> 'viande'],
    ['ingredient'=> 'Galette végétale BIO', 'type'=> 'viande'],
    ['ingredient'=> 'Filet de poulet', 'type'=> 'viande'],
    ['ingredient'=> 'Mayonnaise', 'type'=> 'sauce'],
    ['ingredient'=> 'Sauce Barbecue', 'type'=> 'sauce'],
    ['ingredient'=> 'Sauce Piquante', 'type'=> 'sauce'],
    ['ingredient'=> 'Huile d\'olive', 'type'=> 'sauce'],
    ['ingredient'=> 'Salade', 'type'=> 'garniture'],
    ['ingredient'=> 'Tomates', 'type'=> 'garniture'],
    ['ingredient'=> 'Champignon de Paris à la crème', 'type'=> 'garniture'],
    ['ingredient'=> 'Oignons', 'type'=> 'garniture'],
    ['ingredient'=> 'Oignons caramélisés', 'type'=> 'garniture'],
    ['ingredient'=> 'Poitrine de lard grillée', 'type'=> 'garniture'],
    ['ingredient'=> 'Ciboulette', 'type'=> 'garniture'],
    ['ingredient'=> 'Persil', 'type'=> 'garniture'],
    ['ingredient'=> 'Véritable Cheddar', 'type'=> 'fromage'],
    ['ingredient'=> 'Chèvre Soignon', 'type'=> 'fromage'],
    ['ingredient'=> 'Fourme d\'Ambert', 'type'=> 'fromage'],
    ['ingredient'=> 'Parmesan Reggiano', 'type'=> 'fromage'],
    ['ingredient'=> 'Maroilles', 'type'=> 'fromage'],
    ['ingredient'=> 'St Nectaire AOP', 'type'=> 'fromage'],
    ['ingredient'=> 'Reblochon AOP', 'type'=> 'fromage'],
    ['ingredient'=> 'Tomme de Brebis AOP', 'type'=> 'fromage'],
    ['ingredient'=> 'Tomme de Savoie', 'type'=> 'fromage'],
];






foreach($ingredients as $ingredient){
    $query = DB::postQuery('INSERT into ingredient (ingredient, type) VALUES (:ingredient, :type) ', $ingredient);
}

