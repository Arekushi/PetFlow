<?php
    require_once '../../../vendor/autoload.php';
    $dados = new \app\model\Dados();

    if (isset($_POST['emailRecuperar'])) {
        $email = $_POST['emailRecuperar'];

    } else {
        $dados->sucesso = 'no';
        $dados->text = 'Aparentemente não existe um email desses em nosso banco de dados, tente novamente...';
    }

    $res = app\crud\UsuarioDao::verificaEmailExiste($email);

    if(!empty($res)) {
        session_start();
        $_SESSION['recuperar'] = true;
        $e = md5($email);
        $h = md5($res->idUsuario);

        $link = "petflow.dx.am/pages/criarNovaSenha.php?e=$e&h=$h";
        \app\acoes\email\Email::trocarSenha($email, $res->nomeUsuario, $link);

        $dados->link = $link;
        $dados->sucesso = 'yes';
        $dados->title = 'ENVIADO';
        $dados->text = 'Foi enviado um email de recuperação para vossa excelência, confere lá ＼(≧▽≦)／)';

    } else {
        $dados->sucesso = 'no';
        $dados->title = 'ALGO NÃO ESTÁ CERTO';
        $dados->text = 'Aparentemente não existe um email desses em nosso banco de dados, tente novamente...';
    }

    echo json_encode($dados);
