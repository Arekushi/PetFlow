<?php
    require_once '../../../vendor/autoload.php';

    $seguir = new \app\model\SeguirAnimal();

    session_start();
    $seguir->setIdAnimal($_POST['idAnimal']);
    $seguir->setIdUsuario($_SESSION['cod']);

    \app\crud\SeguirDao::delete($seguir);
