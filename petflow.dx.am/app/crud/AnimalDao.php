<?php

namespace app\crud;

class AnimalDao {

    public static function create(\app\model\Animal $animal) {
        $instrucaoSQL = "INSERT INTO tbanimal (nomeAnimal, racaAnimal, 
        tipoAnimal, dataAniversario, idadeAnimal, disponivelAdocao, fotoAnimal, visibilidade, dataCriacaoConta, idUsuario) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = \app\model\Conexao::getConexao()->prepare($instrucaoSQL);

        $stmt->bindValue(1, $animal->getNomeAnimal());
        $stmt->bindValue(2, $animal->getRacaAnimal());
        $stmt->bindValue(3, $animal->getTipoAnimal());
        $stmt->bindValue(4, $animal->getDataAniversario());
        $stmt->bindValue(5, $animal->getIdadeAnimal());
        $stmt->bindValue(6, $animal->getDisponivelAdocao());
        $stmt->bindValue(7, $animal->getFotoAnimal());
        $stmt->bindValue(8, $animal->getVisibilidade());
        $stmt->bindValue(9, $animal->getDataCriacaoConta());
        $stmt->bindValue(10, $animal->getIdUsuario());

        $stmt->execute();
        return \app\model\Conexao::getConexao()->lastInsertId();
    }

    public static function read($idUsuario) {
        $sql = "SELECT * FROM tbanimal WHERE idUsuario = ? AND visibilidade = ?";
        $stmt = \app\model\Conexao::getConexao()->prepare($sql);

        $stmt->bindValue(1, $idUsuario);
        $stmt->bindValue(2, 1);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }else {
            return [];
        }
    }

    public static function selectAnimais() {
        $sql = "SELECT * FROM tbanimal";
        
        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }else {
            return [];
        }
    }

    public static function selectEscolhaAnimal($idUsuario) {
        $sql = "SELECT tbanimal.idanimal as codanimal, fotoAnimal, nomeAnimal FROM tbanimal
                    INNER JOIN tbseguidoranimal on tbanimal.idanimal = tbseguidoranimal.idanimal
                        WHERE tbseguidoranimal.idUsuario = ? AND visibilidade = ?
                        
                UNION ALL
                        
                SELECT tbanimal.idanimal as codanimal, fotoAnimal, nomeAnimal FROM tbanimal
                        WHERE tbanimal.idusuario = ? AND visibilidade = ?";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $idUsuario);
        $stmt->bindValue(2, 1);
        $stmt->bindValue(3, $idUsuario);
        $stmt->bindValue(4, 1);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        } else {
            return [];
        }
    }

    public static function selectAnimaisByVisibilidade($valor) {
        $sql = "SELECT * FROM tbanimal WHERE visibilidade = ?";
        
        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $valor);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        } else {
            return [];
        }
    }

    public static function selectAnimaisNot($id) {
        $sql = "SELECT * FROM tbanimal WHERE idUsuario <> ? AND visibilidade = ?";
        
        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->bindValue(2, 1);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }else {
            return [];
        }
    }

    public static function getAnimaisDenunciados() {
        $sql = "SELECT nomeAnimal, fotoAnimal, tbanimal.idAnimal as idAnimal, tbusuario.idUsuario as idUsuario FROM tbanimal
                        INNER JOIN tbusuario on tbanimal.idUsuario = tbusuario.idUsuario
                                WHERE visibilidade = ? and tbanimal.idAnimal NOT IN (SELECT idAnimal FROM tbdenunciaanimal WHERE statusDenuncia = ?)";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, 1);
        $stmt->bindValue(2, 1);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        } else {
            return [];
        }
    }
    
    public static function getAnimaisNotDenunciados() {
        $sql = "SELECT nomeAnimal, fotoAnimal, tbanimal.idAnimal as idAnimal, tbusuario.idUsuario as idUsuario FROM tbanimal
                    INNER JOIN tbusuario on tbanimal.idUsuario = tbusuario.idUsuario
                            WHERE visibilidade = ? and tbanimal.idAnimal IN (SELECT idAnimal FROM tbdenunciaanimal WHERE statusDenuncia = ?)";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, 1);
        $stmt->bindValue(2, 1);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        } else {
            return [];
        }
    }

    public static function getAnimalById($idAnimal) {
        $sql = "SELECT * FROM tbanimal WHERE idAnimal = ?";
        
        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindParam(1, $idAnimal);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->fetch(\PDO::FETCH_OBJ);
        }else {
            return [];
        }
    }

    public static function getAnimalDonoById($idAnimal) {
        $sql = "SELECT tbanimal.idanimal as codAnimal, tbanimal.idadeAnimal as idade,
                    fotoAnimal, fotoUsuario, nomeAnimal, nomeUsuario, cidade, estado FROM tbanimal 
                    INNER JOIN tbusuario on tbanimal.idusuario = tbusuario.idusuario
                        WHERE idAnimal = ?";
        
        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindParam(1, $idAnimal);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        } else {
            return [];
        }
    }

    public static function verificaDono($idAnimal, $idUsuario) {
        $sql = "SELECT * FROM tbanimal WHERE idAnimal = ? AND idUsuario = ?";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindParam(1, $idAnimal);
        $stmt->bindParam(2, $idUsuario);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function setVibilidadeAnimal($idAnimal, $valor) {
        $sql = "UPDATE tbanimal SET visibilidade = ? WHERE idAnimal = ?";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindParam(1, $valor);
        $stmt->bindParam(2, $idAnimal);
        $stmt->execute();
    }

    /* PDF */

    public static function readMes() {
        $sql = "SELECT * FROM tbanimal WHERE visibilidade = ? AND MONTH(dataCriacaoConta) = MONTH(CURDATE())";
        $stmt = \app\model\Conexao::getConexao()->prepare($sql);

        $stmt->bindValue(1, 1);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->rowCount();
        } else {
            return 0;
        }
    }

    public static function readSemana() {
        $sql = "SELECT * FROM tbanimal WHERE visibilidade = ? AND WEEK(dataCriacaoConta) = WEEK(CURDATE())";
        $stmt = \app\model\Conexao::getConexao()->prepare($sql);

        $stmt->bindValue(1, 1);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->rowCount();
        } else {
            return 0;
        }
    }

    public static function readDia() {
        $sql = "SELECT * FROM tbanimal WHERE visibilidade = ? AND DAY(dataCriacaoConta) = DAY(CURDATE())";
        $stmt = \app\model\Conexao::getConexao()->prepare($sql);

        $stmt->bindValue(1, 1);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->rowCount();
        } else {
            return 0;
        }
    }
}