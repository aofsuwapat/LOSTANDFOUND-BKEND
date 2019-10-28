<?php
date_default_timezone_set("Asia/Bangkok");

// require_once('../models/HomeSlideModel.php');
// require_once('../models/DescriptionModel.php');

$path = "modules/home/views/";

// $home_slide_model = new HomeSlideModel;
// $description_model = new DescriptionModel;

$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";
$target_dir = "../img_upload/home_slide/";

if(isset($_GET['id'])){
    $home_slide_id = $_GET['id'];
}
if(!isset($_GET['action'])){
    $id = '1';
    // $home_slide = $home_slide_model->getHomeSlideBy();
    // $description = $description_model->getDescriptionByID($id);
    require_once($path.'view.inc.php');
}else if ($_GET['action'] == 'insert'){
    require_once($path.'insert.inc.php');
}else if ($_GET['action'] == 'update'){
    $home_slide = $home_slide_model->getHomeSlideByID($home_slide_id);
    require_once($path.'update.inc.php');
}else if ($_GET['action'] == 'delete'){
    $home_slide = $home_slide_model->getHomeSlideByID($home_slide_id);
    $target_file = $target_dir .$home_slide['slide_img'];
    if (file_exists($target_file)) {
        unlink($target_file);
    }
    $home_slide = $home_slide_model->deleteHomeSlideByID($home_slide_id);
    ?> <script>window.location="index.php?content=home"</script> <?php
}else if ($_GET['action'] == 'edit_description'){

    if(isset($_POST['title'])){
        $data = [];
        $id = '1';
        $data['title'] = $_POST['title'];
        $data['keyword'] = $_POST['keyword'];
        $data['description'] = $_POST['description'];

        $result = $description_model->updateDescriptionByID($id,$data);
        if($result){?>
            <script>
                window.location="index.php?content=home";
            </script>
            <?
        }else{
            ?><script type="text/javascript">
                window.location.back();    
                </script><?
                require_once($path.'view.inc.php');
            }
        }
    }else if ($_GET['action'] == 'add'){
        if(isset($_POST['slide_title_th'])){
            $check = true;
            $data = [];
            $data['slide_title_th'] = $_POST['slide_title_th'];
            $data['slide_detail_th'] = $_POST['slide_detail_th'];
            $data['slide_title_en'] = $_POST['slide_title_en'];
            $data['slide_detail_en'] = $_POST['slide_detail_en'];
            $data['slide_link'] = $_POST['slide_link'];

            if($_FILES['slide_img']['name'] == ""){
                $data['slide_img'] = $_POST['slide_img'];
            }else {
                $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES['slide_img']['name']));
                $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
                if (file_exists($target_file)) {
                    $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                    $check = false;
                }else if ($_FILES['slide_img']['size'] > 5000000) {
                    $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                    $check = false;
                }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                    $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                    $check = false;
                }else if (move_uploaded_file($_FILES['slide_img']['tmp_name'], $target_file)) {
                    $data['slide_img'] = $date.'-'.strtolower(basename($_FILES['slide_img']['name']));
                } else {
                    $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                    $check = false;
                } 
            }

            if($check == false){
                ?>  <script>  alert('<?php echo $error_msg; ?>'); window.history.back(); </script>  <?php
            }else{
                $result = $home_slide_model->insertHomeSlide($data);
                if($result){
                    ?> <script>
                        window.location="index.php?content=home"
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
                
                if(isset($_POST['slide_id'])){
                    $check = true;
                    $data = [];
                    $data['slide_title_th'] = $_POST['slide_title_th'];
                    $data['slide_detail_th'] = $_POST['slide_detail_th'];
                    $data['slide_title_en'] = $_POST['slide_title_en'];
                    $data['slide_detail_en'] = $_POST['slide_detail_en'];
                    $data['slide_link'] = $_POST['slide_link'];

                    if($_FILES['slide_img']['name'] == ""){
                        $data['slide_img'] = $_POST['slide_img_o'];
                    }else {
                        $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES['slide_img']['name']));
                        $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
                        if (file_exists($target_file)) {
                            $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                            $check = false;
                        }else if ($_FILES['slide_img']['size'] > 5000000) {
                            $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                            $check = false;
                        }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                            $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                            $check = false;
                        }else if (move_uploaded_file($_FILES['slide_img']['tmp_name'], $target_file)) {

                            $data['slide_img'] = $date.'-'.strtolower(basename($_FILES['slide_img']['name']));

                            $target_file = $target_dir . $_POST['slide_img_o'];
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
                        $result = $home_slide_model->updateHomeSlideByID($_POST['slide_id'],$data);

                        if($result){
                            ?> <script>
                                window.location="index.php?content=home"
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
                        $home_slide = $home_slide_model->getHomeSlideBy();
                        require_once($path.'view.inc.php');
                    }
                    ?>