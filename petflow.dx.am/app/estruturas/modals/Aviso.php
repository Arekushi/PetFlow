<?php

namespace app\estruturas\modals;

class Aviso {

    public static function aviso() {
        $modal =
        "<div id='mdlAviso' class='myModal' uk-modal>
            <div class='uk-modal-dialog'>
                <button class='uk-modal-close-default' type='button' uk-close></button>
                <div id='modalHeader' class='uk-modal-header'>
                    <h2 id='tltAviso' class='uk-modal-title'></h2>
                </div>
                <div class='uk-modal-body'>
                    <div id='txtAviso' class='txtAviso'></div>
                </div>
            </div>
        </div>";

        echo $modal;
    }
}