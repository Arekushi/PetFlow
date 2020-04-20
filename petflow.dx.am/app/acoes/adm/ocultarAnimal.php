<?php
    require_once '../../../vendor/autoload.php';

    $dados = new \app\model\Dados();

    if (isset($_POST['idAnimal'])) {
        $idAnimal = $_POST['idAnimal'];

    } else {
        header("Location: ../../../index.php");
        
    }

    \app\crud\AnimalDao::setVibilidadeAnimal($idAnimal, 0);

    $dados->title = "ANIMAL DELETADO";
    $dados->text = "Este animal foi deletado com sucesso, volte para a home...";
    $dados->btnText = "Voltar";

    echo json_encode($dados);
