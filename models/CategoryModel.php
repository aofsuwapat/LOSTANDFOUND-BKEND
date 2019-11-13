<?php
require_once("BaseModel.php");

class CategoryModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
            mysqli_set_charset(static::$db,"utf8");
        }
    }

    function getCategoryTypeBy(){
        $sql = "SELECT * 
        FROM tb_category";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }


    function getCategoryBy(){
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
  

    function getCategoryByID($id){
        $sql = "SELECT * 
        FROM tb_category as tb1

        WHERE category_id = '$id' 
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

    function getFoundCategoryByID($id){
        $sql = "SELECT * 
        FROM tb_found as tb1
        LEFT JOIN tb_category as tb2 ON tb2.category_id = tb1.found_type 
        WHERE category_id = '$id' 
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

    function getLostCategoryByID($id){
        $sql = "SELECT * 
        FROM tb_lost as tb1
        LEFT JOIN tb_category as tb2 ON tb2.category_id = tb1.lost_type 
        WHERE category_id = '$id' 
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
    // function getCategoryBy(){
    //     $sql = "SELECT * 
    //     FROM tb_category_detail as tb1
    //     LEFT JOIN tb_category_type ON tb1.category_detail_type = tb_category_type.type_id";

    //     // echo $sql;

    //     if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
    //         $data = [];
    //         while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    //             $data[] = $row;
    //         }
    //         $result->close();
    //         return $data;
    //     }
    // }



    

    function getCategoryTypeByID($id){
        $sql = " SELECT * 
        FROM tb_category
        WHERE category_id = '$id' 
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

   

    // function getCategoryImgByIDCategory($id){
    //     $sql = " SELECT * 
    //     FROM tb_category_img
    //     WHERE category_id = '$id' 
    //     ";

    //     if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
    //         $data = [];
    //         while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    //             $data[] = $row;
    //         }
    //         $result->close();
    //         return $data;
    //     }
    // }
    // function getCategoryImgByID($id){
    //     $sql = " SELECT * 
    //     FROM tb_category_img
    //     WHERE img_id = '$id' 
    //     ";

    //     if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
    //         $data;
    //         while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    //             $data = $row;
    //         }
    //         $result->close();
    //         return $data;
    //     }
    // }

    function updateCategoryTypeByID($id,$data = []){
        $data['category_name']=mysqli_real_escape_string(static::$db,$data['category_name']);
        $data['category_img']=mysqli_real_escape_string(static::$db,$data['category_img']);
        $data['found_pin']=mysqli_real_escape_string(static::$db,$data['found_pin']);
        $data['lost_pin']=mysqli_real_escape_string(static::$db,$data['lost_pin']);


        $sql = " UPDATE tb_category SET 
        category_name = '".$data['category_name']."',
        category_img = '".$data['category_img']."',
        found_pin = '".$data['found_pin']."',
        lost_pin = '".$data['lost_pin']."'
        
        WHERE category_id = $id "; 

        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {

            return 1;
        }else {

            return 0;
        }
    }

    // function updateCategoryHeaderByID($id,$data = []){

    //     $data['category_header_name_en']=mysqli_real_escape_string(static::$db,$data['category_header_name_en']);
    //     $data['category_header_name_th']=mysqli_real_escape_string(static::$db,$data['category_header_name_th']);
    //     $data['category_header_detail_en']=mysqli_real_escape_string(static::$db,$data['category_header_detail_en']);
    //     $data['category_header_detail_th']=mysqli_real_escape_string(static::$db,$data['category_header_detail_th']);
    //     $data['category_header_img']=mysqli_real_escape_string(static::$db,$data['category_header_img']);

    //     $sql = " UPDATE tb_category_header SET 
    //     category_header_name_en = '".$data['category_header_name_en']."',
    //     category_header_name_th = '".$data['category_header_name_th']."',
    //     category_header_detail_en = '".$data['category_header_detail_en']."',
    //     category_header_detail_th = '".$data['category_header_detail_th']."',
    //     category_header_img = '".$data['category_header_img']."'
        
    //     WHERE category_header_id = $id "; 

    //     if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
    //         return 1;
    //     }else {
    //         return 0;
    //     }
    // }

    // function updateCategoryImageByID($id,$data = []){
    //     $data['category_img']=mysqli_real_escape_string(static::$db,$data['category_img']);


    //     $sql = " UPDATE tb_category_img SET 
    //     img = '".$data['category_img']."'
        
    //     WHERE img_id = $id "; 

    //     // echo $sql;

    //     if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
    //         return 1;
    //     }else {
    //         return 0;
    //     }
    // }

  

public function insertCategoryType($data=[]){
    $sql = " INSERT INTO tb_category(
    category_name,
    category_img,
    found_pin,
    lost_pin
    
) VALUES ('".
mysqli_real_escape_string(static::$db,$data['category_name'])."','".
mysqli_real_escape_string(static::$db,$data['category_img'])."','".
mysqli_real_escape_string(static::$db,$data['found_pin'])."','".
mysqli_real_escape_string(static::$db,$data['lost_pin'])."')

";
    // echo($sql);
if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {

    return mysqli_insert_id(static::$db);
}else {

    return 0;
}
}

function updateCategoryByID($id,$data = []){
    $data['category_name']=mysqli_real_escape_string(static::$db,$data['category_name']);
    $data['category_img']=mysqli_real_escape_string(static::$db,$data['category_img']);
    $data['found_pin']=mysqli_real_escape_string(static::$db,$data['found_pin']);
    $data['lost_pin']=mysqli_real_escape_string(static::$db,$data['lost_pin']);



    if($data['category_img']!=''){    
        $sql = " UPDATE tb_category SET 
        category_img = '".$data['category_img']."'
        WHERE category_id = $id "; 
        mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT);
    }
 
    if($data['found_pin']!=''){    
        $sql = " UPDATE tb_category SET 
        found_pin = '".$data['found_pin']."'
        WHERE category_id = $id "; 
        mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT);
    }
    if($data['lost_pin']!=''){
        $sql = " UPDATE tb_category SET 
        lost_pin = '".$data['lost_pin']."'
        WHERE category_id = $id "; 
        mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT);
    }
        // echo $sql;

    $sql = " UPDATE tb_category SET 
    category_name = '".$data['category_name']."'
    WHERE category_id = $id ";    
    if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {

        return 1;
    }else {

        return 0;
    }
}

// function insertCategoryImage($data=[]){
//     $sql = " INSERT INTO tb_category_img(
//     category_id,
//     img
// ) VALUES ('".
// mysqli_real_escape_string(static::$db,$data['category_id'])."','".
// mysqli_real_escape_string(static::$db,$data['img'])."')";

// if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
//     return mysqli_insert_id(static::$db);
// }else {
//     return 0;
// }





function deleteCategoryTypeByID($id){
    $sql = "DELETE FROM tb_category WHERE category_id = '$id' ";
    if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {

        return 1;
    }else {

        return 0;
    }
}
}
?>