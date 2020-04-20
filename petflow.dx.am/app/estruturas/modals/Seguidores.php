<?php

namespace app\estruturas\modals;

class Seguidores {

    public static function seguidores($caminho) {
        echo"<div class='modal-sections myModal' id='seguidoresPet' uk-modal>
            <div class='uk-modal-dialog' role='document'>
                <div class='uk-modal-body'>
                    <div class='uk-modal-header'>
                        <h2 class='uk-modal-title'>VEJA SEUS SEGUIDORES (〃＞＿＜;〃)</h2>
                    </div>
                    <div class='modal-body'>";

                            $i = 0;
                            foreach(\app\crud\UsuarioDao::getSeguidores($_GET['idAnimal']) as $seguidores) {

                                if ($i % 3 == 0) {
                                    echo"<div class='form-row'>";
                                        echo"<div class='form-group col'>";  
                                            echo"<div class='usuario'>";
                                                    echo"<img src='{$caminho}{$seguidores->fotoUsuario}' title='{$seguidores->nomeUsuario}'>";
                                            echo"</div>";
                                            echo"<p class='txtNameAnimal' title='{$seguidores->nomeUsuario}'>";
                                                echo"{$seguidores->nomeUsuario}";
                                            echo"</p>";
                                        echo"</div>";
                                } else {
                                    echo"<div class='form-group col'>";  
                                            echo"<div class='usuario'>";
                                                echo"<img src='{$caminho}{$seguidores->fotoUsuario}' title='{$seguidores->nomeUsuario}'>";
                                            echo"</div>";
                                            
                                            echo"<p class='txtNameAnimal' title='{$seguidores->nomeUsuario}'>";
                                                echo"{$seguidores->nomeUsuario}";
                                            echo"</p>";
                                        echo"</div>";
                                    echo"</div>";
                                }

                                $i += 1;
                            }

                            if ($i == 0) {
                                echo"<div class='row'>";
                                    echo"<div class='col'>";
                                        echo"Este animal não tem seguidor nenhum (｡•́︿•̀｡)";
                                    echo"</div>";
                                echo"</div>";
                            }
                    echo"</div>
                </div>
            </div>
        </div>";
    }
}