<?php

namespace app\controllers\admin;

use app\models\Cart;
use app\models\Slider;
use app\models\User;
use app\models\Category;

class MainController extends AdminController
{
    public function indexAction()
    {
        $user_model = new User();
        $cart_model = new Cart();
        $cat_model = new Category();

        $users = $user_model->totalUsers();
        $categories = $cat_model->countCategories();
        $orders = $cart_model->countOrders();

        $this->setMeta('Страница админки');
        $this->set(compact('users','categories','orders'));
    }
}