<?php

namespace app\widgets\Menu;

use engine\Database\Database;
use engine\Cache\Cache;

class Menu
{
    protected $db;
    protected $data;
    protected $tree;
    protected $view;
    protected $attrs = [];
    protected $menuHtml;
    protected $container;
    protected $prepend = '';
    protected $class = '';
    protected $tpl = 'tpl';
    protected $cache = 3600;
    protected $cacheKey = 'shop_menu';
    protected $table = 'category';

    protected $selected;

    public function __construct($options = []){

        $this->db = Database::instance();

        $this->tpl = MENU_TPL . "menu.php";

        $this->getOptions($options);

        $this->run();
    }

    protected function getOptions($options){
        foreach($options as $k => $v){
            if(property_exists($this, $k)){
                $this->$k = $v;
            }
        }
    }

    protected function output(){
        $attrs = '';
        if(!empty($this->attrs)){
            foreach($this->attrs as $k => $v){
                $attrs .= " $k = '$v' ";
            }
        }
        echo "<{$this->container} class='{$this->class}'  $attrs>";
        echo $this->prepend;
        echo $this->menuHtml;
        echo "</{$this->container}>";
    }

    public function run(){
        $cache = new Cache();
        $this->menuHtml = $cache->get($this->cacheKey);
        if(!$this->menuHtml){
            $this->data = $this->getCat();
            $cache->set($this->cacheKey, $this->menuHtml, $this->cache);
        }
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
        $this->output();
    }

    protected function getCat(){
        $res = $this->db->all("SELECT * FROM {$this->table}");

        $cat = [];
        foreach ($res as $row){
            $cat[$row['id']] = $row;
        }
        return $cat;
    }

    protected function getTree(){
        $tree = [];
        $data = $this->data;
        foreach ($data as $id => &$node) {
            if (!$node['parent_id']){
                $tree[$id] = &$node;
            }else{
                $data[$node['parent_id']]['childs'][$id] = &$node;
            }
        }
        return $tree;
    }

    protected function getMenuHtml($tree, $tab = ''){
        $str = '';
        foreach($tree as $id => $category){
            $str .= $this->catToTemplate($category, $tab, $id, $this->selected);
        }
        return $str;
    }

    protected function catToTemplate($category, $tab, $id, $selected){
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }
}