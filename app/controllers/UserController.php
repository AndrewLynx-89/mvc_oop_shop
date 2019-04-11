<?php

namespace app\controllers;

use app\models\User;
use Rakit\Validation\Validator;

class UserController extends FrontController
{
    public $layout = 'user_form';

    public function regAction(){
       if(!empty($_POST)){
           $user_model = new User;
           $validator = new Validator();

           $valid = $validator->validate($_POST,[
               'login' => 'required',
               'fio' => 'required',
               'email' => 'required',
               'phone' => 'required',
               'password' => 'required'
           ]);

           if(!$user_model->errors($valid)){
               $user_model->register($valid->getValidData());
               redirect('/user/login');
           }
       }
        $this->setMeta('Регистрация нового пользователя');
    }

    public function loginAction(){
       if(!empty($_POST)){
           $user_model = new User();
           $validator = new Validator();

           $valid = $validator->validate($_POST,[
               'email' => 'required',
               'password' => 'required'
           ]);

           if (!$user_model->checkEmailExists($_POST['email'])){
               exit("Пользователя с электронным адресом:{$_POST['email']} не найдено");
           }

           if(!$user_model->errors($valid)){
             $user_model->login($valid->getValidData());
             redirect('/');
           }
       }
        $this->setMeta('Авторизация');

    }

    public function logoutAction(){
        $user_model = new User();
        $user_model->logout();
    }

    public function confirmAction(){
        $user_model = new User;

        $token = (isset($_GET['token'])) ? $_GET['token'] : null;

        if($user_model->checkTokenExists($token))
        {
            $user_model->activate($token);
            redirect('/user/login');
        }
        redirect('/');
    }

    public function forgotAction(){
        if(!empty($_POST)){
            $user_model = new User();
            $validator = new Validator();

            $valid = $validator->validate($_POST,[
                'email' => 'required'
            ]);

            if (!$user_model->checkEmailExists($_POST['email'])){
                exit("Пользователя с электронным адресом:{$_POST['email']} не найдено");
            }

            if (!$user_model->checkStatus($_POST['email'])){
                exit("Аккаунт ожидает подтверждения по E-mail");
            }

            if(!$user_model->errors($valid)){
                $user_model->recovery($valid->getValidData());
                redirect('/');
            }
        }

        $this->setMeta('Восстановление доступа к аккаунту');

        $this->set(compact('errors'));
    }

    public function recoveryAction(){
        $user_model = new User();
        $validator = new Validator();

        if(!empty($_POST)){
            $valid = $validator->validate($_POST + $_GET,[
                'password' => 'required',
                'token' => 'required'
            ]);

            if(!$user_model->errors($valid)){
                $user_model->reset($valid->getValidData());
                redirect('/');
            }
        }
        $this->setMeta('Страница смены пароля');

    }

    public function loginAdminAction(){
        if(!empty($_POST)){

            $user_model = new User();
            $validator = new Validator();

            $valid = $validator->validate($_POST,[
                'email' => 'required',
                'password' => 'required'
            ]);

            if(!$user_model->errors($valid)){
                if(!$user_model->login($valid->getValidData())){
                    $_SESSION['error'] = 'Неверные email или пароль';
                }
                unset($_SESSION['error']);
                @redirect('/admin');

            }
        }
        $this->layout = 'admin_side_login';
        $this->setMeta('Авторизация');
    }
}