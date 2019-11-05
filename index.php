<?php

require_once 'utils.php';
require_once 'bdd.php';
$pdo = connect();
$animaux = getAllData($pdo, 'animal');

// logger($datas);

?>
<!doctype html>
<html>
    <head></head>
    <body>
        <h1>Liste des animaux</h1>
        <?php if (isset($_GET['msg'])) { ?>
            <p><?php echo $_GET['msg']; ?></p>
        <?php } ?>
        <table>
            <thead>
                <tr>
                    <th width="1%">#</th>
                    <th>Nom</th>
                    <th width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($animaux as $animal) { ?>
                    <tr>
                        <td><?php echo $animal->id; ?></td>
                        <td><a href="voir.php?id=<?php echo $animal->id; ?>"><?php echo $animal->name; ?></a></td>
                        <td><a href="editer.php?id=<?php echo $animal->id; ?>">Editer</a> - <a href="supprimer.php?id=<?php echo $animal->id; ?>">Supprimer</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <p align="right">
            <a href="ajouter.php">Ajouter un animal</a>
        </p>
    </body>
</html>