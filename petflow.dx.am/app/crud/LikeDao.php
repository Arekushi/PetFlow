<?php

namespace app\crud;

class LikeDao {

    public static function insert(\app\model\Like $like) {
        $sql = "INSERT INTO tblike (idUsuario, idPostagem) VALUES (?, ?)";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $like->getIdUsuario());
        $stmt->bindValue(2, $like->getIdPostagem());
        $stmt->execute();
    }

    public static function select($idPost) {
        $sql = "SELECT * FROM tblike WHERE idpostagem = ?";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $idPost);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        } else {
            return [];
        }
    }

    public static function contagem($idPost) {
        $sql = "SELECT * FROM tblike WHERE idpostagem = ?";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $idPost);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->rowCount();
        } else {
            return 0;
        }
    }

    public static function verificarLike($idPost, $idUsuario) {
        $sql = "SELECT * FROM tblike WHERE idpostagem = ? AND idUsuario = ?";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $idPost);
        $stmt->bindValue(2, $idUsuario);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function delete(\app\model\Like $like) {
        $sql = "DELETE FROM tblike WHERE idPostagem = ? AND idUsuario = ?";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $like->getIdPostagem());
        $stmt->bindValue(2, $like->getIdUsuario());
        $stmt->execute();
    }

}