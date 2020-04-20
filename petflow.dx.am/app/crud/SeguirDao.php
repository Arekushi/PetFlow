<?php

namespace app\crud;

class SeguirDao {

    public static function create(\app\model\SeguirAnimal $seguir) {
        $sql = "INSERT INTO tbseguidoranimal (idUsuario, idAnimal) VALUES (?, ?)";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $seguir->getIdUsuario());
        $stmt->bindValue(2, $seguir->getIdAnimal());
        $stmt->execute();
    }

    public static function delete(\app\model\SeguirAnimal $seguir) {
        $sql = "DELETE FROM tbseguidoranimal WHERE idUsuario = ? AND idAnimal = ?";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $seguir->getIdUsuario());
        $stmt->bindValue(2, $seguir->getIdAnimal());
        $stmt->execute();
    }

    public static function verificaSeguir($idUsuario, $idAnimal) {
        $sql = "SELECT idSeguidorAnimal FROM tbseguidoranimal WHERE idUsuario = ? AND idAnimal = ?";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $idUsuario);
        $stmt->bindValue(2, $idAnimal);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;

        } else {
            return false;
        }
    }
}