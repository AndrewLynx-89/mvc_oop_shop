<?php

    define('ROOT',$_SERVER['DOCUMENT_ROOT']);
    define("DEBUG", 1);
    define('LAYOUT','default');
    define("ADMIN", ROOT . '/admin');
    define('ENGINE', ROOT . '/engine');
    define('CACHE', ROOT . '/engine/Cache/cache/');
    define('ERROR', ROOT . '/public/errors');
    define("UPLOADS", ROOT . '/public/uploads');
    define("PUBLIC", ROOT . '/public');
    define('FILTER_TPL', ROOT . '/app/widgets/Filter/filter_tpl/');
    define('MENU_TPL', ROOT . '/app/widgets/Menu/menu_tpl/');

    /**
     * Отладка массивов.
     */
    function debug($arr){
        echo '<pre>' . print_r($arr, true) . '<pre>';
    }

    /**
     * Перенаправления пользователя по переданному в неё маршруту.
     */
    function redirect($http = false){
        if($http){
            $redirect = $http;
        }else{
            $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
        }
        header("Location: $redirect");
        exit;
    }

    /**
     * Отвечает за подключение видов боковых панелей.
     */
    function getSidebar($file){
        $path = ROOT . "/app/views/sidebars/{$file}.php";
        if(is_file($path)){
            require_once $path;
        }else{
            echo "File {$path} not found";
        }
    }

    /**
     * Генерирует строку случайных символов.
     */
    function random($length = 32) {
        static $randStr = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $rand = '';
        for($i=0; $i<$length; $i++) {
            $key = rand(0, strlen($randStr)-1);
            $rand .= $randStr[$key];
        }
        return $rand;
    }