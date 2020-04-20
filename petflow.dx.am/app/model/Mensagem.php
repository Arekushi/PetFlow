<?php

namespace app\model;

class Mensagem {

    // Atributos
        private $idMensagem;
        private $descricaoMensagem;
        private $emailMensagem;
        private $nomeMensagem;

    // GETTERS
        public function getIdMensagem() {
            return $this->idMensagem;
        }

        public function getDescricaoMensagem() {
            return $this->descricaoMensagem;
        }

        public function getEmailMensagem() {
            return $this->emailMensagem;
        }

        public function getNomeMensagem() {
            return $this->nomeMensagem;
        }

    
    // SETTERS
        public function setIdMensagem($idMensagem) {
            $this->idMensagem = $idMensagem;
        }

        public function setDescricaoMensagem($descricaoMensagem) {
            $this->descricaoMensagem = $descricaoMensagem;
        }

        public function setEmailMensagem($emailMensagem) {
            $this->emailMensagem = $emailMensagem;
        }

        public function setNomeMensagem($nomeMensagem) {
            $this->nomeMensagem = $nomeMensagem;
        }
}