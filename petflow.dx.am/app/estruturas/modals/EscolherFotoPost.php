<?php

namespace app\estruturas\modals;

class EscolherFotoPost {

    public static function escolherFotoPost($caminho) {
        $modal =
        "<div class='modal-sections myModal' id='EscolherFotoPost' uk-modal>
            <div class='uk-modal-dialog' role='document'>
                <form role='form' id='formImagemPost' method='post' class='registration-form' enctype='multipart/form-data'>
                    <div class='uk-modal-body'>
                        <div class='modal-body'>
                            <div class='form-group'>
                                <div class='fotoPostDiv'>
                                    <img src='{$caminho}assets/img/img-default.png' id='imgPost'>
                                </div><br>
                                <div class='d-flex justify-content-center'>
                                    <label>
                                        <input class='file-input' type='file' name='fotoPost' placeholder='Foto...' class='form-first-name form-control' id='fotoPost' required>
                                        <span class='file-cta'>
                                            <span class='file-icon'>
                                                <i uk-icon='upload'></i>
                                            </span>
                                            <span class='file-label'>
                                                Escolha uma foto...
                                            </span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='uk-button uk-button-default uk-modal-close'>Fechar</button>
                        <button type='submit' class='uk-button uk-button-default'>Salvar</button>
                    </div>
                </form>
            </div>
        </div>";

        echo $modal;
    }
}