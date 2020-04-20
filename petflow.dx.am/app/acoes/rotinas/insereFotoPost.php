<?php
    require_once '../../../vendor/autoload.php';

    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }

    $dados = new \app\model\Dados();

    //Pega a imagem
    $nomeImagem = $_FILES['file']['name'];
    $arquivoImagem = $_FILES ['file']['tmp_name'];

    $caminho = "images/fotosPost/";
    
    //Move a imagem na pasta desejada
    move_uploaded_file($arquivoImagem, 
                       "../../../" .$caminho . $nomeImagem);
    
    $caminho = $caminho . $nomeImagem;

    \app\crud\PostDao::setFotoPostagem($caminho, $_SESSION['codPost']);

    unset($_SESSION['codPost']);