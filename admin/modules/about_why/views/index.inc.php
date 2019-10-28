<?php
date_default_timezone_set("Asia/Bangkok");

require_once('../models/AboutWhyModel.php');

$path = "modules/about_why/views/";

$about_why_model = new AboutWhyModel;

$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";

$target_dir = "../img_upload/about_why/";

if(isset($_GET['id'])){
}
if(!isset($_GET['action'])){
    $about_why = $about_why_model->getAboutWhyBy();
    require_once($path.'view.inc.php');
}else if ($_GET['action'] == 'update'){
    $about_why_id = $_GET['id'];
    $about_why = $about_why_model->getAboutWhyByID($about_why_id);
    require_once($path.'update.inc.php');
}else if ($_GET['action'] == 'edit'){

    if(isset($_POST['why_title_th'])){

        $check = true;
        $data = [];
        $data['why_title_th'] = $_POST['why_title_th'];
        $data['why_title_en'] = $_POST['why_title_en'];
        $data['why_detail_th'] = $_POST['why_detail_th'];
        $data['why_detail_en'] = $_POST['why_detail_en'];

        if($_FILES['why_icon']['name'] == ""){
            $data['why_icon'] = $_POST['why_icon_o'];
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES['why_icon']['name']));
            $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES['why_icon']['size'] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES['why_icon']['tmp_name'], $target_file)) {

                $data['why_icon'] = $date.'-'.strtolower(basename($_FILES['why_icon']['name']));

                $target_file = $target_dir . $_POST['why_icon_o'];
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
            $result = $about_why_model->updateAboutWhyByID($_POST['why_id'],$data);

            if($result){
                ?> <script>
                    window.location="index.php?content=about_why"
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