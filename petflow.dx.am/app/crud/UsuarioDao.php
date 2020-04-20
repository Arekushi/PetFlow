<?php

namespace app\crud;

use app\model\Usuario;
use DateTime;

class UsuarioDao {
    
    // Insert
    public static function insert(\app\model\Usuario $usuario) {
        $instrucaoSQL = "INSERT INTO tbusuario (nomeUsuario, dataNascimento, cidade, 
                        estado, emailUsuario, senhaUsuario, fotoUsuario, dataCriacaoConta, online, confirmaEmail, TipoUsuario) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = \app\model\Conexao::getConexao()->prepare($instrucaoSQL);

        $stmt->bindValue(1, $usuario->getNomeUsuario());
        $stmt->bindValue(2, $usuario->getDataNascimentoUsuario());
        $stmt->bindValue(3, $usuario->getCidade());
        $stmt->bindValue(4, $usuario->getEstado());
        $stmt->bindValue(5, $usuario->getEmailUsuario());
        $stmt->bindValue(6, $usuario->getSenhaUsuario());
        $stmt->bindValue(7, $usuario->getFotoUsuario());
        $stmt->bindValue(8, $usuario->getDataCriacaoConta());
        $stmt->bindValue(9, $usuario->getOnline());
        $stmt->bindValue(10, $usuario->getConfirmaEmail());
        $stmt->bindValue(11, $usuario->getTipoUsuario());

