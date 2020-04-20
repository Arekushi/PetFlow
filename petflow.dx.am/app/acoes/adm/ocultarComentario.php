<?php
    header("Location: ../../../pages/paginaAdministrador.php");
    require_once '../../../vendor/autoload.php';


    $sql = "UPDATE tbcomentario SET visibilidade = 0 WHERE idcomentario = ?";
    $stmt = \app\model\Conexao::getConexao()->prepare($sql);
    $stmt->bindParam(1, $_GET['idComentario']);
    $stmt->execute();