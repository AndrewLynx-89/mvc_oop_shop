<?php

namespace app\models;

use engine\Base\Model;

class Category extends Model
{
    public function getAllCategories(){
        return $this->db->all("SELECT * FROM category");
    }

    public function getCategoryById($id){
        $params = [
            'id' => $id
        ];
        return $this->db->one('SELECT * FROM category WHERE id = :id',$params);
    }

    public function addCategory($valid_data){
        $alias = ['alias' => $this->str2url($valid_data['title'])];

        $params = array_merge($valid_data,$alias);

        $this->db->query('INSERT INTO category (title, alias, parent_id) VALUES (:title, :alias, :parent_id)', $params);
    }

    public function updateCategory($valid_data){
        $params = array_replace($valid_data, ['alias' => $this->editAlias($valid_data['id'],$valid_data['title'],'category')]);

        return $this->db->query('UPDATE category SET title = :title, parent_id = :parent_id, alias = :alias WHERE id = :id', $params);
    }

    public function deleteCategory($id){
        $params = [
            'id' => $id
        ];
        return $this->db->query('DELETE FROM category WHERE id = :id',$params);
    }

    public function getCountSubCat($id){
        return $this->db->col("SELECT count(*) FROM category WHERE parent_id = {$id}");
    }

    public function getCountProductInCat($id){
        return $this->db->col("SELECT count(*) FROM products WHERE {$id} = category_id");
    }

    public function countCategories(){
        return $this->db->col("SELECT count(id) FROM category");
    }

    public function getCat(){
        $res = $this->db->all("SELECT * FROM category");

        $cat = [];
        foreach ($res as $row){
            $cat[$row['id']] = $row;
        }
        return $cat;
    }

    public function getAliasId($cat_alias){
        if(!$cat_alias){
            return false;
        }
        foreach ($this->getCat() as $key => $value){
            if($value['alias'] == $cat_alias){
                return $key;
            }
        }
        return false;
    }

    public function getDescendants($id) {
        if(!$id){
            return false;
        }
        $descendants = "";
        foreach ($this->getCat() as $element) {
            if ($element['parent_id'] == $id) {
                $descendants .= $element['id'] . ",";
                $descendants .= $this->getDescendants($element['id']);
            }
        }
        return $descendants;
    }

    public function catalogIds($route){
        $get_alias = $this->getAliasId($route);
        $descendants = $this->getDescendants($get_alias);

        if(!$descendants){
            return $get_alias;
        }
        return $descendants.$get_alias;
    }

    public function getModifications($id){
        return $this->db->all("SELECT * FROM modifications WHERE product_id = {$id}");
    }

    public function getIdByAlias($alias){

        $params = [
            'alias' => $alias
        ];
        return $this->db->one("SELECT id FROM category WHERE alias = :alias",$params);
    }
}