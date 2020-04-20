<?php
    require_once '../../../vendor/autoload.php';

    $seguir = new \app\model\SeguirAnimal();

    session_start();

    if (isset($_POST['idAnimal']) && isset($_SESSION['cod'])) {
        $seguir->setIdAnimal($_POST['idAnimal']);
        $seguir->setIdUsuario($_SESSION['cod']);

    } else {
        header("Location: ../../../pages/login.php");

    }

    \app\crud\SeguirDao::create($seguir);
