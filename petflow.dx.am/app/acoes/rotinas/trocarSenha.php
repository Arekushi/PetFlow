<?php
    require_once '../../../vendor/autoload.php';

    $dados = new \app\model\Dados();

    if (isset($_POST['i']) && isset($_POST['s'])) {
        $id = $_POST['i'];
        $novaSenha = md5($_POST['s']);

    } else {
        header("Location: ../../../pages/login.php");
    }
    
    \app\crud\UsuarioDao::esqueciSenha($id, $novaSenha);

    $dados->sucesso = 'yes';
    $dados->title = 'SENHA ALTERADA';
    $dados->text = 'Sua senha foi trocada com sucesso, clique aqui embaixo para realizar seu login...';
    $dados->btnText = 'Continuar';

    echo json_encode($dados);
