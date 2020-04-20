<?php
    require_once '../../../vendor/autoload.php';
    //Pega a imagem
    $nomeImagem = $_FILES['fotoPost']['name'];
    $arquivoImagem = $_FILES ['fotoPost']['tmp_name'];

    $caminho = "images/fotosPost/";
    
    //Move a imagem na pasta desejada
    session_start();
    move_uploaded_file($arquivoImagem, 
                       "../../" .$caminho . $nomeImagem);

    if ($nomeImagem != null) {
        header("Location: ../paginaAnimal.php?idAnimal={$_GET['idAnimal']}&postImg=$nomeImagem");
    }

    echo "<script>";
        echo "history.go(-1)";
    echo "</script>";
?>
