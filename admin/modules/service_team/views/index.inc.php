<?php
require_once('../models/ServiceTeamModel.php');

$path = "modules/service_team/views/";

$service_team_model = new ServiceTeamModel;

date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";

$target_dir = "../img_upload/service_team/";
if(isset($_GET['id'])){
$service_team_id = $_GET['id'];
}
if(!isset($_GET['action'])){
    $service_team = $service_team_model->getServiceTeamBy();
    require_once($path.'view.inc.php');
}else if ($_GET['action'] == 'insert'){
    require_once($path.'insert.inc.php');
}else if ($_GET['action'] == 'update'){
    $service_team = $service_team_model->getServiceTeamByID($service_team_id);
    require_once($path.'update.inc.php');
}else if ($_GET['action'] == 'delete' && $login_user['user_type_id'] == 1){
    $service_team = $service_team_model->getServiceTeamByID($service_team_id);
    $target_file = $target_dir .$service_team['team_image'];
    if (file_exists($target_file)) {
        unlink($target_file);
    }
    $service_team = $service_team_model->deleteServiceTeamById($service_team_id);
    ?>
    <script>window.location="index.php?content=service_team"</script>
    <?php
}else if ($_GET['action'] == 'add'){
    if(isset($_POST['name_th'])){
        $check = true;
        $data = [];
        $data['name_th'] = trim($_POST['name_th']);
        $data['name_en'] = trim($_POST['name_en']);
        $data['position_th'] = trim($_POST['position_th']);
        $data['position_en'] = trim($_POST['position_en']);
        $data['addby'] = $login_user['user_id'];

        if($_FILES['team_image']['name'] == ""){
            $data['team_image'] = "";
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES["team_image"]["name"]));
            $imageFileStatus = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES["team_image"]["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($imageFileStatus != "jpg" && $imageFileStatus != "png" && $imageFileStatus != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES["team_image"]["tmp_name"], $target_file)) {
                $data['team_image'] = $date.'-'.strtolower(basename($_FILES["team_image"]["name"]));
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            } 
        }

        if($check == false){
            ?>  <script>  alert('<?php echo $error_msg; ?>'); window.history.back(); </script>  <?php
        }else{
            $service_team = $service_team_model->insertServiceTeam($data);

            if($service_team){
                ?> <script>window.location="index.php?content=service_team"</script> <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        }
    }else{
        ?> <script> window.history.back(); </script> <?php
    }
}else if ($_GET['action'] == 'edit'){
    if(isset($_POST['team_id'])){
        $check = true;
        $data = [];
        $data['name_th'] = trim($_POST['name_th']);
        $data['name_en'] = trim($_POST['name_en']);
        $data['position_th'] = trim($_POST['position_th']);
        $data['position_en'] = trim($_POST['position_en']);
        $data['updateby'] = $login_user['user_id'];

        if($_FILES['team_image']['name'] == ""){
            $data['team_image'] = $_POST['team_image_o'];
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES["team_image"]["name"]));
            $imageFileStatus = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES["team_image"]["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($imageFileStatus != "jpg" && $imageFileStatus != "png" && $imageFileStatus != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES["team_image"]["tmp_name"], $target_file)) {

                $data['team_image'] = $date.'-'.strtolower(basename($_FILES["team_image"]["name"]));

                $target_file = $target_dir . $_POST['team_image_o'];
                if (file_exists($target_file)) {
                    unlink($target_file);
                }
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            } 
        }
        
        if($check == false){
            ?>  <script>  alert('<?php echo $error_msg; ?>'); window.history.back(); </script>  <?php
        }else{
            $service_team = $service_team_model->updateServiceTeamByID($_POST['team_id'],$data);

            if($service_team){
                ?> <script>window.location="index.php?content=service_team"</script> <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        }
    }else{
        ?> <script> window.history.back(); </script> <?php
    }
}else{
    $service_team = $service_team_model->getServiceTeamBy();
    require_once($path.'view.inc.php');
}
?>