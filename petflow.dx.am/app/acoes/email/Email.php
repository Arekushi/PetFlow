<?php

namespace app\acoes\email;
require_once '../../../vendor/autoload.php';

class Email {

    public static function confirmaEmail($emailDestinatario, $nomeDestinatario, $linkConfirmaEmail) {
        $phpmailer = \app\model\Mailer::getInstance();  
        $phpmailer->addAddress($emailDestinatario, $nomeDestinatario);
        $phpmailer->Subject = "Confirme seu email...";
        $phpmailer->Body = \app\estruturas\EmailTemplate::EmailtemplateConfirmaEmail($linkConfirmaEmail, $nomeDestinatario);
        return ($phpmailer->send())? false:true;
    }

    public static function trocarSenha($emailDestinatario, $nomeDestinatario, $linkConfirmaEmail) {
        $phpmailer = \app\model\Mailer::getInstance();  
        $phpmailer->addAddress($emailDestinatario, $nomeDestinatario);
        $phpmailer->Subject = "Utilize o link abaixo para trocar sua senha: ";
        $phpmailer->Body = \app\estruturas\EmailTemplate::EmailtemplateConfirmaEmail($linkConfirmaEmail, $nomeDestinatario);
        return ($phpmailer->send())? false:true;
    }
}
