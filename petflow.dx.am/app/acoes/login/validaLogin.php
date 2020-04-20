<?php
    require_once '../../../vendor/autoload.php';
    \app\date\Location::setTimeZone();

    //Recebe os dados do formulario de login
    $user = $_POST['emailLog'];
    $pass = md5($_POST['senhaLog']);

    $linha = \app\crud\UsuarioDao::validaLogin($user, $pass);
    $dados = new \app\model\Dados();

    if (!empty($linha)) {
        $linhaBan = \app\crud\BanimentoDao::pegarStatus($linha->idUsuario);

        if (!empty($linhaBan)) {
            if ($linhaBan->fim_banimento != null) {
                $dataAtual = new DateTime('now');
                $dataBan = DateTime::createFromFormat("Y-m-d H:i:s", $linhaBan->fim_banimento);
    
                $dataAtual = strtotime($dataAtual->format("Y-m-d H:i:s"));
                $dataBan = strtotime($dataBan->format("Y-m-d H:i:s"));
    
                if ($dataAtual > $dataBan) {
                    \app\crud\BanimentoDao::alterarStatus($linha->idUsuario, 0);
                    $dados->sucesso = 'yes';
                    criarSessao($linha, $dados);
                    
                } else {
                    $dataBan = DateTime::createFromFormat("Y-m-d H:i:s", $linhaBan->fim_banimento);
                    $dados->sucesso = 'no';
                    $dados->banido = 'yes';
                    $dados->motivo = \app\crud\MotivoBanimentoDao::getMotivoById($linhaBan->idMotivo);
                    $dados->title = 'AGUARDE SEU ENCRENQUEIRO';
                    $dados->text = "Sua conta foi banida até <b>" .$dataBan->format('d/m/Y H:i:s'). ".</b>";
                }

            } else { 
                $dados->sucesso = 'no';
                $dados->banido = 'yes';
                $dados->motivo = \app\crud\MotivoBanimentoDao::getMotivoById($linhaBan->idMotivo);
                $dados->title = 'SE ACHA ESPERTO NÉ?';
                $dados->text = "Sua conta foi banida por tempo <b>Indeterminado.</b>";
            }

        } else {
            $dados->sucesso = 'yes';
            criarSessao($linha, $dados); 
        }

    } else {
        $dados->title = 'ALGO NÃO ESTÁ CORRETO';
        $dados->sucesso = 'no'; 
        $dados->text = '<b>Credenciais incorretas</b>, tente novamente...';
    }

    function criarSessao($linha, $dados) {
        session_start();
        $_SESSION['cod'] = $linha->idUsuario;
        $_SESSION['nome'] = $linha->nomeUsuario;
        $_SESSION['dataNasc'] = $linha->dataNascimento;
        $_SESSION['cidade'] = $linha->cidade;
        $_SESSION['estado'] = $linha->estado;
        $_SESSION['login'] = $linha->emailUsuario;
        $_SESSION['senha'] = $linha->senhaUsuario;
        $_SESSION['tipo'] = $linha->tipoUsuario;
        $_SESSION['foto'] = $linha->fotoUsuario;
        $_SESSION['last_login_timestamp'] = time();
        \app\crud\UsuarioDao::setOnline($_SESSION['cod'], 1);


        if($linha->tipoUsuario == "3") {
            $_SESSION['link'] = 'paginaAdministrador.php';
            
        } else {
            $_SESSION['link'] = '../index.php';
        }

        if (isset($_SESSION['linkSalvo'])) {
            $_SESSION['link'] = $_SESSION['linkSalvo'];
        }
    }

    echo json_encode($dados);
?>