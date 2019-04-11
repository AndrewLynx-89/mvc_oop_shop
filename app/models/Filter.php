<?php

namespace app\models;

use engine\Base\Model;

class Filter extends Model
{
    public function addFilterGroup($valid_data){
        $this->db->query("INSERT INTO attribute_group (title) VALUES (:title)",$valid_data);
    }

    public function editFilterGroup($valid_data){
        $this->db->query("UPDATE attribute_group SET title = :title where id = :id",$valid_data);
    }

    public function deleteGroupFilter($id){
        $this->db->query("DELETE FROM attribute_group WHERE id = {$id}");
    }

    public function countAttrValues($id){
        return $this->db->col("SELECT count(id) FROM attribute_value WHERE attr_group_id = {$id}");
    }

    public function getAllGroups(){
        return $this->db->all("SELECT * FROM attribute_group");
    }

    public function getGroupById($id){
        return $this->db->one("SELECT * FROM attribute_group WHERE id = {$id}");
    }

    public function getAllAttributes(){
        return $this->db->all("SELECT attribute_value.*, attribute_group.title FROM attribute_value JOIN attribute_group ON attribute_group.id = attribute_value.attr_group_id");
    }

    public function addAttribute($valid_data){
        $this->db->query("INSERT INTO attribute_value (value ,attr_group_id) VALUES (:value, :attr_group_id)",$valid_data);
    }

    public function editAttribute($valid_data){
        $this->db->query("UPDATE attribute_value SET attr_group_id = :attr_group_id, value = :value where id = :id",$valid_data);
    }

    public function getArrById($id){
        return $this->db->one("SELECT * FROM attribute_value WHERE id = {$id}");
    }

    public function deleteValueAndProductAttribute($id){
        $this->db->query("DELETE FROM attribute_product WHERE attr_id = {$id}");
        $this->db->query("DELETE FROM attribute_value WHERE id = {$id}");
    }
}