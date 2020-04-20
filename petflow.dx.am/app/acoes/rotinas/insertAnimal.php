<?php 
    require_once '../../../vendor/autoload.php';

    \app\date\Location::setTimeZone();
    $animal = new \app\model\Animal();
    $dados = new \app\model\Dados();

    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }

    $nomeAnimal = $_POST['nomePet'];
    $raca = $_POST['racaPet'];
    $tipoAnimal = $_POST['animalPet'];
    $dataNasc = $_POST['DataAnv'];
    $dataNasc = DateTime::createFromFormat("d.m.Y", $dataNasc);
    $idadeAnimal = (int) date("Y") - (int) $dataNasc->format("Y");
    $usuario =  $_SESSION['cod'];
    $dataAtual = new DateTime('now');

    try {
        $animal->setNomeAnimal($nomeAnimal);
        $animal->setRacaAnimal($raca);
        $animal->setTipoAnimal($tipoAnimal);
        $animal->setDataAniversario($dataNasc->format("Y-m-d"));
        $animal->setIdade($idadeAnimal);
        $animal->setDisponivelAdocao(0);
        $animal->setFotoAnimal(null);
        $animal->setVisibilidade(1);
        $animal->setDataCriacaoConta($dataAtual->format('Y-m-d H:i:s'));
        $animal->setIdUsuario($usuario);
        $_SESSION['codAnimal'] = \app\crud\AnimalDao::create($animal);
        $dados->sucesso = 'yes';

    } catch(PDOException $e) {
        $dados->sucesso = 'no';
    }

    echo json_encode($dados);