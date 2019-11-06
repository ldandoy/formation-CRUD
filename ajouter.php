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
        header('Location: index.php?msg=Animal bien ajouté.&msg_type=success');
    } else {
        $msg = "Vous devez donner un nom à votre animal";
    }
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
                    <h1>Ajouter un animal</h1>
                </div>
            </div>

           <?php alert() ?>

            <div class="row">
                <div class="col-12">
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" />
                        </div>
                        <input type="submit" name="send" value"Ajouter" class="btn btn-primary" />
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