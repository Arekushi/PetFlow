<?php

namespace app\model;

class Like {

    // Atributos
        private $idLike;
        private $idUsuario;
        private $idPostagem;
    
    // GETTERS
        public function getIdLike() {
            return $this->idLike;
        }

        public function getIdUsuario() {
            return $this->idUsuario;
        }

        public function getIdPostagem() {
            return $this->idPostagem;
        }

    // SETTERS
        public function setIdLike($idLike) {
            $this->idLike = $idLike;
        }

        public function setIdUsuario($idUsuario) {
            $this->idUsuario = $idUsuario;
        }

        public function setIdPostagem($idPostagem) {
            $this->idPostagem = $idPostagem;
        }
}