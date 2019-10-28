<?php
require_once("BaseModel.php");

class AboutWhyModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
            mysqli_set_charset(static::$db,"utf8");
        }
    }

    function getAboutWhyBy(){
        $sql = "SELECT * 
        FROM tb_about_why";

        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }
    function getAboutWhyByID($id){
        $sql = "SELECT * 
        FROM tb_about_why
        WHERE why_id = $id
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
    function updateAboutWhyByID($id,$data = []){

        $data['why_title_th'] = mysqli_real_escape_string(static::$db,$data['why_title_th']);
        $data['why_title_en'] = mysqli_real_escape_string(static::$db,$data['why_title_en']);
        $data['why_detail_th'] = mysqli_real_escape_string(static::$db,$data['why_detail_th']);
        $data['why_detail_en'] = mysqli_real_escape_string(static::$db,$data['why_detail_en']);
        $data['why_icon'] = mysqli_real_escape_string(static::$db,$data['why_icon']);

        $sql = " UPDATE tb_about_why SET 
        why_title_en = '".$data['why_title_en']."',
        why_title_th = '".$data['why_title_th']."',
        why_detail_en = '".$data['why_detail_en']."',
        why_detail_th = '".$data['why_detail_th']."',
        why_icon = '".$data['why_icon']."'

        WHERE why_id = $id "; 
    // echo $sql;
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

}
?>