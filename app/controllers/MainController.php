<?php

namespace app\controllers;

use app\models\Slider;

class MainController extends FrontController
{
    public function indexAction()
    {
        $slider_model = new Slider();

        $slides = $slider_model->getSlides();

        $this->setMeta('Главная страница интернет-магазина');
        $this->set(compact('slides'));
    }
}