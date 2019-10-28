<?php
date_default_timezone_set("Asia/Bangkok");

require_once('../models/AboutAwardModel.php');

$path = "modules/about_award/views/";

$about_award_model = new AboutAwardModel;

$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";

$target_dir = "../img_upload/about_image/";
if(isset($_GET['id'])){
}
if(!isset($_GET['action'])){
    $about_award = $about_award_model->getAboutAwradBy();
    require_once($path.'view.inc.php');
}else if ($_GET['action'] == 'update'){
    $about_award_id = $_GET['id'];
    $about_award = $about_award_model->getAboutAwradByID($about_award_id);
    require_once($path.'update.inc.php');
}else if ($_GET['action'] == 'edit'){
    
    if(isset($_POST['project_number'])){

        $data = [];
        $data['project_number'] = $_POST['project_number'];
        $data['project_title_th'] = $_POST['project_title_th'];
        $data['project_title_en'] = $_POST['project_title_en'];

        $result = $about_award_model->updateAboutAwardByID($_POST['project_id'],$data);
        if($result){?>
            <script>
                window.location="index.php?content=about_award";
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
        $about_image = $about_image_model->getAboutImageBy();
        require_once($path.'view.inc.php');
    }
    ?>