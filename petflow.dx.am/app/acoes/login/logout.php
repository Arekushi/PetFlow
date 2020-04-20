<?php
    header("Location: ../../../pages/login.php");
    require_once "../../../vendor/autoload.php";

    session_start();
        \app\crud\UsuarioDao::setOnline($_SESSION['cod'], 0);
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
    session_destroy();
