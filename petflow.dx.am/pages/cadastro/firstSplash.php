<?php
    require_once '../../vendor/autoload.php';

    if (session_status() != PHP_SESSION_ACTIVE) session_start();

    \app\acoes\login\VerificaCadastro::verificaCadastro();
?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bem vindo(a)...</title>

        <!-- Chamada CSS -->
        <link rel="stylesheet" href="../../assets/package/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../assets/css/style.css">
        <link rel="stylesheet" href="../../assets/css/firstSplash.css">
        <link rel="shortcut icon" href="../../assets/ico/favicon.png" type="image/x-png">
    </head>

    <body class='container'>
        <section class='row' style="height: 100%;">
            <div class="scroller col-sm align-self-center">
                <div class="inner">
                    <span>Bem vindo(a) a Pet Flow...</span>
                    <span>Construa amizades.</span>
                    <span>Conecte-se ao mundo.</span>
                    <span>Crie o seu <a class="blue">próprio</a> <a class="blueb">universo</a>.</span>
                </div>
            </div>
        </section>
    </body>

    <script>
        setTimeout(function() {
            window.location.href = 'cadastro.php';
        }, 9000)
    </script>
</html>