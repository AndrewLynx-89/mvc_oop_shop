<?php

namespace app\controllers\admin;

use app\models\User;
use engine\Base\Controller;

class AdminController extends Controller
{
    public $layout = 'admin';

    public function __construct($route)
    {
        parent::__construct($route);

        $this->checkAuth();
    }

    public function checkAuth(){
        if (!User::isAdmin() && $this->route['action'] != 'login-action'){
            redirect('/user/login-admin');
        }
    }
}