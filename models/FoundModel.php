<?php
require_once("BaseModel.php");

class FoundModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
            mysqli_set_charset(static::$db,"utf8");
        }
    }
    function getFound(){
        $sql = "SELECT * , DATE_FORMAT(STR_TO_DATE(found_dateadd,'%Y-%m-%d %H:%i'), '%d %m %Y, %H:%i' ) AS found_date_format 
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
    function getFoundBy($signup_id){

        if($signup_id != 'Guest' ){
            $str = ",
            (SELECT COUNT(like_id) FROM tb_like_found WHERE like_found_id = tb1.found_id AND tb_like_found.signup_id = $signup_id) as is_like";
        }
        $sql = "SELECT * , DATE_FORMAT(STR_TO_DATE(found_dateadd,'%Y-%m-%d %H:%i'), '%d %m %Y, %H:%i' ) AS found_date_format ,
        (SELECT COUNT(comment_id) FROM tb_comment_found WHERE found_id = tb1.found_id) as count_comment,
        (SELECT COUNT(like_id) FROM tb_like_found WHERE like_found_id = tb1.found_id) as count_like $str
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

    function getFoundBySearch($signup_id, $keyword){

        if($signup_id != 'Guest' ){
            $str = ",
            (SELECT COUNT(like_id) FROM tb_like_found WHERE like_found_id = tb1.found_id AND tb_like_found.signup_id = $signup_id) as is_like";
        }
        $sql = "SELECT * , DATE_FORMAT(STR_TO_DATE(found_dateadd,'%Y-%m-%d %H:%i'), '%d %m %Y, %H:%i' ) AS found_date_format ,
        (SELECT COUNT(comment_id) FROM tb_comment_found WHERE found_id = tb1.found_id) as count_comment,
        (SELECT COUNT(like_id) FROM tb_like_found WHERE like_found_id = tb1.found_id) as count_like $str
        FROM tb_found as tb1 
        left join tb_category as tb2 on tb1.found_type=tb2.category_id 
        WHERE tb1.found_topic LIKE '%$keyword%' OR tb1.found_detail LIKE '%$keyword%'
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



    function getFoundByUser($user_id){
        $sql = "SELECT * , DATE_FORMAT(STR_TO_DATE(found_dateadd,'%Y-%m-%d %H:%i'), '%d %m %Y, %H:%i' ) AS found_date_format ,
        (SELECT COUNT(comment_id) FROM tb_comment_found WHERE found_id = tb1.found_id) as count_comment ,
        (SELECT COUNT(like_id) FROM tb_like_found WHERE like_found_id = tb1.found_id) as count_like ,
        (SELECT COUNT(like_id) FROM tb_like_found WHERE like_found_id = tb1.found_id AND tb_like_found.signup_id = $user_id) as is_like
        FROM tb_found as tb1 
        left join tb_category as tb2 on tb1.found_type=tb2.category_id 
        WHERE tb1.addby = '$user_id'
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
  
    function getCategory(){
        $sql = "SELECT * 
        FROM tb_category as tb1";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    
    }
    
    function getCommentFoundByID($id){
        $sql = "SELECT * , DATE_FORMAT(STR_TO_DATE(comment_date,'%Y-%m-%d %H:%i'), '%d %m %Y, %H:%i' ) AS found_date_format
        FROM tb_comment_found as tb1
        LEFT JOIN tb_signup as tb2 ON tb1.comment_user = tb2.signup_id
        WHERE found_id = '$id' 
        ORDER BY STR_TO_DATE(comment_date,'%Y-%m-%d %H:%i') DESC ";

       
        

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

    function getFoundByID($id){
        $sql = "SELECT * , 
        DATE_FORMAT(STR_TO_DATE(found_dateadd,'%Y-%m-%d %H:%i'), '%d %m %Y, %H:%i' ) AS found_date_format
        FROM tb_found as tb1
        LEFT JOIN tb_signup as tb2 ON tb1.addby = tb2.signup_id
        WHERE found_id = '$id' 
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

    public function insertComment($data=[]){

        $sql = " INSERT INTO tb_comment_found(
        comment_text,
        comment_user,
        found_id,
        comment_date
        ) 
        VALUES ('".
        mysqli_real_escape_string(static::$db,$data['comment_text'])."','".
        mysqli_real_escape_string(static::$db,$data['comment_user'])."','".

        mysqli_real_escape_string(static::$db,$data['found_id'])."',
        NOW());
        ";
        // echo($sql);
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {

            return mysqli_insert_id(static::$db);
        }else {

            return 0;
        }
    }

    public function insertFound($data=[]){
        $sql = " INSERT INTO tb_found(
        found_topic,
        found_type,
        found_detail,
        found_img,
        found_location,
        found_longitude,
        found_latitude,
        found_dateadd
        ) 
        VALUES ('".
        mysqli_real_escape_string(static::$db,$data['found_topic'])."','".
        mysqli_real_escape_string(static::$db,$data['found_type'])."','".
        mysqli_real_escape_string(static::$db,$data['found_detail'])."','".
        mysqli_real_escape_string(static::$db,$data['found_img'])."','".
        mysqli_real_escape_string(static::$db,$data['found_location'])."','".
        mysqli_real_escape_string(static::$db,$data['found_longitude'])."','".
        mysqli_real_escape_string(static::$db,$data['found_latitude'])."',
        NOW());
        ";
        // echo($sql);
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {

            return mysqli_insert_id(static::$db);
        }else {

            return 0;
        }
    }

    function updateFoundByID($id,$data = []){
        // $data['type_id']=mysqli_real_escape_string(static::$db,$data['type_id']);
        $data['found_topic']=mysqli_real_escape_string(static::$db,$data['found_topic']);
        $data['found_type']=mysqli_real_escape_string(static::$db,$data['found_type']);
        $data['found_detail']=mysqli_real_escape_string(static::$db,$data['found_detail']);        
        $data['found_img']=mysqli_real_escape_string(static::$db,$data['found_img']);
        $data['found_location']=mysqli_real_escape_string(static::$db,$data['found_location']);
        $data['found_longitude']=mysqli_real_escape_string(static::$db,$data['found_longitude']);
        $data['found_latitude']=mysqli_real_escape_string(static::$db,$data['found_latitude']);
        $data['found_dateadd']=mysqli_real_escape_string(static::$db,$data['found_dateadd']);


        $sql = " UPDATE tb_found SET 
        found_topic = '".$data['found_topic']."',
        found_type = '".$data['found_type']."',
        found_detail = '".$data['found_detail']."',
        found_img = '".$data['found_img']."',
        found_location = '".$data['found_location']."',
        found_longitude = '".$data['found_longitude']."',
        found_latitude = '".$data['found_latitude']."',
        found_dateadd = NOW()
        
        WHERE found_id = $id"; 

        // echo $sql;

        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {

            return 1;
        }else {

            return 0;
        }
    }

    function deleteFoundByID($id){
        $sql = "DELETE FROM tb_found WHERE found_id = '$id' ";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {

            return 1;
        }else {

            return 0;
        }
    }
    function deleteCommentFoundByID($id){
        $sql = "DELETE FROM tb_comment_found WHERE comment_id = '$id' ";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {

            return 1;
        }else {

            return 0;
        }
    }

}
?>