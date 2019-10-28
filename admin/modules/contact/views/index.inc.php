<?php
date_default_timezone_set("Asia/Bangkok");
require_once('../models/ContactModel.php');
require_once('../models/DescriptionModel.php');

$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";

$path = "modules/contact/views/";

$description_model = new DescriptionModel;
$contact_model = new ContactModel;

$target_dirimg = "../img_upload/contact/";

if(isset($_GET['id'])){
    $contact_id = $_GET['id'];
}
if(!isset($_GET['action'])){
	$description_id = '7';
    $description = $description_model->getDescriptionByID($description_id);
    $contact = $contact_model->getContactBy();
    require_once($path.'update_contact.inc.php');
}else if ($_GET['action'] == 'view_user'){

    require_once($path.'view_user.inc.php');
}else if ($_GET['action'] == 'edit_header'){
    if(isset($_POST['contact_header_title_th'])){
        $check = true;
        $data = [];
        $data1 = [];
        $description_id = '7';
        $data1['title'] = $_POST['title'];
        $data1['keyword'] = $_POST['keyword'];
        $data1['description'] = $_POST['description'];
        $data['contact_header_title_th'] = $_POST['contact_header_title_th'];
        $data['contact_header_title_en'] = $_POST['contact_header_title_en'];
        $data['contact_body_address_th'] = $_POST['contact_body_address_th'];
        $data['contact_body_address_en'] = $_POST['contact_body_address_en'];
        $data['contact_body_email_th'] = $_POST['contact_body_email_th'];
        $data['contact_body_email_en'] = $_POST['contact_body_email_en'];
        $data['contact_body_time_th'] = $_POST['contact_body_time_th'];
        $data['contact_body_time_en'] = $_POST['contact_body_time_en'];
        $data['contact_email'] = $_POST['contact_email'];

        if($_FILES['contact_header_img']['name'] == ""){
            $data['contact_header_img'] = $_POST['contact_header_img_o'];
        }else {
            $target_file = $target_dirimg.$date.'-'.strtolower(basename($_FILES['contact_header_img']['name']));
            $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES['contact_header_img']['size'] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES['contact_header_img']['tmp_name'], $target_file)) {

                $data['contact_header_img'] = $date.'-'.strtolower(basename($_FILES['contact_header_img']['name']));

                $target_file = $target_dirimg.$_POST['contact_header_img_o'];
                if (file_exists($target_file)) {
                    unlink($target_file);
                }
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            } 
        }

        if($check == false){
            ?>  <script> 
               alert('<?php echo $error_msg; ?>'); window.history.back(); 
               </script>  <?php
           }else{
            $result = $contact_model->updateContactByID($_POST['contact_body_id'],$data);
            $description_model->updateDescriptionByID($description_id,$data1);
            if($result){
                ?> <script>
                    window.location="index.php?content=contact"
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
	// $detail = $detail_model->getDetailByID($detail_id);
	// $contact = $contact_model->getContactBy();
           require_once($path.'update_contact.inc.php');
       }
       ?>