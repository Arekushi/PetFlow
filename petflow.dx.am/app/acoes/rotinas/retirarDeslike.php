<?php
    require_once '../../../vendor/autoload.php';

    $deslike = new \app\model\Deslike();

    session_start();

    if(isset($_POST['idPost'])) {
        $deslike->setIdUsuario($_SESSION['cod']);
        $deslike->setIdPostagem($_POST['idPost']);

    } else {
        header("Location: ../../../index.php");
    }

    \app\crud\DeslikeDao::delete($deslike);
