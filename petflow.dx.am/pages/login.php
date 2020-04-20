<?php
    require_once '../vendor/autoload.php';

    if (session_status() != PHP_SESSION_ACTIVE) session_start();

    \app\date\Location::setTimeZone();
    \app\acoes\login\VerificaLoginEfetuado::sairLogin();
?>

<html lang="pt-br">

<head>
    <title>PetFlow - Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php \app\estruturas\ChamadaCss::chamadaCss("../") ?>
</head>

<body onselectStart="return false">

    <!-- Top content -->
    <div class="cima">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-8 col-sm-offset-2 text">

                <div class="columns">
                    <!-- Sobre nós -->
                    <div class="column is-one-third">
                        <div class="inner-bg">
                            <a class="uk-button uk-button-text" href="#sobre" uk-toggle>SOBRE NÓS</a> 
                        </div>
                    </div>

                    <!-- Logo -->
                    <div class="column"> 
                        <img src="../assets/img/logo1.svg" width="200px" alt="Logo" class="logo">
                    </div>

                    <!-- Fale conosco -->
                    <div class="column">
                        <div class="inner-bg">
                            <a class="uk-button uk-button-text" href="#faleconosco" uk-toggle>FALE CONOSCO</a>
                        </div>
                    </div>
                </div>

                <div class="description">
                    <p>PetFlow é uma rede social para aqueles que amam os seus animais de estimação. 
                        Poste fotos e vídeos do seu pet, siga outros pets ou páginas e adote algum pet 
                        que precisa de um lar!
                    </p>
                </div>

            </div>
        </div>
    </div>

    <!-- Login e cadastro -->
    <div class="baixo">
        <div class="container">
            <div class="inner-bg">
                <div class="row">

                    <!-- Login -->
                    <div class="col-md-5">
                        <div class="form-box">
                            <div class="form-top row align-items-center">
                                <div class="form-top-left col-6">
                                    <h3>Login</h3>
                                </div>
                                <div class="form-top-right col-6">
                                    <i class="fa fa-key"></i>
                                </div>
                            </div>

                            <div class="form-bottom">
                                <form role="form" method="post" id='formLogin' class="login-form needs-validation" novalidate>
                                    <div class="form-group">
                                        <input type="email" name="emailLog" placeholder="E-mail..." class="form-email form-control" id="emailLog" required>
                                        <div id="emailFeedback" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="senhaLog" placeholder="Senha..." class="form-password form-control" minlength="8" maxlength="32" id="senhaLog" required>
                                        <div id="senhaFeedback" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <a id='forget'>Esqueci minha senha</a>
                                    </div>
                                    <button type="submit" class="btn">Entrar</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-2"></div>

                    <!-- Cadastro -->
                    <div class="col-md-5">
                        <div class="form-box">
                            <div class="form-top row align-items-center">
                                <div class="form-top-left col-8 col-md-10">
                                    <h3>Registrar-se</h3>
                                </div>
                                <div class="form-top-right col-4 col-md-2">
                                    <i class="fa fa-pencil"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form id="cadastro" role="form" method="post" class="registration-form needs-validation" novalidate>
                                    <div class="form-group">
                                        <input type="text" name="nomeReg" placeholder="Nome..." class="form-first-name form-control" id="nomeReg" required>
                                        <div id="nomeFeedback" class="invalid-feedback">Preencha o campo</div>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="sobrenomeReg" placeholder="Sobrenome..." class="form-last-name form-control" id="sobrenomeReg">
                                    </div>

                                    <div class="form-group">
                                        <input type="email" name="emailReg" placeholder="E-mail..." class="form-email form-control" id="emailReg" required>
                                        <div id="emailRegFeedback" class="invalid-feedback"></div>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="dataNasc" placeholder="Data de nascimento..." class="form-control" id="dataNasc" required>
                                        <div id="dataFeedback" class="invalid-feedback">Preencha o campo</div>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" name="senhaReg" placeholder="Senha..." class="form-password form-control" id="senhaReg" minlength="8" maxlength="32" required>
                                        <div id="senhaRegFeedback" class="invalid-feedback"></div>
                                    </div>

                                    <button type="submit" class="btn">Registrar</button>
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
        <?php \app\estruturas\Rodape::rodape() ?>
    </footer>

    <!-- Modals -->
    <?php 
        \app\estruturas\modals\SobreNos::sobreNos("../");
        \app\estruturas\modals\FaleConosco::faleConosco();
        \app\estruturas\modals\Aviso::aviso();
        \app\estruturas\modals\Sucesso::sucesso();
    ?>

    <!-- Javascript -->
    <?php \app\estruturas\ChamadaJs::chamadaJs("../") ?>

    <script> /* Mascara data de nascimento */
        var d = new Date()
        var anoAtual = d.getFullYear()
        var dataNasc = IMask(document.getElementById('dataNasc'), {
            mask: Date,
            lazy: true,
            autofix: true,
            blocks: {
                d: {mask: IMask.MaskedRange, from: 1, to: 31, maxLength: 2},
                m: {mask: IMask.MaskedRange, from: 1, to: 12, maxLength: 2},
                Y: {mask: IMask.MaskedRange, from: 1945, to: anoAtual, maxLength: 4}
            }
        })
    </script>

    <script> /* Inserir mensagem */
        $('#mensagem').submit(function() {
            event.preventDefault();
            
            var email = $('#emailMsg').val();
            var nome = $('#nomeMsg').val();
            var msg = $('#txtMsg').val();
            var dados = {
                emailMsg: email,
                nomeMsg: nome,
                txtMsg: msg
            }

            $.ajax({
                url: "../app/acoes/rotinas/insereMensagem.php",
                type: "POST",
                dataType: "json",
                data: dados,
                success: function(data) {
                    if (data.sucesso == 'yes') {
                        UIkit.modal($('#faleconosco')).hide()

                        $('#tltAviso').html(data.title)
                        $('#txtAviso').html(data.text)
                        UIkit.modal($('#mdlAviso')).show()
                    }
                }
            })

        })
    </script>

    <script> /* Cadastro */
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var formulario = document.getElementsByClassName('registration-form needs-validation');

                var feedbackEmailReg = document.getElementById('emailRegFeedback');
                var feedbackSenhaReg = document.getElementById('senhaRegFeedback');
                var campoEmail = document.getElementById('emailReg');
                var campoSenha = document.getElementById('senhaReg');

                var validation = Array.prototype.filter.call(formulario, function(formulario) {
                    formulario.addEventListener('submit', function(event) {

                        if (formulario.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();

                            feedbackEmailReg.innerHTML = (campoEmail.value.length === 0)? "Preencha o campo" : "Preencha com um email válido"
                            feedbackSenhaReg.innerHTML = (campoSenha.value.length === 0)? "Preencha o campo" : "Preencha com no mínimo 8 caracteres"

                        } else {
                            event.preventDefault();
                            var nomeReg = $('#nomeReg').val();
                            var sobrenomeReg = $('#sobrenomeReg').val();
                            var emailReg = $('#emailReg').val();
                            var dataNasc = $('#dataNasc').val();
                            var senhaReg = $('#senhaReg').val();

                            var dados = {
                                nomeReg: nomeReg, 
                                sobrenomeReg: sobrenomeReg,
                                emailReg: emailReg,
                                dataNasc: dataNasc,
                                senhaReg: senhaReg
                            }

                            $.ajax({
                                url: "../app/acoes/rotinas/insertUsuario.php",
                                type: "POST",
                                dataType: "json",
                                data: dados,
                                success:function(data) {
                                    if (data.sucesso == 'yes') {
                                        $('#tltSucesso').html(data.title)
                                        $('#txtSucesso').html(data.text)
                                        $('#btnSucesso').html(data.txtBtn)
                                        UIkit.modal($('#mdlSucesso')).show()

                                        $('#btnSucesso').click(function() {
                                            window.location.href = data.link;
                                        })

                                        UIkit.util.on('#mdlSucesso', 'hide', function() {
                                            window.location.href = data.link;
                                        })

                                    } else {
                                        $('#tltAviso').html(data.title)
                                        $('#txtAviso').html(data.text)
                                        UIkit.modal($('#mdlAviso')).show()
                                    }
                                },
                                error:function(a, b, c) {
                                    console.log(a.responseText)
                                }
                            })
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

    <script> /* Login */
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var formulario = document.getElementsByClassName('login-form needs-validation');

                var feedbackEmailLog = document.getElementById('emailFeedback');
                var feedbackSenhaLog = document.getElementById('senhaFeedback');
                var campoEmail = document.getElementById('emailLog');
                var campoSenha = document.getElementById('senhaLog');

                /* Esqueci minha senha */
                $('#forget').click(function() {
                    if ($('#emailLog').val().length < 8) {
                        feedbackEmailLog.innerHTML = (campoEmail.value.length === 0)? "Preencha o campo" : "Preencha com um email válido"
                        campoEmail.classList.add('is-invalid')
                        setTimeout(function() { campoEmail.classList.remove('is-invalid') }, 2000)

                    } else {
                        $.ajax({
                            url: '../app/acoes/rotinas/recuperarSenha.php',
                            type: "POST",
                            dataType: "json",
                            data: {emailRecuperar: campoEmail.value},
                            success: function(data) {
                                console.log(data)
                                if (data.sucesso == 'yes') {
                                    $('#tltAviso').html(data.title)
                                    $('#txtAviso').html(data.text)
                                    
                                } else {
                                    $('#tltAviso').html(data.title)
                                    $('#txtAviso').html(data.text)
                                }
     
                                UIkit.modal($('#mdlAviso')).show()
                            }
                        })
                    }
                })

                var validation = Array.prototype.filter.call(formulario, function(formulario) {
                    formulario.addEventListener('submit', function(event) {

                        if (formulario.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();

                            feedbackEmailLog.innerHTML = (campoEmail.value.length === 0)? "Preencha o campo" : "Preencha com um email válido"
                            feedbackSenhaLog.innerHTML = (campoSenha.value.length === 0)? "Preencha o campo" : "Preencha com no mínimo 8 caracteres"

                        } else {
                            event.preventDefault();
                            var emailLog = $('#emailLog').val()
                            var senhaLog = $('#senhaLog').val()

                            var dados = {emailLog: emailLog, senhaLog: senhaLog}
                            $.ajax({
                                url: "../app/acoes/login/validaLogin.php",
                                type: "POST",
                                dataType: "json",
                                data: dados,
                                success:function(data) {
                                    if (data.sucesso == 'yes') {
                                        window.location.href = 'splash.php';
                                    } else {
                                        if (data.banido == 'yes') {
                                            var motivo = $("<div class='motivo' id='motivo'></div>").text(data.motivo)
                                            $('#tltAviso').html(data.title)
                                            $('#txtAviso').html(data.text)
                                            $('#txtAviso').append(motivo)
        
                                        } else {
                                            $('#tltAviso').html(data.title)
                                            $('#txtAviso').html(data.text)
                                            $('#motivo').remove()
                                        }

                                        UIkit.modal($('#mdlAviso')).show()
                                    }

                                },
                                error:function(a, b, c) {
                                    console.log(a.responseText)
                                }
                            })
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