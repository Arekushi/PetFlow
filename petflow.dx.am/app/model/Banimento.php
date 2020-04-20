<?php

namespace app\model;

class Banimento {

    // Atributos
        private $idBanimento;
        private $idBanidor;
        private $idUsuario;
        private $inicio_banimento;
        private $fim_banimento;
        private $idMotivo;
        private $status;

    // GETTERS
        public function getIdBanimento() {
            return $this->idBanimento;
        }

        public function getIdBanidor() {
            return $this->idBanidor;
        }

        public function getIdUsuario() {
            return $this->idUsuario;
        }

        public function getInicio_banimento() {
            return $this->inicio_banimento;
        }

        public function getFim_banimento() {
            return $this->fim_banimento;
        }

        public function getIdMotivo() {
            return $this->idMotivo;
        }

        public function getStatus() {
            return $this->status;
        }


    // SETTERS
        public function setIdBanimento($idBanimento) {
            $this->idBanimento = $idBanimento;
        }

        public function setIdBanidor($idBanidor) {
            $this->idBanidor = $idBanidor;
        }

        public function setIdUsuario($idUsuario) {
            $this->idUsuario = $idUsuario;
        }

        public function setInicio_banimento($inicio_banimento) {
            $this->inicio_banimento = $inicio_banimento;
        }

        public function setFim_banimento($fim_banimento) {
            $this->fim_banimento = $fim_banimento;
        }

        public function setIdMotivo($idMotivo) {
            $this->idMotivo = $idMotivo;
        }

        public function setStatus($status) {
            $this->status = $status;
        }

}