<?php
    require_once '../../vendor/autoload.php';

    if (session_status() != PHP_SESSION_ACTIVE) session_start();

    //\app\acoes\login\VerificaCadastro::verificaCadastro();

    $fotoUSuario = $_SESSION['foto'];
?>

<html style='background: #FAAA39'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Continue seu cadastro... ♡( ◡‿◡ )</title>
    <?php \app\estruturas\ChamadaCss::chamadaCss2("../../") ?>
</head>

<body class='container' style='background: #FAAA39'>
    <section class='row' style="height: 100%;">
        <div id="carouselExampleControls" class="carousel slide col" data-ride="carousel" data-interval="false" data-pause="hover">
            
            <div class="carousel-inner row" style="height: 100%; margin-left: 0; margin-right: 0">
                <div class="carousel-item active col align-self-center">
                    <!-- Logo -->
                    <div class="column"> 
                        <img src=<?php echo"../../{$fotoUSuario}" ?> width="250px" height="250px" alt="Logo" id='avatar' class="avatar">
                    </div>

                    <form class='uk-margin' id='uploadFoto' method="post" enctype='multipart/form-data'>
                        <label>
                            <span class='file-cta'>
                                <input type='file' class='file-input' name='fotoUsuario' placeholder='Foto...' id='fotoUsuario' required>
                            
                                <span class='file-icon'>
                                    <i uk-icon='upload'></i>
                                </span>

                                <span class='file-label'>
                                    Escolha uma foto...
                                </span>
                            </span>  
                        </label>
                    </form>

                    <div class="textinho">
                        Envie uma foto bem legal para nós, ficará uma gracinha em seu perfil. <br>(´｡• ᵕ •｡`) ♡
                    </div>
                </div>
                
                <div class="carousel-item col align-self-center"> 
                    <form id='uploadFoto' role='form' method='post' class='registration-form' enctype='multipart/form-data'>

                    <!-- Logo -->
                    <div class="column"> 
                        <img src="../../assets/img/defaultDog.png" width="250px" height="250px" alt="Logo" id='avatarAnimal' class="avatar">
                    </div>

                    <label>
                        <span class='file-cta'>
                            <input type='file' class='file-input' name='fotoAnimal' placeholder='Foto...' id='fotoAnimal' required>
                        
                            <span class='file-icon'>
                                <i uk-icon='upload'></i>
                            </span>

                            <span class='file-label'>
                                Escolha uma foto...
                            </span>
                        </span>  
                    </label>

                    <div class='textinho d-flex justify-content-center uk-margin-large'>
                    <div class='col-auto'>
                        <div class="form-group">
                            <input type='text' id='nomePet' name='nomePet' placeholder='Nome...' class='form-control' required>
                        </div>
                        <div class="form-group">
                            <input type='text' id='DataAnv' name='DataAnv' placeholder='Data de Aniversário' class='form-control' required>
                        </div>
                        <div class="form-group">
                            <input type='text' id='animalPet' name='animalPet' class='form-control' placeholder='Animal...' required>	
                        </div>
                        <div class="form-group">
                            <input type='text' id='racaPet' name='racaPet' class='form-control' placeholder='Raça...' required>	
                        </div>
                    </div>
                    </div>
                    
                    </form>
                </div>

                <div class="carousel-item col align-self-center">
                    <div class="textinho">
                        Vamos começar? <br> ＼(≧▽≦)／
                    </div>
                    <div class='uk-margin'>
                        <button class="btn" id='entrar' style='width: 250px; background: white; color: #FAAA39'>Entrar</button>
                    </div>
                </div>
            </div>

            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>

    <!-- JavaScript -->
    <?php \app\estruturas\ChamadaJs::chamadaJs("../../") ?>

    <script> /* Data aniversário */
        var dataNasc = IMask(document.getElementById('DataAnv'), {
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

    <script> /* Mudar fotos */
        $(function() {
            $('#fotoUsuario').change(function() {
                const file = $(this)[0].files[0]
                const fileReader = new FileReader()

                fileReader.onloadend = function() {
                    $('#avatar').attr('src', fileReader.result)
                    document.getElementById('avatar').style.height = '250px'
                }

                fileReader.readAsDataURL(file)
            })
        })

        $(function() {
            $('#fotoAnimal').change(function() {
                const file = $(this)[0].files[0]
                const fileReader = new FileReader()

                fileReader.onloadend = function() {
                    $('#avatarAnimal').attr('src', fileReader.result)
                    document.getElementById('avatarAnimal').style.height = '250px'
                }

                fileReader.readAsDataURL(file)
                console.log(file)
            })
        })
    </script>

    <script> /* Botao entrar */
        $('#entrar').click(function() {
            var cadastroFoto = false
            var cadastroAnimal = false

            if ($('#avatar').attr('src') != '../../assets/img/default.png') {
                cadastroFoto = true
            }

            if ($('#avatarAnimal').attr('src') != '../../assets/img/defaultDog.png') {
                cadastroAnimal = true
            }

            if (cadastroFoto === true) {
                var fda = $('#fotoUsuario').prop('files')[0];   
                var f = new FormData();                  
                f.append('file', fda);

                $.ajax({
                    url: '../../app/acoes/rotinas/insereFotoUsuario.php',
                    type: "POST",
                    contentType: false,
                    processData: false,
                    data: f,
                    dataType: "json",
                    success: function(data) {
                        console.log(data)
                    },
                    error: function(a, b, c) {
                        console.log(a.responseText)
                    }

                })
            }

            if (cadastroAnimal === true) {
                var nomePet = ($('#nomePet').val() === '')? 'Nulo' :  $('#nomePet').val()
                var DataAnv = ($('#DataAnv').val() === '')? '00/00/0000' :  $('#DataAnv').val()
                var animalPet = ($('#animalPet').val() === '')? 'Nulo' :  $('#animalPet').val()
                var racaPet = ($('#racaPet').val() === '')? 'Nulo' :  $('#racaPet').val()

                var dados = {
                    nomePet: nomePet,
                    DataAnv: DataAnv,
                    animalPet: animalPet,
                    racaPet: racaPet
                }

                $.ajax({
                    url: '../../app/acoes/rotinas/insertAnimal.php',
                    type: "POST",
                    dataType: "json",
                    data: dados,
                    success: function(data) {
                        var file_data = $('#fotoAnimal').prop('files')[0];   
                        var form_data = new FormData();                  
                        form_data.append('file', file_data);

                        $.ajax({
                            url: '../../app/acoes/rotinas/insereFotoAnimal.php',
                            type: "POST",
                            contentType: false,
                            processData: false,
                            data: form_data,
                            dataType: "json",
                            success: function(data) {
                                console.log(data)
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
            }

            setTimeout(function() {
                <?php unset($_SESSION['reg']) ?>
                window.location.href = '../../index.php'
            }, 2000)
            
        })
    </script>
</body>

</html>