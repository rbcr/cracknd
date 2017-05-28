<?php
    try{
        if (file_exists('vendor/autoload.php')) {
            require 'vendor/autoload.php';
        }

        define('APP', 'app/');
        define('MODEL', 'app/model/');

        require 'config/config.php';
        require 'config/class_alias.php';
        require APP . 'libs/Helper.php';
        require APP . 'core/Core.php';
        require APP . 'core/App.php';
        require APP . 'core/Controller.php';
        require APP . 'core/Database.php';
        require APP . 'core/View.php';

        spl_autoload_register(function ($class) {
            $file = MODEL .$class.'.php';
            if (file_exists($file)) {
                require_once $file;
            }
        });

        $app = new App();
    } catch (Exception $ex){
        echo $ex->getMessage();
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    }