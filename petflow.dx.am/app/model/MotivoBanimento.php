<?php

namespace app\model;

class MotivoBanimento {

    // Atributos
        private $idMotivoBanimento;
        private $motivo;

    // GETTERS
        public function getIdMotivoBanimento() {
            return $this->idMotivoBanimento;
        }

        public function getMotivo(){
            return $this->motivo;
        }

    // SETTERS
        public function setIdMotivo($id) {
            $this->idMotivoBanimento = $id;
        }

        public function setMotivo($motivo) {
            $this->motivo = $motivo;
        }

}