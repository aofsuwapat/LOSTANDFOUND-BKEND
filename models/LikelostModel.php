<?php

require_once("BaseModel.php");
class LikelostModel extends BaseModel{

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


    function insertPostlost($data=[]){
        $sql = " INSERT INTO tb_like_lost(
        like_lost_id,
        signup_id,
        like_dateadd        
    ) VALUES ('".
    mysqli_real_escape_string(static::$db,$data['likelostid'])."','".
    mysqli_real_escape_string(static::$db,$data['signupid'])."',
    NOW());
    ";
    // echo $sql;
    echo json_encode($sql, JSON_UNESCAPED_UNICODE);
    if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
        return mysqli_insert_id(static::$db);
    }else {
        return 0;
    }
}

function checkLike($likelostid, $signupid){
    $sql = "SELECT * 
    FROM tb_like_lost where like_lost_id = '$likelostid' 
    AND signup_id = '$signupid'
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
        $result->close();
        return $data;
    }
}


function deleteLike($likelostid, $signupid){
    $sql = " DELETE FROM tb_like_lost WHERE like_lost_id = '$likelostid' 
    AND signup_id = '$signupid'    
    ";
    if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
        return 1;
    }else {
        return 0;
    }
}
}
?>