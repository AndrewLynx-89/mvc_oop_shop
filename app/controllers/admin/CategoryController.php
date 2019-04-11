<?php

namespace app\controllers\admin;

use app\models\Category;
use Rakit\Validation\Validator;

class CategoryController extends AdminController
{
    public function indexAction()
    {
        $category_model = new Category();
        $categories = $category_model->getAllCategories();

        $this->setMeta('Список категорий интернет магазина');
        $this->set(compact('categories'));
    }

    public function createAction()
    {
        if (!empty($_POST)){

            $category_model = new Category();
            $validator = new Validator();

            $valid = $validator->validate($_POST,[
                'title' => 'required',
                'parent_id' => 'required|integer',
            ]);

            if(!$category_model->errors($valid)){
                $category_model->addCategory($valid->getValidData());
                redirect('/admin/category');
            }
        }
        $this->setMeta('Добавление новой категории');
    }

    public function updateAction()
    {
        $category_model = new Category();
        $category = $category_model->getCategoryById($_GET['id']);

        $validator = new Validator();

        if (!empty($_POST) && !empty($_GET['id'])){
            $valid = $validator->validate($_POST + $_GET,[
                'id' => 'integer',
                'title' => 'required',
                'parent_id' => 'integer'
            ]);

            if(!$category_model->errors($valid)){
                $category_model->updateCategory($valid->getValidData());
                redirect('/admin/category');
            }
        }
        $this->setMeta('Редактирование категории');
        $this->set(compact('category'));
    }

    public function deleteAction()
    {
        $category_model = new Category();

        $errors = false;

        $children = $category_model->getCountSubCat($_GET['id']);

        if($children){
            $errors[] = 'Удаление невозможно, в категории есть вложенные категории';
        }

        $products = $category_model->getCountProductInCat($_GET['id']);

        if($products){
            $errors[] = 'Удаление невозможно, в категории есть товары';
        }

        if ($errors == false){
            $category_model->deleteCategory($_GET['id']);
            redirect('/admin/category');
        }
    }
}