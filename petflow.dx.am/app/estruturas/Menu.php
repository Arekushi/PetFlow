<?php

namespace app\estruturas;

if (session_status() != PHP_SESSION_ACTIVE) session_start();

class Menu {

    public static function menu($caminho, $linha) {
        require_once "{$caminho}vendor/autoload.php";
        echo
        "<header>
            <!-- Menu -->
            <nav class='navbar fixed-top' role='navigation' aria-label='main navigation' id='menu'>
                <!-- Esquerda -->
                <div class='uk-navbar-left'>
                    <!-- Botão menu -->
                    <a class='navbar-item' id='menu-toggle' href='#myOffCanvas' uk-toggle>
                        <span class='bars menu-bars'>
                            <i class='fa fa-bars'></i>
                        </span>
                    </a>
        
                    <!-- Imagem logo -->
                    <a class='navbar-item d-none d-sm-block' id='logonav' href='{$caminho}index.php'>
                        <img src='{$caminho}assets/img/petflow.svg'>
                    </a>
                    
                    <!-- Imagem logo -->
                    <a class='navbar-item d-block d-sm-none' id='logonav' href='{$caminho}index.php'>
                        <img src='{$caminho}assets/img/logo3.png'>
                    </a> 
                </div>
        
                <!-- Meio -->
                <div class='uk-navbar-center'>   
                </div>
        
                <!-- Direita -->
                <div class='uk-navbar-right'>
                    <a class='navbar-item' id='fotoUsuario' href='#NovaFotoUsuario' uk-toggle>";
                        echo"<img src='{$caminho}{$linha->getFotoUsuario()}' title='{$linha->getNomeUsuario()}'>";
                    echo"</a>
                    <a class='navbar-item' id='fotoUsuario'>
                        <i style='color: white' uk-icon='icon: sign-out; ratio: 2' onclick='sair()' title='Sair' alt='Sair'>
                        </i>  
                    </a>
                </div>
        
                <!-- Off canvas -->
                <div id='myOffCanvas' uk-offcanvas='overlay: true'>
                    <div class='uk-offcanvas-bar'>
                        <ul class='uk-nav uk-nav-default'>
                            <li><a href='#' uk-icon='icon: home; ratio: 2' title='Página Inicial' alt='Página Inicial'></a></li>
                            <li><a id='notificacao' uk-icon='icon: bell; ratio: 2' title='Notificações' alt='Notificações'></a></li>
                            <li><a href='#' uk-icon='icon: users; ratio: 2' title='Usuários' alt='Usuários'></a></li>
                            <li><a href='#' uk-icon='icon: cog; ratio: 2' title='Configurações' alt='Configurações'></a></li>
                            <li class='uk-nav-divider'></li>
                            <li><a uk-icon='icon: github-alt;  ratio: 2' href='#SeusPets' uk-toggle title='GitHub' alt='GitHub'></a></li>
                            <li><a uk-icon='icon: plus-circle;  ratio: 2' href='#NovoPet' uk-toggle title='Adicionar novo Pet' alt='Adicionar novo Pet'></a></li>
                            <li class='uk-nav-divider'></li>
                            <li><a uk-icon='icon: sign-out;  ratio: 2' onclick='sair()' title='Sair' alt='Sair'></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        
            <div class='sidebar-container'>
                <ul class='sidebar-navigation'>
                    <li>
                        <a uk-icon='icon: plus-circle; ratio: 2.5' href='#NovoPet' title='Adicionar novo Pet' uk-toggle></a>
                    </li>";
        
                    foreach(\app\crud\AnimalDao::read($_SESSION['cod']) as $animais) {
                        echo"<li>";
                            if (\strcmp($caminho, "../") == 0) {
                                $petLink = "paginaAnimal.php?idAnimal={$animais->idAnimal}";
                            } else {
                                $petLink = "pages/paginaAnimal.php?idAnimal={$animais->idAnimal}";
                            }

                            echo"<a class='nav-item' id='pet' href='{$petLink}'>";
                                echo"<img src='{$caminho}{$animais->fotoAnimal}' title='{$animais->nomeAnimal}'>";
                            echo"</a>";
                        echo"</li>";
                    }

                echo"</ul>";
            echo"</div>";
        echo"</header>";
    }
}

    