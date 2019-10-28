<?php
require_once("BaseModel.php");

class TeamModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
            mysqli_set_charset(static::$db,"utf8");
        }
    }

    function getTeamBy(){
        $sql = "SELECT * 
        FROM tb_team 
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

    function getTeamByID($id){
        $sql = " SELECT * 
        FROM tb_team 
        WHERE team_id = '$id' 
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

    function updateTeamByID($id,$data = []){
        $data['name_th']=mysqli_real_escape_string(static::$db,$data['name_th']);
        $data['name_en']=mysqli_real_escape_string(static::$db,$data['name_en']);
        $data['position_th']=mysqli_real_escape_string(static::$db,$data['position_th']);
        $data['position_en']=mysqli_real_escape_string(static::$db,$data['position_en']);
        $data['team_image']=mysqli_real_escape_string(static::$db,$data['team_image']);
        $sql = "UPDATE tb_team SET 
        name_th = '".$data['name_th']."', 
        name_en = '".$data['name_en']."', 
        position_th = '".$data['position_th']."', 
        position_en = '".$data['position_en']."', 
        team_image = '".$data['team_image']."', 
        updateby = '".$data['updateby']."', 
        lastupdate = NOW() 
        WHERE team_id = $id ";
        
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

    function insertTeam($data=[]){
        $sql = " INSERT INTO tb_team(
            name_th,
            name_en,
            position_th,
            position_en,
            team_image,
            addby,
            adddate
        ) VALUES ('".
        mysqli_real_escape_string(static::$db,$data['name_th'])."','".
        mysqli_real_escape_string(static::$db,$data['name_en'])."','".
        mysqli_real_escape_string(static::$db,$data['position_th'])."','".
        mysqli_real_escape_string(static::$db,$data['position_en'])."','".
        mysqli_real_escape_string(static::$db,$data['team_image'])."','".
        $data['addby'].
        "',NOW())";

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return mysqli_insert_id(static::$db);
        }else {
            return 0;
        }
    }

    function deleteTeamByID($id){
        $sql = " DELETE FROM tb_team WHERE team_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
}
?>