<?php

namespace app\controllers\admin;

use app\models\User;
use engine\libs\Pagination;
use Rakit\Validation\Validator;

class UserController extends AdminController
{
    public function indexAction()
    {
        $user_model = new User();

        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 1;

        $total =  $user_model->totalUsers();
        $pagination = new Pagination($current_page,$perpage,$total);
        $start = $pagination->getStart();

        $users = $user_model->getAllUsers($start,$perpage);

        $this->setMeta('Список зарегистрированных пользователей');
        $this->set(compact('users', 'pagination','total'));
    }

    public function editAction()
    {
        $user_model = new User();

        $user = $user_model->getUserById($_GET['id']);
        $orders = $user_model->userOrders($_GET['id']);

       if(!empty($_POST)){
           $validator = new Validator();

           $valid = $validator->validate($_POST + $_GET,[
               'id' => 'required',
               'login' => 'required',
               'fio' => 'required',
               'email' => 'required',
               'phone' => 'required',
               'role' => 'required',
               'address' => 'required'
           ]);

           if(!$user_model->errors($valid)){
               $user_model->update($valid->getValidData());
               redirect('/admin/user');
           }
       }
        $this->setMeta('Редактирование пользователя');
        $this->set(compact('user', 'orders'));
    }
}