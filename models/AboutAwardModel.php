<?php
require_once("BaseModel.php");

class AboutAwardModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
            mysqli_set_charset(static::$db,"utf8");
        }
    }

    function getAboutAwradBy(){
        $sql = "SELECT * 
        FROM tb_about_project";

        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }
    function getAboutAwradByID($id){
        $sql = "SELECT * 
        FROM tb_about_project
        WHERE project_id = $id
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
    function updateAboutAwardByID($id,$data = []){

        $data['project_number'] = mysqli_real_escape_string(static::$db,$data['project_number']);
        $data['project_title_th'] = mysqli_real_escape_string(static::$db,$data['project_title_th']);
        $data['project_title_en'] = mysqli_real_escape_string(static::$db,$data['project_title_en']);

        $sql = " UPDATE tb_about_project SET 
        project_number = '".$data['project_number']."',
        project_title_en = '".$data['project_title_en']."',
        project_title_th = '".$data['project_title_th']."'

        WHERE project_id = $id "; 
    // echo $sql;
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

}
?>