<?php

use Src\Item;

$style = './assets/style/menu/menu.css';
$title = 'Menu';

require_once './partials/header.php';

$burgers = DB::query('SELECT *, item.id AS id_item from item
                    WHERE type = :type', ['type' => 'burger']);

$missiles = DB::query('SELECT *, item.id AS id_item from item
                    WHERE type = :type', ['type' => 'missile']);

$extras = DB::query('SELECT *, item.id AS id_item from item
                    WHERE type = :type', ['type' => 'extra']);

$accompagnements = DB::query('SELECT *, item.id AS id_item from item
                    WHERE type = :type', ['type' => 'accompagnement']);
$boissons = DB::query('SELECT *, item.id AS id_item from item
                    WHERE type = :type', ['type' => 'boisson']);


?>
<section class="menu">

    <div class="display-menu">
        <h1>Menu</h1>

        <fieldset class="burger">
            <legend>
                <h2>Nos Hamburgers</h2>
            </legend>

            <?php


            $price = -1;
            $i = 1;
            foreach ($burgers as $index => $burger) {

                if ($price == -1) {

                    echo '<div class= "burger p-' . $burger->price . '"><h3>Nos Hamburgers à ' . number_format(($burger->price / 100), 2)  . ' €</h3>';

                    $price = $burger->price;
                } else if ($price != $burger->price) {

                    echo '</div>';
                    echo '<div class= "burger p-' . $burger->price . '"><h3>Nos Hamburgers à ' . number_format(($burger->price / 100), 2)  . ' €</h3>';

                    $price = $burger->price;
                } else if ($i == $index) {
                    echo '</div>';
                }

                if ($price == $burger->price) {

                    $item = new Item($burger);
                    $item->getIngredients();
                    echo $item->view();
                }

                $i++;
            }
            ?>





        </fieldset>

        <fieldset class="missile">
            <legend>
                <h2>Nos Missiles</h2>
            </legend>
            <div>
                <?php


                $price = -1;
                $i = 1;
                foreach ($missiles as $index => $missile) {

                    if ($price == -1) {

                        echo '<div class= "missile p-' . $missile->price . '"><h3>Nos Missiles à ' . number_format(($missile->price / 100), 2)  . ' €</h3>';

                        $price = $missile->price;
                    } else if ($price != $missile->price) {

                        echo '</div>';
                        echo '<div class= "missile p-' . $missile->price . '"><h3>Nos Missiles à ' . number_format(($missile->price / 100), 2)  . ' €</h3>';

                        $price = $missile->price;
                    } else if ($i == $index) {
                        echo '</div>';
                    }

                    if ($price == $missile->price) {

                        $item = new Item($missile);
                        $item->getIngredients();
                        echo $item->view();
                    }

                    $i++;
                }
                ?>
            </div>

        </fieldset>
        <div>

            <fieldset class="extra">
                <legend>
                    <h2>Nos Extras</h2>
                </legend>
                <ul>
                    <?php

                    foreach ($extras as $index => $extra) {


                        echo '<li>'
                            . $extra->name . ' ' . number_format(($extra->price / 100), 2) . '€
                </li>';
                    }
                    ?>
                </ul>

            </fieldset>
            <div>

                <fieldset class="accompagnement">
                    <legend>
                        <h2>Nos Accompagnements</h2>
                    </legend>
                    <ul>
                        <?php

                        foreach ($accompagnements as $index => $accompagnement) {


                            echo '<li>'
                                . $accompagnement->name . ' ' . number_format(($accompagnement->price / 100), 2) . '€
                </li>';
                        }
                        ?>
                    </ul>
                </fieldset>

                <fieldset class="boisson">
                    <legend>
                        <h2>Nos Boissons</h2>
                    </legend>
                    <ul>
                        <?php

                        foreach ($boissons as $index => $boisson) {


                            echo '<li>'
                                . $boisson->name . ' ' . number_format(($boisson->price / 100), 2) . '€
                </li>';
                        }
                        ?>
                    </ul>

                </fieldset>
            </div>

        </div>

    </div>



</section>

<?php
require_once './partials/footer.php';


?>