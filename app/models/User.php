<?php

namespace app\models;

use engine\Base\Model;

class User extends Model
{
    public function register($valid_data){
        $hash = $this->createToken();

        $valid_data = array_replace($valid_data, ['password' => password_hash($valid_data['password'], PASSWORD_BCRYPT)]);
        $token = ['token' => $hash];

        $params = array_merge($valid_data, $token);

        $result = $this->db->query("INSERT INTO users (login, fio, email, phone, password, token) VALUES (:login, :fio, :email, :phone, :password, :token)",$params);

       if ($result) {
           mail($valid_data['email'], 'Register', 'Confirm: ' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/user/confirm?token=' . $hash);
           return $this->db->lastInsertId($result);
       }
    }

    public function login($valid_data){
        $user_data = $this->getUserByEmail($valid_data);

        if (!$user_data){
           return false;
        }
        if (password_verify($valid_data['password'], $user_data['password']) == true){
            $_SESSION['user_id'] = $user_data['id'];
            $_SESSION['user_login'] = $user_data['login'];
            $_SESSION['user_role'] = $user_data['role'];
        }
        return false;
    }

    public function update($valid_data){
        $this->db->query("UPDATE users SET  login = :login, fio = :fio, email = :email, phone = :phone, role = :role, address = :address WHERE id = :id",$valid_data);
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_login']);
        unset($_SESSION['user_role']);

        redirect('/');
    }

    public function createToken(){
        return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyz', 30)), 0, 30);
    }

    public function checkTokenExists($token){
        $params = [
            'token' => $token,
        ];
        return $this->db->col('SELECT id FROM users WHERE token = :token', $params);
    }

    public function activate($token){
        $params = [
            'token' => $token,
        ];
        $this->db->query('UPDATE users SET status = "1", token = "" WHERE token = :token', $params);
    }

    public function checkEmailExists($email){

        $params = [
            'email' => $email
        ];

        return $this->db->one('SELECT * FROM users WHERE email = :email', $params);
    }

    public function checkStatus($valid_data){
        $status = $this->db->col('SELECT status FROM users WHERE  email = :email', $valid_data);
        if ($status != 1) {
            return false;
        }
        return true;
    }

    public function recovery($valid_data){

        $token = $this->createToken();

        $hash = ['token' => $token];

        $valid_data = array_merge($valid_data, $hash);

        $result = $this->db->query('UPDATE users SET status = "0", token = :token, password = "" WHERE email = :email', $valid_data);

        if ($result){
            mail($valid_data['email'], 'Recovery', 'Confirm: ' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/user/recovery?token=' . $token);
        }
    }

    public function reset($valid_data){
        $params = array_replace($valid_data, ['password' => password_hash($valid_data['password'], PASSWORD_BCRYPT)]);

        $this->db->query('UPDATE users SET status = "1", token = "", password = :password WHERE token = :token', $params);
    }

    public static function checkAuth(){
        return isset($_SESSION['user_id']);
    }

    public static function isAdmin(){
        return (isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'admin');
    }

    public function getUserDataForOrder($id){
        return $this->db->one("SELECT id, login, email, phone FROM users WHERE id = {$id}");
    }

    public function totalUsers(){
        return $this->db->col("SELECT COUNT(id) FROM users");
    }

    public function getAllUsers($start, $perpage){
        return $this->db->all("SELECT * FROM users LIMIT $start, $perpage");
    }

    public function getUserById($id){
        return $this->db->one("SELECT * FROM users WHERE id = {$id}");
    }

    public function getUserByEmail($valid_data){
        unset($valid_data['password']);
        return $this->db->one("SELECT id,login,role,password FROM users WHERE email = :email",$valid_data);
    }

    public function userOrders($user_id){
        return $this->db->all("SELECT `orders`.`id`, `orders`.`user_id`, `orders`.`status`, `orders`.`date_create`, `orders`.`update_at`, ROUND(SUM(`order_product`.`price`), 2) AS `sum` FROM `orders`
                  JOIN `order_product` ON `orders`.`id` = `order_product`.`order_id`
                  WHERE user_id = {$user_id} GROUP BY `orders`.`id` ORDER BY `orders`.`status`, `orders`.`id`");
    }
}