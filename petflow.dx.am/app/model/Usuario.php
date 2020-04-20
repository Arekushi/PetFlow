<?php

namespace app\model;

class Usuario {
    
    /* Atributos */
        private $idUsuario;
        private $nomeUsuario;
        private $dataNascimento;
        private $cidade;
        private $estado;
        private $emailUsuario;
        private $senhaUsuario;
        private $fotoUsuario;
        private $dataCriacaoConta;
        private $online;
        private $confirmaEmail;
        private $tipoUsuario;

    /* GETTERS */
        function getIdUsuario() {
            return $this->idUsuario;
        }

        function getNomeUsuario() {
            return $this->nomeUsuario;
        }

        function getDataNascimentoUsuario() {
            return $this->dataNascimento;
        }

        function getCidade() {
            return $this->cidade;
        }

        function getEstado() {
            return $this->estado;
        }

        function getEmailUsuario() {
            return $this->emailUsuario;
        }

        function getSenhaUsuario() {
            return $this->senhaUsuario;
        }

        function getFotoUsuario() {
            return $this->fotoUsuario;
        }

        public function getDataCriacaoConta() {
            return $this->dataCriacaoConta;
        }

        function getOnline() {
            return $this->online;
        }

        public function getConfirmaEmail() {
            return $this->confirmaEmail;
        }

        function getTipoUsuario() {
            return $this->tipoUsuario;
        }

    /* SETTERS */
        function setIdUsuario($idUsuario) {
            $this->idUsuario = $idUsuario;
        }

        function setNomeUsuario($nomeUsuario) {
            $this->nomeUsuario = $nomeUsuario;
        }

        function setDataNascimento($dataNascimento) {
            $this->dataNascimento = $dataNascimento;
        }

        function setCidade($cidade) {
            $this->cidade = $cidade;
        }

        function setEstado($estado) {
            $this->estado = $estado;
        }

        function setEmailUsuario($emailUsuario) {
            $this->emailUsuario = $emailUsuario;
        }

        function setSenhaUsuario($senhaUsuario) {
            $this->senhaUsuario = $senhaUsuario;
        }

        function setFotoUsuario($fotoUsuario) {
            $this->fotoUsuario = $fotoUsuario;
        }

        public function setDataCriacaoConta($dataCriacaoConta) {
            $this->dataCriacaoConta = $dataCriacaoConta;
        }

        function setOnline($online) {
            $this->online = $online;
        }

        public function setConfirmaEmail($confirmaEmail) {
            $this->confirmaEmail = $confirmaEmail;
        }

        function setTipoUsuario($tipoUsuario) {
            $this->tipoUsuario = $tipoUsuario;
        }

}