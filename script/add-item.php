<?php

require __DIR__ . '../../public/config/DB.php';


DB::postQuery('SET FOREIGN_KEY_CHECKS = 0');
DB::postQuery('TRUNCATE TABLE item');
DB::postQuery('TRUNCATE TABLE item_has_ingredient');
DB::postQuery('SET FOREIGN_KEY_CHECKS = 1');

$items = [
    ['produit' => ['name' => 'Le Classic', 'type' => 'burger', 'price' => 700], 'ingredients' => [1, 17, 13, 9, 10, 5]],
    ['produit' => ['name' => 'Le Chèvre', 'type' => 'burger', 'price' => 700], 'ingredients' => [1, 18, 9, 10]],
    ['produit' => ['name' => 'L\'Atomique', 'type' => 'burger', 'price' => 700], 'ingredients' => [1, 7, 17, 9, 10]],
    ['produit' => ['name' => 'Mr Bleu', 'type' => 'burger', 'price' => 800], 'ingredients' => [1, 19, 9, 10]],
    ['produit' => ['name' => 'Le Campagnard', 'type' => 'burger', 'price' => 800], 'ingredients' => [1, 11, 17, 9, 10]],
    ['produit' => ['name' => 'Le Chicken', 'type' => 'burger', 'price' => 800], 'ingredients' => [4, 20, 9, 10, 5, 8]],
    ['produit' => ['name' => 'Le Jenny\'s Végétarien', 'type' => 'burger', 'price' => 800], 'ingredients' => [3, 19, 17, 9, 10]],
    ['produit' => ['name' => 'Le Maroilles', 'type' => 'burger', 'price' => 900], 'ingredients' => [1, 21, 9, 10]],
    ['produit' => ['name' => 'Le Saint Nectaire', 'type' => 'burger', 'price' => 900], 'ingredients' => [1, 22, 9, 12, 15, 16]],
    ['produit' => ['name' => 'Le Reblochon', 'type' => 'burger', 'price' => 900], 'ingredients' => [1, 23, 9, 10]],
    ['produit' => ['name' => 'La Tomme de Brebis', 'type' => 'burger', 'price' => 900], 'ingredients' => [1, 24, 9, 10]],
    ['produit' => ['name' => 'Le BBQ', 'type' => 'burger', 'price' => 900], 'ingredients' => [1, 14, 17, 6, 9, 10]],
    ['produit' => ['name' => 'Le Classic', 'type' => 'missile', 'price' => 1000], 'ingredients' => [2, 17, 13, 9, 10, 5]],
    ['produit' => ['name' => 'Le Chèvre', 'type' => 'missile', 'price' => 1000], 'ingredients' => [2, 18, 9, 10]],
    ['produit' => ['name' => 'L\'Atomique', 'type' => 'missile', 'price' => 1000], 'ingredients' => [2, 7, 17, 9, 10]],
    ['produit' => ['name' => 'Mr Bleu', 'type' => 'missile', 'price' => 1100], 'ingredients' => [2, 19, 9, 10]],
    ['produit' => ['name' => 'Le Campagnard', 'type' => 'missile', 'price' => 1100], 'ingredients' => [2, 11, 17, 9, 10]],
    ['produit' => ['name' => 'Le Chicken', 'type' => 'missile', 'price' => 1100], 'ingredients' => [4, 20, 9, 10, 5, 8]],
    ['produit' => ['name' => 'Le Jenny\'s Végétarien', 'type' => 'missile', 'price' => 1100], 'ingredients' => [3, 19, 17, 9, 10]],
    ['produit' => ['name' => 'Le Maroilles', 'type' => 'missile', 'price' => 1200], 'ingredients' => [2, 21, 9, 10]],
    ['produit' => ['name' => 'Le Saint Nectaire', 'type' => 'missile', 'price' => 1200], 'ingredients' => [2, 22, 9, 12, 15, 16]],
    ['produit' => ['name' => 'Le Reblochon', 'type' => 'missile', 'price' => 1200], 'ingredients' => [2, 23, 9, 10]],
    ['produit' => ['name' => 'La Tomme de Brebis', 'type' => 'missile', 'price' => 1200], 'ingredients' => [2, 24, 9, 10]],
    ['produit' => ['name' => 'Le BBQ', 'type' => 'missile', 'price' => 1200], 'ingredients' => [2, 14, 17, 6, 9, 10]],
    ['produit' => ['name' => 'Double Steack + fromage', 'type' => 'extra', 'price' => 300]],
    ['produit' => ['name' => 'Oignons Caramélisés', 'type' => 'extra', 'price' => 100]],
    ['produit' => ['name' => 'Crème Champignon', 'type' => 'extra', 'price' => 100]],
    ['produit' => ['name' => 'Bacon Poitrine', 'type' => 'extra', 'price' => 200]],
    ['produit' => ['name' => 'Chèvre', 'type' => 'extra', 'price' => 150]],
    ['produit' => ['name' => 'Cheddar véritable', 'type' => 'extra', 'price' => 150]],
    ['produit' => ['name' => 'Fourme d\'Ambert AOC', 'type' => 'extra', 'price' => 150]],
    ['produit' => ['name' => 'Mozzarella Bio', 'type' => 'extra', 'price' => 150]],
    ['produit' => ['name' => 'Tomme de Savoie', 'type' => 'extra', 'price' => 150]],
    ['produit' => ['name' => 'Parmesan Reggiano', 'type' => 'extra', 'price' => 150]],
    ['produit' => ['name' => 'St Nectaire AOP', 'type' => 'extra', 'price' => 150]],
    ['produit' => ['name' => 'Reblochon', 'type' => 'extra', 'price' => 150]],
    ['produit' => ['name' => 'Maroilles', 'type' => 'extra', 'price' => 150]],
    ['produit' => ['name' => 'Frites', 'type' => 'accompagnement', 'price' => 250]],
    ['produit' => ['name' => 'Grande Frites', 'type' => 'accompagnement', 'price' => 350]],
    ['produit' => ['name' => 'Salade', 'type' => 'accompagnement', 'price' => 350]],
    ['produit' => ['name' => 'Dessert du jour', 'type' => 'accompagnement', 'price' => 350]],
    ['produit' => ['name' => 'Eau', 'type' => 'boisson', 'price' => 100]],
    ['produit' => ['name' => 'Soda', 'type' => 'boisson', 'price' => 200]],
    ['produit' => ['name' => 'Café Nespresso', 'type' => 'boisson', 'price' => 150]],
    ['produit' => ['name' => 'Bière H', 'type' => 'boisson', 'price' => 250]],
    ['produit' => ['name' => 'Bière Bud', 'type' => 'boisson', 'price' => 300]],
];




foreach ($items as $item) {

    var_dump($item['produit']);
    $query = DB::postQuery('INSERT into item (name, type, price) VALUES (:name, :type, :price) ', $item['produit']);

    $id = DB::lastInsertId();

    if (isset($item['ingredients'])) {

        foreach ($item['ingredients'] as $ingredient) {

                $query = DB::postQuery('INSERT into item_has_ingredient (ingredient_id, item_id) VALUES (:ingredient_id, :item_id) ', ['ingredient_id'=>$ingredient, 'item_id'=>$id]);
        }

    }
}

