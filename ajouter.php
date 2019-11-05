<?php
require_once 'utils.php';
require_once 'bdd.php';

// logger($_POST);

if (isset($_POST['send'])) {
    if ($_POST['name'] != '') {
        $pdo = connect();
        // logger($datas);

        $datas['name'] = htmlspecialchars($_POST['name']);
        insertDataById($pdo, 'animal', $datas);
        header('Location: index.php?msg=Animal bien ajouté.');
    } else {
        $msg = "Vous devez donner un nom à votre animal";
    }
}
?>
<!doctype html>
<html>
    <head></head>
    <body>
        <h1>Ajouter un animal</h1>

        <?php if (isset($msg)) { ?>
            <p><?php echo $msg; ?></p>
        <?php } ?>
        
        <form action="" method="post">
            <input type="text" name="name" />
            <input type="submit" name="send" value"Ajouter" />
        </form>

        <p align="right">
            <a href="index.php">Retour à la liste</a>
        </p>
    </body>
</html>