<?php

namespace app\acoes\login;

class VerificaCadastro {

    public static function verificaCadastro() {
        if (!isset($_SESSION['reg'])) {
            header("Location: ../login.php");
        }
    }

    public static function removeCadastro() {
        if (isset($_SESSION['reg'])) {
            unset($_SESSION['reg']);
        }
    }
}