        $stmt->execute();
        return \app\model\Conexao::getConexao()->lastInsertId();
    }

    // Todos os Usuarios
    public static function getUsuarios() {
        $sql = "SELECT * FROM tbusuario";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $resultado = $stmt->fetchAll(\PDO::FETCH_OBJ);
            return $resultado;

        } else {
            return [];
        }
    }

    /* Pegar usuarios pelo tipo */
    public static function getUsuarioByTipo($tipo) {
        $sql = "SELECT * FROM tbusuario 
                        WHERE tipoUsuario = ?
                        AND idUsuario NOT IN (SELECT idUsuario FROM tbbanimento WHERE status = 1)";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $tipo);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $resultado = $stmt->fetchAll(\PDO::FETCH_OBJ);
            return $resultado;

        } else {
            return [];
        }
    }

    // Apenas um usuario
    public static function getUsuarioById($idUsuario) {
        $sql = "SELECT * FROM tbusuario WHERE idUsuario = ?";
        
        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $idUsuario);
        $stmt->execute();

        $user = new \app\model\Usuario();
        
        while($linha = $stmt->fetch(\PDO::FETCH_OBJ)){
            $user->setIdUsuario($linha->idUsuario);
            $user->setNomeUsuario($linha->nomeUsuario);
            $user->setDataNascimento($linha->dataNascimento);
            $user->setCidade($linha->cidade);
            $user->setEstado($linha->estado);
            $user->setEmailUsuario($linha->emailUsuario);
            $user->setSenhaUsuario($linha->senhaUsuario);
            $user->setFotoUsuario($linha->fotoUsuario);
            $user->setDataCriacaoConta($linha->dataCriacaoConta);
            $user->setOnline($linha->online);
            $user->setConfirmaEmail($linha->confirmaEmail);
            $user->setTipoUsuario($linha->tipoUsuario);
        }

        return $user;
    }

    public static function getUsuarioByEmailMD5($emailMD5) {
        $sql = "SELECT * FROM tbusuario WHERE MD5(emailUsuario) = ?";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $emailMD5);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $resultado = $stmt->fetch(\PDO::FETCH_OBJ);
            return $resultado;

        } else {
            return [];
        }
    }

    // Tipo de um usuario
    public static function getTipoUsuario($idUsuario) {
        $sql = "SELECT tipoUsuario FROM tbusuario WHERE idUsuario = ?";
        
        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $idUsuario);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $resultado = $stmt->fetch(\PDO::FETCH_OBJ);
            return $resultado;

        } else {
            return [];
        }
    }

    // Usuarios Online
    public static function getUsersOnline() {
        $sql = "SELECT * FROM tbusuario WHERE online = 1";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $resultado = $stmt->fetchAll(\PDO::FETCH_OBJ);
            return $resultado;

        } else {
            return [];
        }

    }
 
    // Usuarios Offline
    public static function getUsersOffline() {
        $sql = "SELECT * FROM tbusuario WHERE online = 0";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $resultado = $stmt->fetchAll(\PDO::FETCH_OBJ);
            return $resultado;

        } else {
            return [];
        }

    }

    public static function getSeguidores($idAnimal) {
        $sql = "SELECT * FROM tbusuario
                    INNER JOIN tbseguidoranimal on tbusuario.idUsuario = tbseguidoranimal.idUsuario
                        WHERE tbseguidoranimal.idAnimal = ?";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $idAnimal);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $resultado = $stmt->fetchAll(\PDO::FETCH_OBJ);
            return $resultado;

        } else {
            return [];
        }
    }

    public static function tornarModerador($idUsuario) {
        $sql = "UPDATE tbusuario SET tipoUsuario = 2 WHERE idUsuario = ?";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindParam(1, $idUsuario);
        $stmt->execute();
    }

    public static function removerModerador($idUsuario) {
        $sql = "UPDATE tbusuario SET tipoUsuario = 1 WHERE idUsuario = ?";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindParam(1, $idUsuario);
        $stmt->execute();
    }
 
    public static function validaLogin($email, $senha) {
        $sql = "SELECT * FROM tbusuario WHERE emailUsuario = ? AND senhaUsuario = ?";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, $senha);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(\PDO::FETCH_OBJ);

        } else {
            return [];
        }
    }

    public static function getConfirmaEmail($idUsuario, $senhaUsuario) {
        $sql = "SELECT idusuario FROM tbusuario 
                    WHERE confirmaEmail = ? AND MD5(idUsuario) = ? AND senhaUsuario = ?";
        $stmt = \app\model\Conexao::getConexao()->prepare($sql);

        $stmt->bindValue(1, 0);
        $stmt->bindValue(2, $idUsuario);
        $stmt->bindValue(3, $senhaUsuario);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $resultado = $stmt->fetch(\PDO::FETCH_OBJ);
            return $resultado;

        } else {
            return [];
        }
    }

    public static function verificaEmailExiste($email) {
        $sql = "SELECT * FROM tbusuario WHERE emailUsuario = ?";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindParam(1, $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $resultado = $stmt->fetch(\PDO::FETCH_OBJ);
            return $resultado;

        } else {
            return [];
        }
    }


    // Update
    public static function setOnline($idUsuario, $estado) {
        $sql = "UPDATE tbusuario SET online = ? WHERE idUsuario = ?";
        $stmt = \app\model\Conexao::getConexao()->prepare($sql);

        $stmt->bindValue(1, $estado);
        $stmt->bindValue(2, $idUsuario);
        $stmt->execute();
    }

    public static function setConfirmaEmail($idUsuario) {
        $sql = "UPDATE tbusuario SET confirmaEmail = 1 WHERE MD5(idUsuario) = ?";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $idUsuario);
        $stmt->execute();
    }

    public static function esqueciSenha($id, $novaSenha) {
        $SQL = "UPDATE tbusuario
                    SET senhaUsuario = ?
                    WHERE MD5(idUsuario) = ?";

        $stmt = \app\model\Conexao::getConexao()->prepare($SQL);
        $stmt->bindParam(1, $novaSenha);
        $stmt->bindParam(2, $id);
        $stmt->execute();
    }

    /* PDF */

    // Todos os Usuarios - mês
    public static function getUsuariosMes() {
        $sql = "SELECT * FROM tbusuario WHERE MONTH(dataCriacaoConta) = MONTH(CURDATE())";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->rowCount();

        } else {
            return 0;
        }
    }

    public static function getUsuariosSemana() {
        $sql = "SELECT * FROM tbusuario WHERE WEEK(dataCriacaoConta) = WEEK(CURDATE())";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->rowCount();

        } else {
            return 0;
        }
    }

    // Todos os Usuarios - mês
    public static function getUsuariosDia() {
        $sql = "SELECT * FROM tbusuario WHERE DAY(dataCriacaoConta) = DAY(CURDATE())";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->rowCount();

        } else {
            return 0;
        }
    }
}
?>