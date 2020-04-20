<?php
    header("Location: ../../../pages/paginaAdministrador.php");
    require_once '../../../vendor/autoload.php';
    \app\date\Location::setTimeZone();
    
    $objBanimento = new \app\model\Banimento();

    session_start();

    $inicioBanimento = new DateTime("now");
    $fimBanimento = $_POST['fimBanimento'];

    $objBanimento->setIdBanidor($_SESSION['cod']);
    $objBanimento->setIdUsuario($_GET['idUsuario']);
    $objBanimento->setIdMotivo($_POST['motivo']);
    $objBanimento->setInicio_banimento($inicioBanimento->format("Y-m-d H:i:s"));
    $objBanimento->setFim_banimento($fimBanimento);
    $objBanimento->setStatus(1);

    \app\crud\BanimentoDao::insert($objBanimento);