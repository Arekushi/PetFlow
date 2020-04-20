<?php

namespace app\estruturas\modals;

class SobreNos {

    public static function sobreNos($caminho) {
        $modal = 
        "<div id='sobre' uk-modal>
            <div class='uk-modal-dialog'>
                <button class='uk-modal-close-default' type='button' uk-close></button>
                <div class='uk-modal-header'>
                    <h2 class='uk-modal-title'> SOBRE NÓS</h2>
                </div>
                <div class='uk-modal-body'>
                    <div class='columns'>
                        <div class='column is-half'>
                            <img src='{$caminho}assets/img/ana.jpg'>
                            <br>
                            <div class='nome'>
                                Anenhaxxd
                            </div>
                            <div class='desc'>
                                16 anos. Designer – porque a vida quis.
                            </div>
        
                        </div>
                        <div class='column is-half'>
                            <img src='{$caminho}assets/img/rafy.jpg'>
                            <br>
                            <div class='nome'>
                                Rafinha Cray Cray
                            </div>
                            <div class='desc'>
                                16 anos. Front-end - só às vezes!
                            </div>
                        </div>
                    </div>
                    <div class='columns'>
                        <div class='column is-half'>
                            <img src='{$caminho}assets/img/alex.jpg'>
                            <br>
                            <div class='nome'>
                                Arekushi 失敗
                            </div>
                            <div class='desc'>
                                17 anos. Fullstack - só o básico.
                            </div>
                        </div>
                        <div class='column is-half'>
                            <img src='{$caminho}assets/img/del.png'>
                            <br>
                            <div class='nome'>
                                Lukinha Del Vale
                            </div>
                            <div class='desc'>
                                16 anos. Backend - always working.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>";

        echo $modal;
    }
}