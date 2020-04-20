<?php 

namespace app\model;

class Post {

    // Atributos
        private $idPostagem;
        private $idUsuario;
        private $descricaoPostagem;
        private $dataPostagem;
        private $idAnimal;
        private $imagemPostagem;
        private $visibilidade;

    // GETTERS
        public function getIdPostagem() {
            return $this->idPostagem;
        }

        public function getIdUsuario() {
            return $this->idUsuario;
        }

        public function getDescricaoPostagem() {
            return $this->descricaoPostagem;
        }

        public function getDataPostagem() {
            return $this->dataPostagem;
        }

        public function getIdAnimal() {
            return $this->idAnimal;
        }

        public function getImagemPostagem() {
            return $this->imagemPostagem;
        }

        public function getVisibilidade() {
            return $this->visibilidade;
        }

    // SETTERS
        public function setIdPostagem($idPostagem) {
            $this->idPostagem = $idPostagem;
        }

        public function setIdUsuario($idUsuario) {
            $this->idUsuario = $idUsuario;
        }

        public function setDescricaoPostagem($descricaoPostagem) {
            $this->descricaoPostagem = $descricaoPostagem;
        }

        public function setDataPostagem($dataPostagem) {
            $this->dataPostagem = $dataPostagem;
        }

        public function setIdAnimal($idAnimal) {
            $this->idAnimal = $idAnimal;
        }

        public function setImagemPostagem($imagemPostagem) {
            $this->imagemPostagem = $imagemPostagem;
        }
        
        public function setVisibilidade($visibilidade) {
            $this->visibilidade = $visibilidade;
        }

}