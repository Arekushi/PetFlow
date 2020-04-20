<?php

namespace app\model;

class Deslike {

    // Atributos
        private $idDeslike;
        private $idUsuario;
        private $idPostagem;

    // GETTERS
        public function getIdDeslike() {
            return $this->idDeslike;
        }

        public function getIdUsuario() {
            return $this->idUsuario;
        }

        public function getIdPostagem() {
            return $this->idPostagem;
        }

    // SETTERS
        public function setIdDeslike($idDeslike) {
            $this->idDeslike = $idDeslike;
        }

        public function setIdUsuario($idUsuario) {
            $this->idUsuario = $idUsuario;
        }

        public function setIdPostagem($idPostagem) {
            $this->idPostagem = $idPostagem;
        }
}