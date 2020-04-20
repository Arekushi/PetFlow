<?php
    header("Location: ../../../pages/paginaAdministrador.php");
    require_once '../../../vendor/autoload.php';


    if (isset($_POST['idAnimal'])) {
        $idAnimal = $_POST['idAnimal'];
    } else {
        header("Location: ../../../index.php");
    }

    \app\crud\AnimalDao::setVibilidadeAnimal($idAnimal, 1);
