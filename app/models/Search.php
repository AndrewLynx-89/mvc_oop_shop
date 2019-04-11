<?php

namespace app\models;

use engine\Base\Model;

class Search extends Model
{
    public function liveSearch($query){
        return $this->db->all("SELECT id, title FROM products WHERE title LIKE '%{$query}%' LIMIT 11");
    }

    public function getSearchingData($query){
        return $this->db->all("SELECT * FROM products WHERE title LIKE '%{$query}%'");
    }
}