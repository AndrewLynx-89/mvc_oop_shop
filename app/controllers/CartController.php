<?php

namespace app\controllers;

use app\models\User;
use app\models\Cart;
use app\models\Product;
use Rakit\Validation\Validator;

class CartController extends FrontController
{
    public function addAction(){
        $id = !empty($_GET['id']) ? (int)$_GET['id'] : null;
        $qty = !empty($_GET['qty']) ? (int)$_GET['qty'] : null;
        $mod_id = !empty($_GET['mod']) ? (int)$_GET['mod'] : null;
        $mod = null;

        $product_model = new Product();

        if($id){
            $product = $product_model->getProductById($id);
            if (!$product){
                return false;
            }
            if($mod_id){
                $mod = $product_model->getModifProduct($mod_id,$id);
            }
            $cart_model = new Cart();
            $cart_model->addToCart($product,$qty,$mod);
        }

        if ($this->isAjax()){
            $this->loadView('cart_modal','cart');
            die();
        }
    }

    public function showAction(){
       if ($this->isAjax()){
           $this->loadView('cart_modal','cart');
           die();
       }

    }

    public function deleteAction(){
        $id = !empty($_GET['id']) ? $_GET['id'] : null;
        if(isset($_SESSION['cart'][$id])){
            $cart_model = new Cart();
            $cart_model->deleteItem($id);
        }
        if($this->isAjax()){
            $this->loadView('cart_modal','cart');
            die();
        }
    }

    public function clearAction(){
        unset($_SESSION['cart']);
        unset($_SESSION['cart.qty']);
        unset($_SESSION['cart.sum']);
        if($this->isAjax()){
            $this->loadView('cart_modal','cart');
            die();
        }
    }

    public function viewAction(){
        $user_model = new User();
        $cart_model = new Cart();
        $validator = new Validator();

        if(!empty($_POST)){
            if(!User::checkAuth()){
                $valid = $validator->validate($_POST,[
                    'login' => 'required',
                    'fio' => 'required',
                    'email' => 'required',
                    'phone' => 'required|numeric',
                    'password' => 'required'
                ]);

                if(!$user_model->errors($valid)){
                    $new_id = $user_model->register($valid->getValidData());
                    $cart_model->saveOrder($new_id,$_POST['note']);
                }
            }
            $this->setMeta('Оформление заказа');

            $cart_model->saveOrder($_SESSION['user_id'],$_POST['note']);
        }
    }
}