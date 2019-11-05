<?php
require_once 'utils.php';
require_once 'bdd.php';

// logger($_POST);

if (isset($_POST['send'])) {
    if ($_POST['name'] != '' && $_POST['id'] != '') {
        $pdo = connect();
        // logger($datas);

        $datas['name'] = htmlspecialchars($_POST['name']);
        $datas['id'] = htmlspecialchars($_POST['id']);
        updateDataById($pdo, 'animal', $datas);
        header('Location: index.php?msg=Animal bien modifié.');
    } else {
        $msg = "Vous devez donner un nom à votre animal";
    }
}

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
        <h1>Modifier un animal</h1>

        <?php if (isset($msg)) { ?>
            <p><?php echo $msg; ?></p>
        <?php } ?>
        
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $animal->id ?>" />
            <input type="text" name="name" value="<?php echo $animal->name ?>" />
            <input type="submit" name="send" value"Ajouter" />
        </form>

        <p align="right">
            <a href="index.php">Retour à la liste</a>
        </p>
    </body>
</html>