<?php

namespace app\estruturas\modals;

class Sucesso {

    public static function sucesso() {
        $modal =
        "<div id='mdlSucesso' class='myModal' uk-modal>
            <div class='uk-modal-dialog'>
                <button class='uk-modal-close-default' type='button' uk-close></button>
                <div class='uk-modal-header'>
                    <h2 id='tltSucesso' class='uk-modal-title'></h2>
                </div>
                <div class='uk-modal-body'>
                    <div id='txtSucesso' class='txtAviso'></div>
                </div>
                <div class='uk-modal-footer'>
                    <button id='btnSucesso' type='button' class='btn'></button>
                </div>
            </div>
        </div>";

        echo $modal;
    }
}