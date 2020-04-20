<?php

namespace app\model;

class Comentario {

    private $idComentario;
    private $descricaoComentario;
    private $idUsuario;
    private $idPostagem;
    private $visibilidade;

    // GETTERS
        public function getIdComentario() {
            return $this->idComentario;
        }
    
        public function getDescricaoComentario() {
            return $this->descricaoComentario;
        }

        public function getiDUsuario() {
            return $this->idUsuario;
        }

        public function getIdPostagem() {
            return $this->idPostagem;
        }

        public function getVisibilidade() {
            return $this->visibilidade;
        }
        
    // SETTERS     
        public function setIdComentario($idComentario) {
            $this->idComentario = $idComentario;
        }

        public function setDescricaoComentario($descricaoComentario) {
            $this->descricaoComentario = $descricaoComentario;
        }

        public function setiDUsuario($idUsuario) {
            $this->dUsuario = $idUsuario;
        }

        public function setIdPostagem($idPostagem) {
            $this->idPostagem = $idPostagem;
        }

        public function setVisibilidade($visibilidade) {
            $this->visibilidade = $visibilidade;
        }
}