<?php

namespace app\model;

class DenunciaPost {

    // Atributos
        private $idDenuncia;
        private $idUsuario;
        private $idPost;
        private $statusDenuncia;

    // GETTERS
        public function getIdDenuncia() {
                return $this->idDenuncia;
        }

        public function getIdUsuario() {
                return $this->idUsuario;
        }

        public function getIdPost() {
                return $this->idPost;
        }

        public function getStatusDenuncia() {
                return $this->statusDenuncia;
        }

    // SETTERS
        public function setIdDenuncia($idDenuncia) {
                $this->idDenuncia = $idDenuncia;
        }

        public function setIdUsuario($idUsuario) {
                $this->idUsuario = $idUsuario;
        }
 
        public function setIdPost($idPost) {
                $this->idPost = $idPost;
        }

        public function setStatusDenuncia($statusDenuncia) {
                $this->statusDenuncia = $statusDenuncia;
        }
}