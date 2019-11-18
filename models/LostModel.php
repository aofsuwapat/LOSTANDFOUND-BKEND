<?php
require_once("BaseModel.php");

class LostModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
            mysqli_set_charset(static::$db,"utf8");
        }
    }
    function getLost(){
        $sql = "SELECT * , DATE_FORMAT(STR_TO_DATE(lost_dateadd,'%Y-%m-%d %H:%i'), '%d %m %Y, %H:%i' ) AS lost_date_format 
        FROM tb_lost as tb1 
        left join tb_category as tb2 on tb1.lost_type=tb2.category_id 
        ORDER BY STR_TO_DATE(lost_dateadd,'%Y-%m-%d %H:%i') DESC ";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }
    function getLostBy($signup_id){

        if($signup_id != 'Guest' ){
            $str = ",
            (SELECT COUNT(like_id) FROM tb_like_lost WHERE like_lost_id = tb1.lost_id AND tb_like_lost.signup_id = $signup_id) as is_like";
        }
        $sql = "SELECT * , DATE_FORMAT(STR_TO_DATE(lost_dateadd,'%Y-%m-%d %H:%i'), '%d %m %Y, %H:%i' ) AS lost_date_format ,
        (SELECT COUNT(comment_id) FROM tb_comment_lost WHERE lost_id = tb1.lost_id) as count_comment,
        (SELECT COUNT(like_id) FROM tb_like_lost WHERE like_lost_id = tb1.lost_id) as count_like $str
        FROM tb_lost as tb1 
        left join tb_category as tb2 on tb1.lost_type=tb2.category_id 
        ORDER BY STR_TO_DATE(lost_dateadd,'%Y-%m-%d %H:%i') DESC ";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getLostBySearch($signup_id, $keyword){

        if($signup_id != 'Guest' ){
            $str = ",
            (SELECT COUNT(like_id) FROM tb_like_lost WHERE like_lost_id = tb1.lost_id AND tb_like_lost.signup_id = $signup_id) as is_like";
        }
        $sql = "SELECT * , DATE_FORMAT(STR_TO_DATE(lost_dateadd,'%Y-%m-%d %H:%i'), '%d %m %Y, %H:%i' ) AS lost_date_format ,
        (SELECT COUNT(comment_id) FROM tb_comment_lost WHERE lost_id = tb1.lost_id) as count_comment,
        (SELECT COUNT(like_id) FROM tb_like_lost WHERE like_lost_id = tb1.lost_id) as count_like $str
        FROM tb_lost as tb1 
        left join tb_category as tb2 on tb1.lost_type=tb2.category_id 
        WHERE tb1.lost_topic LIKE '%$keyword%' OR tb1.lost_detail LIKE '%$keyword%'
        ORDER BY STR_TO_DATE(lost_dateadd,'%Y-%m-%d %H:%i') DESC ";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }



    function getLostByUser($user_id){
        $sql = "SELECT * , DATE_FORMAT(STR_TO_DATE(lost_dateadd,'%Y-%m-%d %H:%i'), '%d %m %Y, %H:%i' ) AS lost_date_format ,
        (SELECT COUNT(comment_id) FROM tb_comment_lost WHERE lost_id = tb1.lost_id) as count_comment ,
        (SELECT COUNT(like_id) FROM tb_like_lost WHERE like_lost_id = tb1.lost_id) as count_like ,
        (SELECT COUNT(like_id) FROM tb_like_lost WHERE like_lost_id = tb1.lost_id AND tb_like_lost.signup_id = $user_id) as is_like
        FROM tb_lost as tb1 
        left join tb_category as tb2 on tb1.lost_type=tb2.category_id 
        WHERE tb1.addby = '$user_id'
        ORDER BY STR_TO_DATE(lost_dateadd,'%Y-%m-%d %H:%i') DESC ";
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
    
    function getCommentLostByID($id){
        $sql = "SELECT * , DATE_FORMAT(STR_TO_DATE(comment_date,'%Y-%m-%d %H:%i'), '%d %m %Y, %H:%i' ) AS lost_date_format
        FROM tb_comment_lost as tb1
        LEFT JOIN tb_signup as tb2 ON tb1.comment_user = tb2.signup_id
        WHERE lost_id = '$id' 
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
        $sql = "SELECT * , DATE_FORMAT(STR_TO_DATE(comment_date,'%Y-%m-%d %H:%i'), '%d %m %Y, %H:%i' ) AS lost_date_format
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

    function getLostByID($id){
        $sql = "SELECT * , 
        DATE_FORMAT(STR_TO_DATE(lost_dateadd,'%Y-%m-%d %H:%i'), '%d %m %Y, %H:%i' ) AS lost_date_format
        FROM tb_lost as tb1
        LEFT JOIN tb_signup as tb2 ON tb1.addby = tb2.signup_id
        WHERE lost_id = '$id' 
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

        $sql = " INSERT INTO tb_comment_lost(
        comment_text,
        comment_user,
        lost_id,
        comment_date
        ) 
        VALUES ('".
        mysqli_real_escape_string(static::$db,$data['comment_text'])."','".
        mysqli_real_escape_string(static::$db,$data['comment_user'])."','".

        mysqli_real_escape_string(static::$db,$data['lost_id'])."',
        NOW());
        ";
        // echo($sql);
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {

            return mysqli_insert_id(static::$db);
        }else {

            return 0;
        }
    }

    public function insertLost($data=[]){
        $sql = " INSERT INTO tb_lost(
        lost_topic,
        lost_type,
        lost_detail,
        lost_img,
        lost_location,
        lost_longitude,
        lost_latitude,
        lost_dateadd
        ) 
        VALUES ('".
        mysqli_real_escape_string(static::$db,$data['lost_topic'])."','".
        mysqli_real_escape_string(static::$db,$data['lost_type'])."','".
        mysqli_real_escape_string(static::$db,$data['lost_detail'])."','".
        mysqli_real_escape_string(static::$db,$data['lost_img'])."','".
        mysqli_real_escape_string(static::$db,$data['lost_location'])."','".
        mysqli_real_escape_string(static::$db,$data['lost_longitude'])."','".
        mysqli_real_escape_string(static::$db,$data['lost_latitude'])."',
        NOW());
        ";
        // echo($sql);
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {

            return mysqli_insert_id(static::$db);
        }else {

            return 0;
        }
    }

    function updateLostByID($id,$data = []){
        // $data['type_id']=mysqli_real_escape_string(static::$db,$data['type_id']);
        $data['lost_topic']=mysqli_real_escape_string(static::$db,$data['lost_topic']);
        $data['lost_type']=mysqli_real_escape_string(static::$db,$data['lost_type']);
        $data['lost_detail']=mysqli_real_escape_string(static::$db,$data['lost_detail']);        
        $data['lost_img']=mysqli_real_escape_string(static::$db,$data['lost_img']);
        $data['lost_location']=mysqli_real_escape_string(static::$db,$data['lost_location']);
        $data['lost_longitude']=mysqli_real_escape_string(static::$db,$data['lost_longitude']);
        $data['lost_latitude']=mysqli_real_escape_string(static::$db,$data['lost_latitude']);
        $data['lost_dateadd']=mysqli_real_escape_string(static::$db,$data['lost_dateadd']);


        $sql = " UPDATE tb_lost SET 
        lost_topic = '".$data['lost_topic']."',
        lost_type = '".$data['lost_type']."',
        lost_detail = '".$data['lost_detail']."',
        lost_img = '".$data['lost_img']."',
        lost_location = '".$data['lost_location']."',
        lost_longitude = '".$data['lost_longitude']."',
        lost_latitude = '".$data['lost_latitude']."',
        lost_dateadd = NOW()
        
        WHERE lost_id = $id"; 

        // echo $sql;

        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {

            return 1;
        }else {

            return 0;
        }
    }

    function deleteLostByID($id){
        $sql = "DELETE FROM tb_lost WHERE lost_id = '$id' ";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {

            return 1;
        }else {

            return 0;
        }
    }

    function checkLostByID($id){
        $sql = "UPDATE tb_lost SET 
        lost_check = 1
        WHERE lost_id = $id"; 
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {

            return 1;
        }else {

            return 0;
        }
    }

    function deleteCommentLostByID($id){
        $sql = "DELETE FROM tb_comment_lost WHERE comment_id = '$id' ";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {

            return 1;
        }else {

            return 0;
        }
    }

}
?>