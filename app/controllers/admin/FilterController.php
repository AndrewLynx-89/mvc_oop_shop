<?php

namespace app\controllers\admin;

use app\models\Filter;
use Rakit\Validation\Validator;

class FilterController extends AdminController
{
    public function indexAction()
    {
        redirect('/admin/filter/attribute-group');
    }

    public function attributeGroupAction()
    {
        $filter_model = new Filter();

        $attrs_group = $filter_model->getAllGroups();

        $this->setMeta('Список группы аттрибутов');
        $this->set(compact('attrs_group'));
    }

    public function groupAddAction()
    {
        if(!empty($_POST)){

            $filter_model = new Filter();
            $validator = new Validator();

            $valid = $validator->validate($_POST, [
                'title' => 'required',
            ]);

            if (!$filter_model->errors($valid)){
                $filter_model->addFilterGroup($valid->getValidData());
                redirect('/admin/filter/attribute-group');
            }
        }
        $this->setMeta('Добавление группы');
    }

    public function groupEditAction()
    {
        $filter_model = new Filter();

        $group = $filter_model->getGroupById($_GET['id']);

        if(!empty($_POST)){
            $validator = new Validator();

            $valid = $validator->validate($_POST + $_GET, [
                'id' => 'required',
                'title' => 'required',
            ]);

            if (!$filter_model->errors($valid)){
                $filter_model->editFilterGroup($valid->getValidData());
                redirect('/admin/filter/attribute-group');
            }
        }

        $this->setMeta('Редактирование группы');
        $this->set(compact('group'));

    }

    public function groupDeleteAction()
    {
        $filter_model = new Filter();

        $count = $filter_model->countAttrValues($_GET['id']);
        if($count){
            $_SESSION['error'] = 'Удаление невозможно, в группе есть атрибуты';
            redirect();
        }
        $filter_model->deleteGroupFilter($_GET['id']);
        redirect('/admin/filter/attribute-group');
    }

    public function attributeValueAction()
    {
        $filter_model = new Filter();

        $attrs = $filter_model->getAllAttributes();

        $this->setMeta('Список атрибутов');
        $this->set(compact('attrs'));
    }

    public function attributeAddAction()
    {
        $filter_model = new Filter();

        if(!empty($_POST)){

            $validator = new Validator();

            $valid = $validator->validate($_POST, [
                'value' => 'required',
                'attr_group_id' => 'required',
            ]);

            if (!$filter_model->errors($valid)){
                $filter_model->addAttribute($valid->getValidData());
                redirect('/admin/filter/attribute-value');
            }
        }

        $group = $filter_model->getAllGroups();

        $this->setMeta('Добавление аттрибутов');
        $this->set(compact('group'));
    }

    public function attributeEditAction()
    {
        $filter_model = new Filter();

        if(!empty($_POST)){

            $validator = new Validator();

            $valid = $validator->validate($_POST + $_GET, [
                'id' => 'required',
                'value' => 'required',
                'attr_group_id' => 'required',
            ]);

            if (!$filter_model->errors($valid)){
                $filter_model->editAttribute($valid->getValidData());
                redirect('/admin/filter/attribute-value');
            }
        }
        $attr = $filter_model->getArrById($_GET['id']);
        $attrs_group = $filter_model->getAllGroups();

        $this->setMeta('Редактирование аттрибутов');
        $this->set(compact('attr','attrs_group'));
    }

    public function attributeDeleteAction()
    {
        $filter_model = new Filter();

        $filter_model->deleteValueAndProductAttribute($_GET['id']);

        redirect('/admin/filter/attribute-value');

    }
}