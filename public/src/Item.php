<?php

namespace Src;

use DB;

class Item
{

    public $id;
    public $name;
    public $price;
    public $devise;
    public $composition = [];

    public function __construct($item)
    {

        $this->id = $item->id;
        $this->name = $item->name;
        $this->price = number_format(($item->price / 100), 2);
        $this->devise = '€';
    }

    public function addIngredient($ingredient)
    {
        $this->composition[] = $ingredient;
    }
    public function ingredientList()
    {
        $liste = '';
        foreach ($this->composition as $ingredient) {
            $liste .= '<li>' . $ingredient->ingredient . '</li>';
        }

        return $liste;
    }

    public function getIngredients()
    {
        $ingredients = DB::query('SELECT * from item_has_ingredient 
        INNER JOIN ingredient ON item_has_ingredient.ingredient_id = ingredient.id
        WHERE item_has_ingredient.item_id = :id', ['id' => $this->id]);

        foreach ($ingredients as $ingredient) {
            $this->addIngredient($ingredient);
        }
    }

    public function view()
    {
        $view = '<figure>
                    <div>
                    <h3>' . $this->name . '</h3>
                    <img src="" alt="No image for now">
                    </div>

                    <figcaption>
                        <ul>
                        ' . $this->ingredientList() . '
                        </ul>

                    </figcaption>
                </figure>';

        return $view;
    }
}
