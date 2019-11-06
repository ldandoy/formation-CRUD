<?php

require_once 'utils.php';
require_once 'bdd.php';

if ($_GET['id']) {
    $pdo = connect();
    $animal = getDataById($pdo, 'animal', $_GET['id']);

    if (empty($animal)) {
        header('Location: index.php?msg=Animal non trouvé.&msg_type=danger');
    } else {
        deleteDataById($pdo, 'animal', $_GET['id']);
        header('Location: index.php?msg=Animal bien supprimé.&msg_type=success');
    }

} else {
    header('Location: index.php?msg=Aucun ID donné.&msg_type=danger');
}