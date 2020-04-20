<?php
    require_once '../../../vendor/autoload.php';

    if (isset($_POST['idAnimal'])) {
        $idAnimal = $_POST['idAnimal'];
    }

    \app\crud\DenunciaAnimalDao::retiraDenuncia($idAnimal);
