<?php
require_once('../models/UserModel.php');

$path = "modules/user/views/";

$user_model = new UserModel;

date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";

$target_dir = "../img_upload/user/";

if(isset($_GET['id'])){
    $user_id = $_GET['id'];
}

if(!isset($_GET['action'])){
    $user = $user_model->getUserBy();
    require_once($path.'view.inc.php');
}else if ($_GET['action'] == 'insert'){
    require_once($path.'insert.inc.php');
}else if ($_GET['action'] == 'update'){
    $user = $user_model->getUserByID($user_id);
    require_once($path.'update.inc.php');
}else if ($_GET['action'] == 'delete'){
    $user = $user_model->getUserByID($user_id);
    $target_file = $target_dir .$user['user_image'];
    if (file_exists($target_file)) {
        unlink($target_file);
    }
    $user = $user_model->deleteUserById($user_id);
    ?>
    <script>window.location="index.php?content=user"</script>
    <?php
}else if ($_GET['action'] == 'add'){
    if(isset($_POST['user_firstname'])){
        $check = true;
        $data = [];
        $data['user_firstname'] = trim($_POST['user_firstname']);
        // $data['user_image'] = trim($_POST['user_image']);
        $data['user_lastname'] = trim($_POST['user_lastname']);
        // $data['user_phone'] = trim($_POST['user_phone']);
        $data['user_email'] = trim($_POST['user_email']);
        // $data['user_address'] = trim($_POST['user_address']);
        // $data['user_province'] = trim($_POST['user_province']);
        // $data['user_amphur'] = trim($_POST['user_amphur']);
        // $data['user_district'] = trim($_POST['user_district']);
        // $data['user_zipcode'] = trim($_POST['user_zipcode']);
        $data['user_userid'] = trim($_POST['user_username']);
        $data['user_password'] = trim($_POST['user_password']);
        $data['addby'] = $login_user['user_id'];

        if($_FILES['user_image']['name'] == ""){
            $data['user_image'] = "";
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES["user_image"]["name"]));
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES["user_image"]["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES["user_image"]["tmp_name"], $target_file)) {
                $data['user_image'] = $date.'-'.strtolower(basename($_FILES["user_image"]["name"]));
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
                $user = $user_model->insertUser($data);

                if($user){
                    ?> <script>
                        window.location="index.php?content=user"
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

                    if(isset($_POST['user_id'])){
                        $check = true;
                        $data = [];
                        $data['user_firstname'] = trim($_POST['user_firstname']);
                        // $data['user_image'] = trim($_POST['user_image']);
                        $data['user_lastname'] = trim($_POST['user_lastname']);
                        // $data['user_phone'] = trim($_POST['user_phone']);
                        $data['user_email'] = trim($_POST['user_email']);
                        // $data['user_address'] = trim($_POST['user_address']);
                        // $data['user_province'] = trim($_POST['user_province']);
                        // $data['user_amphur'] = trim($_POST['user_amphur']);
                        // $data['user_district'] = trim($_POST['user_district']);
                        // $data['user_zipcode'] = trim($_POST['user_zipcode']);
                        $data['user_userid'] = trim($_POST['user_username']);
                        $data['user_password'] = trim($_POST['user_password']);

                        if($_FILES['user_image']['name'] == ""){
                            $data['user_image'] = $_POST['user_image_o'];
                        }else {
                            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES["user_image"]["name"]));
                            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
                            if (file_exists($target_file)) {
                                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                                $check = false;
                            }else if ($_FILES["user_image"]["size"] > 5000000) {
                                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                                $check = false;
                            }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                                $check = false;
                            }else if (move_uploaded_file($_FILES["user_image"]["tmp_name"], $target_file)) {

                                $data['user_image'] = $date.'-'.strtolower(basename($_FILES["user_image"]["name"]));

                                $target_file = $target_dir . $_POST['user_image_o'];
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
                                $user = $user_model->updateUserByID($_POST['user_id'],$data);

                                if($user){
                                    ?> <script>
                                        window.location="index.php?content=user"
                                        </script> <?php
                                    }else{
                                        ?>  <script>
                                           window.history.back(); 
                                           </script> <?php
                                       }
                                   }
                               }else{
                                ?> <script> window.history.back(); </script> <?php
                            }
                        }else{
                            $user = $user_model->getUserBy();
                            require_once($path.'view.inc.php');
                        }
                        ?>