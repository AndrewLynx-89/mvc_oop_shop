<?php

namespace app\controllers\admin;

use app\models\Cart;
use engine\libs\Pagination;

class OrderController extends AdminController
{
    public function indexAction()
    {
        $cart_model = new Cart();

        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 1;

        $total = $cart_model->countOrders();
        $pagination = new Pagination($current_page,$perpage,$total);
        $start = $pagination->getStart();

        $orders = $cart_model->getOrders($start,$perpage);


        $this->setMeta('Список заказов');
        $this->set(compact('orders', 'pagination','total'));
    }

    public function viewAction()
    {
        $cart_model = new Cart();

        $order_id = $_GET['id'];
        $order = $cart_model->viewOrder($order_id);

        if(!$order){
            throw new \Exception('Страница не найдена', 404);
        }

        $order_products = $cart_model->getOrderProducts($order_id);

        $this->setMeta("Заказ №{$order['id']}");
        $this->set(compact('order', 'order_products'));
    }

    public function changeAction()
    {
        $cart_model = new Cart();

        $order_id = $_GET['id'];

        $status = !empty($_GET['status']) ? '1' : '0';

        $update_at = date("Y-m-d H:i:s");

        $cart_model->updateOrderById($order_id, $status, $update_at);

        redirect('/admin/order');
    }

    public function deleteAction()
    {
        $cart_model = new Cart();

        $order_id = $_GET['id'];

        $cart_model->deleteOrderById($order_id);

        redirect('/admin/order');
    }
}