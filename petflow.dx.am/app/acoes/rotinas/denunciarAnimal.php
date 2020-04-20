<?php
    require_once '../../../vendor/autoload.php';

    $denuncia = new \app\model\DenunciaAnimal();
    $dados = new \app\model\Dados();

    if (session_status() != PHP_SESSION_ACTIVE) session_start();

    if(isset($_POST['idAnimal'])) {
        $denuncia->setIdUsuario($_SESSION['cod']);
        $denuncia->setIdAnimal($_POST['idAnimal']);
        $denuncia->setStatusDenuncia(1);

    } else {
        header("Location: ../../../index.php");
    }

    \app\crud\DenunciaAnimalDao::insertDenuncia($denuncia);

    $dados->title = "ANIMAL DENUNCIADO";
    $dados->text = "Este animal foi denunciado com sucesso, aguarde a equipe moderadora
    para verificar o animal listado...";

    echo json_encode($dados);
