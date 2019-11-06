<?php

require_once 'utils.php';
require_once 'bdd.php';
$pdo = connect();
$animaux = getAllData($pdo, 'animal');

// logger($datas);

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
                    <h1 class="float-left">Liste des animaux</h1>
                    <div class="float-right">
                        <a href="ajouter.php" class="btn btn-success"><i class="fas fa-plus"></i></a>
                    </div>
                </div>
            </div>

           <?php alert() ?>

            <div class="row">
                <div class="col-12">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
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
                                    <td><a href="voir.php?id=<?php echo $animal->id; ?>" class="btn btn-default"><?php echo $animal->name; ?></a></td>
                                    <td><a href="editer.php?id=<?php echo $animal->id; ?>" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a> 
                                    <a href="supprimer.php?id=<?php echo $animal->id; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php js(); ?>
    </body>
</html>