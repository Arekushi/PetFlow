<?php
    require_once '../vendor/autoload.php';
    \app\date\Location::setTimeZone();

    if (session_status() != PHP_SESSION_ACTIVE) session_start();

    if (isset($_GET['e']) && isset($_GET['h']) && isset($_SESSION['recuperar'])) {
        $email = $_GET['e'];
        $senha = $_GET['h'];

    } else { header('Location: login.php'); }

    $linha = \app\crud\UsuarioDao::getUsuarioByEmailMD5($email);
    $i = md5($linha->idUsuario);
?>

<html lang="pt-br">

<head>
    <title>PetFlow - Nova Senha</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Chamada CSS -->
    <?php \app\estruturas\ChamadaCss::chamadaCss("../"); ?>
</head>

<body onselectStart="return false">
    <div class="baixo">
        <div class="container">
            <div class="inner-bg">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-5">
                        <div class="form-box">
                            <div class="form-top row align-items-center">
                                <div class="form-top-left col-6">
                                    <h3>Senha</h3>
                                </div>
                                <div class="form-top-right col-6">
                                    <i class="fa fa-unlock" aria-hidden="true"></i>
                                </div>
                            </div>

                            <div class="form-bottom">
                                <form role="form" method="post" id='newSenha' class="login-form needs-validation" novalidate>
                                    <div class="form-group">
                                        <input type="text" name="email" placeholder="<?php echo$linha->emailUsuario ?>" class="form-email form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="senha" placeholder="Senha..." class="form-password form-control" minlength="8" maxlength="32" id="senha" required>
                                        <div id="senhaFeedback" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="cSenha" placeholder="Confirmar senha..." class="form-password form-control" minlength="8" maxlength="32" id="cSenha" required>
                                        <div id="cSenhaFeedback" class="invalid-feedback"></div>
                                    </div>
                                    <button type="submit" class="btn">Finalizar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="container"> 
        <hr class="featurette-divider">
        <?php \app\estruturas\Rodape::rodape(); ?>
    </footer>

    <!-- Modal -->
    <?php \app\estruturas\modals\Sucesso::sucesso() ?>

    <!-- JavaScript -->
    <?php \app\estruturas\ChamadaJs::chamadaJs("../"); ?>

    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var formulario = document.getElementsByClassName('login-form needs-validation');

                var fcs = document.getElementById('senhaFeedback');
                var fs = document.getElementById('cSenhaFeedback');
                var senha = document.getElementById('senha');
                var cSenha = document.getElementById('cSenha');

                var validation = Array.prototype.filter.call(formulario, function(formulario) {
                    formulario.addEventListener('submit', function(event) {

                        if (formulario.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();

                            fcs.innerHTML = (senha.value.length === 0)? "Preencha o campo" : "Preencha com no mínimo 8 caracteres"
                            fs.innerHTML = (cSenha.value.length === 0)? "Preencha o campo" : "Preencha com no mínimo 8 caracteres"

                        } else {
                            event.preventDefault();
                            senha = $('#senha').val()
                            cSenha = $('#cSenha').val()
                            var i = <?php echo("'".$i."'") ?>

                            if (senha != cSenha) {
                                document.getElementById('senha').value = null
                                document.getElementById('cSenha').value = null

                                setTimeout(function() {}, 2000)

                            } else {
                                var dados = {i: i, s: senha}

                                $.ajax({
                                    url: "../app/acoes/rotinas/trocarSenha.php",
                                    type: "POST",
                                    dataType: "json",
                                    data: dados,
                                    success: function(data) {
                                        $('#tltSucesso').html(data.title)
                                        $('#txtSucesso').html(data.text)
                                        $('#btnSucesso').html(data.btnText)

                                        $('#btnSucesso').click(function() {
                                            window.location.href = 'login.php';

                                            <?php
                                                unset($_SESSION['recuperar'])
                                            ?>
                                        })

                                        UIkit.util.on('#mdlSucesso', 'hide', function() {
                                            window.location.href = 'login.php';

                                            <?php
                                                unset($_SESSION['recuperar'])
                                            ?>
                                        })

                                        UIkit.modal($('#mdlSucesso')).show()
                                    }
                                })
                            }
                        }

                        formulario.classList.add('was-validated');

                        setTimeout(function() {
                            formulario.classList.remove('was-validated');
                        }, 2000)

                    }, false);
                });
            }, false);
        })();
    </script>
</body>

</html>