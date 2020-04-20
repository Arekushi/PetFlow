<?php

namespace app\crud;

class DenunciaAnimalDao {

    public static function insertDenuncia(\app\model\DenunciaAnimal $denuncia) {
        $sql = "INSERT INTO tbdenunciaanimal(idUsuario, idAnimal, statusDenuncia)
                    VALUES(?, ?, ?)";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $denuncia->getIdUsuario());
        $stmt->bindValue(2, $denuncia->getIdAnimal());
        $stmt->bindValue(3, $denuncia->getStatusDenuncia());
        $stmt->execute();
                    
    }

    public static function verificaDenunciaPost($idAnimal, $idUsuario) {
        $sql = "SELECT * FROM tbdenunciaanimal WHERE idAnimal = ? AND idUsuario = ? AND statusDenuncia = ?";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $idAnimal);
        $stmt->bindValue(2, $idUsuario);
        $stmt->bindValue(3, 1);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;

        } else {
            return false;
        }
    }

    public static function selectDenunciaAnimal() {
        $sql = "SELECT * FROM tbdenunciaanimal";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_OBJ);

        } else {
            return [];
        }
    }

    public static function retiraDenuncia($idAnimal) {
        $sql = "UPDATE tbdenunciaanimal SET statusDenuncia = ? WHERE idAnimal = ?";
        
        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, 0);
        $stmt->bindValue(2, $idAnimal);
        $stmt->execute();
    }

    public static function setarDenuncia($idAnimal) {
        $sql = "UPDATE tbdenunciaanimal SET statusDenuncia = ? WHERE idAnimal = ?";
        
        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, 1);
        $stmt->bindValue(2, $idAnimal);
        $stmt->execute();
    }

}    