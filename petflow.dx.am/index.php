<?php
    require_once 'vendor/autoload.php';

    if (session_status() != PHP_SESSION_ACTIVE) session_start();
    
    \app\date\Location::setTimeZone();
    \app\acoes\login\VerificaLoginEfetuado::voltarLogin(null);
    \app\acoes\login\VerificaLoginEfetuado::verificaUsuario();

    $linha = app\crud\UsuarioDao::getUsuarioById($_SESSION['cod']);
?>

<html lang="pt-br">
<head>
    <title>PetFlow - Página Inicial</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php \app\estruturas\ChamadaCss::chamadaCss2(null) ?>
</head>

<body onselectStart="return false">
    <?php \app\estruturas\Menu::menu(null, $linha) ?>

    <div id='principal'>
        <div class="row d-flex justify-content-center">
            <div class="col-8" id='postagens'>
                <div class="publicacoesPerfil">
                    <div class="rows">

                        <fieldset class="uk-fieldset">
                            <div class="box container">
                                <form id='postar' role='form' method='post' class='registration-form' enctype='multipart/form-data'>
                                    <div class="row d-flex justify-content-center" id='linhaPost'>
                                        <div id='fotenhas' class="col-auto uk-margin-bottom usuario d-flex justify-content-center align-self-center">
                                            <img src="<?php echo$linha->getFotoUsuario() ?>">
                                        </div>

                                        <div id='divTextArea' class='col-md'>
                                            <textarea class="textarea" rows='3' maxlength="150" 
                                            name="txtDescricao" id="txtDescricao" 
                                            placeholder="O que você fez hoje?" required></textarea>
                                        </div>
                                    </div>

                                    <div class="row uk-margin-top">
                                        <div class="col-sm-6">
                                            <button type="submit" class="button is-primary is-outlined is-rounded uk-margin-small">Postar</button>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <a href="#EscolherAnimal" uk-toggle><button class="button is-primary is-outlined is-rounded uk-margin-small">Escolher Pet</button></a>
                                            <a href="#EscolherFotoPost" uk-toggle><button class="button is-primary is-inverted is-rounded" uk-icon="icon: camera; ratio: 1.5"></button></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </fieldset>

                        <!-- Gerar posts -->
                        <?php
                            $existe = false;
                            foreach(\app\crud\PostDao::selectPostsIndex() as $posts) {
                                $existe = true;
                                echo"<div class='container uk-margin-top' id='idpost{$posts->idPostagem}'>";
                                echo"<div class='row uk-margin-medium-top d-flex justify-content-around box'>";
                                
                                echo"<div class='col-auto'>";
                                    echo"<div class='usuario'>";
                                        echo"<img - src='{$posts->fotoUsuario}' title='{$posts->nomeUsuario}'>";
                                        
                                            echo"<p class='txtNameUsuario' title='{$posts->nomeUsuario}'>";
                                                $nome = explode(" ", $posts->nomeUsuario);
                                                echo($nome[0]);
                                            echo"</p>";
                                        
                                            echo"<p class='txtData' title=''>";
                                                $data = $posts->dataPostagem;

                                                $dataPost = DateTime::createFromFormat("Y-m-d H:i:s", $data);
                                                $dataAtual = new DateTime('now');
                                                $intervalo = $dataPost->diff($dataAtual);

                                                $dia = (int) $intervalo->format("%D");
                                                $hora = (int) $intervalo->format("%H");
                                                $minuto = (int) $intervalo->format("%I");
                                                $segundo = (int) $intervalo->format("%S");
                                                $soma = $hora + $minuto + $segundo;

                                                if ($dia == 0) {
                                                    if ($hora == 0) {
                                                        if ($minuto == 0) {
                                                            $str = ($segundo > 1)? "segundos atrás" : "segundo atrás";
                                                            $retorno = $segundo." ".$str;
                                                        } else {
                                                            $str = ($minuto > 1)? "minutos atrás" : "minuto atrás";
                                                            $retorno = $minuto." ".$str;
                                                        }
                                                    } else {
                                                        $str = ($hora > 1)? "horas atrás" : "hora atrás";
                                                        $retorno = $hora." ".$str;
                                                    }
                                                } else {
                                                    $str = ($dia > 1)? "dias atrás" : "dia atrás";
                                                    $strHora = ($hora > 1)? "horas atrás" : "hora atrás";
                                                    $retorno = $dia." ".$str." e <br>".$hora." ".$strHora;
                                                }

                                                echo"{$retorno}";
                                            echo"</p>";
                                        
                                    echo"</div>";
                                echo"</div>";

                                echo"<div class='col-sm'>";
                                    echo"<div class='row'>";
                                        echo"<div class='col' style='word-wrap: break-word;'>";
                                            echo"<p>{$posts->descricaoPostagem}</p>";
                                        echo"</div>";
                                    echo"</div>";

                                    if ($posts->imagemPostagem != null) {
                                        echo"<div class='col uk-margin-bottom'>";
                                            echo"<img - src='$posts->imagemPostagem' width='300px' height='300px'>";
                                        echo"</div>";
                                    }
                                echo"</div>";

                                echo"<div class='col-auto'>";
                                    echo"<p class='txtData usuario' title=''>";
                                        echo"<a href='pages/paginaAnimal.php?idAnimal={$posts->idAnimal}'>
                                            <img - src='{$posts->fotoAnimal}' title='{$posts->nomeAnimal}'>
                                        </a>";
                                    echo"</p>";
                                
                                    echo"<p class='txtData' title=''>";
                                        echo"{$posts->nomeAnimal}";
                                    echo"</p>";
                                echo"</div>";

                                echo"<div class='postPerfil uk-margin-small-top'>
                                <div class='col-lg-12'>
                                    <form name='formularioPost' method='post' action=''>
                                        <div class='row'>
                                            <div class='col-sm-6' style='margin-block: 10px'>
                                                <button type='submit' class='button is-primary is-outlined is-rounded'>Comentar</button>
                                            </div>
                                            <div class='col-sm-6' style='margin-block: 10px'>";
                                                
                                                if(\app\crud\LikeDao::verificarLike($posts->idPostagem, $_SESSION['cod']) == true) {
                                                    echo"<a onclick='tirarLike({$posts->idPostagem})'class='button is-secundary is-inverted is-rounded' uk-icon='icon: heart; ratio: 1.5;'>";
                                                    echo"<span class='badge badge-dark uk-margin-small-right' style='background: #FAAA39'>";
                                                        echo(\app\crud\LikeDao::contagem($posts->idPostagem));
                                                    echo"</span>";
                                                    echo"</a>";

                                                } else {
                                                    echo"<a onclick='darLike({$posts->idPostagem})' class='button is-primary is-inverted is-rounded' uk-icon='icon: heart; ratio: 1.5;'>";
                                                    echo"<span class='badge badge-dark uk-margin-small-right' style='background: #FAAA39'>";
                                                        echo(\app\crud\LikeDao::contagem($posts->idPostagem));
                                                    echo"</span>";
                                                    echo"</a>";
                                                }

                                                if(\app\crud\DeslikeDao::verificarDeslike($posts->idPostagem, $_SESSION['cod']) == true) {
                                                    echo"<a onclick='tirarDeslike({$posts->idPostagem})' class='button is-secundary is-inverted is-rounded' uk-icon='icon: bolt; ratio: 1.5'>";
                                                    echo"<span class='badge badge-dark uk-margin-small-right' style='background: #FAAA39'>";
                                                        echo(\app\crud\DeslikeDao::contagem($posts->idPostagem));
                                                    echo"</span>";
                                                    echo"</a>";
                                                } else {
                                                    echo"<a onclick='darDeslike({$posts->idPostagem})' class='button is-primary is-inverted is-rounded' uk-icon='icon: bolt; ratio: 1.5'>";
                                                    echo"<span class='badge badge-dark uk-margin-small-right' style='background: #FAAA39'>";
                                                        echo(\app\crud\DeslikeDao::contagem($posts->idPostagem));
                                                    echo"</span>";
                                                    echo"</a>";
                                                }
                                                
                                                
                                                if (\app\crud\PostDao::getDono($_SESSION['cod'], $posts->idPostagem) == true) {
                                                    echo"<a onclick='confirmarApagar({$posts->idPostagem})' class='button is-primary is-inverted is-rounded' uk-icon='icon: trash; ratio: 1.5'></a>";
                                                } else {
                                                    if (\app\crud\DenunciaPostDao::verificaDenunciaPost($posts->idPostagem, $_SESSION['cod']) == false) {
                                                        echo"<button onclick='confirmarDenunciarPost({$posts->idPostagem})' id='btnDenuncia{$posts->idPostagem}' class='button is-primary is-outlined is-rounded'>Denunciar</button>";
                                                    }    
                                                }

                                            echo"</div>
                                        </div>
                                    </form>
                                </div>
                                </div>";
                                echo"</div>";
                                echo"</div>";
                            }

                            if ($existe == false) {
                                echo"<div class='row uk-margin-medium-top d-flex justify-content-center'>";
                                echo"<div class='col'>";
                                    echo"<fieldset class='uk-fieldset'>";
                                        echo"<div class='box'>";
                                            echo"<h4>Ah, parece que você não tem nenhuma postagem.
                                                Tente seguir algum pet para saber das novidades. ⊂(･ω･*⊂)
                                            </h4>";
                                        echo"</div>";
                                    echo"</fieldset>";
                                echo"</div>";
                                echo"</div>";
                            }
                        ?>

                    </div>
                </div>
            </div>

            <div class="col-auto" style='margin-right: 30px'>
                <div class="row">
                    <div class='col'>
                        <h4>Conheça outros Pets</h4>

                        <?php
                            $indice = 0;
                            foreach(\app\crud\AnimalDao::selectAnimaisNot($_SESSION['cod']) as $animais) {
                                if ($indice % 2 == 0) {
                                    echo"<div class='form-row'>";
                                    echo"<div class='form-group col-sm'>";
                                        echo"<div class='usuario'>";
                                            echo"<a href='pages/paginaAnimal.php?idAnimal={$animais->idAnimal}' uk-toggle>
                                                <img src='{$animais->fotoAnimal}'>
                                            </a>";
                                        echo"</div>";  

                                        if (\app\crud\SeguirDao::verificaSeguir($_SESSION['cod'], $animais->idAnimal) == false) {
                                            echo"<button type='button' id='seguir' onclick='seguir({$animais->idAnimal})' class='uk-margin button is-primary is-outlined is-rounded'>Follow</button>";
                                        }  else {
                                            echo"<button type='button' id='seguir' onclick='desseguir({$animais->idAnimal})' class='uk-margin button is-primary is-outlined is-rounded'>Unfollow</button>";
                                        }
                                            
                                    echo"</div>";
                                } else {
                                    echo"<div class='form-group col-sm'>";
                                        echo"<div class='usuario'>";
                                            echo"<a href='pages/paginaAnimal.php?idAnimal={$animais->idAnimal}' uk-toggle>
                                                <img src='{$animais->fotoAnimal}'>
                                            </a>";
                                        echo"</div>";    

                                        if (\app\crud\SeguirDao::verificaSeguir($_SESSION['cod'], $animais->idAnimal) == false) {
                                            echo"<button type='button' id='seguir' onclick='seguir({$animais->idAnimal})' class='uk-margin button is-primary is-outlined is-rounded'>Follow</button>";
                                        }  else {
                                            echo"<button type='button' id='seguir' onclick='desseguir({$animais->idAnimal})' class='uk-margin button is-primary is-outlined is-rounded'>Unfollow</button>";
                                        }

                                    echo"</div>";
                                    echo"</div>";
                                }

                                $indice += 1;
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="container uk-margin-medium-top">
            <hr class="featurette-divider">
            <?php \app\estruturas\Rodape::rodape(); ?>
        </footer>
    </div>

    <!-- Modals -->
    <?php
        \app\estruturas\modals\NovoPet::novoPet(null);
        \app\estruturas\modals\FotoUsuario::fotoUsuario(null);
        \app\estruturas\modals\EscolherFotoPost::escolherFotoPost(null);
        \app\estruturas\modals\EscolherAnimalPost::escolherAnimalPost(null);
        \app\estruturas\modals\Confirmacao::confirmacao();
        \app\estruturas\modals\Aviso::aviso();
    ?>

    <!-- JavaScript -->
    <?php \app\estruturas\ChamadaJs::chamadaJs(null) ?>

    <script> /* Logout */
        function sair() { window.location.href = "app/acoes/login/logout.php" }
    </script>

    <script> /* Mudar foto do usuario */
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
                url: 'app/acoes/rotinas/insereFotoUsuario.php',
                type: "POST",
                contentType: false,
                processData: false,
                data: f,
                dataType: "json",
                success: function(data) {
                    location.reload(true)
                },
                error: function(a, b, c) {
                    console.log(a.responseText)
                }

            })
        })
    </script>

    <script> /* Criar animal */
        $(function() {
            $('#fotoAnimal').change(function() {
                const file = $(this)[0].files[0]
                const fileReader = new FileReader()

                fileReader.onloadend = function() {
                    $('#imgPet').attr('src', fileReader.result)
                }

                fileReader.readAsDataURL(file)
            })
        })

        $('#criarPet').submit(function() {
            event.preventDefault();
            
            var nomePet = $('#nomePet').val()
            var DataAnv = $('#DataAnv').val()
            var animalPet = $('#animalPet').val()
            var racaPet = $('#racaPet').val()

            var dados = {
                nomePet: nomePet,
                DataAnv: DataAnv,
                animalPet: animalPet,
                racaPet: racaPet
            }

            $.ajax({
                url: 'app/acoes/rotinas/insertAnimal.php',
                type: "POST",
                dataType: "json",
                data: dados,
                success: function(data) {

                    console.log(data)

                    var file_data = $('#fotoAnimal').prop('files')[0];   
                    var form_data = new FormData();                  
                    form_data.append('file', file_data);

                    $.ajax({
                        url: 'app/acoes/rotinas/insereFotoAnimal.php',
                        type: "POST",
                        contentType: false,
                        processData: false,
                        data: form_data,
                        dataType: "json",
                        success: function(data) {
                            location.reload(true)
                        },
                        error: function(a, b, c) {
                            console.log(a.responseText)
                        }

                    })

                }, 
                error: function(a,b, c){
                    console.log(a.responseText)
                }
            })
        })
    </script>

    <script> /* Criar post */
        $(function() {
            $('#fotoPost').change(function() {
                const file = $(this)[0].files[0]
                const fileReader = new FileReader()

                fileReader.onloadend = function() {
                    $('#imgPost').attr('src', fileReader.result)

                    if ($('#im').length) {
                        $('#im').attr('src', fileReader.result)
                    }
                }

                fileReader.readAsDataURL(file)
            })
        })

        $('#formImagemPost').submit(function() {
            event.preventDefault()
            var elementImg

            if ($('#im').length) {
            } else {
                jQuery(document).ready(function() {
                    if(!($(window).width() <= 479)) {
                        $('#divTextArea').removeClass('col')
                        $('#divTextArea').addClass('col-6')  
                    }

                    if(($(window).width() <= 360)) {
                        elementImg = $("<img id='im' class='uk-margin-top' style='width: 110px; height: 110px'>")
                    } else {
                        elementImg = $("<img id='im' style='width: 110px; height: 110px'>")
                    }
                })

                elementImg.attr('src', $('#imgPost').attr('src'))
                var divImg = $("<div class='col-auto'></div>").html(elementImg)

                $('#linhaPost').append(divImg)
            }

            UIkit.modal('#EscolherFotoPost').hide()
        })

        function selecionarAnimal(idAnimal, fotoAnimal) {
            if($('#fotenhaAnimal').length) {
                $('#fotenhaAnimal').remove()
                var elementoFotoAnimal = $("<img id='fotenhaAnimal' class='uk-margin-top' style='border-radius: 50%; width: 40px; height: auto;'>")
                elementoFotoAnimal.attr('src', fotoAnimal)
                elementoFotoAnimal.attr('name', idAnimal)
                $('#fotenhas').append(elementoFotoAnimal)

            } else {
                var elementoFotoAnimal = $("<img id='fotenhaAnimal' class='uk-margin-top' style='border-radius: 50%; width: 40px; height: auto;'>")
                elementoFotoAnimal.attr('src', fotoAnimal)
                elementoFotoAnimal.attr('name', idAnimal)
                $('#fotenhas').append(elementoFotoAnimal)
            }

            UIkit.modal('#EscolherAnimal').hide()
        }

        $('#postar').submit(function() {
            event.preventDefault()
            var idAnimal = $('#fotenhaAnimal').attr('name')
            var txtDescricao = $('#txtDescricao').val()

            var dados = {
                idAnimal: idAnimal,
                txtDescricao: txtDescricao,
            }

            $.ajax({
                url: 'app/acoes/rotinas/inserePost.php',
                data: dados,
                type: "POST",
                success: function(data) {
                    if ($('#im').length) {
                        var fda = $('#fotoPost').prop('files')[0];   
                        var f = new FormData();                  
                        f.append('file', fda);

                        $.ajax({
                            url: 'app/acoes/rotinas/insereFotoPost.php',
                            data: f,
                            type: "POST",
                            processData: false,
                            contentType: false,
                            success: function(data) {
                                location.reload()
                            },
                            error: function(a, b, c) {
                                console.log(a.responseText)
                            }
                        })
                    } else {
                        location.reload()
                    }
                },
                error: function(a, b, c) {
                    console.log(a.responseText)
                }
            })
        })
    </script>

    <script> /* Acoes post */
        function confirmarApagar(idPost) {
            $('#tltConfirma').html("VOCÊ TEM CERTEZA?")
            $('#txtConfirma').html("Você tem certeza que deseja remover esse post?");
            UIkit.modal('#mdlConfirma').show()

            $('#btnNo').click(function() {
                UIkit.modal('#mdlConfirma').hide()
            })

            $('#btnYes').click(function() {
                apagarPost(idPost)
            })
        }

        function apagarPost(idPost) {
            event.preventDefault()
            $.ajax({
                url: 'app/acoes/adm/ocultarPost.php',
                data: {idPost: idPost},
                type: "POST",
                success: function(data) {
                    UIkit.modal('#mdlConfirma').hide()
                    $("#idpost"+idPost).remove()
                }, 
                error: function(a, b, c) {
                    console.log(a.resposiveText)
                }
            })
        }

        function darLike(idPost) {
            event.preventDefault()
            $.ajax({
                url: 'app/acoes/rotinas/darLike.php',
                data: {idPost: idPost},
                type: "POST",
                success: function(data) {
                    location.reload()
                }, 
                error: function(a, b, c) {
                    console.log(a.resposiveText)
                }
            })
        }

        function tirarLike(idPost) {
            event.preventDefault()
            $.ajax({
                url: 'app/acoes/rotinas/retirarLike.php',
                data: {idPost: idPost},
                type: "POST",
                success: function(data) {
                    location.reload()
                }, 
                error: function(a, b, c) {
                    console.log(a.resposiveText)
                }
            })
        }

        function darDeslike(idPost) {
            event.preventDefault()
            $.ajax({
                url: 'app/acoes/rotinas/darDeslike.php',
                data: {idPost: idPost},
                type: "POST",
                success: function(data) {
                    location.reload()
                }, 
                error: function(a, b, c) {
                    console.log(a.resposiveText)
                }
            })
        }

        function tirarDeslike(idPost) {
            event.preventDefault()
            $.ajax({
                url: 'app/acoes/rotinas/retirarDeslike.php',
                data: {idPost: idPost},
                type: "POST",
                success: function(data) {
                    location.reload()
                }, 
                error: function(a, b, c) {
                    console.log(a.resposiveText)
                }
            })
        }

        function confirmarDenunciarPost(idPost) {
            event.preventDefault()
            $('#tltConfirma').html("DESEJA MESMO?")
            $('#txtConfirma').html("Você quer mesmo denunciar esse post?")
            UIkit.modal('#mdlConfirma').show()

            $('#btnNo').click(function() {
                UIkit.modal('#mdlConfirma').hide()
            })

            $('#btnYes').click(function() {
                denunciarPost(idPost)
            })
        }

        function denunciarPost(idPost) {
            event.preventDefault()

            $.ajax({
                url: "app/acoes/rotinas/denunciarPost.php",
                type: "POST",
                dataType: "json",
                data: {idPost: idPost},
                success: function(data) {
                    $("#btnDenuncia"+idPost).remove()
                    $('#tltAviso').html(data.title)
                    $('#txtAviso').html(data.text)
                    UIkit.modal('#mdlAviso').show()
                }, 
                error: function(a, b, c) {
                    console.log(a.resposiveText)
                }
            })
        }
    </script>

    <script> /* Outros animais */
        function seguir(idAnimal) {
            $.ajax({
                url: 'app/acoes/rotinas/seguirAnimal.php',
                data: {idAnimal: idAnimal},
                type: "POST",
                success: function(data) {
                    location.reload()
                },
                error: function(a, b, c) {
                    console.log(a.responseText)
                }
            })
        }

        function desseguir(idAnimal) {
            $.ajax({
                url: 'app/acoes/rotinas/desseguirAnimal.php',
                data: {idAnimal: idAnimal},
                type: "POST",
                success: function(data) {
                    location.reload()
                },
                error: function(a, b, c) {
                    console.log(a.responseText)
                }
            })
        }
    </script>

    <script> /* Mascara data de nascimento */
        var d = new Date()
        var anoAtual = d.getFullYear()
        var dataNasc = IMask(document.getElementById('DataAnv'), {
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

    <script> /* Arruma tela nos celulares */
        $(window).on('resize', function(){
            var win = $(this);

            if (win.width() <= 556) { 
                $('#postagens').addClass('col');
                $('#postagens').removeClass('col-8');

            } else {
                $('#postagens').removeClass('col');
                $('#postagens').addClass('col-8');
            }
        });

        jQuery(document).ready(function() {
            if(($(window).width() <= 556)) {
                $('#postagens').removeClass('col-8')
                $('#postagens').addClass('col')  
            }
        })
    </script>

    <script> /* Notificacoes */
        $('#notificacao').click(function() {
            UIkit.offcanvas($('#myOffCanvas')).hide()
            UIkit.notification({
                message: 'my-message!',
                timeout: 5000
            });
        })
    </script>
</body>

</html>