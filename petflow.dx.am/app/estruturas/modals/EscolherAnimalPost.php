<?php

namespace app\estruturas\modals;

class EscolherAnimalPost {

    public static function escolherAnimalPost($caminho) {
        echo"<div class='modal-sections myModal' id='EscolherAnimal' uk-modal>";
        echo"<div class='uk-modal-dialog' role='document'>";
            echo"<div class='uk-modal-body'>";
                echo"<div class='uk-modal-header'>";
                    echo"<h2 class='uk-modal-title'>ESCOLHA UM ANIMAL ٩(◕‿◕｡)۶</h2>";
                echo"</div>";
                echo"<div class='modal-body'>";

                        $i = 0;
                        foreach(\app\crud\AnimalDao::selectEscolhaAnimal($_SESSION['cod']) as $animais) {

                            if ($i % 3 == 0) {
                                echo"<div class='form-row'>";
                                    echo"<div class='form-group col'>";  
                                        echo"<div class='usuario'>";
                                            echo"<a onclick='selecionarAnimal(" .$animais->codanimal. ", \"" .$caminho.$animais->fotoAnimal. "\")'> 
                                                <img src='{$caminho}{$animais->fotoAnimal}' title='{$animais->nomeAnimal}'>
                                            </a>";
                                        echo"</div>";
                                        echo"<p class='txtNameAnimal' title='{$animais->nomeAnimal}'>";
                                            echo"{$animais->nomeAnimal}";
                                        echo"</p>";
                                    echo"</div>";
                            } else {
                                echo"<div class='form-group col'>";  
                                        echo"<div class='usuario'>";
                                            echo"<a onclick='selecionarAnimal(" .$animais->codanimal. ", \"" .$caminho.$animais->fotoAnimal. "\")'>
                                                <img src='{$caminho}{$animais->fotoAnimal}' title='{$animais->nomeAnimal}'>
                                            </a>";
                                        echo"</div>";
                                        
                                        echo"<p class='txtNameAnimal' title='{$animais->nomeAnimal}'>";
                                            echo"{$animais->nomeAnimal}";
                                        echo"</p>";
                                    echo"</div>";
                                echo"</div>";
                            }

                            $i += 1;
                        }

                        if ($i == 0) {
                            echo"<div class='row'>";
                                echo"<div class='col'>";
                                    echo"Você não tem nenhum animal ou não segue nenhum";
                                echo"</div>";
                            echo"</div>";
                        }
                echo"</div>";
            echo"</div>";
        echo"</div>";
        echo"</div>";
    }
}