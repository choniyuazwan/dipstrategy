<?php

    if (version_compare(phpversion(), '7.1.0', '<=')) {

        die('You are running PHP ' . phpversion() . ', but this application only supported PHP version that are still getting security updates to run. See https://secure.php.net/supported-versions.php for more information.');

    }



    date_default_timezone_set('Asia/Jakarta');

    

    require_once 'vendor/autoload.php';
    
    Flight::set('flight.handle_errors', true);
    Flight::set('flight.log_errors', false);
    
    Session::init();



    $database = require_once 'app/config/database.php';



    ActiveRecord\Config::initialize(function($config) use ($database) {

        $config->set_connections($database);

        $config->set_default_connection($database['connection']);

    });





    $site = require_once 'app/config/site.php';


    define('PATH', '/');

    define('ROOT', $_SERVER['DOCUMENT_ROOT'] . PATH);

    define('DOMAIN', $site['domain'] . '/');

    define('THEMEASSETS', $site['theme']['assets']);




    function is_mobile() {

        return preg_match('/(android|webos|avantgo|iphone|ipad|ipod|blackberry|iemobile|bolt|bo‌​ost|cricket|docomo|fone|hiptop|mini|opera mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i', $_SERVER['HTTP_USER_AGENT']);

    }



    function is_browser() {

        $agent = $_SERVER['HTTP_USER_AGENT'];



        if(preg_match('/MSIE/i', $agent) && !preg_match('/Opera/i', $agent)) {

            return 'Internet Explorer';

        } elseif(preg_match('/Edge/i', $agent)) {

            return 'Edge';

        } elseif(preg_match('/Firefox/i', $agent)) {

            return 'Mozilla Firefox';

        } elseif(preg_match('/Chrome/i', $agent))  {

            return 'Google Chrome';

        } elseif(preg_match('/Safari/i', $agent)) {

            return 'Safari';

        } elseif(preg_match('/Opera/i', $agent)) {

            return 'Opera';

        } elseif(preg_match('/Netscape/i', $agent)) {

            return 'Netscape';

        } else {

            return 'Unknown';

        }

    }

