<?php

namespace app\estruturas\modals;

class FotoUsuario {

    public static function fotoUsuario($caminho) {
        $modal =
        "<div class='modal-sections myModal' id='NovaFotoUsuario' uk-modal>
        <div class='uk-modal-dialog' role='document'>
            <div class='modal-content'>
                <form id='mudarFoto' role='form' method='post' class='registration-form' novalidate enctype='multipart/form-data'>
                    <div class='modal-body'>
                        <div class='form-group'>
                            <div class='usuarioMudar'>
                                <img src='{$caminho}{$_SESSION['foto']}' id='imgUser'>
                            </div><br>
                            <label class='d-flex justify-content-center'>
                                <input class='file-input' type='file' name='imgUsuario' id='imgUsuario' placeholder='Foto...' class='form-first-name form-control' required>
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
                    <div class='modal-footer'>
                        <button type='button' class='uk-button uk-button-default uk-modal-close'>Fechar</button>
                        <button type='submit' class='uk-button uk-button-default'>Salvar</button>
                    </div>
                </form>
            </div>
        </div>
        </div>";

        echo $modal;
    }
}