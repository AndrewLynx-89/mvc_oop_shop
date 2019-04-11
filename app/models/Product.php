<?php

namespace app\models;

use engine\Base\Model;

class Product extends Model
{
    public function createProduct($valid_data){
        $alias = ['alias' => $this->str2url($valid_data['title'])];

        $valid_data = array_merge($valid_data,$alias);

        $result = $this->db->query("INSERT INTO products
                                          (title,
                                          price,
                                          category_id,
                                          alias,
                                          content)
                                          VALUES
                                          (:title,
                                          :price,
                                          :category_id,
                                          :alias,
                                          :content)",$valid_data);

       return $this->db->lastInsertId($result);
    }


    public function editFilter($id, $array){
        $filter = $this->getAttrs($id);

        if (empty($array['attrs']) && !empty($filter)){
            $this->db->query("DELETE FROM attribute_product WHERE product_id = {$id}");
            return;
        }
        if(empty($filter) && !empty($array['attrs'])){
            $sql_part = '';
            foreach($array['attrs'] as $v){
                $sql_part .= "($v, $id),";
            } $sql_part = rtrim($sql_part, ',');

            $this->db->query("INSERT INTO attribute_product (attr_id, product_id) VALUES $sql_part");
            return;
        }
        if(!empty($array['attrs'])){
            $result = array_diff($filter, $array['attrs']);

            if($result || count($filter) != count($array['attrs'])){
                $this->db->query("DELETE FROM attribute_product WHERE product_id = {$id}");
                $sql_part = '';
                foreach($array['attrs'] as $v){
                    $sql_part .= "($v, $id),";
                }
                $sql_part = rtrim($sql_part, ',');
                $this->db->query("INSERT INTO attribute_product (attr_id, product_id) VALUES $sql_part");
            }
        }
    }

    public function getAttrs($id){
        $result = $this->db->all("SELECT * FROM attribute_product WHERE product_id = {$id}");

        $array = [];
        $i = 0;
        foreach ($result as $value){
            $array[$i+1] = $value['attr_id'];
            $i++;
        }

        return $array;
    }


    public function updateProduct($valid_data){
        $params = array_replace($valid_data, ['alias' => $this->editAlias($valid_data['id'],$valid_data['title'],'products')]);

        $this->db->query("UPDATE products SET 
                                          title = :title, 
                                          price = :price, 
                                          alias = :alias, 
                                          content = :content,
                                          category_id = :category_id 
                                          WHERE id = :id",$params);
    }

    public function deleteProduct($id){
        $params = [
            'id' => $id
        ];

        $this->db->query('DELETE FROM products WHERE id = :id',$params);
        $this->db->query("DELETE FROM attribute_product WHERE product_id = {$id}");
    }


    public function delGalleryProduct($product_id){
        $params = [
            'product_id' => $product_id
        ];

      $result = $this->db->all("SELECT * FROM gallery WHERE product_id = :product_id",$params);

      foreach ($result as $data){
          unlink("public/uploads/gallery/{$data['img']}");
      }

    }

    public function getAllProducts(){
      return $this->db->all("SELECT * FROM products");
    }

    public function getProductById($id){
        $params = [
            'id' => $id
        ];
        return $this->db->one("SELECT * FROM products WHERE id = :id",$params);
    }

    public function getProductsByIds($idsArray){
        $idsString = implode(',', $idsArray);

        $params = [
            'idsString ' => $idsString
        ];
        return $this->db->all("SELECT * FROM products WHERE status = '1' AND id IN ($idsString)",$params);
    }

    public function getProductByCategoryId($ids, $start, $perpage, $sql_part){

        $params = [
            'start' => $start,
            'perpage' => $perpage
        ];

        if($ids){
            return $this->db->all("SELECT * FROM products WHERE category_id IN($ids) $sql_part LIMIT :start, :perpage" ,$params);
        }else{
            return $this->db->all("SELECT * FROM products LIMIT :start, :perpage",$params);
        }
    }

    public function totalProducts($ids, $sql_part){
        return $this->db->col("SELECT COUNT(id) FROM products WHERE category_id IN ($ids) $sql_part");
    }

    public function getModifProduct($mod_id, $id){
        return $this->db->one("SELECT * FROM modifications WHERE id = {$mod_id} AND product_id = {$id}");
    }

    public function galleryImages($id){
        return $this->db->all("SELECT * FROM gallery WHERE product_id = {$id}");
    }

    public function deleteImageFromGallery($id, $src){
        $params = [
            'product_id' => $id,
            'img' => $src
        ];

      return $this->db->query("DELETE FROM gallery WHERE product_id = :product_id AND img = :img",$params);
    }

    public function setImg($id){
        if(!empty($_SESSION['single'])){

            $params = [
                'single_image' => $_SESSION['single']
            ];

            $this->db->query("UPDATE products SET single_image = :single_image WHERE id = {$id}",$params);
            unset($_SESSION['single']);
        }
    }

    public function changeProductImage($id){
        if (!empty($_SESSION['single'])){
            $this->findAndDelProductImage($id);
        }
    }

    public function findAndDelProductImage($id){
        $params = [
            'id' => $id
        ];
        $image = $this->db->one("SELECT single_image FROM products WHERE id = :id",$params);

        $image =  array_shift($image);

        if (!empty($image) || $image != 'no-image'){
            unlink("public/uploads/product/{$image}");
        }
    }

    public function ajaxDelImage($post){
        $id = isset($post['id']) ? $post['id'] : null;
        $src = isset($post['src']) ? $post['src'] : null;

        if(!$id || !$src){
            return;
        }
        if($this->deleteImageFromGallery($id,$src)){
            unlink( "public/uploads/gallery/{$src}");
        }
        return;
    }

    public function saveGalleryImages($id){
        if(!empty($_SESSION['multi'])){

            $sql_part = '';
            foreach($_SESSION['multi'] as $v){
                $sql_part .= "('$v', $id),";
            }
            $sql_part = rtrim($sql_part, ',');

            $this->db->query("INSERT INTO gallery (img, product_id) VALUES $sql_part");
            unset($_SESSION['multi']);
        }
    }
}