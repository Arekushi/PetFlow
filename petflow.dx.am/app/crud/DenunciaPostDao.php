<?php

namespace app\crud;

class DenunciaPostDao {

    public static function insertDenuncia(\app\model\DenunciaPost $denuncia) {
        $sql = "INSERT INTO tbdenunciapost(idUsuario, idPost, statusDenuncia)
                    VALUES(?, ?, ?)";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $denuncia->getIdUsuario());
        $stmt->bindValue(2, $denuncia->getIdPost());
        $stmt->bindValue(3, $denuncia->getStatusDenuncia());
        $stmt->execute();
                    
    }

    public static function selectDenuncia() {
        $sql = "SELECT * FROM tbdenunciapost";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $resultado = $stmt->fetchAll(\PDO::FETCH_OBJ);
            return $resultado;

        } else {
            return [];
        }
    }

    public static function retiraDenuncia($idPost) {
        $sql = "UPDATE tbdenunciapost SET statusDenuncia = ? WHERE idPost = ?";
        
        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, 0);
        $stmt->bindValue(2, $idPost);
        $stmt->execute();
    }

    public static function verificaDenunciaPost($idPost, $idUsuario) {
        $sql = "SELECT * FROM tbdenunciapost WHERE idPost = ? AND idUsuario = ? AND statusDenuncia = ?";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $idPost);
        $stmt->bindValue(2, $idUsuario);
        $stmt->bindValue(3, 1);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;

        } else {
            return false;
        }
    }

    public static function setarDenuncia($idPost) {
        $sql = "UPDATE tbdenunciapost SET statusDenuncia = ? WHERE idPost = ?";
        
        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, 1);
        $stmt->bindValue(2, $idPost);
        $stmt->execute();
    }

}    