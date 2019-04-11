<?php

namespace app\models;

use engine\Base\Model;

class Cart extends Model
{
    public function addToCart($product, $qty = 1, $mod = false){
        if($mod){
            $ID = "{$product['id']}-{$mod['id']}";
            $title = "{$product['title']} ({$mod['title']})";
            $price = $mod['price'];
        }else{
            $ID = $product['id'];
            $title = $product['title'];
            $price = $product['price'];
        }

        if(isset($_SESSION['cart'][$ID])){
            $_SESSION['cart'][$ID]['qty'] += $qty;
        }else{
            $_SESSION['cart'][$ID] = [
                'qty' => $qty,
                'title' => $title,
                'alias' => $product['alias'],
                'price' => $price,
                'img' => $product['img'],
            ];
        }
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * $price : $qty * $price;
    }

    public function deleteItem($id){
        $qtyMinus = $_SESSION['cart'][$id]['qty'];
        $sumMinus = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
        $_SESSION['cart.qty'] -= $qtyMinus;
        $_SESSION['cart.sum'] -= $sumMinus;
        unset($_SESSION['cart'][$id]);
    }

    public function saveOrder($id, $note){
      $data = $this->getUserDataForOrder($id);

      $order_id = $this->db->lastInsertId($this->setOrder($data,$note));

      $added = $this->saveOrderProduct($order_id);

      if ($added){
          $this->sendMail($order_id,$data);
      }
    }

    public function getUserDataForOrder($id){
        return $this->db->one("SELECT id, login, email, phone FROM users WHERE id = {$id}");
    }

    public function setOrder($data, $note){
        $params = [
            'note' => $note,
            'user_id' => $data['id'],
            'date_create' =>   date("Y-m-d H:i:s",time())
        ];
        $this->db->query("INSERT INTO orders (user_id, note, date_create) VALUES (:user_id, :note, :date_create)", $params);
    }

    public function saveOrderProduct($order_id){
        $sql_part = '';
        foreach($_SESSION['cart'] as $product_id => $product){
            $product_id = (int)$product_id;
            $price = $product['price'] *= $product['qty'];
            $sql_part .= "($order_id, $product_id, {$product['qty']}, '{$product['title']}', $price),";
        }
        $sql_part = rtrim($sql_part, ',');

       return $this->db->query("INSERT INTO order_product (order_id, product_id, qty, title, price) VALUES $sql_part");
    }

    public function sendMail($order_id,$data){
        mail($data['email'], 'Покупка оформленна', "Номер вашего заказа: #{$order_id}. Ожидайте звонка менеджера");

        unset($_SESSION['cart']);
        unset($_SESSION['cart.qty']);
        unset($_SESSION['cart.sum']);

        redirect('/');
    }

    public function countOrders(){
        return $this->db->col("SELECT COUNT(id) FROM orders");
    }

    public function getOrders($start,$perpage){
        return $this->db->all("SELECT `orders`.`id`, `orders`.`user_id`, `orders`.`status`, `orders`.`date_create`, `orders`.`update_at`, `users`.`fio`, ROUND(SUM(`order_product`.`price`), 2) AS `sum` FROM `orders`
                  JOIN `users` ON `orders`.`user_id` = `users`.`id`
                  JOIN `order_product` ON `orders`.`id` = `order_product`.`order_id`
                  GROUP BY `orders`.`id` ORDER BY `orders`.`status`, `orders`.`id` LIMIT $start, $perpage");
    }

    public function viewOrder($id){
        return $this->db->one("SELECT `orders`.*, `users`.`fio`, ROUND(SUM(`order_product`.`price`), 2) AS `sum` FROM `orders`
                  JOIN `users` ON `orders`.`user_id` = `users`.`id`
                  JOIN `order_product` ON `orders`.`id` = `order_product`.`order_id`
                  WHERE `orders`.`id` = {$id}
                  GROUP BY `orders`.`id` ORDER BY `orders`.`status`, `orders`.`id` LIMIT 1");
    }

    public function getOrderProducts($order_id){
        return $this->db->all("SELECT * FROM order_product WHERE order_id = {$order_id}");
    }

    public function getOrderById($order_id){
        return $this->db->one("SELECT * FROM orders WHERE id = {$order_id}");
    }

    public function updateOrderById($order_id, $status, $update_at){
        $params = [
            'id' => $order_id,
            'status' => $status,
            'update_at' => $update_at
        ];

        $this->db->query("UPDATE orders SET status = :status, update_at = :update_at WHERE id = :id",$params);
    }

    public function deleteOrderById($order_id){
        $this->db->query("DELETE FROM order_product WHERE order_id = {$order_id}");
        $this->db->query("DELETE FROM orders WHERE id = {$order_id}");
    }
}