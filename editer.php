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
        header('Location: index.php?msg=Animal bien modifié.&msg_type=success');
    } else {
        $msg = "Vous devez donner un nom à votre animal.&msg_type=danger";
    }
}

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
                    <h1>Modifier un animal</h1>
                </div>
            </div>

            <?php alert() ?>

            <div class="row">
                <div class="col-12">
        
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $animal->id ?>" />
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" value="<?php echo $animal->name ?>" />
                        </div>
                        <input type="submit" class="btn btn-primary" name="send" value"Ajouter" />
                    </form>

                    <p align="right">
                        <a href="index.php" class="btn btn-default">Retour à la liste</a>
                    </p>
                </div>
            </div>
        </div>
        <?php js(); ?>
    </body>
</html>