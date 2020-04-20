<?php

namespace app\estruturas;

class ChamadaCss {

    public static function chamadaCss($caminho) {
        echo"<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500'>";
        echo"<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css'>";

        echo"<link rel='stylesheet' href='{$caminho}assets/package/bootstrap/css/bootstrap.min.css'>";
        echo"<link rel='stylesheet' href='{$caminho}assets/package/font-awesome/css/font-awesome.min.css'>";
        echo"<link rel='stylesheet' href='{$caminho}assets/package/uikit/css/uikit.min.css'>";

        echo"<link rel='stylesheet' href='{$caminho}assets/css/elements-form.css'>";
        echo"<link rel='stylesheet' href='{$caminho}assets/css/elementos-form.css'>";
        echo"<link rel='stylesheet' href='{$caminho}assets/css/menu.css'>";
        echo"<link rel='stylesheet' href='{$caminho}assets/css/modal.css'>";
        echo"<link rel='stylesheet' href='{$caminho}assets/css/style2.css'>";
        echo"<link rel='stylesheet' href='{$caminho}assets/css/style.css'>";

        echo"<link rel='shortcut icon' href='{$caminho}assets/ico/favicon.png' type='image/x-png'>";
    }

    public static function chamadaCss2($caminho) {
        echo"<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500'>";
        echo"<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css'>";
    
        echo"<link rel='stylesheet' href='{$caminho}assets/package/bootstrap/css/bootstrap.min.css'>";
        echo"<link rel='stylesheet' href='{$caminho}assets/package/font-awesome/css/font-awesome.min.css'>";
        echo"<link rel='stylesheet' href='{$caminho}assets/package/uikit/css/uikit.min.css'>";
    
        echo"<link rel='stylesheet' href='{$caminho}assets/css/elementos-form.css'>";
        echo"<link rel='stylesheet' href='{$caminho}assets/css/menu.css'>";
        echo"<link rel='stylesheet' href='{$caminho}assets/css/modal.css'>";
        echo"<link rel='stylesheet' href='{$caminho}assets/css/style-def.css'>";
        echo"<link rel='stylesheet' href='{$caminho}assets/css/style.css'>";
    
        echo"<link rel='shortcut icon' href='{$caminho}assets/ico/favicon.png' type='image/x-png'>";
    }
}