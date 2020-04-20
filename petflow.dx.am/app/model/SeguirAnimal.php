<?php

namespace app\model;

class SeguirAnimal {

    /* Atributos */
        private $idSeguidorAnimal;
        private $idUsuario;
        private $idAnimal;

    /* GET */
        public function getIdSeguidorAnimal() {
            return $this->idSeguidorAnimal;
        }

        public function getIdUsuario() {
            return $this->idUsuario;
        }

        public function getIdAnimal() {
            return $this->idAnimal;
        }

    /* SET */
        public function setIdSeguidorAnimal($idSeguirdorAnimal) {
            $this->idSeguidorAnimal = $idSeguirdorAnimal;
        }

        public function setIdUsuario($idUsuario) {
            $this->idUsuario = $idUsuario;
        }

        public function setIdAnimal($idAnimal) {
            $this->idAnimal = $idAnimal;
        }
}