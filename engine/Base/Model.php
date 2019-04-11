<?php

namespace engine\Base;

use engine\Database\Database;

class Model
{


    protected $db;

    public function __construct(){
        $this->db = Database::instance();
    }

    public function errors($data){
        if ($data->fails()){
            $errors = $data->errors();
            return print_r($errors->firstOfAll());
        }
    }

    public function editAlias($id, $title, $table){

        $alias = $this->str2url($title);

        if ($alias === $this->getAlias($id,$table)){
           return $alias = $alias . '-' . $id;
        }
        return $alias;
    }

    public function getAlias($id,$table){
        $params = [
            'id' => $id
        ];
        return $this->db->col("SELECT alias FROM {$table} WHERE id = :id",$params);
    }

    public function str2url($str){
        $str = $this->rus2translit($str);
        $str = strtolower($str);
        $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
        $str = trim($str, "-");
        return $str;
    }

    public function rus2translit($string){
        $converter = array(
            'а' => 'a',   'б' => 'b',   'в' => 'v',
            'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
            'и' => 'i',   'й' => 'y',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',
            'ф' => 'f',   'х' => 'h',   'ц' => 'c',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
            'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

            'А' => 'A',   'Б' => 'B',   'В' => 'V',
            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
            'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
            'И' => 'I',   'Й' => 'Y',   'К' => 'K',
            'Л' => 'L',   'М' => 'M',   'Н' => 'N',
            'О' => 'O',   'П' => 'P',   'Р' => 'R',
            'С' => 'S',   'Т' => 'T',   'У' => 'U',
            'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
            'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
            'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
        );
        return strtr($string, $converter);
    }


    public function uploadMultipleImage($name, $wmax, $hmax, $folder = 'gallery'){

        if (!empty($_FILES)) {
            $uploaddir = UPLOADS . '/' . $folder . '/';
            $types = array("image/gif", "image/png", "image/jpeg", "image/x-png");
            $res = [];
            foreach($_FILES[$name]['tmp_name'] as $key => $value) {
                $ext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES[$name]['name'][$key]));
                if($_FILES[$name]['size'][$key] > 1048576){
                    $res = array("error" => "Ошибка! Максимальный вес файла - 1 Мб!");
                    exit(json_encode($res));
                }
                if($_FILES[$name]['error'][$key]){
                    $res = array("error" => "Ошибка! Возможно, файл слишком большой.");
                    exit(json_encode($res));
                }
                if(!in_array($_FILES[$name]['type'][$key], $types)){
                    $res = array("error" => "Допустимые расширения - .gif, .jpg, .png");
                    exit(json_encode($res));
                }
                $new_name = random() . ".$ext";
                $uploadfile = $uploaddir.$new_name;

                if(move_uploaded_file($_FILES[$name]['tmp_name'][$key], $uploadfile)){
                    switch ($name){
                        case "multi";
                            $_SESSION['multi'][] = $new_name;
                            break;
                    }
                }
                self::resize($uploadfile, $uploadfile, $wmax, $hmax, $ext);
                $res[] = $new_name;
            }
            return $res;
        }
    }

    public function uploadImg($name, $wmax, $hmax, $folder = 'images'){
        $uploaddir = UPLOADS . '/' . $folder . '/';
        $ext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES[$name]['name']));
        $types = array("image/gif", "image/png", "image/jpeg", "image/x-png","image/jpeg");

        if($_FILES[$name]['size'] > 1048576){
            $res = array("error" => "Ошибка! Максималный вес файла - 1 Мб!");
            exit(json_encode($res));
        }
        if($_FILES[$name]['error']){
            $res = array("error" => "Ошибка! Возможно, файл слишком большой.");
            exit(json_encode($res));
        }
        if(!in_array($_FILES[$name]['type'], $types)){
            $res = array("error" => "Допустимые расширения - .gif, .jpg, .png");
            exit(json_encode($res));
        }
        $new_name = random() . ".$ext";
        $uploadfile = $uploaddir.$new_name;

        if(@move_uploaded_file($_FILES[$name]['tmp_name'], $uploadfile)){
            switch ($name){
                case "slider_pict";
                    $_SESSION['slider_pict'] = $new_name;
                    break;
                case "single";
                    $_SESSION['single'] = $new_name;
                    break;
            }
        }
            self::resize($uploadfile, $uploadfile, $wmax, $hmax, $ext);
            $res[] = $new_name;
            return $res;

    }

    public static function resize($target, $dest, $wmax, $hmax, $ext){
        list($w_orig, $h_orig) = getimagesize($target);
        $ratio = $w_orig / $h_orig;

        if(($wmax / $hmax) > $ratio){
            $wmax = $hmax * $ratio;
        }else{
            $hmax = $wmax / $ratio;
        }

        $img = "";
        switch($ext){
            case("gif"):
                $img = imagecreatefromgif($target);
                break;
            case("png"):
                $img = imagecreatefrompng($target);
                break;
            default:
                $img = imagecreatefromjpeg($target);
        }
        $newImg = imagecreatetruecolor($wmax, $hmax);

        if($ext == "png"){
            imagesavealpha($newImg, true);
            $transPng = imagecolorallocatealpha($newImg,0,0,0,127);
            imagefill($newImg, 0, 0, $transPng);
        }

        imagecopyresampled($newImg, $img, 0, 0, 0, 0, $wmax, $hmax, $w_orig, $h_orig);
        switch($ext){
            case("gif"):
                imagegif($newImg, $dest);
                break;
            case("png"):
                imagepng($newImg, $dest);
                break;
            default:
                imagejpeg($newImg, $dest);
        }
        imagedestroy($newImg);
    }
}