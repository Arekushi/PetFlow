<?php
    require_once '../../../vendor/autoload.php';

    $dados = new \app\model\Dados();

    //Pega a imagem
    $nomeImagem = $_FILES['file']['name'];
    $arquivoImagem = $_FILES ['file']['tmp_name'];

    $caminho = "images/fotosUsuario/";
    
    //Move a imagem na pasta desejada
    move_uploaded_file($arquivoImagem, 
                       "../../../" .$caminho . $nomeImagem);
    
    $caminho = $caminho . $nomeImagem;

    session_start();
    // Salva o nome da imagem no banco
    $update = "UPDATE tbusuario
                SET fotoUsuario = :caminho
                    WHERE idUsuario = :idUsuario";

    $stmt = \app\model\Conexao::getConexao()->prepare($update);
    $stmt->bindParam('caminho', $caminho);
    $stmt->bindParam('idUsuario', $_SESSION['cod']);
    $stmt->execute();

    $_SESSION['foto'] = $caminho;
    $dados->sucesso = 'yes';

    echo json_encode($dados);
?>
