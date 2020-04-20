<?php

namespace app\crud;

class TipoUsuarioDao {

    public static function pegarTipoUsuario($valor) {
        $sql = "SELECT tipoUsuario from tbtipousuario WHERE idTipoUsuario = ?";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $valor);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(\PDO::FETCH_OBJ);
        } else {
            return [];
        }
    }
}