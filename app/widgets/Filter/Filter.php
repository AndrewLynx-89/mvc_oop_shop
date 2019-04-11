<?php

namespace app\widgets\Filter;

use engine\Cache\Cache;
use engine\Database\Database;

class Filter
{
    protected $db;
    public $groups;
    public $attrs;
    public $tpl;
    public $filter;

    public function __construct($filter = null, $tpl = ''){
        $this->db = Database::instance();
        $this->filter = $filter;
        $this->tpl = $tpl ?: FILTER_TPL . '/category_filter.php';
    }

    public function run(){
        $cache = Cache::instance();
        $this->groups = $cache->get('filter_group',1);
        if(!$this->groups){
            $this->groups = $this->getGroups();
            $cache->set('filter_group', $this->groups);
        }
        $this->attrs = $cache->get('filter_attrs',1);
        if(!$this->attrs){
            $this->attrs = self::getAttrs();
            $cache->set('filter_attrs', $this->attrs);
        }
        $filters = $this->getHtml();
        echo $filters;
    }

    protected function getHtml(){
        ob_start();
        $filter = self::getFilter();
        if(!empty($filter)){
            $filter = explode(',', $filter);
        }
        require $this->tpl;
        return ob_get_clean();
    }

    protected function getGroups(){
        $arr = $this->db->all("SELECT id, title FROM attribute_group");

        $arrOut = [];
        foreach ($arr as $arrkey => $arrval) {
            foreach ($arrval as $key => $val) {
                $arrOut[$arrkey + 1] = $val;
            }
        }
        return $arrOut;
    }

    protected function getAttrs(){
        $data = $this->db->all("SELECT * FROM attribute_value");

        $attrs = [];
        foreach($data as $k => $v){
            $attrs[$v['attr_group_id']][$k + 1] = $v['value'];
        }
        return $attrs;
    }

    public static function getFilter(){
        $filter = null;
        if(!empty($_GET['filter'])){
            $filter = preg_replace("#[^\d,]+#", '', $_GET['filter']);
            $filter = trim($filter, ',');
        }
        return $filter;
    }

    public function getCountGroups($filter_url){
        $filters = explode(',', $filter_url);
        $cache = Cache::instance();
        $attrs = $cache->get('filter_attrs');
        if(!$attrs){
            $attrs = $this->getAttrs();
        }
        $data = [];
        foreach($attrs as $key => $item){
            foreach($item as $k => $v){
                if(in_array($k, $filters)){
                    $data[] = $key;
                    break;
                }
            }
        }
        return count($data);
    }

}