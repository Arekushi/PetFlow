<?php
    
namespace app\crud;

class PostDao {

    public static function create(\app\model\Post $post) {
        $sql = "INSERT INTO tbpostagem (idUsuario, descricaoPostagem, dataPostagem, idAnimal, imagemPostagem, visibilidade) 
            VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $post->getIdUsuario());
        $stmt->bindValue(2, $post->getDescricaoPostagem());
        $stmt->bindValue(3, $post->getDataPostagem());
        $stmt->bindValue(4, $post->getIdAnimal());
        $stmt->bindValue(5, $post->getImagemPostagem());
        $stmt->bindValue(6, $post->getVisibilidade());
        $stmt->execute();

        return \app\model\Conexao::getConexao()->lastInsertId();
    }

    public static function selectPosts() {
        $sql = "SELECT * FROM tbpostagem";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        } else {
            return [];
        }
    }

    public static function selectPostsIndex() {
        $sql = "SELECT idPostagem, descricaoPostagem, dataPostagem
                    , tbpostagem.idUsuario, fotoAnimal
                    , nomeAnimal, tbpostagem.idAnimal
                    , imagemPostagem, fotoUsuario, nomeUsuario
                    FROM tbpostagem
                    INNER JOIN tbanimal on tbpostagem.idAnimal = tbanimal.idAnimal
                    INNER JOIN tbusuario on tbpostagem.idUsuario = tbusuario.idUsuario
                        WHERE tbpostagem.visibilidade = ? AND tbanimal.visibilidade = ?
                            ORDER BY idPostagem DESC";

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

    public static function selectPostsIndexById($idAnimal) {
        $sql = "SELECT idPostagem, descricaoPostagem, dataPostagem
                    , tbpostagem.idUsuario, fotoAnimal
                    , nomeAnimal, tbpostagem.idAnimal
                    , imagemPostagem, fotoUsuario, nomeUsuario
                    FROM tbpostagem
                    INNER JOIN tbanimal on tbpostagem.idAnimal = tbanimal.idAnimal
                    INNER JOIN tbusuario on tbpostagem.idUsuario = tbusuario.idUsuario
                        WHERE tbpostagem.visibilidade = ? AND tbpostagem.idAnimal = ?
                            ORDER BY idPostagem DESC";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, 1);
        $stmt->bindValue(2, $idAnimal);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        } else {
            return [];
        }
    }

    public static function selectPostsVisiveis() {
        $sql = "SELECT * FROM tbpostagem WHERE visibilidade = ? ORDER BY idPostagem DESC";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, 1);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        } else {
            return [];
        }
    }

    public static function selectPostsInvisiveis() {
        $sql = "SELECT * FROM tbpostagem WHERE visibilidade = ? ORDER BY idPostagem DESC";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, 0);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        } else {
            return [];
        }
    }

    public static function selectPostsVisiveisNotDenunciado() {
        $sql = "SELECT tbpostagem.idUsuario as codUsuario, 
                descricaoPostagem, imagemPostagem, tbpostagem.idPostagem as idPostagem,
                tbusuario.nomeUsuario as nomeUsuario, tbusuario.fotoUsuario as fotoUsuario FROM tbpostagem

                    INNER JOIN tbusuario on tbpostagem.idUsuario = tbusuario.idUsuario
                        WHERE visibilidade = ?
                        ORDER BY idPostagem DESC";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, 1);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        } else {
            return [];
        }
    }

    public static function selectPostsVisiveisDenunciado() {
        $sql = "SELECT tbpostagem.idUsuario as codUsuario, 
                descricaoPostagem, imagemPostagem, tbpostagem.idPostagem as idPostagem,
                tbusuario.nomeUsuario as nomeUsuario, tbusuario.fotoUsuario as fotoUsuario FROM tbpostagem

                    INNER JOIN tbusuario on tbpostagem.idUsuario = tbusuario.idUsuario
                    INNER JOIN tbdenunciapost on tbdenunciapost.idPost = tbpostagem.idpostagem
                        WHERE visibilidade = ? AND tbdenunciapost.statusDenuncia = ?
                        ORDER BY idPostagem DESC";

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
    
    public static function getPostById($idPost) {
        $sql = "SELECT * FROM tbpostagem WHERE idPostagem = ?";
        
        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindParam(1, $idPost);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        } else {
            return [];
        }
    }

    public static function getDono($idUsuario, $idPost) {
        $sql = "SELECT idPostagem FROM tbpostagem
                    INNER JOIN tbanimal on tbpostagem.idUsuario = tbanimal.idUsuario
                        WHERE idPostagem = ? AND tbpostagem.idUsuario = ?";
        
        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindParam(1, $idPost);
        $stmt->bindParam(2, $idUsuario);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function setPostVisivel($idPost) {
        $sql = "UPDATE tbpostagem SET visibilidade = ? WHERE idPostagem = ?";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, 1);
        $stmt->bindValue(2, $idPost);
        $stmt->execute();
    }

    public static function setPostInvisivel($idPost) {
        $sql = "UPDATE tbpostagem SET visibilidade = ? WHERE idPostagem = ?";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, 0);
        $stmt->bindValue(2, $idPost);
        $stmt->execute();
    }

    public static function setFotoPostagem($foto, $id) {
        $sql = "UPDATE tbpostagem SET imagemPostagem = ? WHERE idPostagem = ?";
        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $foto);
        $stmt->bindValue(2, $id);
        $stmt->execute();
    }

    /* PDF */

    public static function selectPostsMes() {
        $sql = "SELECT * FROM tbpostagem WHERE MONTH(dataPostagem) = MONTH(CURDATE())";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->rowCount();
        } else {
            return 0;
        }
    }

    public static function selectPostsSemana() {
        $sql = "SELECT * FROM tbpostagem WHERE WEEK(dataPostagem) = WEEK(CURDATE())";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->rowCount();
        } else {
            return 0;
        }
    }

    public static function selectPostsDia() {
        $sql = "SELECT * FROM tbpostagem WHERE DAY(dataPostagem) = DAY(CURDATE())";

        $stmt = \app\model\Conexao::getConexao()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->rowCount();
        } else {
            return 0;
        }
    }
}