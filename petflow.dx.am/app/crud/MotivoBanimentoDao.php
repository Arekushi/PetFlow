<?php

namespace app\crud;

use app\model\MotivoBanimento;

class MotivoBanimentoDao {

    // Pegar todos os Motivos
    public static function getMotivos() {
        $sql = "SELECT * FROM tbmotivobanimento";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $resultado = $stmt->fetchAll(\PDO::FETCH_OBJ);
            return $resultado;
            
        } else {
            return [];
        }
    }

    // Inserir um novo motivo
    public static function insertMotivo($motivo) {
        $sql = "INSERT INTO tbmotivobanimento(motivo) VALUES(?)";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindParam(1, $motivo);
        $stmt->execute();

    }

    // Pegar o Motivo pelo ID
    public static function getMotivoById($idMotivo) {
        $sql = "SELECT motivo FROM tbmotivobanimento WHERE idMotivoBanimento = ?";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindParam(1, $idMotivo);
        $stmt->execute();

        $res = $stmt->fetch(\PDO::FETCH_OBJ);

        return $res->motivo;
    }

}