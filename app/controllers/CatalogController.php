<?php

namespace app\controllers;

use app\models\Product;
use app\models\Category;
use app\widgets\Filter\Filter;
use engine\libs\Pagination;

class CatalogController extends FrontController
{
    public function indexAction()
    {
        $cat_model = new Category();
        $product_model = new Product();

        $filter = new Filter();

        $ids = $cat_model->catalogIds($this->route['alias']);

        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 3;

        $sql_part = '';

        if(!empty($_GET['filter'])){

            $filter_url = Filter::getFilter();
            if($filter_url){
                $count = $filter->getCountGroups($filter_url);
                $sql_part = "AND id IN (SELECT product_id FROM attribute_product WHERE attr_id IN ($filter_url) GROUP BY product_id HAVING COUNT(product_id) = $count)";
            }
        }

        $total = $product_model->totalProducts($ids,$sql_part);
        $pagination = new Pagination($current_page, $perpage, $total);
        $start = $pagination->getStart();
        $products = $product_model->getProductByCategoryId($ids, $start, $perpage, $sql_part);


        if($this->isAjax()){
            $this->loadView('result', 'catalog', compact('products', 'total', 'pagination'));
            die();
        }

        $this->setMeta('Каталог товаров');

        $this->set(compact('products','total', 'pagination'));
    }

    public function viewAction()
    {
        $product_model = new Product();
        $cat_model = new Category();

        $view_product = $product_model->getProductById($this->route['id']);

        $modifications = $cat_model->getModifications($this->route['id']);

        $this->setMeta("{$view_product['title']}");

        $this->set(compact('view_product','modifications'));
    }
}