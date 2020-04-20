<?php

namespace app\crud;

class ComentarioDao {

    public static function insert(\app\model\Comentario $comentario) {
        $sql = "INSERT INTO tbcomentario(descricaoComentario, idUsuario, idPostagem, visibilidade) 
                    VALUES(?, ?, ?, ?)";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindParam(1, $comentario->getDescricaoComentario());
        $stmt->bindParam(2, $comentario->getiDUsuario());
        $stmt->bindParam(3, $comentario->getIdPostagem());
        $stmt->bindParam(4, $comentario->getVisibilidade());
        $stmt->execute();

    }

    public static function selectComentario() {
        $sql = "SELECT * FROM tbcomentario";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }else {
            return [];
        }
    }

}