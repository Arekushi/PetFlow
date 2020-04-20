<?php

namespace app\model;
require_once '../../../vendor/autoload.php';

class Mailer {
    
    /* Atributos */
    public static $instance;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new \PHPMailer\PHPMailer\PHPMailer();

            /* Configurando */
            self::$instance->isSMTP();
            self::$instance->isHTML(true);
            self::$instance->SMTPOptions = array (
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            self::$instance->CharSet = "utf8";
            //self::$instance->SMTPDebug = 3;
            self::$instance->SMTPAuth = true;

            self::$instance->Host = "free.mboxhosting.com";
            self::$instance->Username = "equipesuport@petflow.dx.am";
            self::$instance->From = "equipesuport@petflow.dx.am";
            self::$instance->Password = "seventhone71";
            
            self::$instance->SMTPSecure = "ssl";
            self::$instance->Port = 465;
            self::$instance->FromName = "Pet Flow";
            
        }

        return self::$instance;
    }
}