<?php
require_once("BaseModel.php");

class HomeSlideModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
            mysqli_set_charset(static::$db,"utf8");
        }
    }

    function getHomeSlideBy(){
        $sql = "SELECT * 
        FROM tb_home_slide";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getHomeSlideByID($id){
        $sql = " SELECT * 
        FROM tb_home_slide
        WHERE slide_id = '$id' 
        ";

        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data;
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data = $row;
            }
            $result->close();
            return $data;
        }
    }
    
    function updateHomeSlideByID($id,$data = []){
        $data['slide_title_en']=mysqli_real_escape_string(static::$db,$data['slide_title_en']);
        $data['slide_title_th']=mysqli_real_escape_string(static::$db,$data['slide_title_th']);
        $data['slide_detail_en']=mysqli_real_escape_string(static::$db,$data['slide_detail_en']);
        $data['slide_detail_th']=mysqli_real_escape_string(static::$db,$data['slide_detail_th']);
        $data['slide_img']=mysqli_real_escape_string(static::$db,$data['slide_img']);
        $data['slide_link'] = mysqli_real_escape_string(static::$db,$data['slide_link']);
        $sql = " UPDATE tb_home_slide SET 
        slide_title_en = '".$data['slide_title_en']."',
        slide_title_th = '".$data['slide_title_th']."',
        slide_detail_en = '".$data['slide_detail_en']."',
        slide_detail_th = '".$data['slide_detail_th']."',
        slide_img = '".$data['slide_img']."',
        slide_link = '".$data['slide_link']."'
        WHERE slide_id = $id "; 

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

    function insertHomeSlide($data=[]){
        $sql = " INSERT INTO tb_home_slide(
        slide_title_en,
        slide_title_th,
        slide_detail_en,
        slide_detail_th,
        slide_img,
        slide_link
    ) VALUES ('".
    mysqli_real_escape_string(static::$db,$data['slide_title_en'])."','".
    mysqli_real_escape_string(static::$db,$data['slide_title_th'])."','".
    mysqli_real_escape_string(static::$db, $data['slide_detail_en'])."','".
    mysqli_real_escape_string(static::$db,$data['slide_detail_th'])."','".
    mysqli_real_escape_string(static::$db, $data['slide_img'])."','".
    mysqli_real_escape_string(static::$db, $data['slide_link'])."') 
    ";
    // echo($sql);
    if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
        return mysqli_insert_id(static::$db);
    }else {
        return 0;
    }
}

function deleteHomeSlideByID($id){
    $sql = "DELETE FROM tb_home_slide WHERE slide_id = '$id' ";
    if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
        return 1;
    }else {
        return 0;
    }
}
}
?>