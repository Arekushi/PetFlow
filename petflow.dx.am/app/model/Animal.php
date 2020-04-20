<?php

namespace app\model;

class Animal {

    // Atributos
        private $idAnimal;
        private $nomeAnimal;
        private $racaAnimal;
        private $tipoAnimal;
        private $dataAniversario;
        private $idadeAnimal;
        private $disponivelAdocao;
        private $fotoAnimal;
        private $visibilidade;
        private $dataCriacaoConta;
        private $idUsuario;

    // GETTERS
        public function getId() {
            return $this->idAnimal;
        }

        public function getNomeAnimal() {
            return $this->nomeAnimal;
        }

        public function getRacaAnimal() {
            return $this->racaAnimal;
        }

        public function getTipoAnimal() {
            return $this->tipoAnimal;
        }

        public function getDataAniversario() {
            return $this->dataAniversario;
        }

        public function getIdadeAnimal() {
            return $this->idadeAnimal;
        }

        public function getDisponivelAdocao() {
            return $this->disponivelAdocao;
        }

        public function getFotoAnimal() {
            return $this->fotoAnimal;
        }

        public function getVisibilidade() {
            return $this->visibilidade;
        }

        public function getDataCriacaoConta() {
            return $this->dataCriacaoConta;
        }

        public function getIdUsuario() {
            return $this->idUsuario;
        }

    // SETTER
        public function setIdAnimal($idAnimal) {
            $this->idAnimal = $idAnimal;
        }

        public function setNomeAnimal($nomeAnimal) {
            $this->nomeAnimal = $nomeAnimal;
        }

        public function setRacaAnimal($racaAnimal) {
            $this->racaAnimal = $racaAnimal;
        }

        public function setTipoAnimal($tipoAnimal) {
            $this->tipoAnimal = $tipoAnimal;
        }

        public function setDataAniversario($dataAniversario) {
            $this->dataAniversario = $dataAniversario;
        }

        public function setIdade($idadeAnimal) {
            $this->idadeAnimal = $idadeAnimal;
        }

        public function setDisponivelAdocao($disponivelAdocao) {
            $this->disponivelAdocao = $disponivelAdocao;
        }

        public function setFotoAnimal($fotoAnimal) {
            $this->fotoAnimal = $fotoAnimal;
        }

        public function setVisibilidade($visibilidade) {
            $this->visibilidade = $visibilidade;
        }

        public function setDataCriacaoConta($dataCriacaoConta) {
            $this->dataCriacaoConta = $dataCriacaoConta;
        }

        public function setIdUsuario($idUsuario) {
            $this->idUsuario = $idUsuario;
        }

}