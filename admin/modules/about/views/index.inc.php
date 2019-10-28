<?php
date_default_timezone_set("Asia/Bangkok");
require_once('../models/DescriptionModel.php');
require_once('../models/AboutModel.php');

$path = "modules/about/views/";

$description_model = new DescriptionModel;
$about_model = new AboutModel;

$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";

$target_dirheader = "../img_upload/about_header/";
$target_dirproject = "../img_upload/about_project/";
$target_dirimg = "../img_upload/about_img/";


if(isset($_GET['id'])){
    $detail_id = $_GET['id'];
}
if(!isset($_GET['action'])){

    $about_header = $_GET['id'];
    $description_id = '2';
    $detail = $about_model->getAboutHeaderBy();
    $about_detail = $about_model->getAboutDetailBy();
    $description = $description_model->getDescriptionByID($description_id);
    require_once($path.'view.inc.php');
}else if ($_GET['action'] == 'update'){
    $about_img_id = $_GET['id'];
    $about_img = $about_model->getAboutImgByIDDetail($about_img_id);
    $about_detail = $about_model->getAboutDetailByID($detail_id);
    require_once($path.'update.inc.php');
}else if ($_GET['action'] == 'insert_img'){
 require_once($path.'insert_img.inc.php');
}else if ($_GET['action'] == 'update_img'){
    $about_img_id = $_GET['id'];
    $about_img = $about_model->getAboutImgByID($about_img_id);
    require_once($path.'update_img.inc.php');
}else if ($_GET['action'] == 'delete_img'){
    $about_img_id = $_GET['id'];
    $target_file = $target_dirimg . $_GET['about_img'];
    if (file_exists($target_file)) {
        unlink($target_file);
    }
    $about_img = $about_model->deleteAboutImgByID($about_img_id);
    ?>  <script>
       window.history.back();
       </script> <?php
   }else if ($_GET['action'] == 'add_img'){
    if(isset($_FILES['about_img'])){
        $check = true;
        $data = [];
        $data['about_detail_id'] = $_POST['about_detail_id'];
        if($_FILES['about_img']['name'] == ""){
            $data['about_img'] = $_POST['about_img'];
        }else {
            $target_file = $target_dirimg.$date.'-'.strtolower(basename($_FILES['about_img']['name']));
            $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES['about_img']['size'] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES['about_img']['tmp_name'], $target_file)) {
                $data['about_img'] = $date.'-'.strtolower(basename($_FILES['about_img']['name']));
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            } 
        }

        if($check == false){
            ?>  <script>  alert('<?php echo $error_msg; ?>'); window.history.back(); </script>  <?php
        }else{
            $result = $about_model->insertAboutImage($data);

            if($result){
                ?> <script>
                    window.location="index.php?content=about&action=update&id=<? echo $_POST['about_detail_id']?>"
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
        }else if ($_GET['action'] == 'edit_img'){
            if(isset($_FILES['about_img'])){
                $check = true;
                $data = [];
                if($_FILES['about_img']['name'] == ""){
                    $data['about_img'] = $_POST['about_img_o'];
                }else {
                    $target_file = $target_dirimg .$date.'-'.strtolower(basename($_FILES['about_img']['name']));
                    $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
                    if (file_exists($target_file)) {
                        $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                        $check = false;
                    }else if ($_FILES['about_img']['size'] > 5000000) {
                        $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                        $check = false;
                    }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                        $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                        $check = false;
                    }else if (move_uploaded_file($_FILES['about_img']['tmp_name'], $target_file)) {

                        $data['about_img'] = $date.'-'.strtolower(basename($_FILES['about_img']['name']));

                        $target_file = $target_dirimg . $_POST['about_img_o'];
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
                    $result = $about_model->updateAboutImageByID($_POST['about_img_id'],$data);

                    if($result){
                        ?> <script>
                            window.location="index.php?content=about&action=update&id=<? echo $_POST['about_detail_id']?>"
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
                }else if ($_GET['action'] == 'edit_header'){

                    if(isset($_POST['about_header_title_th'])){
                       $check = true;
                       $data = [];
                       $data1 = [];
                       $description_id = '2';
                       $data['about_header_title_th'] = trim($_POST['about_header_title_th']);
                       $data['about_header_title_en'] = trim($_POST['about_header_title_en']);
                       $data1['title'] = $_POST['title'];
                       $data1['keyword'] = $_POST['keyword'];
                       $data1['description'] = $_POST['description'];


                       if($_FILES['about_header_img']['name'] == ""){
                        $data['about_header_img'] = $_POST['about_header_img_o'];
                    }else {
                        $target_file = $target_dirheader .$date.'-'.strtolower(basename($_FILES['about_header_img']['name']));
                        $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
                        if (file_exists($target_file)) {
                            $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                            $check = false;
                        }else if ($_FILES['about_header_img']['size'] > 5000000) {
                            $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                            $check = false;
                        }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                            $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                            $check = false;
                        }else if (move_uploaded_file($_FILES['about_header_img']['tmp_name'], $target_file)) {

                            $data['about_header_img'] = $date.'-'.strtolower(basename($_FILES['about_header_img']['name']));

                            $target_file = $target_dirheader . $_POST['about_header_img_o'];
                            if (file_exists($target_file) && $_POST['about_header_img_o'] != '') {
                                unlink($target_file);
                            }
                        } else {
                            $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                            $check = false;
                        } 
                    }
                    if($_FILES['project_img']['name'] == ""){
                        $data['project_img'] = $_POST['project_img_o'];
                    }else {
                        $target_file = $target_dirproject .$date.'-'.strtolower(basename($_FILES['project_img']['name']));
                        $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
                        if (file_exists($target_file)) {
                            $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                            $check = false;
                        }else if ($_FILES['project_img']['size'] > 5000000) {
                            $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                            $check = false;
                        }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                            $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                            $check = false;
                        }else if (move_uploaded_file($_FILES['project_img']['tmp_name'], $target_file)) {

                            $data['project_img'] = $date.'-'.strtolower(basename($_FILES['project_img']['name']));

                            $target_file = $target_dirproject . $_POST['project_img_o'];
                            if (file_exists($target_file) && $_POST['project_img_o'] != '') {
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
                            $result = $about_model->updateAboutHeaderByID($_POST['about_header_id'],$data);
                            $description_model->updateDescriptionByID($description_id,$data1);
                            if($result){
                                ?> <script>
                                    window.location="index.php?content=about"
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
                        }else if ($_GET['action'] == 'edit_detail'){

                            if(isset($_POST['detail_title_th'])){

                                $data = [];
                                $data['detail_title_th'] = $_POST['detail_title_th'];
                                $data['detail_title_en'] = $_POST['detail_title_en'];
                                $data['detail_th'] = $_POST['detail_th'];
                                $data['detail_en'] = $_POST['detail_en'];
                                $result = $about_model->updateAboutDetailByID($_POST['detail_id'],$data);
                                if($result){?>
                                    <script>
                                        window.location="index.php?content=about";
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
                                $detail = $about_model->getAboutHeaderBy();
                                require_once($path.'view.inc.php');
                            }
                            ?>
