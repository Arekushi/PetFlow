<?php 
    require_once '../../../vendor/autoload.php';
    \app\date\Location::setTimeZone();
    

    $usuario = new \app\model\Usuario();
    $objEmail = new \app\acoes\email\Email();
    $dados = new \app\model\Dados();

    if (isset($_POST['nomeReg']) && 
        isset($_POST['sobrenomeReg']) && 
        isset($_POST['dataNasc']) && 
        isset($_POST['senhaReg'])) 
    {
        $nome = $_POST['nomeReg'];
        $ultimoNome = $_POST['sobrenomeReg'];
        $dataNasc = $_POST['dataNasc'];
        $senhaReg = $_POST['senhaReg'];
        $emailReg = $_POST['emailReg'];

    } else {
        header("Location: ../../../pages/login.php");

    }

    $nomeCompleto = $nome. " " .$ultimoNome;
    $cidade = \app\date\Location::returnCidade();
    $estado = \app\date\Location::returnEstado();
    $dataAtual = new DateTime("now");
    $dataNasc = DateTime::createFromFormat("d-m-Y", $dataNasc);

    try {
        $usuario->setNomeUsuario($nomeCompleto);
        $usuario->setDataNascimento($dataAtual->format('Y-m-d'));
        $usuario->setCidade($cidade);
        $usuario->setEstado($estado);
        $usuario->setEmailUsuario($emailReg);
        $usuario->setSenhaUsuario(md5($senhaReg));
        $usuario->setFotoUsuario('assets/img/default.png');
        $usuario->setDataCriacaoConta($dataAtual->format('Y-m-d H:i:s'));
        $usuario->setOnline(1);
        $usuario->setTipoUsuario(1);
        $usuario->setConfirmaEmail(0);
        
        $id = \app\crud\UsuarioDao::insert($usuario);
        criarSessao($usuario, $id);

        $link = "petflow.dx.am/app/acoes/email/confirmaEmail.php?h=".md5($id)."&p=".md5($senhaReg);
        $objEmail->confirmaEmail($emailReg, $nome, $link);

        $dados->sucesso = 'yes';
        $dados->link = 'cadastro/firstSplash.php';
        $dados->title = 'CADASTRO REALIZADO';
        $dados->text = "Cadastro realizado com sucesso.<br> 
        Um email de confirmação foi enviado para <b>" .$usuario->getEmailUsuario(). "</b><br><br>
        Continue com o cadastro no botão abaixo...";
        $dados->txtBtn = "Continuar";

    } catch(PDOException $e) {
        $dados->error = $e;
        $dados->sucesso = 'no';
        $dados->title = 'ALGO ACONTECEU';
        $dados->text = 'Parece que já existe um endereço de email igual a este, tente novamente...';

    }

    /* FUNCTIONS */
    function criarSessao(\app\model\Usuario $usuario, $id) {
        session_start();
        $_SESSION['cod'] = $id;
        $_SESSION['nome'] = $usuario->getNomeUsuario();
        $_SESSION['dataNasc'] = $usuario->getDataNascimentoUsuario();
        $_SESSION['cidade'] = $usuario->getCidade();
        $_SESSION['estado'] = $usuario->getEstado();
        $_SESSION['login'] = $usuario->getEmailUsuario();
        $_SESSION['senha'] = $usuario->getSenhaUsuario();
        $_SESSION['tipo'] = $usuario->getTipoUsuario();
        $_SESSION['foto'] = $usuario->getFotoUsuario();
        $_SESSION['last_login_timestamp'] = time();
        $_SESSION['reg'] = true;
        \app\crud\UsuarioDao::setOnline($id, 1);
    }

    echo json_encode($dados);
?>