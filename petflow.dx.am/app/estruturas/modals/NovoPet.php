<?php

namespace app\estruturas\modals;

class NovoPet {

    public static function novoPet($caminho) {
        $modal = 
        "<div class='modal-sections myModal' id='NovoPet' uk-modal>
        <div class='modal-dialog modal-dialog-centered' role='document'>
            <div class='modal-content'>
                <form role='form' id='criarPet' method='post' class='registration-form needs-validation' enctype='multipart/form-data'>
                    <div class='modal-body'>
                        <div class='form-group'>
                            <div class='usuarioMudar'>
                                <img src='{$caminho}assets/img/defaultDog.png' id='imgPet'>
                            </div><br>

                            <label class='d-flex justify-content-center'>
                                <span class='file-cta'>
                                    <input type='file' class='file-input' id='fotoAnimal' name='fotoAnimal' placeholder='Foto...'  required>
                                
                                    <span class='file-icon'>
                                        <i uk-icon='upload'></i>
                                    </span>

                                    <span class='file-label'>
                                        Escolha uma foto...
                                    </span>
                                </span>  
                            </label>
                        </div>

                        <div class='form-group'>
                                <div class='row d-flex justify-content-center'>
                                    <div class='col-sm-6'>
                                        <input type='text' name='nomePet' placeholder='Nome...' class='form-first-name form-control' id='nomePet' required>
                                    </div>
                                    
                                    <div class='col-sm-6'>
                                        <div class='form-group'>
                                            <input type='text' placeholder='Data de Aniversário...' id='DataAnv' name='DataAnv' class='form-control' required>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class='form-group'>
                            <div class='row'>
                                <div class='col-sm-6'>
                                    <input type='text' id='animalPet' name='animalPet' class='form-control' placeholder='Animal...' required>
                                </div>
                                
                                <div class='col-sm-6'>		
                                    <input type='text' id='racaPet' name='racaPet' class='form-control' placeholder='Raça...' required>	
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='uk-button uk-button-default uk-modal-close'>Fechar</button>
                        <button type='submit' id='criarPerfil' class='uk-button uk-button-default'>Criar perfil</button>
                    </div>
                </form>
            </div>
        </div>
        </div>";

        echo $modal;
    }
}