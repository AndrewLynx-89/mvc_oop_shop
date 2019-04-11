<?php

namespace app\controllers\admin;

use app\models\Product;
use Rakit\Validation\Validator;

class ProductController extends AdminController
{
    public function indexAction(){
        $product_model = new Product();
        $products = $product_model->getAllProducts();

        $this->setMeta('Список товаров магазина');
        $this->set(compact('products'));
    }

    public function createAction(){
        $product_model = new Product();
        if (!empty($_POST)) {
            $validator = new Validator();

            $valid = $validator->validate($_POST, [
                'title' => 'required',
                'price' => 'required|integer',
                'category_id' => 'required|integer',
                'content' => 'required',
//                'status' => 'integer',
//                'hit' => 'integer',
            ]);

            if (!$product_model->errors($valid)){
                $id = $product_model->createProduct($valid->getValidData());
                if($id){
                    $product_model->setImg($id);
                    $product_model->saveGalleryImages($id);
                    $product_model->editFilter($id,$_POST);
                }
                redirect('/admin/product');
            }
        }

        $this->setMeta('Добавление нового товара');

        $this->set(compact('brands'));
    }

    public function updateAction(){
        $product_model = new Product();

        $product = $product_model->getProductById($_GET['id']);

        if (!empty($_POST)){
            $validator = new Validator();
            $valid = $validator->validate($_POST + $_GET, [
                'id' => 'integer',
                'title' => 'required',
                'price' => 'required|integer',
                'category_id' => 'required|integer',
                'content' => 'required'
            ]);

            if (!$product_model->errors($valid))
            {
               $product_model->updateProduct($valid->getValidData());
               $product_model->changeProductImage($product['id']);
               $product_model->setImg($product['id']);
               $product_model->saveGalleryImages($product['id']);
               $product_model->editFilter($_GET['id'],$_POST);

                redirect('/admin/product');
            }
        }

        $filter = $product_model->getAttrs($product['id']);

        $gallery = $product_model->galleryImages($product['id']);

        $this->setMeta("Редактирования товара №{$product['id']}");
        $this->set(compact('product','gallery', 'filter'));
    }

    public function deleteAction(){
        $product_model = new Product();
        $product_model->findAndDelProductImage($_GET['id']);
        $product_model->delGalleryProduct($_GET['id']);
        $product_model->deleteProduct($_GET['id']);
        redirect('/admin/product');
    }

    public function deleteGalleryAction(){
        $product_model = new Product();
        $product_model->ajaxDelImage($_POST);
    }

    public function uploadSingleAction(){
        if ($this->isAjax()){
            $product_model = new Product();
            $result = $product_model->uploadImg('single',200,200,'product');
            $this->loadView('product_pict_img', 'admin/product', compact('result'));
            die();
        }
    }

    public function uploadMultiAction(){
        if ($this->isAjax()){
            $product_model = new Product();
            $result = $product_model->uploadMultipleImage('multi',1280,720);
            $this->loadView('product_multi_img', 'admin/product', compact('result'));
            die();
        }


    }
}