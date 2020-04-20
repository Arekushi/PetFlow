<?php

namespace app\estruturas\modals;

class Confirmacao {

    public static function confirmacao() {
        $modal =
        "<div id='mdlConfirma' class='myModal' uk-modal>
            <div class='uk-modal-dialog'>
                <button class='uk-modal-close-default' type='button' uk-close></button>
                <div class='uk-modal-header'>
                    <h2 id='tltConfirma' class='uk-modal-title'></h2>
                </div>
                <div class='uk-modal-body'>
                    <div id='txtConfirma' class='txtAviso'></div>
                </div>
                <div class='uk-modal-footer'>
                    <button id='btnYes' type='button' class='btn'>Sim</button>
                    <button id='btnNo' type='button' class='btn'>Não</button>
                </div>
            </div>
        </div>";

        echo $modal;
    }
}