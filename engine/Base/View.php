<?php

namespace engine\Base;

class View
{
    /**
     * Текущий маршрут и параметры (controller, action, params)
     */
    public $route = [];

    /**
     * Текущий вид
     */
    public $view;

    /**
     * Текущий шаблон
     */
    public $layout;

    /**
     * Текущие title, description & keywords страниці
     */
    public $meta = [];

    /**
     * View constructor.
     * @param $route
     * @param string $layout
     * @param string $view
     */
    public function __construct($route, $layout = '', $view = '', $meta)
    {
        $this->route = $route;
        $this->meta = $meta;

        if ($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
        }

        $this->view = $view;

    }

    /**
     * @param $vars
     */
    public function render($vars)
    {
        if (is_array($vars)){
            extract($vars);
        }

        $this->route['prefix'] = str_replace('\\', '/', $this->route['prefix']);

        $file_view = "app/views/{$this->route['prefix']}{$this->route['controller']}/{$this->view}.php";

        ob_start();

        if (file_exists($file_view)) {
            require $file_view;
        } else {
            throw new \Exception("На найден вид {$file_view}", 500);
        }

        $content = ob_get_clean();

        if (false !== $this->layout) {
            $file_layout =  "app/views/layouts/{$this->layout}.php";
            if (file_exists($file_layout)) {
                require $file_layout;
            } else {
                throw new \Exception("На найден шаблон {$this->layout}", 500);
            }
        }
    }

    public function getMeta(){
        $output = '<title>' . $this->meta['title'] . '</title>' . PHP_EOL;
        $output .= '<meta name="description" content="' . $this->meta['desc'] . '">' . PHP_EOL;
        $output .= '<meta name="keywords" content="' . $this->meta['keywords'] . '">' . PHP_EOL;
        return $output;
    }
}