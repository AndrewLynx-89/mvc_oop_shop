<?php

namespace engine\Database;

use PDO;
use engine\Singleton;

class Database
{
    use Singleton;

    protected $db;

    protected function __construct(){
        $db = require ENGINE . '/Config/config_db.php';

        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $this->db = new PDO($db['dsn'],$db['user'],$db['pass'],$opt);
    }

    public function query($sql, $params = []) {
        $stmt = $this->db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                if (is_int($val)) {
                    $type = PDO::PARAM_INT;
                } else {
                    $type = PDO::PARAM_STR;
                }
                $stmt->bindValue(':'.$key, $val, $type);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    public function one($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result->fetch();
    }

    public function all($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result->fetchAll();
    }

    public function col($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }

    public function lastInsertId() {
        return $this->db->lastInsertId();
    }
}