<?php
require_once("BaseModel.php");

class ServiceModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
            mysqli_set_charset(static::$db,"utf8");
        }
    }

    function getServiceHeaderBy(){
        $sql = "SELECT * 
        FROM tb_service_header";

        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data;
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getServiceDetailBy(){
        $sql = "SELECT * 
        FROM tb_service_body
        
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

    function getServiceDetailByID($id){
        $sql = "SELECT * 
        FROM tb_service_body
        WHERE service_body_id = '$id'
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

    function insertServiceDetail($data=[]){

        $sql = " INSERT INTO tb_service_body(
        service_body_name_en,
        service_body_name_th,
        service_body_description_en,
        service_body_description_th,
        service_body_detail_en,
        service_body_detail_th,
        service_body_header_img,
        service_body_img
    ) VALUES ('".
    mysqli_real_escape_string(static::$db,$data['service_body_name_en'])."','".
    mysqli_real_escape_string(static::$db,$data['service_body_name_th'])."','".
    mysqli_real_escape_string(static::$db,$data['service_body_description_en'])."','".
    mysqli_real_escape_string(static::$db,$data['service_body_description_th'])."','".
    mysqli_real_escape_string(static::$db,$data['service_body_detail_en'])."','".
    mysqli_real_escape_string(static::$db,$data['service_body_detail_th'])."','".
    mysqli_real_escape_string(static::$db,$data['service_body_header_img'])."','".
    mysqli_real_escape_string(static::$db,$data['service_body_img'])."')
    ";

    if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
        return mysqli_insert_id(static::$db);
    }else {
        return 0;
    }
}
function updateServiceDetailByID($id,$data = []){

    $data['service_body_name_en']=mysqli_real_escape_string(static::$db,$data['service_body_name_en']);
    $data['service_body_name_th']=mysqli_real_escape_string(static::$db,$data['service_body_name_th']);
    $data['service_body_description_en']=mysqli_real_escape_string(static::$db,$data['service_body_description_en']);
    $data['service_body_description_th']=mysqli_real_escape_string(static::$db,$data['service_body_description_th']);
    $data['service_body_detail_en']=mysqli_real_escape_string(static::$db,$data['service_body_detail_en']);
    $data['service_body_detail_th']=mysqli_real_escape_string(static::$db,$data['service_body_detail_th']);
    $data['service_body_header_img']=mysqli_real_escape_string(static::$db,$data['service_body_header_img']);
    $data['service_body_img']=mysqli_real_escape_string(static::$db,$data['service_body_img']);
    
    $sql = "UPDATE tb_service_body SET 
    service_body_name_en = '".$data['service_body_name_en']."',
    service_body_name_th = '".$data['service_body_name_th']."',
    service_body_description_en = '".$data['service_body_description_en']."',
    service_body_description_th = '".$data['service_body_description_th']."',
    service_body_detail_en = '".$data['service_body_detail_en']."',
    service_body_detail_th = '".$data['service_body_detail_th']."',
    service_body_header_img = '".$data['service_body_header_img']."',
    service_body_img = '".$data['service_body_img']."'
    
    WHERE service_body_id = $id "; 
    // echo $sql;
    if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
        return 1;
    }else {
        return 0;
    }
}
function updateServiceHeaderByID($id,$data = []){

    $data['service_header_title_en']=mysqli_real_escape_string(static::$db,$data['service_header_title_en']);
    $data['service_header_title_th']=mysqli_real_escape_string(static::$db,$data['service_header_title_th']);
    $data['service_header_detail_en']=mysqli_real_escape_string(static::$db,$data['service_header_detail_en']);
    $data['service_header_detail_th']=mysqli_real_escape_string(static::$db,$data['service_header_detail_th']);
    $data['service_header_img']=mysqli_real_escape_string(static::$db,$data['service_header_img']);
    $data['project_img']=mysqli_real_escape_string(static::$db,$data['project_img']);
    
    $sql = "UPDATE tb_service_header SET 
    service_header_title_en = '".$data['service_header_title_en']."',
    service_header_title_th = '".$data['service_header_title_th']."',
    service_header_detail_en = '".$data['service_header_detail_en']."',
    service_header_detail_th = '".$data['service_header_detail_th']."',
    service_header_img = '".$data['service_header_img']."'
    WHERE service_header_id = $id "; 

    // echo $sql;
    if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
        return 1;
    }else {
        return 0;
    }
}

function deleteServiceDetailByID($id){
    $sql = "DELETE FROM tb_service_body WHERE service_body_id = '$id' ";
    if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
        return 1;
    }else {
        return 0;
    }
}
}
?>