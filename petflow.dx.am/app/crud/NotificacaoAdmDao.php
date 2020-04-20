<?php

namespace app\crud;

class NotificacaoAdmDao {

    // Insert
    public static function insertNotificationAdm(\app\model\NotificacaoAdm $news) {
        $sql = "INSERT INTO tbnotificacaoadm(mensagem, idUsuario, idAdm, dataEnvio, visualizado)
                    VALUES(?, ?, ?, ?, ?)";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $news->getMensagem());
        $stmt->bindValue(2, $news->getIdUsuario());
        $stmt->bindValue(3, $news->getIdAdm());
        $stmt->bindValue(4, $news->getDataEnvio());
        $stmt->bindValue(5, $news->getVisualizado());
        $stmt->execute();

    }

    public static function readNorifications() {
        $sql = "SELECT * FROM tbnotificacaoadm";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_OBJ);

        } else {
            return [];
        }
    }
    
}