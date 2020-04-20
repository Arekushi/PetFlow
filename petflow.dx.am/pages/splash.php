<?php
    require_once '../vendor/autoload.php';

    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }

    \app\acoes\login\VerificaLoginEfetuado::voltarLogin("../");
?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Carregando...</title>
        <link rel="stylesheet" href="../assets/css/splash.css">
    </head>
    <body>
        <div id="logo-animation" class="active"></div>
    </body>

    <script src='https://runemadsen.github.io/rune.js/js/rune.min.js'></script>
    <script  src="../assets/js/splashScript.js"></script>

    <?php 
        echo"<script>";
            echo"setTimeout(function() {
                window.location.href = '{$_SESSION['link']}'
            }, 2700)";
        echo"</script>";
    ?>
</html>