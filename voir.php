<?php

require_once 'utils.php';
require_once 'bdd.php';

if ($_GET['id']) {
    $pdo = connect();
    $animal = getDataById($pdo, 'animal', $_GET['id']);

    // logger($animal);

    if (empty($animal)) {
        header('Location: index.php?msg=Animal non trouvé.&msg_type=danger');    
    }
} else {
    header('Location: index.php?msg=Aucun ID donné.&msg_type=danger');
}
?>
<!doctype html>
<html>
    <head>
        <?php css(); ?>
    </head>
    <body>
        <div class="container p-3">
            <div class="row">
                <div class="col-12">
                    <h1><h1><?php echo $animal->name; ?></h1></h1>
                </div>
            </div>

            <?php alert() ?>

            <div class="row">
                <div class="col-12">
                    <p><b>ID</b> <?php echo $animal->id; ?></p>
                    <p><b>Name</b> <?php echo $animal->name; ?></p>
                    
                    <p align="right">
                        <a href="index.php" class="btn btn-default">Retour à la liste</a>
                    </p>
                </div>
            </div>
        </div>
        <?php js(); ?>
    </body>
</html>