    <div class="display-menu">
        <h1>Menu</h1>

        <fieldset class="burger">
            <legend>
                <h2>Nos Hamburgers</h2>
            </legend>
            <div>
                <?php $price = '';
                foreach ($burgers as $burger) {
                    $ingredients = DB::query('SELECT * from item_has_ingredient 
                                INNER JOIN ingredient ON item_has_ingredient.ingredient_id = ingredient.id
                                WHERE item_has_ingredient.item_id = :id', ['id' => $burger->id]);

                    $comp = [];
                    $liste = '';

                    foreach ($ingredients as $ingredient) {
                        $liste .= '<li>' . $ingredient->ingredient . '</li>';
                        $comp[$burger->name][] = $ingredient->ingredient;
                    }

                    if ($price != $burger->price) {
                        $view = '';

                        echo '<div class= "burger-' . $burger->price . '"><h3>Nos Hamburgers à ' . number_format(($burger->price / 100), 2)  . ' €</h3>';

                        $price = $burger->price;
                    }

                    if ($price == $burger->price) {
                        $view = $burger->name;
                        echo $view;
                    }
                } ?>
            </div>

        </fieldset>

        <fieldset class="missile">
            <legend>
                <h2>Nos Missiles</h2>
            </legend>
            <div>
                <?php $price = '';
                foreach ($missiles as $missile) {
                    $ingredients = DB::query('SELECT * from item_has_ingredient 
                                INNER JOIN ingredient ON item_has_ingredient.ingredient_id = ingredient.id
                                WHERE item_has_ingredient.item_id = :id', ['id' => $missile->id]);

                    $comp = [];
                    $liste = '';


                    foreach ($ingredients as $ingredient) {
                        $liste .= '<li>' . $ingredient->ingredient . '</li>';
                        $comp[$missile->name][] = $ingredient->ingredient;
                    }
                    if ($price != $missile->price) {

                        echo '<div class= "missile-' . $burger->price . '"><h3>Nos Missiles à ' . number_format(($missile->price / 100), 2)  . ' €</h3>';

                        $price = $missile->price;
                    }

                    if ($price == $missile->price) {

                        $view = '<figure>
                        <img src="" alt="No image for now">

                        <figcaption>
                            <h3>' . $missile->name . '</h3>
                            <ul>
                                ' . $liste . '
                            </ul>

                        </figcaption>
                        </figure>';
                        echo $view;
                    }
                } ?>
            </div>

        </fieldset>

        <fieldset class="extra">

        </fieldset>

        <fieldset class="accompagnement">

        </fieldset>

        <fieldset class="boisson">

        </fieldset>
    </div>