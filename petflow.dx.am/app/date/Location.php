<?php

namespace app\date;

class Location {

    public static function returnIpUsuario() {
        return isset($_SERVER['HTTP_CLIENT_IP'])?
                $_SERVER['HTTP_CLIENT_IP'] : 
                (isset($_SERVER['HTTP_X_FORWARDE‌ D_FOR'])? 
                    $_SERVER['HTTP_X_FORWARDED_FOR'] : 
                    $_SERVER['REMOTE_ADDR']);
    }

    public static function returnTimeZone() {
        $runfile = 'http://ip-api.com/json/' . Location::returnIpUsuario();
        //$runfile = 'http://ip-api.com/json/' . '189.79.19.1';
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $runfile);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $content = curl_exec($ch);
        curl_close ($ch);
        
        $ipInfo = json_decode($content);
        //return $ipInfo->timezone;
    }

    public static function returnCidade() {
        $runfile = 'http://ip-api.com/json/' . Location::returnIpUsuario();
        //$runfile = 'http://ip-api.com/json/' . '189.79.19.1';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $runfile);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $content = curl_exec($ch);
        curl_close ($ch);

        $ipInfo = json_decode($content);
        //return $ipInfo->city;
        return "São Paulo";
    }

    public static function returnEstado() {
        $runfile = 'http://ip-api.com/json/' . Location::returnIpUsuario();
        //$runfile = 'http://ip-api.com/json/' . '189.79.19.1';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $runfile);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $content = curl_exec($ch);
        curl_close ($ch);

        $ipInfo = json_decode($content);
        //return $ipInfo->region;
        return "SP";
    }

    public static function setTimeZone() {
        if (\strcmp(Location::returnTimeZone(), "America/Sao_Paulo") == 0) {
            $timezone = "America/Bahia";

        } else {
            //$timezone = Location::returnTimeZone();
            $timezone = "America/Bahia";

        }

        date_default_timezone_set($timezone);
    }

}