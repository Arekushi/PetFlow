<?php

namespace app\acoes\login;

class VerificaLoginEfetuado {

    public static function voltarLogin($caminho) {
        if (!isset($_SESSION['login']) & !isset($_SESSION['senha'])) {

            if (\strcmp($caminho, "../") == 0) {
                header("Location: login.php");

            } else {
                header("Location: pages/login.php");

            }
            
            $_SESSION['linkSalvo'] = $_SERVER["REQUEST_URI"];
            
        } else {
            $linhaBan = \app\crud\BanimentoDao::pegarStatus($_SESSION['cod']);

            if (empty($linhaBan)) {
                if ((time() - $_SESSION['last_login_timestamp']) > 1800) {
                    header("Location: {$caminho}app/acoes/login/logout.php");
                    
                } else { 
                    $_SESSION['last_login_timestamp'] = time();

                }
            } else {
                header("Location: {$caminho}app/acoes/login/logout.php");

            }
        }
    }

    public static function sairLogin() {
        if (isset($_SESSION['login']) & isset($_SESSION['senha'])) {
            header("Location: ../index.php");
        }
    }

    public static function verificaAdministrador() {
        if ($_SESSION['tipo'] != 3) {
            header("Location: ../index.php");
        }
    }

    public static function verificaUsuario() {
        if ($_SESSION['tipo'] == 3) {
            header("Location: pages/paginaAdministrador.php");
        }
    }

}