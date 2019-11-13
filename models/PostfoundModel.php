<?php

require_once("BaseModel.php");
class PostfoundModel extends BaseModel{

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

    function getFoundBy($signup_id){
        $sql = "SELECT * , DATE_FORMAT(STR_TO_DATE(found_dateadd,'%Y-%m-%d %H:%i'), '%d %m %Y, %H:%i' ) AS found_date_format ,
        (SELECT COUNT(comment_id) FROM tb_comment_found WHERE found_id = tb1.found_id) as count_comment,
        (SELECT COUNT(like_id) FROM tb_like_found WHERE like_found_id = tb1.found_id) as count_like,
        (SELECT COUNT(like_id) FROM tb_like_found WHERE like_found_id = tb1.found_id AND tb_like_found.signup_id = $signup_id) as is_like
        FROM tb_found as tb1 
        left join tb_category as tb2 on tb1.found_type=tb2.category_id 
        ORDER BY STR_TO_DATE(found_dateadd,'%Y-%m-%d %H:%i') DESC ";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
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

    function updateFoundByID($id,$data = []){
        $data['found_topic'] = mysqli_real_escape_string(static::$db,$data['signup_text1']);
        $data['found_type'] = mysqli_real_escape_string(static::$db,$data['signup_text2']);
        $data['found_detail'] = mysqli_real_escape_string(static::$db,$data['signup_text3']);
        $data['found_img'] = mysqli_real_escape_string(static::$db,$data['img_name']);
        $data['found_location'] = mysqli_real_escape_string(static::$db,$data['signup_text4']);
        $data['found_latitude'] = mysqli_real_escape_string(static::$db,$data['signup_text5']);
        $data['found_longitude'] = mysqli_real_escape_string(static::$db,$data['signup_text6']);
       

        $sql = "UPDATE tb_found SET 
        found_topic = '".$data['found_topic']."', 
        found_type = '".$data['found_type']."', 
        found_detail = '".$data['found_detail']."', 
        found_location = '".$data['found_location']."', 
        found_latitude = '".$data['found_latitude']."', 
        found_longitude = '".$data['found_longitude']."'
      
        WHERE found_id = $id ";
        
        // echo $sql;
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            if ($data['found_img'] != '') {

                $sql = "UPDATE tb_found SET 
                found_img = '".$data['found_img']."'
                WHERE found_id = $id ";
                
    
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


    function insertPostfound($data=[]){
        $sql = " INSERT INTO tb_found(
        found_topic,
        found_type, 
        addby,
        found_img,
        found_detail,
        found_location,
        found_latitude,
        found_longitude,
        found_dateadd        
    ) VALUES ('".
    mysqli_real_escape_string(static::$db,$data['signup_text1'])."','".
    mysqli_real_escape_string(static::$db,$data['signup_text2'])."','".
    mysqli_real_escape_string(static::$db,$data['signupid'])."','".
    mysqli_real_escape_string(static::$db,$data['img_name'])."','".
    mysqli_real_escape_string(static::$db,$data['signup_text3'])."','".
    mysqli_real_escape_string(static::$db,$data['signup_text4'])."','".
    mysqli_real_escape_string(static::$db,$data['signup_text5'])."','".
    mysqli_real_escape_string(static::$db,$data['signup_text6'])."',
    NOW());
    ";
    // echo $sql;
    echo $sql;
    if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
        return mysqli_insert_id(static::$db);
    }else {
        return 0;
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