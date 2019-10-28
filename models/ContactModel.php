<?php

require_once("BaseModel.php");

class ContactModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
            mysqli_set_charset(static::$db,"utf8");
        }
    }

    function getContactBy(){
        $sql = "SELECT * 
        FROM tb_contact_body
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

    function getContactUserBy(){
        $sql = "SELECT * 
        FROM tb_contact
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

    function sendMail($data=[]){

        $sql = " INSERT INTO tb_contact(
        contact_name,
        contact_email,
        contact_subject,
        contact_massage
    ) VALUES ('".
    mysqli_real_escape_string(static::$db,$data['name'])."','".
    mysqli_real_escape_string(static::$db,$data['email'])."','".
    mysqli_real_escape_string(static::$db,$data['title'])."','".
    mysqli_real_escape_string(static::$db,$data['detail'])."')
    ";

    if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
        return mysqli_insert_id(static::$db);
    }else {
        return 0;
    }
}

function updateContactByID($id,$data = []){

    $data['contact_body_address_en'] = mysqli_real_escape_string(static::$db,$data['contact_body_address_en']);
    $data['contact_body_email_en'] = mysqli_real_escape_string(static::$db,$data['contact_body_email_en']);
    $data['contact_body_time_en'] = mysqli_real_escape_string(static::$db,$data['contact_body_time_en']);
    $data['contact_body_email_th'] = mysqli_real_escape_string(static::$db,$data['contact_body_email_th']);
    $data['contact_body_address_th'] = mysqli_real_escape_string(static::$db,$data['contact_body_address_th']);
    $data['contact_body_time_th'] = mysqli_real_escape_string(static::$db,$data['contact_body_time_th']);
    $data['contact_header_title_th'] = mysqli_real_escape_string(static::$db,$data['contact_header_title_th']);
    $data['contact_header_title_en'] = mysqli_real_escape_string(static::$db,$data['contact_header_title_en']);
    $data['contact_header_img'] = mysqli_real_escape_string(static::$db,$data['contact_header_img']);
    $data['contact_email'] = mysqli_real_escape_string(static::$db,$data['contact_email']);

    $sql = " UPDATE tb_contact_body SET 
    contact_body_address_en = '".$data['contact_body_address_en']."',
    contact_body_email_en = '".$data['contact_body_email_en']."',
    contact_body_time_en = '".$data['contact_body_time_en']."',
    contact_body_email_th = '".$data['contact_body_email_th']."',
    contact_body_address_th = '".$data['contact_body_address_th']."',
    contact_body_time_th = '".$data['contact_body_time_th']."',
    contact_header_title_th = '".$data['contact_header_title_th']."',
    contact_header_title_en = '".$data['contact_header_title_en']."',
    contact_header_img = '".$data['contact_header_img']."',
    contact_email = '".$data['contact_email']."'

    WHERE contact_body_id = $id "; 
    // echo $sql;
    if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
        return 1;
    }else {
        return 0;
    }
}

}
?>
