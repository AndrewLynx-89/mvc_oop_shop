<?php

namespace engine\libs;

class Pagination
{
    /**
     * Текущая страница
     */
    public $currentPage;

    /**
     * Общее кол-во страниц
     */
    public $countPages;

    /**
     * Общее количество записей
     */
    public $total;

    /**
     * Количество записй на странице
     */
    public $perpage;

    /**
     * Номер текущей страницы
     */
    public $page;


    public $uri;

    public function __construct($page, $perpage, $total){
        $this->perpage = $perpage;
        $this->total = $total;
        $this->page = $page;
        $this->countPages = $this->getCountPages();
        $this->currentPage = $this->getCurrentPage($page);
        $this->uri = $this->getParams();
    }

    /**
     * Возвращает общее кол-во страниц с округлением в большую сторону
     */
    public function getCountPages(){
        return ceil($this->total / $this->perpage) ?: 1;
    }

    /**
     * Не даёт пользователю ввести отрицательный номер страницы и значение,
     * которое больше чем общее колиество страниц.
     */
    public function getCurrentPage($page){
        if(!$page || $page < 1){
            $page = 1;
        }
        if($page > $this->countPages){
            $page = $this->countPages;
        }
        return $page;
    }

    /**
     * Отвечает за вывод(лимит) записей из БД на странице.
     * Допустим: с 0 по 3шт., с 3 по 3шт.
     * 10:35_№24
     */
    public function getStart(){
        return ($this->currentPage - 1) * $this->perpage;
    }

    public function getParams(){
        $url = $_SERVER['REQUEST_URI'];
        preg_match_all("#filter=[\d,&]#", $url, $matches);
        if(count($matches[0]) > 1){
            $url = preg_replace("#filter=[\d,&]+#", "", $url, 1);
        }
        $url = explode('?', $url);
        $uri = $url[0] . '?';
        if(isset($url[1]) && $url[1] != ''){
            $params = explode('&', $url[1]);
            foreach($params as $param){
                if(!preg_match("#page=#", $param)) $uri .= "{$param}&amp;";
            }
        }
        return urldecode($uri);
    }

    public function __toString(){
        return $this->getHtml();
    }

    public function getHtml(){
        $back = null; // ссылка НАЗАД
        $forward = null; // ссылка ВПЕРЕД
        $startpage = null; // ссылка В НАЧАЛО
        $endpage = null; // ссылка В КОНЕЦ
        $page2left = null; // вторая страница слева
        $page1left = null; // первая страница слева
        $page2right = null; // вторая страница справа
        $page1right = null; // первая страница справа

        if( $this->currentPage > 1 ){
            $back = "<li><a class='nav-link' href='{$this->uri}page=" . ($this->currentPage - 1) . "'>&lt;</a></li>";
        }
        if( $this->currentPage < $this->countPages ){
            $forward = "<li><a class='nav-link' href='{$this->uri}page=" .($this->currentPage + 1). "'>&gt;</a></li>";
        }
        if( $this->currentPage > 3 ){
            $startpage = "<li><a class='nav-link' href='{$this->uri}page=1'>&laquo;</a></li>";
        }
        if( $this->currentPage < ($this->countPages - 2) ){
            $endpage = "<li><a class='nav-link' href='{$this->uri}page={$this->countPages}'>&raquo;</a></li>";
        }
        if( $this->currentPage - 2 > 0 ){
            $page2left = "<li><a class='nav-link' href='{$this->uri}page=" .($this->currentPage-2). "'>" . ($this->currentPage - 2) . "</a></li>";
        }
        if( $this->currentPage - 1 > 0 ){
            $page1left = "<li><a class='nav-link' href='{$this->uri}page=" .($this->currentPage-1). "'>" .($this->currentPage-1). "</a></li>";
        }
        if( $this->currentPage + 1 <= $this->countPages ){
            $page1right = "<li><a class='nav-link' href='{$this->uri}page=" .($this->currentPage + 1). "'>" .($this->currentPage+1). "</a></li>";
        }
        if( $this->currentPage + 2 <= $this->countPages ){
            $page2right = "<li><a class='nav-link' href='{$this->uri}page=" .($this->currentPage + 2). "'>" .($this->currentPage + 2). "</a></li>";
        }

        return '<ul class="pagination">' . $startpage.$back.$page2left.$page1left.'<li class="active"><a>'.$this->currentPage.'</a></li>'.$page1right.$page2right.$forward.$endpage . '</ul>';
    }

}