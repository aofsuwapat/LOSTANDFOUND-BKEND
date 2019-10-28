<?php

require_once("BaseModel.php");

class SettingModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
            mysqli_set_charset(static::$db,"utf8");
        }
    }

    function getSettingBy(){
        $sql = "SELECT * 
        FROM tb_setting_header
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

    function updateSettingByID($id,$data = []){

        $data['setting_header_tell'] = mysqli_real_escape_string(static::$db,$data['setting_header_tell']);
        $data['setting_header_location_th'] = mysqli_real_escape_string(static::$db,$data['setting_header_location_th']);
        $data['setting_header_location_en'] = mysqli_real_escape_string(static::$db,$data['setting_header_location_en']);
        $data['setting_footer_call'] = mysqli_real_escape_string(static::$db,$data['setting_footer_call']);
        $data['setting_footer_come_th'] = mysqli_real_escape_string(static::$db,$data['setting_footer_come_th']);
        $data['setting_footer_come_en'] = mysqli_real_escape_string(static::$db,$data['setting_footer_come_en']);
        $data['setting_footer_send_th'] = mysqli_real_escape_string(static::$db,$data['setting_footer_send_th']);
        $data['setting_footer_send_en'] = mysqli_real_escape_string(static::$db,$data['setting_footer_send_en']);
        $data['setting_footer_hours_th'] = mysqli_real_escape_string(static::$db,$data['setting_footer_hours_th']);
        $data['setting_footer_hours_en'] = mysqli_real_escape_string(static::$db,$data['setting_footer_hours_en']);
        $data['setting_footer_url_face'] = mysqli_real_escape_string(static::$db,$data['setting_footer_url_face']);
        $data['setting_footer_youtube'] = mysqli_real_escape_string(static::$db,$data['setting_footer_youtube']);
        $data['setting_footer_twitter'] = mysqli_real_escape_string(static::$db,$data['setting_footer_twitter']);

        $sql = " UPDATE tb_setting_header SET 
        setting_header_tell = '".$data['setting_header_tell']."',
        setting_header_location_th = '".$data['setting_header_location_th']."',
        setting_header_location_en = '".$data['setting_header_location_en']."',
        setting_footer_call = '".$data['setting_footer_call']."',
        setting_footer_come_th = '".$data['setting_footer_come_th']."',
        setting_footer_come_en = '".$data['setting_footer_come_en']."',
        setting_footer_send_th = '".$data['setting_footer_send_th']."',
        setting_footer_send_en = '".$data['setting_footer_send_en']."',
        setting_footer_hours_th = '".$data['setting_footer_hours_th']."',
        setting_footer_hours_en = '".$data['setting_footer_hours_en']."',
        setting_footer_url_face = '".$data['setting_footer_url_face']."',
        setting_footer_youtube = '".$data['setting_footer_youtube']."',
        setting_footer_twitter = '".$data['setting_footer_twitter']."'

        WHERE setting_header_id = $id "; 
        // echo $sql;
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

}
?>
