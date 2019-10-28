<?php

require_once("BaseModel.php");
class ProfileModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
            mysqli_set_charset(static::$db,"utf8");
        }
    }


    function getProfileBy(){
        $sql = "SELECT * 
        FROM tb_signup as tb1";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getProfileByID($id){
        $sql = "SELECT * 
        FROM tb_signup as tb1
        WHERE signup_id = '$id' 
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


    function checkUser($username ){
        $sql = "SELECT * 
        FROM tb_signup where signup_username= '$username'
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
    
    

    function getinfomationprofile($id){
        $sql = "SELECT * , DATE_FORMAT(STR_TO_DATE(comment_date,'%Y-%m-%d %H:%i'), '%d %m %Y, %H:%i' ) AS found_date_format
        FROM tb_signup as tb1
        WHERE signup_id = '$id' 
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


    function getLogin($username, $password){

        $username = static::$db->real_escape_string($username);
        $password = static::$db->real_escape_string($password);

        if ($result = mysqli_query(static::$db,"SELECT *
            FROM tb_user 
            WHERE user_userid = '$username' 
            AND user_password = '$password'", MYSQLI_USE_RESULT)) {
            $data;
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getUserBy(){
        $sql = "SELECT * 
        FROM tb_user 
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

    function getUserByID($id){
        $sql = " SELECT * 
        FROM tb_user 
        WHERE user_id = '$id' 
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

    function updateUserByID($id,$data = []){
        $data['signup_img'] = mysqli_real_escape_string(static::$db,$data['img_name']);
        $data['signup_name'] = mysqli_real_escape_string(static::$db,$data['signup_text1']);
        $data['signup_password'] = mysqli_real_escape_string(static::$db,$data['signup_text4']);
     

        $sql = "UPDATE tb_signup SET 

        signup_name = '".$data['signup_name']."', 
        signup_password = '".$data['signup_password']."'
        WHERE signup_id = $id ";
        
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            if ($data['signup_img'] != '') {

            $sql = "UPDATE tb_signup SET 
            signup_img = '".$data['signup_img']."'
            WHERE signup_id = $id ";
            

            if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
                return $result;
            }else {
                return $result;
            }
        }
        }else {
            return $result;
        }
    }


    function insertUser($data=[]){
        $sql = " INSERT INTO tb_user(
        user_userid,
        user_firstname,
        user_lastname, 
        user_email,
        user_password
        
    ) VALUES ('".
    mysqli_real_escape_string(static::$db,$data['user_userid'])."','".
    mysqli_real_escape_string(static::$db,$data['user_firstname'])."','".
    mysqli_real_escape_string(static::$db,$data['user_lastname'])."','".
    mysqli_real_escape_string(static::$db,$data['user_email'])."','".
    mysqli_real_escape_string(static::$db,$data['user_password'])."')
   
    ";
    // echo $sql;
    if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
        return mysqli_insert_id(static::$db);
    }else {
        return 0;
    }
}

function deleteUserByID($id){
    $sql = " DELETE FROM tb_user WHERE user_id = '$id' ";
    if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
        return 1;
    }else {
        return 0;
    }
}
}
?>