<?php
require_once("BaseModel.php");

class NewsModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
            mysqli_set_charset(static::$db,"utf8");
        }
    }

    function getNewsBy(){
        $sql = "SELECT * , DATE_FORMAT(STR_TO_DATE(news_date,'%Y-%m-%d %H:%i'), '%d %m %Y, %H:%i' ) AS news_date_format
        FROM tb_news as tb1
        ORDER BY STR_TO_DATE(news_date,'%Y-%m-%d %H:%i') DESC ";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }
  

    

   

    function getNewsByID($id){
        $sql = "SELECT * , DATE_FORMAT(STR_TO_DATE(news_date,'%Y-%m-%d %H:%i'), '%d %m %Y, %H:%i' ) AS news_date_format
        FROM tb_news as tb1

        WHERE news_id = '$id' 
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

    

    public function insertNews($data=[]){

        $sql = " INSERT INTO tb_news(
        news_name,
        news_description,
        news_img,
        news_view,
        news_date
        ) 
        VALUES ('".
        mysqli_real_escape_string(static::$db,$data['news_name'])."','".
        mysqli_real_escape_string(static::$db,$data['news_description'])."','".
        mysqli_real_escape_string(static::$db,$data['news_img'])."','".
        mysqli_real_escape_string(static::$db,$data['news_view'])."',
        NOW());
        ";
        // echo($sql);
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $result->close();

            return mysqli_insert_id(static::$db);
        }else {
            $result->close();

            return 0;
        }
    }

    function updateNewsByID($id,$data = []){
        // $data['type_id']=mysqli_real_escape_string(static::$db,$data['type_id']);
        $data['news_name']=mysqli_real_escape_string(static::$db,$data['news_name']);
        $data['news_description']=mysqli_real_escape_string(static::$db,$data['news_description']);
        $data['news_img']=mysqli_real_escape_string(static::$db,$data['news_img']);
        $data['news_view']=mysqli_real_escape_string(static::$db,$data['news_view']);
        $data['news_date']=mysqli_real_escape_string(static::$db,$data['news_date']);

        $sql = " UPDATE tb_news SET 
        news_name = '".$data['news_name']."',
        news_description = '".$data['news_description']."',
        news_img = '".$data['news_img']."',
        news_view = '".$data['news_view']."',
        news_date = NOW()

        WHERE news_id = $id"; 

        // echo $sql;

        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $result->close();

            return 1;
        }else {
            $result->close();

            return 0;
        }
    }

    function deleteNewsByID($id){
        $sql = "DELETE FROM tb_news WHERE news_id = '$id' ";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $result->close();
            
            return 1;
        }else {
            $result->close();

            return 0;
        }
    }

}
?>