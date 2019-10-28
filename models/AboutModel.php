<?php
require_once("BaseModel.php");

class AboutModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
            mysqli_set_charset(static::$db,"utf8");
        }
    }

    function getAboutHeaderBy(){
        $sql = "SELECT * 
        FROM tb_about_header";

        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data;
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data = $row;
            }
            $result->close();
            return $data;
        }
    }
    function getAboutDetailBy(){
        $sql = "SELECT * 
        FROM tb_about_detail
        ";

        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }
    function getAboutDetailByID($id){
        $sql = "SELECT * 
        FROM tb_about_detail
        WHERE detail_id = '$id'
        ";
        // echo $sql;
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data;
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data = $row;
            }
            $result->close();
            return $data;
        }
    }
    function getAboutHeaderByID($id){
        $sql = " SELECT * 
        FROM tb_about_header
        WHERE about_header_id = '$id' 
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
    function getAboutImgByIDDetail($id){
        $sql = "SELECT * 
        FROM tb_about_img as tb1
        WHERE about_detail_id = '$id'
        ";
        // echo $sql;
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }


    function getAboutImgByID($id){
        $sql = "SELECT * 
        FROM tb_about_img
        WHERE about_img_id = '$id'
        ";
        // echo $sql;
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data;
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data = $row;
            }
            $result->close();
            return $data;
        }
    }
    function getAboutImgBy(){
        $sql = "SELECT * 
        FROM tb_about_img
        ";
        // echo $sql;
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function insertAboutImage($data=[]){
        $sql = " INSERT INTO tb_about_img(
        about_detail_id,
        about_img
    ) VALUES ('".
    mysqli_real_escape_string(static::$db,$data['about_detail_id'])."','".
    mysqli_real_escape_string(static::$db,$data['about_img'])."')";

    if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
        return mysqli_insert_id(static::$db);
    }else {
        return 0;
    }
}
function updateAboutImageByID($id,$data = []){

    $data['about_img']=mysqli_real_escape_string(static::$db,$data['about_img']);

    
    $sql = " UPDATE tb_about_img SET 
    about_img = '".$data['about_img']."'
    WHERE about_img_id = $id "; 
    // echo $sql;
    if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
        return 1;
    }else {
        return 0;
    }
}
function updateAboutHeaderByID($id,$data = []){
    $data['about_header_title_th']=mysqli_real_escape_string(static::$db,$data['about_header_title_th']);
    $data['about_header_title_en']=mysqli_real_escape_string(static::$db,$data['about_header_title_en']);
    $data['about_header_img']=mysqli_real_escape_string(static::$db,$data['about_header_img']);
    $data['project_img']=mysqli_real_escape_string(static::$db,$data['project_img']);
    
    $sql = " UPDATE tb_about_header SET 
    about_header_title_th = '".$data['about_header_title_th']."',
    about_header_title_en = '".$data['about_header_title_en']."',
    about_header_img = '".$data['about_header_img']."',
    project_img = '".$data['project_img']."'
    WHERE about_header_id = $id "; 
    // echo $sql;
    if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
        return 1;
    }else {
        return 0;
    }
}
function updateAboutDetailByID($id,$data = []){

    $data['detail_title_th']=mysqli_real_escape_string(static::$db,$data['detail_title_th']);
    $data['detail_title_en']=mysqli_real_escape_string(static::$db,$data['detail_title_en']);

    
    $sql = " UPDATE tb_about_detail SET 
    detail_title_en = '".$data['detail_title_en']."',
    detail_title_th = '".$data['detail_title_th']."',
    detail_en = '".$data['detail_en']."',
    detail_th = '".$data['detail_th']."'
    WHERE detail_id = $id "; 
    // echo $sql;
    if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
        return 1;
    }else {
        return 0;
    }
}


function deleteAboutImgByID($id){
    $sql = "DELETE FROM tb_about_img WHERE about_img_id = '$id' ";
    if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
        return 1;
    }else {
        return 0;
    }
}
}
?>