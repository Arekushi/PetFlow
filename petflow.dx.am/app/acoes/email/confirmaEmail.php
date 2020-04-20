<?php

    /* Função para verificar email do usuário */
    require_once '../../../vendor/autoload.php';

    if (isset($_GET['h']) & isset($_GET['p'])) {
        $id = $_GET['h'];
        $p = $_GET['p'];

    } else {  header("Location: ../../../login.php"); }


    if (!empty($id) & !empty($p)) {
        $linha = \app\crud\UsuarioDao::getConfirmaEmail($id, $p);

        if (!empty($linha)) {
            header("Location: ../../../login.php");
            \app\crud\UsuarioDao::setConfirmaEmail($id);

        } else {
            header("Location: ../../../login.php");

        }

    } else {
        header("Location: ../../../login.php");
    }