<?php

namespace app\model;

class DenunciaAnimal {

    // Atributos
        private $idDenuncia;
        private $idUsuario;
        private $idAnimal;
        private $statusDenuncia;

    // GETTERS
        public function getIdDenuncia() {
                return $this->idDenuncia;
        }

        public function getIdUsuario() {
                return $this->idUsuario;
        }

        public function getIdAnimal(){
                return $this->idAnimal;
        }

        public function getStatusDenuncia(){
                return $this->statusDenuncia;
        }

    // SETTERS
        public function setIdDenuncia($idDenuncia) {
                $this->idDenuncia = $idDenuncia;
        }

        public function setIdUsuario($idUsuario) {
                $this->idUsuario = $idUsuario;
        }

        public function setIdAnimal($idAnimal) {
                $this->idAnimal = $idAnimal;
        }

        public function setStatusDenuncia($statusDenuncia){
                $this->statusDenuncia = $statusDenuncia;
        }
}