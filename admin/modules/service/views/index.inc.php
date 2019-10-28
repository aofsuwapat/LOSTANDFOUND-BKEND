<?php
date_default_timezone_set("Asia/Bangkok");

require_once('../models/ServiceModel.php');
require_once('../models/DescriptionModel.php');

$path = "modules/service/views/";

$service_model = new ServiceModel;
$description_model = new DescriptionModel;

$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";

$target_dir = "../img_upload/service_back/";
$target_dirdetail = "../img_upload/service_detail/";
if(isset($_GET['id'])){
    $service_id = $_GET['id'];
}
if(!isset($_GET['action'])){
    $description_id = '3';
    $description = $description_model->getDescriptionByID($description_id);
    $service = $service_model->getServiceHeaderBy();
    $service_body = $service_model->getServiceDetailBy();
    require_once($path.'view.inc.php');
}else if ($_GET['action'] == 'insert'){
    require_once($path.'insert.inc.php');
}else if ($_GET['action'] == 'update'){
    $service_id = $_GET['id'];
    $service = $service_model->getServiceDetailByID($service_id);
    require_once($path.'update.inc.php');
}else if ($_GET['action'] == 'delete'){
    $service_id = $_GET['id'];
    $service = $service_model->deleteServiceDetailByID($service_id);
    ?>  <script>
     window.history.back();
     </script> <?php
 }else if ($_GET['action'] == 'edit_header'){

    if(isset($_POST['service_header_title_th'])){

        $check = true;
        $data = [];
        $data1 = [];
        $description_id = '3';
        $data1['title'] = $_POST['title'];
        $data1['keyword'] = $_POST['keyword'];
        $data1['description'] = $_POST['description'];
        $data['service_header_title_th'] = trim($_POST['service_header_title_th']);
        $data['service_header_title_en'] = trim($_POST['service_header_title_en']);
        $data['service_header_detail_th'] = trim($_POST['service_header_detail_th']);
        $data['service_header_detail_en'] = trim($_POST['service_header_detail_en']);

        if($_FILES['service_header_img']['name'] == ""){
            $data['service_header_img'] = $_POST['service_header_img_o'];
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES['service_header_img']['name']));
            $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES['service_header_img']['size'] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES['service_header_img']['tmp_name'], $target_file)) {

                $data['service_header_img'] = $date.'-'.strtolower(basename($_FILES['service_header_img']['name']));

                $target_file = $target_dir . $_POST['service_header_img_o'];
                if (file_exists($target_file) && $_POST['service_header_img_o'] != '') {
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
                $result = $service_model->updateServiceHeaderByID($_POST['service_header_id'],$data);
                $description_model->updateDescriptionByID($description_id,$data1);

                if($result){
                    ?> <script>
                        window.location="index.php?content=service"
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
            }else if ($_GET['action'] == 'add'){
                if(isset($_POST['service_body_name_th'])){

                    $check = true;
                    $data = [];
                    $data['service_body_name_th'] = trim($_POST['service_body_name_th']);
                    $data['service_body_name_en'] = trim($_POST['service_body_name_en']);
                    $data['service_body_description_th'] = trim($_POST['service_body_description_th']);
                    $data['service_body_description_en'] = trim($_POST['service_body_description_en']);
                    $data['service_body_detail_th'] = trim($_POST['service_body_detail_th']);
                    $data['service_body_detail_en'] = trim($_POST['service_body_detail_en']);

                    if($_FILES['service_body_header_img']['name'] == ""){
                        $data['service_body_header_img'] = $_POST['service_body_header_img'];
                    }else {
                        $target_file = $target_dir.$date.'-'.strtolower(basename($_FILES['service_body_header_img']['name']));
                        $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
                        if (file_exists($target_file)) {
                            $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                            $check = false;
                        }else if ($_FILES['service_body_header_img']['size'] > 5000000) {
                            $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                            $check = false;
                        }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                            $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                            $check = false;
                        }else if (move_uploaded_file($_FILES['service_body_header_img']['tmp_name'], $target_file)) {
                            $data['service_body_header_img'] = $date.'-'.strtolower(basename($_FILES['service_body_header_img']['name']));
                        } else {
                            $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                            $check = false;
                        } 
                    }
                    if($_FILES['service_body_img']['name'] == ""){
                        $data['service_body_img'] = $_POST['service_body_img'];
                    }else {
                        $target_file = $target_dirdetail.$date.'-'.strtolower(basename($_FILES['service_body_img']['name']));
                        $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
                        if (file_exists($target_file)) {
                            $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                            $check = false;
                        }else if ($_FILES['service_body_img']['size'] > 5000000) {
                            $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                            $check = false;
                        }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                            $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                            $check = false;
                        }else if (move_uploaded_file($_FILES['service_body_img']['tmp_name'], $target_file)) {
                            $data['service_body_img'] = $date.'-'.strtolower(basename($_FILES['service_body_img']['name']));
                        } else {
                            $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                            $check = false;
                        } 
                    }

                    if($check == false){
                        ?>  <script>  alert('<?php echo $error_msg; ?>'); window.history.back(); </script>  <?php
                    }else{
                        $result = $service_model->insertServiceDetail($data);

                    // echo($result);

                        if($result){
                            ?> <script>
                                window.location="index.php?content=service"
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
                    }else if ($_GET['action'] == 'edit'){

                        if(isset($_POST['service_body_name_th'])){
                            $check = true;
                            $data = [];
                            $data['service_body_name_th'] = trim($_POST['service_body_name_th']);
                            $data['service_body_name_en'] = trim($_POST['service_body_name_en']);
                            $data['service_body_description_th'] = trim($_POST['service_body_description_th']);
                            $data['service_body_description_en'] = trim($_POST['service_body_description_en']);
                            $data['service_body_detail_th'] = trim($_POST['service_body_detail_th']);
                            $data['service_body_detail_en'] = trim($_POST['service_body_detail_en']);

                            if($_FILES['service_body_header_img']['name'] == ""){
                                $data['service_body_header_img'] = $_POST['service_body_header_img_o'];
                            }else {
                                $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES['service_body_header_img']['name']));
                                $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
                                if (file_exists($target_file)) {
                                    $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                                    $check = false;
                                }else if ($_FILES['service_body_header_img']['size'] > 5000000) {
                                    $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                                    $check = false;
                                }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                                    $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                                    $check = false;
                                }else if (move_uploaded_file($_FILES['service_body_header_img']['tmp_name'], $target_file)) {

                                    $data['service_body_header_img'] = $date.'-'.strtolower(basename($_FILES['service_body_header_img']['name']));

                                    $target_file = $target_dir . $_POST['service_body_header_img_o'];
                                    if (file_exists($target_file) && $_POST['service_body_header_img_o'] != '') {
                                        unlink($target_file);
                                    }
                                } else {
                                    $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                                    $check = false;
                                } 
                            }
                            if($_FILES['service_body_img']['name'] == ""){
                                $data['service_body_img'] = $_POST['service_body_img_o'];
                            }else {
                                $target_file = $target_dirdetail .$date.'-'.strtolower(basename($_FILES['service_body_img']['name']));
                                $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
                                if (file_exists($target_file)) {
                                    $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                                    $check = false;
                                }else if ($_FILES['service_body_img']['size'] > 5000000) {
                                    $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                                    $check = false;
                                }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                                    $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                                    $check = false;
                                }else if (move_uploaded_file($_FILES['service_body_img']['tmp_name'], $target_file)) {

                                    $data['service_body_img'] = $date.'-'.strtolower(basename($_FILES['service_body_img']['name']));

                                    $target_file = $target_dirdetail . $_POST['service_body_img_o'];
                                    if (file_exists($target_file) && $_POST['service_body_img_o'] != '') {
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
                                    $result = $service_model->updateServiceDetailByID($_POST['service_body_id'],$data);
                                    if($result){
                                        ?> <script>
                                            window.location="index.php?content=service"
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
                                }else if ($_GET['action'] == 'delete' && $login_user['user_type_id'] == 1){
                                    $service = $service_model->deleteServiceByID($service_id);
                                    ?> <script>window.location="index.php?content=service"</script> <?php
                                }else{
                                    $detail = $detail_model->getDetailByID($detail_id);
                                    $service = $service_model->getServiceBy();
                                    require_once($path.'view.inc.php');
                                }
                                ?>