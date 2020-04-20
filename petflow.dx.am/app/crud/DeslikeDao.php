<?php

namespace app\crud;

class DeslikeDao {

    public static function insert(\app\model\Deslike $deslike) {
        $sql = "INSERT INTO tbdeslike (idUsuario, idPostagem) VALUES (?, ?)";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $deslike->getIdUsuario());
        $stmt->bindValue(2, $deslike->getIdPostagem());
        $stmt->execute();
    }

    public static function select($idPost) {
        $sql = "SELECT * FROM tbdeslike WHERE idpostagem = ?";

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
        $sql = "SELECT * FROM tbdeslike WHERE idpostagem = ?";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $idPost);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->rowCount();
        } else {
            return 0;
        }
    }

    public static function verificarDeslike($idPost, $idUsuario) {
        $sql = "SELECT * FROM tbdeslike WHERE idpostagem = ? AND idUsuario = ?";

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

    public static function delete(\app\model\Deslike $deslike) {
        $sql = "DELETE FROM tbdeslike WHERE idPostagem = ? AND idUsuario = ?";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $deslike->getIdPostagem());
        $stmt->bindValue(2, $deslike->getIdUsuario());
        $stmt->execute();
    }

}