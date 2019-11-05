<?php

require_once 'utils.php';
require_once 'bdd.php';

if ($_GET['id']) {
    $pdo = connect();
    $animal = getDataById($pdo, 'animal', $_GET['id']);

    // logger($animal);

    if (empty($animal)) {
        header('Location: index.php?msg=Animal non trouvé.');    
    }
} else {
    header('Location: index.php?msg=Aucun ID donné.');
}
?>
<!doctype html>
<html>
    <head></head>
    <body>
        <h1><?php echo $animal->name; ?></h1>
        <p><b>ID</b> <?php echo $animal->id; ?></p>
        <p><b>Name</b> <?php echo $animal->name; ?></p>
        
        <p align="right">
            <a href="index.php">Retour à la liste</a>
        </p>
    </body>
</html>