<?php
date_default_timezone_set("Asia/Bangkok");

require_once('../models/CertificationModel.php');
require_once('../models/DescriptionModel.php');


$path = "modules/certification/views/";

$model = new CertificationModel;
$description_model = new DescriptionModel;

$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";

$target_dir = "../img_upload/certification/";

if(isset($_GET['id'])){
    $detail_id = $_GET['id'];
}
if(!isset($_GET['action'])){
    $certification = $model->getCertificationBy();
    $description_id = '5';
    $description = $description_model->getDescriptionByID($description_id);
    require_once($path.'view.inc.php');
}else if ($_GET['action'] == 'edit'){

    if(isset($_FILES['certification_img'])){
        $check = true;
        $data = [];
        $data['certification_title_th'] = $_POST['certification_title_th'];
        $data['certification_title_en'] = $_POST['certification_title_en'];
        $data['certification_detail_th'] = $_POST['certification_detail_th'];
        $data['certification_detail_en'] = $_POST['certification_detail_en'];
        $data1 = [];
        $description_id = '5';
        $data1['title'] = $_POST['title'];
        $data1['keyword'] = $_POST['keyword'];
        $data1['description'] = $_POST['description'];

        if($_FILES['certification_img']['name'] == ""){
            $data['certification_img'] = $_POST['certification_img_o'];
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES['certification_img']['name']));
            $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES['certification_img']['size'] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES['certification_img']['tmp_name'], $target_file)) {

                $data['certification_img'] = $date.'-'.strtolower(basename($_FILES['certification_img']['name']));

                $target_file = $target_dir . $_POST['certification_img_o'];
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
            $result = $model->updateCertificationByID($_POST['certification_id'],$data);
            $description_model->updateDescriptionByID($description_id,$data1);
            if($result){
                ?> <script>
                    window.location="index.php?content=certification"
                    </script> <?php
                }else{
                    ?>  <script>
                       window.history.back();
                       </script> <?php
                   }
               }
           }else{
            ?> <script> 
                window.history.back(); 
                </script> <?php
            }
        }else{
            
            require_once($path.'view.inc.php');
        }
        ?>
