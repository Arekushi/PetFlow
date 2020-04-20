<?php

namespace app\model;

class NotificacaoAdm {

    // Atributos
        private $idNotificacaoAdm;
        private $mensagem;
        private $idUsuario;
        private $idAdm;
        private $dataEnvio;
        private $visualizado;

    // GETTERS
        public function getIdNotificacaoAdm() {
                return $this->idNotificacaoAdm;
        }

        public function getMensagem() {
                return $this->mensagem;
        }

        public function getIdUsuario() {
                return $this->idUsuario;
        }

        public function getIdAdm() {
                return $this->idAdm;
        }

        public function getDataEnvio() {
                return $this->dataEnvio;
        }

        public function getVisualizado() {
                return $this->visualizado;
        }

    // SETTERS
        public function setIdNotificacaoAdm($idNotificacaoAdm) {
                $this->idNotificacaoAdm = $idNotificacaoAdm;
        }

        public function setMensagem($mensagem) {
                $this->mensagem = $mensagem;
        }

        public function setIdUsuario($idUsuario) {
                $this->idUsuario = $idUsuario;
        }

        public function setIdAdm($idAdm) {
                $this->idAdm = $idAdm;
        }

        public function setDataEnvio($dataEnvio) {
                $this->dataEnvio = $dataEnvio;
        }

        public function setVisualizado($visualizado) {
                $this->visualizado = $visualizado;
        }
}