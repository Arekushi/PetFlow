<?php
    require_once '../vendor/autoload.php';

    if (session_status() != PHP_SESSION_ACTIVE) session_start();

    \app\acoes\login\VerificaLoginEfetuado::voltarLogin("../");
    \app\acoes\login\VerificaLoginEfetuado::verificaAdministrador();
    \app\date\Location::setTimeZone();
?>

<html lang="pt-br">
<head>
    <title>PetFlow - Página Administrador</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php \app\estruturas\ChamadaCss::chamadaCss("../") ?>
    
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

        <!--<div class="sidebar-container">
            <ul class="sidebar-navigation">

               
            </ul>
        </div>-->
    </header>

    <!-- Principal -->
    <!-- Cards -->
    <section class='container' style='padding-top: 25px' id='cards'>
    <div class='row justify-content-end'>
        <!-- Usuários --->
        <div class='col-4'>
            <a href='#' id='cardUsuario'>
            <div class='uk-card uk-card-default uk-card-hover uk-card-body'>
                
                <span uk-icon='icon: users; ratio: 3' title='Usuários' alt='Usuários'></span>
                <h3 class='uk-card-title'>Usuários</h3>
            </div>
            </a>
        </div>

        <!-- Animais --->
        <div class='col-4'>
            <a href='#' id='cardAnimais'>
            <div class='uk-card uk-card-default uk-card-hover uk-card-body'>
                
                <span uk-icon='icon: heart; ratio: 3' title='Animais' alt='Animais'></span>
                <h3 class='uk-card-title'>Animais</h3>
            </div>
            </a>
        </div>

        <!-- Posts --->
        <div class='col-4'>
            <a href='#' id='cardPosts'>
            <div class='uk-card uk-card-default uk-card-hover uk-card-body'>
                
                <span uk-icon='icon: file-edit; ratio: 3' title='Posts' alt='Posts'></span>
                <h3 class='uk-card-title'>Posts</h3>
            </div>
            </a>
        </div>
    </div>
    </section>

    <!--Visualizar Cards-->
    <section class='container' style='padding-top: 25px' id='voltarCards'>
        <div class='row justify-content-center'>
            <div class='col-10'>
                <button class='uk-button uk-button-secondary uk-width-1-1 uk-margin-small-bottom'>Voltar</button>
            </div>
        </div>
    </section>
    
    <!-- Usuarios -->
    <section class='container' id='usuarios' style='padding-top: 25px'>
        <?php
            /* Administradores */
            echo"<h1>Administradores</h1>";
            echo "<div class='row justify-content-around align-items-center uk-margin-bottom-large'>";
                foreach(\app\crud\UsuarioDao::getUsuarioByTipo(3) as $usuario) {
                        $valorOnline = $usuario->online;
                        $tipoUsuario = \app\crud\TipoUsuarioDao::pegarTipoUsuario($usuario->tipoUsuario);

                        echo "<div class='col-auto'>";
                            echo "<div class='uk-card uk-card-small uk-card-default'>";
                            
                                echo "<div class='uk-card-media-top' style='padding-top: 5px'>";
                                    echo "<img src='../{$usuario->fotoUsuario}'><br>";
                                    echo "{$usuario->nomeUsuario}<br>";
                                echo "</div>";

                                echo"<p class='uk-text-meta' style='margin-top: -10px; margin-bottom: -10px'>{$tipoUsuario->tipoUsuario}</p>";
                                echo "<div class='uk-card-body'>";
                                    echo "<i uk-icon='icon: mail'></i> {$usuario->emailUsuario}<br>";
                                    
                                    $online = ($valorOnline == 1)? "#40a832":"bf3232";
                                    if ($valorOnline == 1) {
                                        echo"<div class='uk-card-badge uk-badge' style='background-color: {$online}'></div>";
                                    } else {
                                        echo"<div class='uk-card-badge uk-badge' style='background-color: {$online}'></div>";
                                    }
                                echo"</div>";
                            echo "</div>";
                        echo "</div>";
                        
                }
            echo "</div>";

            /* Moderadores */
            echo"<h1 style='margin-top: 5%'>Moderadores</h1>";
            echo "<div class='row justify-content-around align-items-center'>";
                foreach(\app\crud\UsuarioDao::getUsuarioByTipo(2) as $usuario) {
                        $valorOnline = $usuario->online;
                        $tipoUsuario = \app\crud\TipoUsuarioDao::pegarTipoUsuario($usuario->tipoUsuario);

                        echo "<div class='col-auto'>";
                            echo "<div class='uk-card uk-card-small uk-card-default'>";
                            
                                echo "<div class='uk-card-media-top' style='padding-top: 5px'>";
                                    echo "<a href='paginaUsuarioAdministrador.php?idUsuario={$usuario->idUsuario}'><img src='../{$usuario->fotoUsuario}'></a><br>";
                                    echo "{$usuario->nomeUsuario}<br>";
                                echo "</div>";

                                echo"<p class='uk-text-meta' style='margin-top: -10px; margin-bottom: -10px'>{$tipoUsuario->tipoUsuario}</p>";
                                echo "<div class='uk-card-body'>";
                                    echo "<i uk-icon='icon: mail'></i> {$usuario->emailUsuario}<br>";
                                    
                                    $online = ($valorOnline == 1)? "#40a832":"bf3232";
                                    if ($valorOnline == 1) {
                                        echo"<div class='uk-card-badge uk-badge' style='background-color: {$online}'></div>";
                                    } else {
                                        echo"<div class='uk-card-badge uk-badge' style='background-color: {$online}'></div>";
                                    }

                                    echo "<a href='../app/acoes/adm/removerModerador.php?idUsuario={$usuario->idUsuario}'>
                                        <button type='button' class='uk-button uk-button-danger uk-width-1-1'>Remover Moderador</button>
                                    </a>";

                                    echo "<a href='paginaUsuarioAdministrador.php?idUsuario={$usuario->idUsuario}'>
                                        <button type='button' class='uk-button uk-button-secondary uk-width-1-1' style='margin-top: 10px'>Visualizar Usuario</button>
                                    </a>";

                                echo"</div>";
                            echo "</div>";
                        echo "</div>";
                        
                }
            echo "</div>";

            /* Usuarios */
            echo"<h1 style='margin-top: 5%'>Usuários</h1>";
            echo "<div class='row justify-content-around align-items-center'>";
                foreach(\app\crud\UsuarioDao::getUsuarioByTipo(1) as $usuario) {
                        $valorOnline = $usuario->online;
                        $tipoUsuario = \app\crud\TipoUsuarioDao::pegarTipoUsuario($usuario->tipoUsuario);

                        echo "<div class='col-auto'>";
                            echo "<div class='uk-card uk-card-small uk-card-default'>";
                            
                                echo "<div class='uk-card-media-top' style='padding-top: 5px'>";
                                    echo "<a href='paginaUsuarioAdministrador.php?idUsuario={$usuario->idUsuario}'><img src='../{$usuario->fotoUsuario}'></a><br>";
                                    echo "{$usuario->nomeUsuario}<br>";
                                echo "</div>";

                                echo"<p class='uk-text-meta' style='margin-top: -10px; margin-bottom: -10px'>{$tipoUsuario->tipoUsuario}</p>";
                                echo "<div class='uk-card-body'>";
                                    echo "<i uk-icon='icon: mail'></i> {$usuario->emailUsuario}<br>";
                                    
                                    $online = ($valorOnline == 1)? "#40a832":"bf3232";
                                    if ($valorOnline == 1) {
                                        echo"<div class='uk-card-badge uk-badge' style='background-color: {$online}'></div>";
                                    } else {
                                        echo"<div class='uk-card-badge uk-badge' style='background-color: {$online}'></div>";
                                    }

                                    echo "<a href='../app/acoes/adm/tornarModerador.php?idUsuario={$usuario->idUsuario}'>
                                        <button type='button' class='uk-button uk-button-primary uk-width-1-1'>Tornar Moderador</button>
                                    </a>";

                                    echo "<a href='paginaUsuarioAdministrador.php?idUsuario={$usuario->idUsuario}'>
                                        <button type='button' class='uk-button uk-button-secondary uk-width-1-1' style='margin-top: 10px'>Visualizar Usuario</button>
                                    </a>";

                                echo"</div>";
                            echo "</div>";
                        echo "</div>";
                        
                }
            echo "</div>";

            echo"<h1 style='margin-top: 5%'>Banimentos ativos</h1>";
            echo "<div class='row justify-content-around align-items-center'>";
            $existe = false;
            foreach(\app\crud\BanimentoDao::getBanidos(1) as $ban) {
                $existe = true;
                $usuarioBanido = \app\crud\UsuarioDao::getUsuarioById($ban->idUsuario);
                $banidor = \app\crud\UsuarioDao::getUsuarioById($ban->idBanidor);
                $motivo = \app\crud\MotivoBanimentoDao::getMotivoById($ban->idMotivo);
                $fim_banimento = ($ban->fim_banimento == null)? "Permanente": $ban->fim_banimento;

                echo "<div class='col-auto'>";
                echo "<div class='uk-card uk-card-small uk-card-default'>";
                    echo "<div class='uk-card-media-top' style='padding-top: 5px'>";
                        echo "<img src='../{$usuarioBanido->getFotoUsuario()}'><br>";
                        echo "{$usuarioBanido->getnomeUsuario()}<br>";
                    echo "</div>";
                    echo "<div class='uk-card-body'>";
                        echo "<strong class='uk-text-warning'><i uk-icon='icon: user'></i> {$banidor->getNomeUsuario()}</strong><br>";
                        echo "<i uk-icon='icon: question'></i> {$motivo}<br>";
                        echo"<br>";
                        echo "<i uk-icon='icon: lock'></i> {$ban->inicio_banimento}<br>";
                        echo "<i uk-icon='icon: unlock'></i> {$fim_banimento}";
                        echo"<a href='../app/acoes/adm/desbanir.php?idBanimento={$ban->idBanimento}' class='uk-margin'><button type='button' class='uk-button uk-button-danger uk-width-1-1'>Remover Banimento</button></a>";
                    echo"</div>";
                echo"</div>";
                echo"</div>";
            }

            if ($existe == false) {
                echo "<div class='col-auto'>";
                echo "<div class='uk-card uk-card-small uk-card-default'>";
                    echo "<div class='uk-card-body'>";
                        echo "<strong class='uk-text-warning'>Não há banimentos ativos c:</strong><br>";
                    echo"</div>";
                echo"</div>";
                echo"</div>";
            }
            echo"</div>";

            echo"<h1 style='margin-top: 5%'>Histórico de banimentos</h1>";
            echo "<div class='row justify-content-around align-items-center'>";
                    foreach(\app\crud\BanimentoDao::getBanidos(0) as $ban) {
                        $usuarioBanido = \app\crud\UsuarioDao::getUsuarioById($ban->idUsuario);
                        $banidor = \app\crud\UsuarioDao::getUsuarioById($ban->idBanidor);
                        $motivo = \app\crud\MotivoBanimentoDao::getMotivoById($ban->idMotivo);
                        $fim_banimento = ($ban->fim_banimento == null)? "Permanente": $ban->fim_banimento;
        
                        echo "<div class='col-auto'>";
                        echo "<div class='uk-card uk-card-small uk-card-default'>";
                            echo "<div class='uk-card-media-top' style='padding-top: 5px'>";
                                echo "<img src='../{$usuarioBanido->getFotoUsuario()}'><br>";
                                echo "{$usuarioBanido->getnomeUsuario()}<br>";
                            echo "</div>";
                            echo "<div class='uk-card-body'>";
                                echo "<strong class='uk-text-warning'><i uk-icon='icon: user'></i> {$banidor->getNomeUsuario()}</strong><br>";
                                echo "<i uk-icon='icon: question'></i> {$motivo}<br>";
                                echo "<i uk-icon='icon: unlock'></i> {$fim_banimento}<br>";
                                echo "<i uk-icon='icon: lock'></i> {$ban->inicio_banimento}<br>";
                            echo"</div>";
                        echo"</div>";
                        echo"</div>";
                    }
                    echo"</div>";
        
        ?>
    </section>

    <!-- Animais -->
    <section class='container' id='animais' style='padding-top: 25px'>
        <?php
            echo"<h1>Animais</h1>";
            echo "<div class='row justify-content-center align-items-center' style='padding-top: 25px'>";
                foreach(\app\crud\AnimalDao::getAnimaisDenunciados() as $animal) {
                    echo "<div class='col-auto'>";
                        $usuario = \app\crud\UsuarioDao::getUsuarioById($animal->idUsuario);
                        echo "<div class='uk-card uk-card-small uk-card-default'>";
                            echo "<div class='uk-card-media-top' style='padding-top: 5px'>";
                                echo "<img src='../{$animal->fotoAnimal}' title='{$animal->nomeAnimal}'><br>";
                                echo "{$animal->nomeAnimal}<br>";
                            echo "</div>";
                            echo "<div class='uk-card-body'>";
                                echo "<strong><i uk-icon='icon: user'></i> {$usuario->getNomeUsuario()}</strong><br>";
                                echo"<i uk-icon='icon: trash; ratio: 1.5' title='Ocultar' onclick='apagarAnimal({$animal->idAnimal})' style='cursor: pointer'></i></a>";
                            echo"</div>";
                        echo"</div>";

                    echo"</div>";
                }
            echo"</div>";

            echo"<br><br>";

            echo"<h1>Denúncias</h1>";
            echo "<div class='row justify-content-center align-items-center' style='padding-top: 25px'>";
            $existe = false;
            foreach(\app\crud\AnimalDao::getAnimaisNotDenunciados() as $animal) {
                $existe = true;
                $usuario = \app\crud\UsuarioDao::getUsuarioById($animal->idUsuario);

                echo "<div class='col-auto'>";
                    echo "<div class='uk-card uk-card-small uk-card-default'>";
                        echo "<div class='uk-card-header'>";
                            echo "<strong class='uk-text-warning'><i uk-icon='icon: user'></i> {$usuario->getNomeUsuario()}</strong><br>";
                        echo "</div>";

                        echo "<div class='uk-card-body uk-card-media-top' style='padding-top: 10px'>";
                            echo "<img src='../{$animal->fotoAnimal}'><br>";
                            echo "{$animal->nomeAnimal}<br>";
                            echo"<i uk-icon='icon: check; ratio: 2' title='Aceitar denuncia' onclick='apagarAnimal({$animal->idAnimal})' style='cursor: pointer; color: #40a832'></i></a>
                            <i uk-icon='icon: close; ratio: 2' title='Recusar denuncia'  onclick='recusarDenAnimal({$animal->idAnimal})' style='cursor: pointer'></i></a>";
                        echo"</div>";
                    echo"</div>";
                echo"</div>"; 
            }

            if ($existe == false) {
                echo "<div class='col-auto'>";
                echo "<div class='uk-card uk-card-small uk-card-default'>";
                    echo "<div class='uk-card-body'>";
                        echo "<strong class='uk-text-warning'>Não há denúncias de animais...</strong><br>";
                    echo"</div>";
                echo"</div>";
                echo"</div>";
            }

            echo"</div>";

            echo"<h1>Animais ocultados</h1>";
            echo "<div class='row justify-content-center align-items-center' style='padding-top: 25px'>";
            $existe = false;
                foreach(\app\crud\AnimalDao::selectAnimaisByVisibilidade(0) as $animal) {
                    $existe = true;
                    echo "<div class='col-auto'>";
                        $usuario = \app\crud\UsuarioDao::getUsuarioById($animal->idUsuario);
                        echo "<div class='uk-card uk-card-small uk-card-default'>";
                            echo "<div class='uk-card-media-top' style='padding-top: 5px'>";
                                echo "<img src='../{$animal->fotoAnimal}' title='{$animal->nomeAnimal}'><br>";
                                echo "{$animal->nomeAnimal}<br>";
                            echo "</div>";
                            echo "<div class='uk-card-body'>";
                                echo "<strong><i uk-icon='icon: user'></i> {$usuario->getNomeUsuario()}</strong><br>";
                                echo"<i uk-icon='icon: history; ratio: 1.5' title='Desocultar' onclick='desapagarAnimal({$animal->idAnimal})' style='cursor: pointer'></i></a>";
                            echo"</div>";
                        echo"</div>";

                    echo"</div>";
                }

                if ($existe == false) {
                    echo "<div class='col-auto'>";
                    echo "<div class='uk-card uk-card-small uk-card-default'>";
                        echo "<div class='uk-card-body'>";
                            echo "<strong class='uk-text-warning'>Não há nenhum animal ocultado...</strong><br>";
                        echo"</div>";
                    echo"</div>";
                    echo"</div>";
                }

            echo"</div>";
        ?>
    </section>

    <!-- Posts -->
    <section class='container' id='posts' style='padding-top: 25px'>
        <?php
        echo"<div class='accordion' id='accordionPosts'>";
            /* Todos os Posts */
            echo"<div class='card'>";
            echo"<a data-toggle='collapse' data-target='#collapseTodosPosts' aria-expanded='true' aria-controls='collapseTodosPosts'>";
                echo"<div class='card-header d-flex justify-content-center' id='headingTodosPosts'>";
                    echo"<h1>Todos os Posts</h1>";
                echo"</div>";
            echo"</a>";
      
            echo"<div id='collapseTodosPosts' class='collapse' aria-labelledby='headingTodosPosts' data-parent='#accordionPosts'>";
                echo"<div class='card-body'>";

                    $existe = false;
                    foreach(\app\crud\PostDao::selectPostsVisiveisNotDenunciado() as $post) {
                        $existe = true;
                        echo "<div class='row justify-content-center align-items-center' style='padding-top: 25px'>";
                            echo "<div class='col'>";
                            echo "<div class='uk-card uk-card-small uk-card-default uk-grid-collapse' uk-grid>";

                            echo"<div class='uk-card-badge' style='color: #a83232'>
                                <i uk-icon='icon: trash; ratio: 2' title='Ocultar' style='cursor: pointer' onclick='ocultar({$post->idPostagem})'></i></a>
                            </div>";
        
                            echo "<div class='uk-card-media-left' style='padding: 10px'>";
                                echo "<a href='paginaUsuarioAdministrador.php?idUsuario={$post->codUsuario}'><img src='../{$post->fotoUsuario}'></a><br>";
                                echo "{$post->nomeUsuario}<br>";
                            echo "</div>";
                            echo "<hr class='uk-divider-vertical align-self-center'>";
                            echo "<div class='uk-card-body align-self-center'>";

                            echo "{$post->descricaoPostagem}";
                            echo"</div>";
                            echo "<div class='uk-card-body align-self-center'>";

                            if ($post->imagemPostagem != null) {
                                echo "<img src='../{$post->imagemPostagem}'></img>";
                            }

                            echo"</div>";   
                            echo"</div>";
                            echo"</div>";
                        echo"</div>";
                    }

                    if ($existe == false) {
                        echo "<div class='row justify-content-center align-items-center' style='padding-top: 25px'>";
                            echo "<div class='col d-flex justify-content-center'>";
                                echo "<p style='font-size: 150%'>Desculpe, não há nenhum post no momento.. :c</p>";
                            echo "</div>";
                        echo "</div>";
                    }

                echo"</div>";
            echo"</div>";

            /* Posts Denunciados */
            echo"<div class='card'>";
            echo"<a data-toggle='collapse' data-target='#collapsePostsDen' aria-expanded='true' aria-controls='collapsePostsDen'>";
                echo"<div class='card-header d-flex justify-content-center' id='headingPostsDen'>";
                    echo"<h1>Posts Denunciados</h1>";
                echo"</div>";
            echo"</a>";
      
            echo"<div id='collapsePostsDen' class='collapse' aria-labelledby='headingPostsDen' data-parent='#accordionPosts'>";
                echo"<div class='card-body'>";
                    $existe = false;
                    
                    foreach(\app\crud\PostDao::selectPostsVisiveisDenunciado() as $post) {
                        $existe = true;
                        echo "<div class='row justify-content-center align-items-center' style='padding-top: 25px;'>";
                        
                            echo "<div class='col'>";
                            echo "<div class='uk-card uk-card-small uk-card-default uk-grid-collapse' uk-grid>";

                            echo"<div class='uk-card-badge' style='color: #a83232'>
                                <i uk-icon='icon: check; ratio: 2' title='Aceitar denuncia' style='cursor: pointer; color: #40a832' onclick='ocultar({$post->idPostagem})'></i></a>
                                <i uk-icon='icon: close; ratio: 2' title='Recusar denuncia' style='cursor: pointer' onclick='recusarDen({$post->idPostagem})'></i></a>
                            </div>";
        
                            echo "<div class='uk-card-media-left' style='padding: 10px'>";
                                echo "<a href='paginaUsuarioAdministrador.php?idUsuario={$post->codUsuario}'><img src='../{$post->fotoUsuario}'></a><br>";
                                echo "{$post->nomeUsuario}<br>";
                            echo "</div>";
                            echo "<hr class='uk-divider-vertical align-self-center'>";
                            echo "<div class='uk-card-body align-self-center'>";

                            echo "{$post->descricaoPostagem}";
                            echo"</div>";
                            echo "<div class='uk-card-body align-self-center'>";

                            if ($post->imagemPostagem != null) {
                                echo "<img src='../{$post->imagemPostagem}'></img>";
                            }

                            echo"</div>";   
                            echo"</div>";
                            echo"</div>";
                        echo"</div>";
                    }

                    if ($existe == false) {
                        echo "<div class='row justify-content-center align-items-center' style='padding-top: 25px'>";
                            echo "<div class='col d-flex justify-content-center'>";
                                echo "<p style='font-size: 150%'>Desculpe, não há nenhum post no momento.. :c</p>";
                            echo "</div>";
                        echo "</div>";
                    }
                echo"</div>";
            echo"</div>";

            /* Posts Deletados */
            echo"<div class='card'>";
            echo"<a data-toggle='collapse' data-target='#collapsePostsDel' aria-expanded='true' aria-controls='collapsePostsDel'>";
                echo"<div class='card-header d-flex justify-content-center' id='headingPostsDel'>";
                    echo"<h1>Posts deletados</h1>";
                echo"</div>";
            echo"</a>";
      
            echo"<div id='collapsePostsDel' class='collapse' aria-labelledby='headingPostsDel' data-parent='#accordionPosts'>";
                echo"<div class='card-body'>";
                    $existe = false;
                    foreach(\app\crud\PostDao::selectPostsInvisiveis() as $post) {
                        $existe = true;
                        echo "<div class='row justify-content-center align-items-center' style='padding-top: 25px'>";
                            $usuario = \app\crud\UsuarioDao::getUsuarioById($post->idUsuario);
                            echo "<div class='col'>";
                            echo "<div class='uk-card uk-card-small uk-card-default uk-grid-collapse' uk-grid>";

                            echo"<div class='uk-card-badge' style='color: #a83232'>
                                <i uk-icon='icon: history; ratio: 2' title='Reupar' style='cursor: pointer' onclick='desocultar({$post->idPostagem})'></i></a>
                            </div>";
        
                            echo "<div class='uk-card-media-left' style='padding: 10px'>";
                                echo "<a href='paginaUsuarioAdministrador.php?idUsuario={$post->idUsuario}'><img src='../{$usuario->getFotoUsuario()}'></a><br>";
                                echo "{$usuario->getNomeUsuario()}<br>";
                            echo "</div>";
                            echo "<hr class='uk-divider-vertical align-self-center'>";
                            echo "<div class='uk-card-body align-self-center'>";

                            echo "{$post->descricaoPostagem}";
                            echo"</div>";
                            echo "<div class='uk-card-body align-self-center'>";

                            if ($post->imagemPostagem != null) {
                                echo "<img src='../{$post->imagemPostagem}'></img>";
                            }

                            echo"</div>";   
                            echo"</div>";
                            echo"</div>";
                        echo"</div>";
                    }

                    if ($existe == false) {
                        echo "<div class='row justify-content-center align-items-center' style='padding-top: 25px'>";
                            echo "<div class='col d-flex justify-content-center'>";
                                echo "<p style='font-size: 150%'>Desculpe, não há nenhum post no momento.. :c</p>";
                            echo "</div>";
                        echo "</div>";
                    }
                echo"</div>";
            echo"</div>";

        echo"</div>";
        ?>
    </section>


    <!-- Footer -->
    <footer class="container">
        <hr class="featurette-divider">
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
</body>

    <script>
        function sair() {
            window.location.href = "../app/acoes/login/logout.php"
        }
    </script>

    <!-- JQUERY FUNCTIONS -->
    <!-- Cards -->
    <script>
        $("#usuarios").hide();
        $("#animais").hide();
        $("#posts").hide();
        $("#voltarCards").hide();


        // Se clicar no Usuários
        $("#cardUsuario").click(function() {
            $("#cards").fadeOut("slow");
            $("#voltarCards").fadeIn("slow");
            $("#usuarios").fadeIn("slow");
        });


        // Se clicar no Animais
        $("#cardAnimais").click(function() {
            $("#cards").fadeOut("slow");
            $("#voltarCards").fadeIn("slow");
            $("#animais").fadeIn("slow");
        });


        // Se clicar no Posts
        $("#cardPosts").click(function() {
            $("#cards").fadeOut("slow");
            $( "#voltarCards" ).fadeIn("slow");
            $( "#posts" ).fadeIn("slow");
        });


        // Vortaaaa
        $("#voltarCards").click(function() {
            $("#usuarios").fadeOut("slow");
            $("#animais").fadeOut("slow");
            $("#posts").fadeOut("slow");
            $("#voltarCards").fadeOut("slow");
            $("#cards").fadeIn("slow");
        });
    </script>

    <!-- Arekushi script -->
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

        function ocultar(idPost) {
            $.ajax({
                url: '../app/acoes/adm/ocultarPost.php',
                data: {idPost: idPost},
                type: "POST",
                success: function(data) {
                    location.reload()
                }
            })
        }

        function desocultar(idPost) {
            $.ajax({
                url: '../app/acoes/adm/desocultarPost.php',
                data: {idPost: idPost},
                type: "POST",
                success: function(data) {
                    location.reload()
                }
            })
        }

        function recusarDen(idPost) {
            $.ajax({
                url: '../app/acoes/adm/recusarDenuncia.php',
                data: {idPost: idPost},
                type: "POST",
                success: function(data) {
                    location.reload()
                }
            })
        }

        function apagarAnimal(idAnimal) {
            $.ajax({
                url: '../app/acoes/adm/ocultarAnimal.php',
                data: {idAnimal: idAnimal},
                type: "POST",
                success: function(data) {
                    location.reload()
                }
            })
        }

        function desapagarAnimal(idAnimal) {
            $.ajax({
                url: '../app/acoes/adm/desocultarAnimal.php',
                data: {idAnimal: idAnimal},
                type: "POST",
                success: function(data) {
                    location.reload()
                }
            })
        }

        function recusarDenAnimal(idAnimal) {
            $.ajax({
                url: '../app/acoes/adm/recusarDenunciaAnimal.php',
                data: {idAnimal: idAnimal},
                type: "POST",
                success: function(data) {
                    location.reload()
                }
            })
        }

    </script>
</html>