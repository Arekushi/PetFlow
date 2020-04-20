<?php
    require_once '../vendor/autoload.php';

    if(!isset($_GET['idUsuario'])) {
        header("Location: paginaAdministrador.php");

    } else {
        $idUsuario = $_GET['idUsuario'];

    }

    if (session_status() != PHP_SESSION_ACTIVE) session_start();

    \app\acoes\login\VerificaLoginEfetuado::voltarLogin("../");
    \app\acoes\login\VerificaLoginEfetuado::verificaAdministrador();
    \app\date\Location::setTimeZone();
?>

<html lang="pt-br">
<head>
    <title>PetFlow - Página Administrador - Usuario</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Chamada CSS -->
    <?php \app\estruturas\ChamadaCss::chamadaCss("../"); ?>
    
</head>

<body onselectStart="return false">
    <header>
        <!-- Menu -->
        <nav class="navbar fixed-top" role="navigation" aria-label="main navigation" id="menu">
            <!-- Esquerda -->
            <div class="uk-navbar-left">
                <a class="navbar-item" id="menu-toggle" href="#myOffCanvas" uk-toggle>
                    <span class="bars menu-bars">
                        <i class='fa fa-bars'></i>
                    </span>
                </a>

                <!-- Imagem logo -->
                <a class="navbar-item d-none d-sm-block" id="logonav" href="../index.php">
                    <img src="../assets/img/petflow.svg">
                </a>
                
                <!-- Imagem logo -->
                <a class="navbar-item d-block d-sm-none" id="logonav" href="../index.php">
                    <img src="../assets/img/logo3.png">
                </a>   
            </div>

            <!-- Meio -->
            <div class="uk-navbar-center">   
            </div>

            <!-- Direita -->
            <div class="uk-navbar-right" id='opcoes-UsuarioAdm'>
                <a class="navbar-item" id="fotoUsuario" href="#NovaFotoUsuario" uk-toggle>
                    <?php 

                        $linha = app\crud\UsuarioDao::getUsuarioById($_SESSION['cod']);
                        $aryIdUsuario = $linha->getIdUsuario();
                        $aryNomeUsuario = $linha->getNomeUsuario();
                        $aryFotoUsuario = $linha->getFotoUsuario();

                        echo"<img src='../$aryFotoUsuario' title='$aryNomeUsuario' width='60'>";
                    ?>
               </a>

               <a class="navbar-item" id="fotoUsuario">
                    <i style='color: white' uk-icon='icon: sign-out; ratio: 2' onclick='sair()' title='Sair' alt='Sair'>
                    </i>  
                </a>
            </div>

            <div id='myOffCanvas' uk-offcanvas="overlay: true">
                <div class='uk-offcanvas-bar'>
                    <ul class='uk-nav uk-nav-default'>
                        <li><a href='paginaAdministrador.php' uk-icon='icon: home; ratio: 2' title='Página Inicial' alt='Página Inicial'></a></li>
                        <li><a target="_blank" style='font-size: 150%' href='../app/acoes/rotinas/PDF.php'>Gerar Relatório</a></li>
                        <li><button href='#' uk-icon='icon: sign-out;  ratio: 2' onclick='sair()' title='Sair' alt='Sair'></button></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Principal -->
    <section class="container">
        <!--Voltar para a Página Principal-->
        <section class='container' style='padding-top: 25px'>
            <div class='row justify-content-center'>
                <div class='col-10'>
                    <a href='paginaAdministrador.php'><button class='uk-button uk-button-secondary uk-width-1-1 uk-margin-small-bottom'>Voltar</button></a>
                </div>
            </div>
        </section>
        
        <?php
            $usuario = \app\crud\UsuarioDao::getUsuarioById($idUsuario);
            $valorTipo = $usuario->getTipoUsuario();
            $valorOnline = $usuario->getOnline();
            $tipo = \app\crud\TipoUsuarioDao::pegarTipoUsuario($valorTipo);

            echo "<div class='row justify-content-center align-items-center' id='FichaUser'>";
                echo "<div class='col-sm'>";
                echo "<img src='../{$usuario->getFotoUsuario()}'><br>";
                echo "{$usuario->getNomeUsuario()}<br>";

                if ($valorOnline == 1) {
                    echo"<div class='uk-card-badge uk-badge' style='background-color: 40a832'>&nbsp</div>";
                } else {
                    echo"<div class='uk-card-badge uk-badge' style='background-color: bf3232'>&nbsp</div>";
                }

                echo"<p class='uk-text-meta' style='margin-top: -5px'>{$tipo->tipoUsuario}</p>";
                echo "<i uk-icon='icon: mail'></i> {$usuario->getEmailUsuario()}<br><br>";

                // Tornar Moderador
                if($valorTipo == 1) {
                    echo "<a href='../app/acoes/adm/tornarModerador.php?idUsuario={$usuario->getIdUsuario()}'>
                        <button type='button' class='uk-button uk-button-primary uk-width-1-1'>Tornar Moderador</button>
                    </a>";

                // Remover Moderador
                } else if($valorTipo == 2) {
                    echo "<a href='../app/acoes/adm/removerModerador.php?idUsuario={$usuario->getIdUsuario()}'>
                        <button type='button' class='uk-button uk-button-danger uk-width-1-1'>Remover Moderador</button>
                    </a>";
                }
                echo"</div>";

                // Mandar Mensagem
                echo "<div class='col-auto col-md'>";
                echo "<h2>Mensagem</h2>";
                echo "<form name='formularioNotificacao' method='post' action='../app/acoes/adm/notificar.php?idUsuario={$usuario->getIdUsuario()}'>";
                    echo "<textarea class='uk-textarea' placeholder='Digite sua mensagem...'></textarea>";
                    echo "<button type='submit' class='uk-button uk-button-primary uk-width-1-1 uk-margin-top'>Enviar</button>";
                echo "</form>";
                echo"</div>";

                
                // Area de Banimento
                echo "<div class='col-auto col-md'>";
                echo "<h2>Banimento</h2>";
                echo "<form name='formularioBanimento' method='post' action='../app/acoes/adm/banir.php?idUsuario={$usuario->getIdUsuario()}'>";
                    echo "<select name='motivo'>";
                        foreach(\app\crud\MotivoBanimentoDao::getMotivos() as $motivo) {
                            echo "<option value='{$motivo->idMotivoBanimento}'>$motivo->motivo</option>";
                        }
                    echo "</select>";

                    echo "<input class='uk-margin-top' type='text' id='dataNasc' placeholder='Fim do banimento' name='fimBanimento'>";
                    echo "<button type='submit' class='uk-button uk-button-danger uk-width-1-1 uk-margin-top'>Confirmar Banimento</button>";
                    
                echo "</form>";
                echo"</div>";
            echo "</div>";
        ?>
    </section>

    <footer style='padding-top: 20px'> 
        <?php \app\estruturas\Rodape::rodape(); ?>
    </footer>

    <!-- Modals -->
    <div class='modal-sections' id='NovaFotoUsuario' uk-modal>
        <div class='uk-modal-dialog' role='document'>
        
            <form id='mudarFoto' role='form' method='post' class='registration-form' novalidate enctype='multipart/form-data'>
                <div class='modal-body'>
                    <div class='form-group'>
                        <div class='usuarioMudar'>
                            <img src='<?php echo"../{$_SESSION['foto']}" ?>' id='imgUser'>
                        </div><br>
                        <label class='d-flex justify-content-center'>
                        <input class='file-input' type='file' name='imgUsuario' id='imgUsuario' placeholder='Foto...' class='form-first-name form-control' required>
                            <span class='file-cta'>
                            <span class='file-icon'>
                                <i uk-icon='upload'></i>
                            </span>
                            <span class='file-label'>
                                Escolha uma foto...
                            </span>
                            </span>
                        </label>
                    </div>       
                </div>
                <div class='modal-footer'>
                    <button type='button' class='uk-button uk-button-default uk-modal-close'>Fechar</button>
                    <button type='submit' class='uk-button uk-button-default'>Salvar</button>
                </div>
            </form>
        </div>
    </div>

    <?php \app\estruturas\ChamadaJs::chamadaJs("../") ?>

    <script>
        function sair() { window.location.href = "../app/acoes/login/logout.php" }
    </script>
    
    <script>
        hoje = new Date()
        ano = hoje.getFullYear()
        mes = hoje.getMonth()
        dia = hoje.getDate()

        var dataNasc = IMask(document.getElementById('dataNasc'), {
            mask: Date,
            lazy: true,
            autofix: true,
            blocks: {
              d: {mask: IMask.MaskedRange, from: 1, to: 31, maxLength: 2},
              m: {mask: IMask.MaskedRange, from: 1, to: 12, maxLength: 2},
              Y: {mask: IMask.MaskedRange, from: 1945, to: 2036, maxLength: 4}
            }
        })
    </script>

    <script>
        $(function() {
            $('#imgUsuario').change(function() {
                const file = $(this)[0].files[0]
                const fileReader = new FileReader()

                fileReader.onloadend = function() {
                    $('#imgUser').attr('src', fileReader.result)
                }

                fileReader.readAsDataURL(file)
            })
        })

        $('#mudarFoto').submit(function() {
            event.preventDefault();

            var fda = $('#imgUsuario').prop('files')[0];
            var f = new FormData();                  
            f.append('file', fda);

            $.ajax({
                url: '../app/acoes/rotinas/insereFotoUsuario.php',
                type: "POST",
                contentType: false,
                processData: false,
                data: f,
                dataType: "json",
                success: function(data) {
                    console.log(data)
                    location.reload(true)
                },
                error: function(a, b, c) {
                    console.log(a.responseText)
                }

            })
        })
    </script>

    <!-- Formulário Ajax -->
    <script>

    </script>

</body>

</html>