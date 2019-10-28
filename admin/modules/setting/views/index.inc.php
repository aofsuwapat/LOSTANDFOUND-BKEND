<?php
require_once('../models/SettingModel.php');

$path = "modules/setting/views/";

$setting_model = new SettingModel;

date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";

$target_dir = "../img_upload/setting/";

if(!isset($_GET['action'])){
    $setting = $setting_model->getSettingBy();
    require_once($path.'view.inc.php');
} else if ($_GET['action'] == 'edit'){
    if(isset($_POST['setting_header_tell'])){
        $check = true;
        $data = [];
        $data['setting_header_tell'] = trim($_POST['setting_header_tell']);
        $data['setting_header_location_th'] = trim($_POST['setting_header_location_th']);
        $data['setting_header_location_en'] = trim($_POST['setting_header_location_en']);
        $data['setting_footer_call'] = trim($_POST['setting_footer_call']);
        $data['setting_footer_come_th'] = trim($_POST['setting_footer_come_th']);
        $data['setting_footer_come_en'] = trim($_POST['setting_footer_come_en']);
        $data['setting_footer_send_th'] = trim($_POST['setting_footer_send_th']);
        $data['setting_footer_send_en'] = trim($_POST['setting_footer_send_en']);
        $data['setting_footer_hours_th'] = trim($_POST['setting_footer_hours_th']);
        $data['setting_footer_hours_en'] = trim($_POST['setting_footer_hours_en']);
        $data['setting_footer_url_face'] = trim($_POST['setting_footer_url_face']);
        $data['setting_footer_youtube'] = trim($_POST['setting_footer_youtube']);
        $data['setting_footer_twitter'] = trim($_POST['setting_footer_twitter']);

        $result = $setting_model->updateSettingByID($_POST['setting_header_id'],$data);
        if($result){?>
            <script>
                window.location="index.php?content=setting";
            </script>
            <?
        }else{
            ?><script type="text/javascript">
                window.location.back();    
                </script><?
                require_once($path.'view.inc.php');
            }
        }
    }else{
        $setting = $setting_model->getSettingByID(1);
        require_once($path.'view.inc.php');
    }
    ?>