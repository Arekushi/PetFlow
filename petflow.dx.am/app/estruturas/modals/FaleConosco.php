<?php

namespace app\estruturas\modals;

class FaleConosco {

    public static function faleConosco() {
        $modal = 
        "<div id='faleconosco' uk-modal>
            <div class='uk-modal-dialog'>
                <button class='uk-modal-close-default' type='button' uk-close></button>
                <div class='uk-modal-header'>
                    <h2 class='uk-modal-title'>FALE CONOSCO</h2>
                </div>
                <div class='uk-modal-body'>
                    <form id='mensagem' role='form' method='post'>
                        <div class='form-group'>
                            <input type='text' name='emailMsg' placeholder='E-mail...' class='uk-input' id='emailMsg' required>
                        </div>
                        <div class='form-group'>
                            <input type='text' name='nomeMsg' placeholder='Nome...' class='uk-input' id='nomeMsg'>
                        </div>
                        <div class='form-group'>
                            <textarea name='txtMsg' placeholder='Insira sua mensagem...' class='uk-textarea' id='txtMsg' required></textarea>
                        </div>
                        <input type='submit' class='btn' value='ENVIAR' />
                    </form>
                </div>
            </div>
        </div>";

        echo $modal;
    }
}