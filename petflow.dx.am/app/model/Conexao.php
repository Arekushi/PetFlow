<?php

namespace app\model;

class Conexao {
    /* Atributos */
    private static $instance;

    /*private static $host = 'fdb22.awardspace.net';
    private static $user = '3178051_bdpetflow';
    private static $password = 'seventhone71';
    private static $dbName = '3178051_bdpetflow';*/

    private static $host = 'localhost';
    private static $user = 'root';
    private static $password = '';
    private static $dbName = 'bdPetFlow';

    private static $options = array (
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        , \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    );

    public static function getConexao() {
        if (!isset(self::$instance)) {
            self::$instance = new \PDO (
                'mysql:host=' .self::$host. '; dbname=' .self::$dbName, self::$user, self::$password, self::$options
            );
        }

        return self::$instance;
    }
}