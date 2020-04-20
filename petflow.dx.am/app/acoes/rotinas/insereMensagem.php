<?php
    require_once '../../../vendor/autoload.php';

    $msg = new \app\model\Mensagem();
    $dados = new \app\model\Dados();

    session_start();
    
    $msg->setEmailMensagem($_POST['emailMsg']);
    $msg->setNomeMensagem($_POST['nomeMsg']);
    $msg->setDescricaoMensagem($_POST['txtMsg']);

    //Inserindo nova msg
    $instrucaoSQL = "INSERT INTO tbmensagem (emailMensagem, nomeMensagem, descricaoMensagem) "
            . "VALUES (:emailMsg, :nomeMsg, :txtMsg)";
            
    //Executando a instrucao    
    $stmt = \app\model\Conexao::getConexao()->prepare($instrucaoSQL);
    $stmt->bindValue('emailMsg', $msg->getEmailMensagem());
    $stmt->bindValue('nomeMsg', $msg->getNomeMensagem());
    $stmt->bindValue('txtMsg', $msg->getDescricaoMensagem());
    $stmt->execute();
    $dados->sucesso = 'yes';
    $dados->title = 'MENSAGEM ENVIADA';
    $dados->text = 'Agradecemos por sua mensagem  (ﾉ◕ヮ◕)ﾉ*:･ﾟ✧';

    echo json_encode($dados);
?>