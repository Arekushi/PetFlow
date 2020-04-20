<?php
    require_once '../../../vendor/autoload.php';

    $denuncia = new \app\model\DenunciaPost();
    $dados = new \app\model\Dados();

    if (session_status() != PHP_SESSION_ACTIVE) session_start();

    if(isset($_POST['idPost'])) {
        $denuncia->setIdUsuario($_SESSION['cod']);
        $denuncia->setIdPost($_POST['idPost']);
        $denuncia->setStatusDenuncia(1);

    } else {
        header("Location: ../../../index.php");
    }

    \app\crud\DenunciaPostDao::insertDenuncia($denuncia);

    $dados->title = "POST DENUNCIADO";
    $dados->text = "Este post foi denunciado com sucesso, aguarde a equipe moderadora
    para verificar o conteúdo listado...";

    echo json_encode($dados);
