<?php

require_once("BaseModel.php");
class SignupModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
            mysqli_set_charset(static::$db,"utf8");
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
        $data['user_userid'] = mysqli_real_escape_string(static::$db,$data['user_userid']);
        $data['user_firstname'] = mysqli_real_escape_string(static::$db,$data['user_firstname']);
        $data['user_lastname'] = mysqli_real_escape_string(static::$db,$data['user_lastname']);
        $data['user_email'] = mysqli_real_escape_string(static::$db,$data['user_email']);
        $data['user_password'] = mysqli_real_escape_string(static::$db,$data['user_password']);
     

        $sql = "UPDATE tb_user SET 
        user_userid = '".$data['user_userid']."', 
        user_firstname = '".$data['user_firstname']."', 
        user_lastname = '".$data['user_lastname']."', 
        user_email = '".$data['user_email']."', 
        user_password = '".$data['user_password']."'
      

        WHERE user_id = $id ";
        
        // echo $sql;
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

    function insertSignup($data=[]){
        $sql = " INSERT INTO tb_signup(
        signup_img, 
        signup_name,
        signup_email,  
        signup_username,
        signup_password
        
    ) VALUES ('".
    mysqli_real_escape_string(static::$db,$data['img_name'])."','".
    mysqli_real_escape_string(static::$db,$data['signup_text1'])."','".
    mysqli_real_escape_string(static::$db,$data['signup_text2'])."','".
    mysqli_real_escape_string(static::$db,$data['signup_text3'])."','".
    mysqli_real_escape_string(static::$db,$data['signup_text4'])."')
   
    ";
    // echo $sql;
    if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
        return mysqli_insert_id(static::$db);
    }else {

        return 0;
    }
}

function checkUser($username){
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




function getSignin($username, $password){

    $username = static::$db->real_escape_string($username);
    $password = static::$db->real_escape_string($password);

    if ($result = mysqli_query(static::$db,"SELECT *
        FROM tb_signup 
        WHERE signup_username = '$username' 
        AND signup_password = '$password'", MYSQLI_USE_RESULT)) {
        $data;
        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $data = $row;
        }
        return $data;
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