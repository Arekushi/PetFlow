<?php
    header("Location: ../../../pages/paginaAdministrador.php");

    require_once '../../../vendor/autoload.php';
    $cod = $_GET['idUsuario'];

    \app\crud\UsuarioDao::tornarModerador($cod);
