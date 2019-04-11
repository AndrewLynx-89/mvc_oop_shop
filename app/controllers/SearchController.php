<?php

namespace app\controllers;

use app\models\Search;

class SearchController extends FrontController
{
    public function typeaheadAction(){
        if($this->isAjax()){
            $query = !empty(trim($_GET['query'])) ? trim($_GET['query']) : null;
            if($query){
                $search_model = new Search();
                $products = $search_model->liveSearch($query);
                echo json_encode($products);
            }
        }
        die;
    }

    public function indexAction(){
        $query = !empty(trim($_GET['search'])) ? trim($_GET['search']) : null;
        if($query){
            $search_model = new Search();
            $products = $search_model->getSearchingData($query);
        }
        $this->setMeta('Результаты поиска');
        $this->set(compact('products', 'query'));
    }
}