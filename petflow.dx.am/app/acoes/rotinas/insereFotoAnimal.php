<?php
    require_once '../../../vendor/autoload.php';

    if (session_status() != PHP_SESSION_ACTIVE) session_start();

    $dados = new \app\model\Dados();

    //Pega a imagem
    $nomeImagem = $_FILES['file']['name'];
    $arquivoImagem = $_FILES ['file']['tmp_name'];

    $caminho = "images/fotosAnimal/";
    
    //Move a imagem na pasta desejada
    move_uploaded_file($arquivoImagem, 
                       "../../../" .$caminho . $nomeImagem);
    
    $caminho = $caminho . $nomeImagem;
    
    // Salva o nome da imagem no banco
    $update = "UPDATE tbanimal
                    SET fotoAnimal = ?
                        WHERE idUsuario = ? AND idAnimal = ?";

    $stmt = \app\model\Conexao::getConexao()->prepare($update);
    $stmt->bindParam(1, $caminho);
    $stmt->bindParam(2, $_SESSION['cod']);
    $stmt->bindValue(3, $_SESSION['codAnimal']);
    $stmt->execute();

    $dados->sucesso = 'yes';
    echo json_encode($dados);
