<?php

namespace app\models;

use engine\Base\Model;

class Slider extends Model
{
    public function getSlides(){
        return $this->db->all("SELECT id, title, subtitle, price, image FROM main_slider");
    }

    public function getSingleSlides($id){
        return $this->db->one("SELECT * FROM main_slider WHERE id = {$id}");
    }

    public function addSlide($valid_data){
        $result = $this->db->query("INSERT INTO main_slider (title, subtitle, price) VALUES (:title, :subtitle, :price)",$valid_data);

        return $this->db->lastInsertId($result);
    }

    public function editSlide($valid_data){
        $this->db->query("UPDATE main_slider SET title = :title, subtitle = :subtitle, price = :price WHERE id = :id",$valid_data);
    }

    public function deleteSlide($id){
        $this->findAndDelSliderImage($id);

        $this->db->query("DELETE FROM main_slider WHERE id = {$id}");
    }

    public function addImage($id){
        if(!empty($_SESSION['slider_pict'])){
            $params = [
                'image' => $_SESSION['slider_pict']
            ];
            $this->db->query("UPDATE main_slider SET image = :image WHERE id = {$id}",$params);
            unset($_SESSION['slider_pict']);
        }
    }

    public function changeSliderImage($id){
        if (!empty($_SESSION['slider_pict'])){
           $this->findAndDelSliderImage($id);
        }
    }

    public function findAndDelSliderImage($id){
        $params = [
            'id' => $id
        ];
        $image = $this->db->one("SELECT image FROM main_slider WHERE id = :id",$params);

        $image =  array_shift($image);

        if (!empty($image) || $image != 'no-slider-image'){
            unlink("public/uploads/slider/{$image}");
        }
    }
}