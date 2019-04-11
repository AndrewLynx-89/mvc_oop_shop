<?php

namespace app\controllers\admin;

use engine\Cache\Cache;

class CacheController extends AdminController
{
    public function indexAction()
    {
        $this->setMeta('Управление кешем');
    }

    public function deleteAction(){
        $key = isset($_GET['key']) ? $_GET['key'] : null;
        $cache = Cache::instance();
        switch($key){
            case 'category':
                $cache->delete('shop_menu');
                break;
            case 'filter':
                $cache->delete('filter_group');
                $cache->delete('filter_attrs');
                break;
        }
        redirect('/admin/cache/');
    }
}