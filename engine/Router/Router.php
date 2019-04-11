<?php

namespace engine\Router;

class Router
{
    /**
     * Все маршруты
     */
    protected static  $routes = [];

    /**
     * Текущий маршрут
     */
    protected static $route = [];

    /**
     * Добавляет маршрут в таблицу маршрутов
     * $regexp регулярное выражение маршрута
     * $route маршрут ([controller, action, params])
     */
    public static function add($regexp, $route = []){
        self::$routes[$regexp] = $route;
    }

    /**
     * Возвращает строку запроса
     */
    public static function getUrl(){
        if(isset($_SERVER['QUERY_STRING'])){
            return trim($_SERVER['QUERY_STRING'], '/');
        }
        return false;
    }

    /**
     * Полученный $url из строки запроса проверяет на
     * наличие маршрута в таблице маршрутов
     */
    public static function matchRoute()
    {
        $url = self::removeQueryString(self::getUrl());

        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#^$pattern$#i", $url, $matches)) {
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $route[$key] = $value;
                    }
                }
                if(!isset($route['action'])){
                    $route['action'] = 'index';
                }

                if(!isset($route['prefix'])){
                    $route['prefix'] = '';
                }else{
                    $route['prefix'] .= '\\';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);

                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    /**
     * Перенаправляет URL по корректному маршруту
     */
    public static function run(){
        if(self::matchRoute()){
            $controller = 'app\controllers\\' . self::$route['prefix'] . ucfirst(self::$route['controller']) . 'Controller';
            if(class_exists($controller)){
                $cObj = new $controller(self::$route);
                $action = self::upperCamelCase(self::$route['action']) . 'Action';
                if (method_exists($cObj, $action)) {
                    $cObj->$action();
                    $cObj->getView();
                }else{
                    throw new \Exception("Метод $controller::$action не найден", 404);
                }
            }else {
                throw new \Exception("Контроллер $controller не найден", 404);
            }
        }else {
            throw new \Exception("Страница не найдена", 404);
        }

    }

    /**
     * Преобразует имена к виду CamelCase
     */
    protected static function upperCamelCase($name) {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }

    /**
     * Преобразует имена к виду camelCase
     */
    protected static function lowerCamelCase($name) {
        return lcfirst(self::upperCamelCase($name));
    }

    /**
     * Возвращает строку без GET параметров
     */
    protected static function removeQueryString($url) {
        if($url){
            $params = explode('&', $url, 2);
            if(false === strpos($params[0], '=')){
                return rtrim($params[0], '/');
            }else{
                return '';
            }
        }
    }

    public static function getRouteController(){
        return self::$route['controller'];
    }
}