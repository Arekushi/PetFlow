<?php

namespace app\crud;

class BanimentoDao {

    /* INSERT */
    public static function insert(\app\model\Banimento $ban) {
        $sql = "INSERT INTO tbbanimento (idBanidor, idUsuario, inicio_banimento, fim_banimento, idMotivo, status) 
                    VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = \app\model\Conexao::getConexao()->prepare($sql);

        $stmt->bindValue(1, $ban->getIdBanidor());
        $stmt->bindValue(2, $ban->getIdUsuario());
        $stmt->bindValue(3, $ban->getInicio_banimento());
        $stmt->bindValue(4, $ban->getFim_banimento());
        $stmt->bindValue(5, $ban->getIdMotivo());
        $stmt->bindValue(6, $ban->getStatus());
        $stmt->execute();
    }

    /* SELECT */
    public static function getBanidos($status) {
        $sql = "SELECT * FROM tbbanimento WHERE status = ?";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $status);
        
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        } else {
            return [];
        }
    }

    public static function pegarStatus($idUsuario) {
        $sql = "SELECT idMotivo, status, fim_banimento FROM tbbanimento WHERE idUsuario = ? AND status = ?";
        $stmt = \app\model\Conexao::getConexao()->prepare($sql);

        $stmt->bindValue(1, $idUsuario);
        $stmt->bindValue(2, 1);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(\PDO::FETCH_OBJ);
        } else {
            return [];
        }
    }

    public static function alterarStatus($idUsuario) {
        $sql = "UPDATE tbbanimento SET status = ? WHERE idUsuario = ?";
        $stmt = \app\model\Conexao::getConexao()->prepare($sql);

        $stmt->bindValue(1, 0);
        $stmt->bindValue(2, $idUsuario);

        $stmt->execute();
    }

    public static function alterarStatus2($idBanimento) {
        $sql = "UPDATE tbbanimento SET status = ? WHERE idBanimento = ?";
        $stmt = \app\model\Conexao::getConexao()->prepare($sql);

        $stmt->bindValue(1, 0);
        $stmt->bindValue(2, $idBanimento);

        $stmt->execute();
    }


    public static function remove($idUsuario) {
        $sql = "DELETE FROM tbbanimento WHERE idUsuario = ?";
        $stmt = \app\model\Conexao::getConexao()->prepare($sql);

        $stmt->bindValue(1, $idUsuario);
        $stmt->execute();
    }

    /* PDF */

    /* MES */
    public static function getBanidosMes() {
        $sql = "SELECT * FROM tbbanimento WHERE MONTH(inicio_banimento) = MONTH(CURDATE())";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->rowCount();
        } else {
            return 0;
        }
    }

    /* Semana */
    public static function getBanidosSemana() {
        $sql = "SELECT * FROM tbbanimento WHERE WEEK(inicio_banimento) = WEEK(CURDATE())";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->rowCount();
        } else {
            return 0;
        }
    }

    /* Semana */
    public static function getBanidosDia() {
        $sql = "SELECT * FROM tbbanimento WHERE DAY(inicio_banimento) = DAY(CURDATE())";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->rowCount();
        } else {
            return 0;
        }
    }
}