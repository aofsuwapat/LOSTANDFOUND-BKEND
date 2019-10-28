<?php
require_once("BaseModel.php");

class HomeCustomerModel extends BaseModel{

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
    function getHomeCustomerImgBy(){
        $sql = " SELECT * 
        FROM tb_home_customer_img";
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
    function getHomeCustomerBy(){
        $sql = " SELECT * 
        FROM tb_home_customer";
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

    function getHomeCustomerByID($id){
        $sql = " SELECT * 
        FROM tb_home_customer
        WHERE customer_id = '$id' 
        ";

        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data;
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data = $row;
                $result->close();
                return $data;
            }
        }
    }
    function getHomeCustomerImgByID($id){
        $sql = " SELECT * 
        FROM tb_home_customer_img
        WHERE customer_img_id = '$id' 
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

    function updateHomeCustomerImgByID($id,$data = []){

        $data['customer_img_icon']=mysqli_real_escape_string(static::$db,$data['customer_img_icon']);
        $sql = " UPDATE tb_home_customer_img SET 

        customer_img_icon = '".$data['customer_img_icon']."'
        WHERE customer_img_id = $id "; 

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
    function updateHomeCustomerByID($id,$data = []){
        $data['customer_title_th']=mysqli_real_escape_string(static::$db,$data['customer_title_th']);
        $data['customer_title_en']=mysqli_real_escape_string(static::$db,$data['customer_title_en']);
        $data['customer_detail_th']=mysqli_real_escape_string(static::$db,$data['customer_detail_th']);
        $data['customer_detail_en']=mysqli_real_escape_string(static::$db,$data['customer_detail_en']);
        $data['customer_img_back']=mysqli_real_escape_string(static::$db,$data['customer_img_back']);
        $sql = " UPDATE tb_home_customer SET 
        customer_title_th = '".$data['customer_title_th']."',
        customer_title_en = '".$data['customer_title_en']."',
        customer_detail_th = '".$data['customer_detail_th']."',
        customer_detail_en = '".$data['customer_detail_en']."',
        customer_img_back = '".$data['customer_img_back']."'
        WHERE customer_id = '1' "; 

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

    function insertHomeCustomer($data=[]){
        $sql = " INSERT INTO tb_home_customer_img(
        customer_img_icon
    ) VALUES ('".
    mysqli_real_escape_string(static::$db,$data['customer_img_icon'])."')";
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

function deleteHomeImgByID($id){
    $sql = "DELETE FROM tb_home_customer_img WHERE customer_img_id = '$id' ";
    if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
        return 1;
    }else {
        return 0;
    }
}

}

?>