<?php
date_default_timezone_set("Asia/Bangkok");

require_once('../models/HomeCustomerModel.php');

$path = "modules/home_customer/views/";

$home_customer_model = new HomeCustomerModel;

$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";
$target_dir = "../img_upload/home_customer_detail/";
$target_dir_img = "../img_upload/home_customer_img/";

if(isset($_GET['id'])){
    $home_customer_id = $_GET['id'];

}
if(!isset($_GET['action'])){
    $home_customer_detail = $home_customer_model->getHomeCustomerBy();
    $home_customer_img = $home_customer_model->getHomeCustomerImgBy();
    require_once($path.'view.inc.php');
}else if ($_GET['action'] == 'insert'){
    require_once($path.'insert.inc.php');
}else if ($_GET['action'] == 'update'){
    $home_customer_img = $home_customer_model->getHomeCustomerImgByID($_GET['id']);
    require_once($path.'update.inc.php');
}
else if ($_GET['action'] == 'delete_img'){
    $home_slide_id = $_GET['id'];
    $home_slide = $home_customer_model->deleteHomeImgByID($home_slide_id);
    $target_file = $target_dir .$home_slide['slide_image'];
    if (file_exists($target_file)) {
        unlink($target_file);
    }
    ?> <script>window.location="index.php?content=home_customer"</script> <?php
}
else if ($_GET['action'] == 'edit_header'){

    if(isset($_POST['customer_id'])){
        $check = true;
        $data = [];
        
        $data['customer_title_th'] = $_POST['customer_title_th'];
        $data['customer_title_en'] = $_POST['customer_title_en'];
        $data['customer_detail_th'] = $_POST['customer_detail_th'];
        $data['customer_detail_en'] = $_POST['customer_detail_en'];

        if($_FILES['customer_img_back']['name'] == ""){
            $data['customer_img_back'] = $_POST['customer_img_back_o'];
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES['customer_img_back']['name']));
            $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES['customer_img_back']['size'] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES['customer_img_back']['tmp_name'], $target_file)) {

                $data['customer_img_back'] = $date.'-'.strtolower(basename($_FILES['customer_img_back']['name']));

                $target_file = $target_dir . $_POST['customer_img_back_o'];
                if (file_exists($target_file) && $_POST['customer_img_back_o'] != '') {
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
            $result = $home_customer_model->updateHomeCustomerByID($_POST['customer_id'],$data);

            if($result){
                ?> <script>
                    window.location="index.php?content=home_customer"
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
            if(isset($_FILES['customer_img_icon'])){
                $check = true;
                $data = [];
                if($_FILES['customer_img_icon']['name'] == ""){
                    $data['customer_img_icon'] = $_POST['customer_img_icon'];
                }else {
                    $target_file = $target_dir_img.$date.'-'.strtolower(basename($_FILES['customer_img_icon']['name']));
                    $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
                    if (file_exists($target_file)) {
                        $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                        $check = false;
                    }else if ($_FILES['customer_img_icon']['size'] > 5000000) {
                        $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                        $check = false;
                    }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                        $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                        $check = false;
                    }else if (move_uploaded_file($_FILES['customer_img_icon']['tmp_name'], $target_file)) {
                        $data['customer_img_icon'] = $date.'-'.strtolower(basename($_FILES['customer_img_icon']['name']));
                    } else {
                        $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                        $check = false;
                    } 
                }

                if($check == false){
                    ?>  <script>  alert('<?php echo $error_msg; ?>'); window.history.back(); </script>  <?php
                }else{
                    $result = $home_customer_model->insertHomeCustomer($data);


                    if($result){
                        ?> <script>
                            window.location="index.php?content=home_customer"
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
                    
                    if(isset($_FILES['customer_img_icon'])){
                        $check = true;
                        $data = [];
                        if($_FILES['customer_img_icon']['name'] == ""){
                            $data['customer_img_icon'] = $_POST['customer_img_icon_o'];
                        }else {
                            $target_file = $target_dir_img .$date.'-'.strtolower(basename($_FILES['customer_img_icon']['name']));
                            $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
                            if (file_exists($target_file)) {
                                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                                $check = false;
                            }else if ($_FILES['customer_img_icon']['size'] > 5000000) {
                                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                                $check = false;
                            }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                                $check = false;
                            }else if (move_uploaded_file($_FILES['customer_img_icon']['tmp_name'], $target_file)) {

                                $data['customer_img_icon'] = $date.'-'.strtolower(basename($_FILES['customer_img_icon']['name']));

                                $target_file = $target_dir_img . $_POST['customer_img_icon_o'];
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
                            $result = $home_customer_model->updateHomeCustomerImgByID($_POST['customer_img_id'],$data);

                            if($result){
                                ?> <script>
                                    window.location="index.php?content=home_customer"
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
                            $home_customer_detail = $home_customer_model->getHomeCustomerBy();
                            $home_customer_img = $home_customer_model->getHomeCustomerImgBy();                            require_once($path.'view.inc.php');
                        }
                        ?>