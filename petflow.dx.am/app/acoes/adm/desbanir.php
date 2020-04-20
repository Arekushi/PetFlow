<?php
    header("Location: ../../../pages/paginaAdministrador.php");
    require_once '../../../vendor/autoload.php';
    \app\date\Location::setTimeZone();
    
    $cod = $_GET['idBanimento'];

    \app\crud\BanimentoDao::alterarStatus2($cod);
