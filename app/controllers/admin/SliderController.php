<?php

namespace app\controllers\admin;

use app\models\Slider;
use Rakit\Validation\Validator;

class SliderController extends AdminController
{
    public function indexAction(){
        $slider_model = new Slider();

        $slides = $slider_model->getSlides();

        $this->setMeta('Список слайдов');

        $this->set(compact('slides'));
    }

    public function createAction(){
        $slider_model = new Slider();

        if (!empty($_POST)){

            $validator = new Validator();
            $valid = $validator->validate($_POST,[
                'title' => 'required',
                'subtitle' => 'required',
                'price' => 'required'
            ]);

            if(!$slider_model->errors($valid)){
               $id = $slider_model->addSlide(($valid->getValidData()));
               $slider_model->addImage($id);
               redirect('/admin/slider/');
            }
        }

        $this->setMeta("Добавление нового слайда");
    }

    public function updateAction(){
        $slider_model = new Slider();

        $single_slide = $slider_model->getSingleSlides($_GET['id']);

        if (!empty($_POST)){

            $validator = new Validator();
            $valid = $validator->validate($_POST + $_GET,[
                'id' => 'required',
                'title' => 'required',
                'subtitle' => 'required',
                'price' => 'required'
            ]);
            if(!$slider_model->errors($valid)){
                $slider_model->editSlide($valid->getValidData());
                $slider_model->changeSliderImage($_GET['id']);
                $slider_model->addImage($_GET['id']);
                redirect('/admin/slider/');
            }
        }

        $this->setMeta("Редактирования слайда №{$single_slide['id']}");
        $this->set(compact('single_slide'));
    }

    public function deleteAction(){
        $slide_id = !empty($_GET['id']) ? $_GET['id'] : null;

        $slider_model = new Slider();
        $slider_model->deleteSlide($slide_id);
        redirect('/admin/slider/');

    }

    public function uploadSliderImageAction(){
        if ($this->isAjax()){
            $slider_model = new Slider();
            $result = $slider_model->uploadImg('slider_pict',1280,720,'slider');
            $this->loadView('slider_pict_img', 'admin/slider', compact('result'));
        }
        die();
    }


}