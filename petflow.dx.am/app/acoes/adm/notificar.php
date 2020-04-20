<?php
    header("Location: ../../../pages/paginaAdministrador.php");
    require_once '../../../vendor/autoload.php';
    \app\date\Location::setTimeZone();

    session_start();

    $news = new \app\model\NotificacaoAdm();

    $news->setMensagem($_POST['mensagem']);
    $news->setIdAdm($_SESSION['cod']);
    $news->setIdUsuario($_GET['idUsuario']);
    $data = new DateTime("now");
    $news->setDataEnvio($data->format('Y-m-d H:i:s'));
    $news->setVisualizado(0);
    
    \app\crud\NotificacaoAdmDao::insertNotification($news);
