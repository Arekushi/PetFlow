<?php
    require_once '../../../vendor/autoload.php';

    $like = new \app\model\Like();

    session_start();

    if(isset($_POST['idPost'])) {
        $like->setIdUsuario($_SESSION['cod']);
        $like->setIdPostagem($_POST['idPost']);

    } else {
        header("Location: ../../../index.php");
    }

    \app\crud\LikeDao::insert($like);
