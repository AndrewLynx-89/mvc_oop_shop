<?php

namespace engine\Base;

abstract class Controller
{
    /**
     * Текущий маршрут и параметры (controller, action, params)
     * @var array
     */
    public $route = [];

    /**
     * Вид
     * @var string
     */
    public $view;

    /**
     * Текущий шаблон
     * @var string
     */
    public $layout;

    /**
     * Пользовательские данные
     * @var array
     */
    public $vars = [];

    public $meta = ['title' => '', 'desc' => '', 'keywords' => ''];

    public function __construct($route) {
        $this->route = $route;
        $this->view = $route['action'];
    }

    public function getView(){
        $vObj = new View($this->route, $this->layout, $this->view, $this->meta);
        $vObj->render($this->vars);
    }

    public function set($vars){
        $this->vars = $vars;
    }

    public function isAjax() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }

    public function loadView($view, $controller = false, $vars = []){
        extract($vars);
        $controller = isset($controller) ? $controller : $this->route['controller'];
        require ROOT . "/app/views/{$controller}/{$view}.php";
    }

    public function setMeta($title = '', $desc = '', $keywords = ''){
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;
    }

}