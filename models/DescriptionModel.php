<?php

require_once("BaseModel.php");

class DescriptionModel extends BaseModel{

  function __construct(){
    if(!static::$db){
      static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
      mysqli_set_charset(static::$db,"utf8");
    }
  }

  function getDescriptionBy(){
    $sql = "SELECT * 
    FROM tb_title_description
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

  function getDescriptionByID($id){
    $sql = "SELECT * 
    FROM tb_title_description
    WHERE id = $id
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

  function updateDescriptionByID($id,$data = []){

    $data['title'] = mysqli_real_escape_string(static::$db,$data['title']);
    $data['keyword'] = mysqli_real_escape_string(static::$db,$data['keyword']);
    $data['description'] = mysqli_real_escape_string(static::$db,$data['description']);

    $sql = " UPDATE tb_title_description SET 
    title = '".$data['title']."',
    keyword = '".$data['keyword']."',
    description = '".$data['description']."',
    lastupdate = NOW()
    
    WHERE id = $id "; 
    // echo $sql;
    if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
      return 1;
    }else {
      return 0;
    }
  }

}
?>
