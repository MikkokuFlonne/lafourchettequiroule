<?php

$style = './assets/ajout-item.css';
$title = 'Ajout Item';

require_once('./partials/header.php');



$error = [];

if (!empty($_POST)) {



    if (empty($error)) {

    }
}




?>


<section class="planning">
    <form action="" method="POST">




        <button type="submit">Ajouter un item dans le menu</button>
    </form>

</section>



<?php

require_once './partials/footer.php'
?>