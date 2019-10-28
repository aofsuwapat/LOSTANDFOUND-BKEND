<?php

require_once("BaseModel.php");

class CertificationModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
            mysqli_set_charset(static::$db,"utf8");
        }
    }

    function getCertificationBy(){
        $sql = "SELECT * 
        FROM tb_certification
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
    function updateCertificationByID($id,$data = []){
        
        $data['certification_title_th'] = mysqli_real_escape_string(static::$db,$data['certification_title_th']);
        $data['certification_title_en'] = mysqli_real_escape_string(static::$db,$data['certification_title_en']);
        $data['certification_detail_th'] = mysqli_real_escape_string(static::$db,$data['certification_detail_th']);
        $data['certification_detail_en'] = mysqli_real_escape_string(static::$db,$data['certification_detail_en']);
        $data['certification_img'] = mysqli_real_escape_string(static::$db,$data['certification_img']);

        $sql = " UPDATE tb_certification SET 
        certification_title_en = '".$data['certification_title_en']."',
        certification_title_th = '".$data['certification_title_th']."',
        certification_detail_en = '".$data['certification_detail_en']."',
        certification_detail_th = '".$data['certification_detail_th']."',
        certification_img = '".$data['certification_img']."'

        WHERE certification_id = $id "; 
    // echo $sql;
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

}
?>
